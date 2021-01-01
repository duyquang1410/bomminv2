@extends('layout.master')
@section('content')
    @if(Auth::user()->role==1)
    <div class="container">
       <div class="row">
           <div class="panel-default frame-service">
               <div class="panel-heading">
                   <div class="panel-title">Dịch vụ</div>
                   <div class="btnAdd"><a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#addService">Thêm mới</a></div>
               </div>
               <div class="panel-body">
                   <div class="list-service">
                       @if(!empty($data))
                            @foreach($data as $items)
                               <div class="item-service">
                                   <div class="title"><h4>{!! !empty($items['name'])?$items['name']:'' !!}</h4></div>
                                   <div class="price">Tiền công : {!! !empty($items['price'])?number_format($items['price'], 0):0 !!} VND / giờ</div>
                                   <div class="box-action">
                                       <li><a data-toggle="modal" data-target="#editService"  href="javascript:;" id="{!! $items['id'] !!}" class="btn btn-xs btnEdit btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                       <li class="hidden"><a href="javascript:;" id="{!! $items['id'] !!}" class="btn btn-xs btn-danger btnDelete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                                   </div>
                               </div>
                           @endforeach
                       @endif
                   </div>
               </div>
           </div>
       </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addService" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="frmAddService" method="POST">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm mới dịch vụ</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nhập tên dịch vụ (<span style="color: red">*</span>)</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên dịch vụ">
                        </div>
                        <div class="form-group">
                            <label for="">Tiền công / giờ (*)</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Ví dụ : 200000">
                        </div>

                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="note" id="note" class="form-control" placeholder="Mô tả"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id="btnSubmit" class="btn btn-primary" style="margin-bottom: 0;">Lưu lại</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade editService" id="editService" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="frmUpdate"  method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật dịch vụ</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tên dịch vụ (*)</label>
                                <input type="text" name="name" id="nameEdit" class="form-control" placeholder="Dịch vụ">
                            </div>
                            <div class="form-group">
                                <label for="">Thành tiền/ giờ (*)</label>
                                <input type="number" name="price" id="priceEdit" class="form-control" placeholder="Thành tiền / h">
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <textarea class="form-control" name="noteEdit" id="noteEdit"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a style="margin-bottom: 0;" class="btn btn-default btn-primary btnEditService" id="btnUpdateService"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                    </div>
                </form>
                <div class="clear"> </div>
            </div>
        </div>
    </div>
    <script>

        $(".btnEdit").click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/admin/services/edit/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    $("#nameEdit").val(data['name']);
                    $("#priceEdit").val(data['price']);
                    $("#noteEdit").val(data['note']);

                    var action = "<?php echo url('/'); ?>/admin/services/update/"+id;
                    document.getElementById("frmUpdate").action =  action;
                }
            });
        });

        // update service
        $("#btnUpdateService").click(function(event){
            var nameEdit = $("#nameEdit").val();
            var priceEdit = $("#priceEdit").val();
            if(nameEdit.length==0){
                Lobibox.notify('error', {
                    title: 'Có lỗi',
                    msg: 'Bạn phải nhập tên dịch vụ'
                });
                return false;
            }
            if(priceEdit.length==0){
                Lobibox.notify('error', {
                    title: 'Có lỗi',
                    msg: 'Bạn phải nhập tiền công dịch vụ'
                });
                return false;
            }

            var urlAction = $("#frmUpdate").attr('action');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn cập nhật không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        $.ajax({
                            url: urlAction,
                            type: 'POST',
                            dataType: 'json',
                            data: new FormData(document.getElementById("frmUpdate")),
                            contentType: false,
                            processData: false,
                            enctype: 'multipart/form-data',
                            cache:false,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Cập nhật dịch vụ thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Cập nhật Thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });

        // delete service
        $(".btnDelete").click(function(){
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/xoa-dich-vu/"+id;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: id,
                            contentType: false,
                            processData: false,
                            enctype: 'multipart/form-data',
                            cache:false,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Xóa thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Xóa thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });


        $("#btnSubmit").click(function () {
            var name = $("#name").val();
            var price = $("#price").val();
            if(name.length==0){
                Lobibox.notify('error', {
                    title: 'Có lỗi',
                    msg: 'Bạn phải nhập tên dịch vụ'
                });
                return false;
            }

            if(price.length==0){
                Lobibox.notify('error', {
                    title: 'Có lỗi',
                    msg: 'Bạn phải nhập tiền công dịch vụ'
                });
                return false;
            }

            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn ứng lương không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "{!! route('users.postMobileSevice') !!}";
                        $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            data: new FormData(document.getElementById("frmAddService")),
                            contentType: false,
                            processData: false,
                            enctype: 'multipart/form-data',
                            cache:false,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Thêm mới thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Thêm mới thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });
    </script>

    <style>
        .frame-service .panel-title{
            font-weight: 700;
        }
        .item-service {
            background: rgba(255, 255, 255, 0.68);
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            float: left;
            position: relative;
            width: 100%;
        }
        .item-service .title {
            text-transform: capitalize;
            color: #337ab7;
        }
        .item-service .panel-title {
            font-weight: 700;
            color: #333;
            font-size: 16px;
        }
        .item-service .box-action li{
            list-style-type: none;
        }
        .item-service .box-action li a {
            margin: 0 5px;
        }
        .item-service .box-action {
            display: inline-flex;
            position: absolute;
            top: 10px;
            right: 0;
        }
        .panel-heading {
            display: inline-flex;
            width: 100%;
            justify-content: space-between;
        }
    </style>
    @else
        {!! redirect()->route('login') !!}
    @endif
@endsection