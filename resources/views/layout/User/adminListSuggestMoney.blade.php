@extends('layout.master')
@section('content')
@if(!isMobile())
    <div class="container">
        <div class="listSuggestMoney">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Danh sách Ứng lương</div>
                </div>
                <div class="panel-body">
                    <div class="list-suggest">
                        <table class="table table-bordered table-striped dataTables-example">
                            <thead>
                                <tr>
                                    <th width="20px">STT</th>
                                    <th width="200px">Họ tên</th>
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
                                    <td>
                                        @if(!empty($items['user']['avatar']))
                                         <div class="avatar"><img width="50px" height="50px" alt="avatar.png" src="{!! URL::asset('public/uploads/user/'.$items['user']['avatar']) !!}" alt=""></div>
                                         @endif
                                        <div class="fullname">
                                            <b>
                                            <a href="">{!! !empty($items['user']['fullname'])?$items['user']['fullname']:'' !!}</a>
                                            </b>
                                        </div>
                                    </td>
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
                                            <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-primary btnSalaryComfirm" title="ứng lương">Ứng lương</a>
                                            <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger btnCancelSugguest">Hủy ứng lương ?</a>
                                            <a id="{!! !empty($items['id'])?$items['id']:0 !!}" href="javascript:;" class="btn btn-xs btn-danger deleteSuggestUser"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa bỏ</a>
                                            @elseif($items['status']==2)
                                            <a id="{!! !empty($items['id'])?$items['id']:0 !!}" href="javascript:;" class="btn btn-xs btn-danger deleteSuggestUser"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa bỏ</a>
                                            @else
                                            <span style="color: green; font-weight: 700">Đã ứng</span>
                                            @endif
                                    </td>
                                </tr>
                         @endforeach
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
                    </div>
                    <div class="modal-footer">
                        <a id="btnSubmit" class="btn btn-primary" style="margin-bottom: 0;">Gửi đi</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@else
    @include('layout.Mobile.Admin.listSuggestMoney')
@endif
    <script>
        // Xóa ứng lương ( Bản lương đã hủy ứng )
        $('.deleteSuggestUser').click(function(){
            var id = $(this).attr('id');
                Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa ứng lương ?",
                title:"Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/users/deleteSuggestUser/"+id;
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
        // Duyệt ứng lương :
        $('.btnSalaryComfirm').click(function () {
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn ứng lương cho nhân viên không ?",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/users/salaryPayment/"+id;
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
                                        msg: 'Ứng thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else if(data['message']=='warning'){
                                     Lobibox.notify('warning', {
                                        title: 'Thông báo',
                                        msg: 'Tháng đó đã thanh toán , không được ứng lương',
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },4000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Ứng thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });
        // Hủy ứng lương
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

        $("#btnSubmit").click(function(event){
                    var numberMoney = $("#numberMoney").val();
                    if(numberMoney.length==0){
                         Lobibox.notify('error', {
                                    title: 'Có lỗi',
                                    msg: 'Bạn phải nhập số tiền cần ứng'
                            });
                         return false;
                    }
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
    </script>
    <style>
        .fullname {
            padding: 10px;
            display: inline-block;
        }
        .avatar {
            width: 50px;
            float: left;
        }
        .avatar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
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