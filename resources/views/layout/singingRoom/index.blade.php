@extends('layout.master')
@section('content')
@if(!empty(Auth::user()->role==1))
    <div class="container">
        <div class="row">
            <div class="col-md-12 box-right">
                <div class="row wrapper white-bg page-heading">
                    <div class="col-lg-12">
                        <h2>Quản lý phòng hát </h2>
                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content row">
                                    <div class="col-md-8">
                                        <div class="list-room ">
                                            <div class="panel panel-default">
                                                    <div class="panel-heading"> 
                                                        <div class="panel-title">Phòng hát</div>
                                                    </div>
                                                    <div class="panel-body">
                                                        @if(!empty($room))
                                                            @foreach($room as $itemsRoom)
                                                             <div class="col-md-6 col-xs-12">
                                                                     <div class="item-row @if($itemsRoom['status'] == 1)dataRoom @else emptyRoom @endif">
                                                                        <div class="info-left col-md-4 col-xs-12">
                                                                            <img src="{!! URL::asset('public/uploads/icon/microphone64.png') !!}">
                                                                            <div class="title">{!! !empty($itemsRoom['title'])?$itemsRoom['title']:'' !!}</div>
                                                                            <div class="price">giá : <b>{!! !empty($itemsRoom['price'])?$itemsRoom['price']:'' !!}/h</b></div>
                                                                        </div>
                                                                        <div class ="info-right">
                                                                           <div class="item-child col-md-8 col-xs-12">
                                                                               @if($itemsRoom['status'] == 1)
                                                                                 <h3>Đang có khách</h3>
                                                                                    <div class="inline-flex-action">
                                                                                        <a href="javascript:;" id="{!! !empty($itemsRoom['id'])?$itemsRoom['id']:0 !!}" class="btn-payment paymentRoom">Thanh toán</a>
                                                                                        <a href="javascript:;" id="{!! !empty($itemsRoom['id'])?$itemsRoom['id']:0 !!}" class="btnCancelRoom">Hủy phòng</a>
                                                                                    </div>
                                                                                   @else
                                                                                   <h3>Chưa có khách</h3>
                                                                                   <a href="javascript:;" id="{!! !empty($itemsRoom['id'])?$itemsRoom['id']:0 !!}" class="btn-payment startDate">Bắt đầu</a>
                                                                               @endif
                                                                            </div>
                                                                        </div>

                                                                         <div class="cancelRoom"></div>
                                                                    </div>
                                                             </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                       <div class="panel panel-default listRoom">
                                            <div class="panel-heading">
                                                <div class="panel-title">Danh sách phòng</div>
                                                 <span class=" pull-right" ><a class="btnAddRoom" href="javascript:;" data-toggle="modal" data-target="#createRoom">Thêm mới</a></span>
                                            </div>
                                            <div class="panel-body">
                                                 <table class="table table-bordered table-striped table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Tên phòng</th>
                                                            <th>Gía tiền (VNĐ)</th>
                                                            <th>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!empty($room))
                                                            @foreach($room as $key => $itemsRoom)
                                                                  <tr>
                                                                    <td>{!! $key+1 !!}</td>
                                                                    <td>{!! !empty($itemsRoom['title'])?$itemsRoom['title']:'Không có tên' !!}</td>
                                                                    <td>{!! !empty($itemsRoom['price'])?number_format($itemsRoom['price'], 0):0 !!}</td>
                                                                    <td>
                                                                         <a id="{!! !empty($itemsRoom['id'])?$itemsRoom['id']:0 !!}" href="javascript:;" title="Sửa" class="btn btn-xs btn-info btnEditRoom" data-toggle="modal" data-target="#editRoom"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                        <a id="{!! !empty($itemsRoom['id'])?$itemsRoom['id']:0 !!}" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger btnDeleteRoom"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                       </div>
                                    </div>
                                        @include('layout/Product/list')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add  room-->
    <div class="modal fade createRoom" id="createRoom" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="frmCreateRoom" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm mới phòng hát</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Tên phòng hát <span style="color: red">(*)</span></label>
                                <input type="text" name="title" id="titleRoom" class="form-control" placeholder="Tên phòng hát">
                            </div>

                            <div class="form-group">
                                <label for="">Giá phòng hát</label>
                                <input type="number" name="price" id="priceRoom" class="form-control" placeholder="Giá phòng hát">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default mb-0" style="margin-bottom: 0; background: #4bac4d; color: #FFF; border: 0;" id="btnCreateRoom"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal edit  room-->
    <div class="modal fade editRoom" id="editRoom" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="frmUpdateRoom" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật phòng hát</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Tên phòng hát <span style="color: red">(*)</span></label>
                                <input type="text" name="title" id="titleRoomEdit" class="form-control" placeholder="Tên phòng hát">
                            </div>

                            <div class="form-group">
                                <label for="">Giá phòng hát</label>
                                <input type="number" name="price" id="priceRoomEdit" class="form-control" placeholder="Giá phòng hát">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default mb-0" style="margin-bottom: 0; background: #4bac4d; color: #FFF; border: 0;" id="btnUpdateRoom"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layout/Product/create')
    @include('layout/Product/edit')
    @include('layout/Product/import')
    @include('layout/Product/detail')
    <style type="text/css">
        @media (max-width: 768px){
            .content .page-heading {
                margin-bottom: 5px;
            }
            .box-right{
                padding-right: 0;
            }
            .list-room .panel-default{
                border: 0;
            }
            .panel-heading {
                padding-left: 0;
            }
            .list-room .panel-body .col-xs-12{
                padding-left: 0;
                padding-right: 0;
            }
            .list-room .item-row .info-left img{
                display: none;
            }
            .listRoom {
                border: 0;
            }
            .listRoom .panel-body {
                padding-left: 0;
                padding-right: 0;
            }
            .list-product .panel-default{
                border: 0;
            }
            .list-product .panel-default .panel-body {
                padding-left: 0;
                padding-right: 0;
            }
            .list-product .dataTables_wrapper .html5buttons{
                display: none;
            }
        }
        .list-room .panel-default{
            background: none;
            box-shadow: none;
            border-radius: 0;
        }
        .list-room .panel-default .panel-heading {
            border: 0;
        }
        .list-room .panel-default .panel-body {
            padding-left: 0;
            padding-right: 0;
        }
        .list-room .panel-default .panel-heading .panel-title {
                font-weight: 700;
        }

        /*=== listRoom  ===*/
        .listRoom {
            background: none;
            border-radius: 0;
            box-shadow: none;
        }
        .listRoom .panel-heading {
            border: 0;
        }

        .listRoom .panel-heading .panel-title {
            font-weight: 700;
        }

        .inline-flex-action {
            display: inline-flex;
            justify-content: space-between;
            width: 100%;
        }
        .btnCancelRoom {
            padding: 6px 15px;
            background: #a94442;
            border-radius: 4px;
            color: #FFF;
        }
        a.btnCancelRoom {
            color: #FFF;
        }
        .panel-default .panel-title {
            display: inline;
        }
        .btnAddRoom {
            padding: 8px 20px;
            background: #4bac4d;
            color: #FFF;
            border-radius: 4px;
        }
        a.btnAddRoom {
            color: #FFF;
        }
        .actionRoom {
            display: inline-block;
            position: absolute;
            right: 25px;
            bottom: 25px;
        }
        .list-product .title {
            font-weight: 700;
            font-size: 16px;
            margin-left: 15px;
        }
        .inline-flex {
            display: inline-flex;
        }
        a.btnUpdateUser {
            margin-bottom: 0;
            background: #4bac4d;
            color: #fff;
            border: 0;
        }
        .list-product .panel-title a{
            color: #FFF;
        }
        .panel-default .panel-title {
            font-weight: 700;
            color: #333;
        }
        .item-row {
                margin-bottom: 20px;
                padding: 10px 15px;
                overflow: hidden;
                border-radius: 7px;
        }
        .emptyRoom {
            background: #f8ac59;
        }
        .dataRoom {
            background: #0090da57; 
        }
        .item-row .title {
                font-size: 18px;
                text-shadow: 0 0 3px #e7eaec;
                color: #333;
        }
        .info-left {
            display: inline-block;
        }
        .info-right {
        }
        .item-child  {
                padding: 10px;
                background: #0090da17;
                border-radius: 10px;
        }
        .item-child h3{
               font-size: 20px;
                font-weight: 700;
                margin-top: 0;
                margin-bottom: 20px;

        }
        .item-child a.btn-payment{
               padding: 5px 20px;
                background: #0abb0a;
                color: #FFF;
                border-radius: 7px;
        }
        .box-img-fullname img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .img-user a {
            font-weight: 700;
            margin-left: 15px;
        }
        .info-user li{
            list-style: none;
        }
        .ibox-content {
            height: calc(100vh - 240px);
        }
    </style>
    <script>
        $(document).ready(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUploadAdd").change(function() {
                readURL(this);
            });

            function readURLEdit(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreviewEit').css('background-image', 'url('+e.target.result +')');
                        $('#imagePreviewEit').hide();
                        $('#imagePreviewEit').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUploadEdit").change(function() {
                readURLEdit(this);
            });

        });

        // Thêm mới phòng 
        $("#btnCreateRoom").click(function(){
            var title = $("#titleRoom").val();
            var price = $("#priceRoom").val();
            if(title.length==0){
                Lobibox.notify('error', {
                    title: 'Có lỗi',
                    msg: 'Bạn phải nhập tên phòng'
                });
                return false;
            }
            if(price.length==0){
                Lobibox.notify('error', {
                    title: 'Có lỗi',
                    msg: 'Bạn phải nhập giá tiền'
                });
                return false;
            }
            var url = "{!! route('rooms.store') !!}";
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: new FormData(document.getElementById("frmCreateRoom")),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                cache:false,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    if(data['message']=='success'){
                        Lobibox.notify('success', {
                            title: 'Thành công',
                            msg: 'Thêm mới phòng thành công',
                            delay: 2000
                        });
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    }
                    else {
                        Lobibox.notify('error', {
                            title: 'Có lỗi',
                            msg: 'Thêm mới phòng thất bại'
                        });
                    }
                }
            });
        });

        // Cập nhât phòng 
        $('.btnEditRoom').click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/admin/rooms/edit/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);

                    $("#titleRoomEdit").val(data['title']);
                    $("#priceRoomEdit").val(data['price']);

                    var action = "<?php echo url('/'); ?>/admin/rooms/update/"+id;
                    document.getElementById("frmUpdateRoom").action =  action;
                }
            });
        });

        // Update product
        $("#btnUpdateRoom").click(function() {
            var urlAction = $("#frmUpdateRoom").attr('action');
            $.ajax({
                url: urlAction,
                type: 'POST',
                dataType: 'json',
                data: new FormData(document.getElementById("frmUpdateRoom")),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                cache: false,
                success: function(data, textStatus, xhr) {
                    console.log(data);
                    if (data['message'] == 'success') {
                        Lobibox.notify('success', {
                            title: 'Thành công',
                            msg: 'Cập nhật phòng thành công',
                            delay: 1500
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    } else {
                        Lobibox.notify('error', {
                            title: 'Có lỗi',
                            msg: 'Cập nhật thất bại'
                        });
                    }
                }
            });
        });

        //  delete product ( xóa sản phẩm )
        $('.btnDeleteRoom').click(function () {
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa phòng không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/rooms/destroy/"+id;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: id,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Xóa thành công',
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },1500);
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

        // Hủy phòng
        $('.btnCancelRoom').click(function () {
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn hủy phòng không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/rooms/cancelRoom/"+id;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: id,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Hủy phòng thành công',
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },1500);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Hủy phòng thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });



        // Bắt đầu vào phòng
        $(".startDate").click(function(){
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bắt đầu tính tiền phòng ?",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/payments/bat-dau-tinh-tien/"+id;
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
                                        msg: 'Bắt đầu thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Bắt đầu thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });

        // Thanh toán
        $(".paymentRoom").click(function(){
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn thanh toán ?",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/payments/thanh-toan-phong/"+id;
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
                                        msg: 'Chuyển màn hình thanh toán thành công',
                                        delay: 1500
                                    });
                                    setTimeout(function(){
                                        // location.reload();
                                        window.location.href = "<?php echo url('/') ?>/admin/payments/thanh-toan-phong-ngay/"+data['id'];
                                    },1500);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Thất bại',
                                        msg: 'Chuyển màn hình thanh toán thất bại',
                                        delay: 1500
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });

        //  delete product ( xóa sản phẩm )
        $('.btnDelete').click(function () {
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa sản phẩm không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/products/destroy/"+id;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: id,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Xóa thành công',
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },1500);
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
    </script>

    @else
        {!! redirect()->route('login') !!}
    @endif
    @endsection