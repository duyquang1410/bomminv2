@extends('layout.master')
@section('content')
@if(!isMobile())
    <div class="container">
        <div class="listSuggestMoney">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Danh sách Ứng lương</div>
                    <div class="panel-btn"><a href="javascript:;" data-toggle="modal" data-target="#userPayment">Tạm ứng</a></div>
                </div>
                <div class="panel-body">
                    <div class="list-suggest">
                        <table class="table table-bordered table-striped dataTables-example">
                            <thead>
                                <tr>
                                    <th width="20px">STT</th>
                                    <th width="200px">Số tiền ứng</th>
                                    <th width="200px">Ghi chú</th>
                                    <th width="150px">Tháng ứng</th>
                                    <th width="200px">Ngày tạo</th>
                                    <th width="200px">Trạng thái</th>
                                    <th width="200px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                        @if(!empty($data))
                            @foreach($data as $key => $items)
                                <tr>
                                    <td>{!! $key+1 !!}</td>
                                    <td><b>{!! !empty($items['numberMoney'])?number_format($items['numberMoney'], 0):0 !!} đ</b></td>
                                    <td>{!!  !empty($items['note'])?$items['note']:'' !!}</td>
                                    <td>{!! !empty($items['month'])?$items['month']:'' !!}/{!! !empty($items['year'])?$items['year']:'' !!}</td>
                                    <td>{!! !empty($items['created_at'])?date('d/m/Y H:i', strtotime($items['created_at'])):0 !!}</td>
                                    <td>
                                        @if($items['status']==0)
                                        <span style="color: #a94442; font-weight: 700">Chưa được ứng</span>
                                        @elseif($items['status'] == 2)
                                        <span style="color: red; font-weight: 700">Bạn Đã Hủy ứng</span>
                                        @else
                                        <span style="color: green; font-weight: 700">Đã ứng</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($items['status']==0)
                                            <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger btnCancelSugguest">Bạn muốn Hủy ?</a>
                                            <a href="javascript:;" class="btn btn-xs btn-danger btnUserDelSuggestMoney" id="{!! !empty($items['id'])?$items['id']:0 !!}">Xóa bỏ</a>
                                          @elseif($items['status']==2)
                                            <span class="btn btn-xs btn-primary"><a id="{!! !empty($items['id'])?$items['id']:0 !!}" class="pleaseRespond" style="color: #FFF;" href="javascript:;">Xin ứng lại</a></span>
                                            <a href="javascript:;" class="btn btn-xs btn-danger btnUserDelSuggestMoney" id="{!! !empty($items['id'])?$items['id']:0 !!}">Xóa bỏ</a>
                                            @endif
                                    </td>
                                </tr>
                         @endforeach
                            @else
                            <div class="text-center">Bạn chưa tạm ứng</div>
                        @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="userPayment" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="frmsuggestMoney" method="POST">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Xin tạm ứng</h4>
                    </div>
                    <div class="modal-body">
                       <div class="form-group">
                           <label for="">Nhập số tiền cần ứng (<span style="color: red">*</span>)</label>
                           <input type="number" name="numberMoney" id="numberMoney" class="form-control" placeholder="Nhập số tiền">
                       </div>

                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="note" id="note"  class="form-control" placeholder="Nội dung" ></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label for="">Tháng ứng</label>
                                    <select name="month" id="month" class="form-control">
                                        <?php
                                        for($i=1;$i<=12;$i++){
                                        ?>
                                        <option <?php if($i==date('m')){ echo "selected"; } ?> value="{!! $i !!}">{!! $i !!}</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label for="">Năm</label>
                                    <select name="year" id="year" class="form-control">
                                        <?php
                                        for($y=date('Y')-1;$y<=date('Y')+1;$y++){
                                        ?>
                                        <option  <?php if($y==date('Y')){ echo "selected"; } ?> value="{!! $y !!}">{!! $y !!}</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 0;">Gửi đi</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                    <div class="note"><span><b style="color: red;">Ghi chú</b> : <b>Tháng ứng</b> sẽ là tháng được trừ vào lương của tháng đó , và chỉ được ứng lương trước khi thanh toán tháng lương đó ( Sau thanh toán sẽ không được ứng )</span></div>
                </form>
            </div>
        </div>
    </div>
@else
    @include('layout.Mobile.User.listSuggestMoney')
@endif
    <script>


        $(document).ready(function() {
            //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
            $("#frmsuggestMoney").validate({
                rules: {
                    numberMoney: "required",
                },
                messages: {
                    numberMoney: {
                        required: 'Số tiền cần ứng : không được để trống'
                    }
                },
                invalidHandler: function(form, validator) {
                    var count=validator.numberOfInvalids(), messages = [];
                    if(count){
                        for(var i in validator.errorList)
                        {
                            var prefix = '', elem = validator.errorList[i].element;
                            var m = prefix + validator.errorList[i].message;
                            console.log(m);
                            if(messages.indexOf(m) == -1 && messages.length < 4){
                                messages.push(m +'<br>');
                            }
                            console.log(messages);
                        }
                    }
                    Lobibox.notify('error', {
                        title: 'Có lỗi',
                        msg: messages
                    });
                },
            });

            $(document).on('submit', '#frmsuggestMoney', function(event) {
                event.preventDefault();
                var numberMoney = $("#numberMoney").val();
                Lobibox.confirm({
                    msg: "Bạn có chắc chẵn muốn ứng lương không ?",
                    callback: function ($this, type) {
                        if (type === 'yes') {
                            var url = "{!! route('users.suggestMoney') !!}";
                            $.ajax({
                                url: url,
                                type: 'POST',
                                dataType: 'json',
                                data: new FormData(document.getElementById("frmsuggestMoney")),
                                contentType: false,
                                processData: false,
                                enctype: 'multipart/form-data',
                                cache:false,
                                success: function (data, textStatus, xhr) {
                                    console.log(data);
                                    if(data['message']=='success'){
                                        Lobibox.notify('success', {
                                            title: 'Thành công',
                                            msg: 'Tạm ứng thành công',
                                            delay: 2000
                                        });
                                        setTimeout(function(){
                                            location.reload();
                                        },2000);
                                    }
                                    else if(data['message']=='warning'){
                                        Lobibox.notify('warning', {
                                            title: 'Thông báo',
                                            msg: 'Tháng đó bạn đã được thanh toán, không được ứng lương tháng đã thanh toán nữa !',
                                            delay: 5000
                                        });
                                    }
                                    else {
                                        Lobibox.notify('error', {
                                            title: 'Có lỗi',
                                            msg: 'Tạm ứng thất bại'
                                        });
                                    }
                                }
                            });
                        }
                    }
                });
            });
        });
        // Nhân viên Xóa ứng lương ( chưa được ứng )
        $('.btnUserDelSuggestMoney').click(function(){
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa ứng lương ?",
                title:"Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/nhan-vien-xoa-ung-luong/"+id;
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
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Thông báo',
                                        msg: 'Xóa thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });

        // Xin ứng lương lại:
        $('.pleaseRespond').click(function(){
                var id = $(this).attr('id');
                var url = "<?php echo url('/') ?>/xin-ung-luong-lai/"+id;
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
                                msg: 'Xin ứng lương lại thành công',
                                delay: 2000
                            });
                            setTimeout(function(){
                                location.reload();
                            },2000);
                        }
                        else if(data['message'] == 'warning'){
                            Lobibox.notify('warning', {
                                title: 'Thông báo',
                                msg: 'Tháng đó bạn đã được thanh toán, không được ứng lương tháng đã thanh toán nữa !'
                            });
                        }
                        else {
                            Lobibox.notify('error', {
                                title: 'Có lỗi',
                                msg: 'Xin ứng lương lại thất bại'
                            });
                        }
                    }
                });
        });

        // Hủy ứng lương ( Nhân viên )
        $('.btnCancelSugguest').click(function(){
                        var id = $(this).attr('id');
                        Lobibox.confirm({
                            msg: "Bạn có chắc chẵn muốn hủy ứng lương không ?",
                            callback: function ($this, type) {
                                if (type === 'yes') {
                                    var url = "<?php echo url('/') ?>/huy-ung-luong/"+id;
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
                                                            msg: 'Hủy Tạm ứng thành công',
                                                            delay: 2000
                                                        });
                                                        setTimeout(function(){
                                                            location.reload();
                                                        },2000);
                                                    }
                                                    else {
                                                         Lobibox.notify('error', {
                                                            title: 'Có lỗi',
                                                            msg: 'Hủy Tạm ứng thất bại'
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
        .note {
            padding: 20px;
            font-size: 15px;
        }
        .listSuggestMoney .panel-default {
            background: none;
            border-radius: 0;
            border: 0;
            box-shadow: none;
            margin-top: 10px;
        }
        .listSuggestMoney .panel-default .panel-heading {
            border: 0;
            background: none;
            padding-left: 0;
            padding-right: 0;
            border-bottom: 1px solid #f1f1f1;
            display: inline-flex;
            width: 100%;
            justify-content: space-between;
         }
          .listSuggestMoney .panel-default .panel-heading  .panel-btn a{
            color: #FFF;
            background: #0090da;
            padding: 5px 10px;
            border-radius: 5px;
          }
         .listSuggestMoney .panel-default .panel-body {
            padding-left: 0;
            padding-right: 0;
         }
         .listSuggestMoney .panel-default .panel-heading .panel-title {
            font-size: 16px;
            color: #333;
            font-weight: 700;
         }
        .listSuggestMoney .item-suggest .img-icon{
           display: inline-block;
            background: #FFF;
            width: 20%;
            height: 50px;
            text-align: center;
            margin: auto;
            border-radius: 8px;
            padding-top: 5px;
            color: #0090da;
            font-weight: 700;
            float: left;
        }
        .listSuggestMoney .item-suggest .info-suggest {
            width: 80%;
            float: left;
            padding-left: 10px;
        }
        .listSuggestMoney .item-suggest .info-suggest h4{
            margin-bottom: 0;
        }
        .listSuggestMoney .item-suggest .img-icon img{
            width: 42px;
        }
        .item-suggest {
            overflow: hidden;
            background: rgba(255, 255, 255, 0.68);
            padding: 5px 8px;
            border-radius: 5px;
            margin: 8px 0;
        }
    </style>
@endsection