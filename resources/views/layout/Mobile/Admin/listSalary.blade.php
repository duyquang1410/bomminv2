@extends('layout.master')
@section('content')
    @if(Auth::user()->role==1)
<div class="container">
    <div class="list-user-timekeeping">
        <div class="panel panel-default list-datetime"> 
            <div class="panel-heading"> 
                <div class="panel-title">Quản lý lương theo tháng ( năm {!! !empty($year)?$year:date('Y') !!} )</div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="listMonthYear">
                                <div class="">Năm 2020 : Tháng </div>
                                <div class="">
                                    @for($monthYear=1;$monthYear<=12;$monthYear++)
                                        @if(empty($month) && empty($year))
                                            <span><a href="{!! route('users.adminListSalary', ['month'=>$monthYear, 'year'=>'2020']) !!}" class="btn btn-xs  @if($monthYear==date('m') && date('Y')=='2020') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                        @else
                                            <span><a href="{!! route('users.adminListSalary', ['month'=>$monthYear, 'year'=>'2020']) !!}" class="btn btn-xs  @if($monthYear==$month && $year=='2020') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="listMonthYear">
                                <div class="">Năm 2021 : Tháng </div>
                                <div class="">
                                    @for($monthYear=1;$monthYear<=12;$monthYear++)
                                        @if(empty($month) && empty($year))
                                            <span><a href="{!! route('users.adminListSalary', ['month'=>$monthYear, 'year'=>'2021']) !!}" class="btn btn-xs @if($monthYear==date('m') && date('Y')=='2021') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                        @else
                                            <span><a href="{!! route('users.adminListSalary', ['month'=>$monthYear, 'year'=>'2021']) !!}" class="btn btn-xs  @if($monthYear==$month && $year=='2021') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                        @if(date('Y')=='2022')
                            <div class="col-md-12">
                                <div class="listMonthYear">
                                    <div class="">Năm 2022 : Tháng </div>
                                    <div class="">
                                        @for($monthYear=1;$monthYear<=12;$monthYear++)
                                            <span><a href="{!! route('users.adminListSalary', ['month'=>$monthYear, 'year'=>'2022']) !!}" class="btn btn-xs @if($monthYear==date('m') && date('Y')=='2022') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">Danh sách nhân viên lương tháng @if(!empty($month) && !empty($year)) {!! $month !!}/{!! $year !!} @else {!! date('m/Y') !!}  @endif</div>
        </div>
        <div class="panel-body">
            @if(!empty($data))
                @foreach($data as $items)
                <div class="item-box-timekeeping">
                    <div class="img-user">
                        <a href="javascript:;" class="dataDetail" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#detailTimeKeeping">
                            @if(empty($items['user']['avatar']))
                            <img src="{!! URL::asset('public/uploads/user/icon1.png') !!}">
                            @else
                            <img src="{!! URL::asset('public/uploads/user/'.$items['user']['avatar']) !!}">
                            @endif
                        </a>
                    </div>
                     <div class="info-user">
                         <a href="javascript:;" class="dataDetail" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#detailTimeKeeping"><h3 class="fullname">{!! !empty($items['user']['fullname'])?$items['user']['fullname']:'' !!}</h3></a>
                         <div class="info-item-salary">
                            <div class="total_Money"> Tổng lương : {!! !empty($items['total_Money'])?number_format($items['total_Money'], 0):'0' !!} VND</div>
                            <div class="suggest_Money">Tạm ứng : {!! !empty($items['suggest_Money'])?number_format($items['suggest_Money'], 0):'0' !!} VND </div>
                            <div class="realField_Money">Lương thực lĩnh : <b>{!! !empty($items['realField_Money'])?number_format($items['realField_Money'], 0):'0' !!} VND</b> </div>
                            <div class="status">Trạng thái : 
                                @if($items['status'] == 0)
                                    <span style="color: #a94442; font-weight: 700">Chưa thanh toán</span> 
                                @else
                                    <span style="color: green; font-weight: 700">Đã thanh toán</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="dropdownSalary">
                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                           
                                <li>
                                     @if($items['status'] == 0)
                                    <a style="color: #FFF" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-primary sendPaymentSalary">Thanh toán</a>
                                    @else 
                                    <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger cancelSendPaymentSalary">Hủy thanh toán</a>
                                    @endif
                                     <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#btnEditPayment" class="btn btn-xs btn-warning btnUpdatePayment"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                    <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger btnDeletePayment"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
                                </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                @else
                <div class="nodata text-center">Tháng {!! !empty($month)?$month:'' !!}/{!! !empty($year)?$year:'' !!} không có dữ liệu ...</div>
            @endif
        </div>
    </div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="btnEditPayment" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chỉnh lương tháng của nhân viên</h4>
            </div>
            <div class="modal-body">
                <form id="frmUpdatePayment" method="POST">
                    {!! csrf_field() !!}
                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Tháng</label>
                           <select name="month" class="form-control" id="month">
                               <?php
                                for($i=1;$i<=12;$i++){
                                    ?>
                                   <option <?php  if(date('m')==$i){ echo "selected"; } ?> value="{!! $i !!}">{!! $i !!}</option>
                               <?php
                                }
                               ?>
                           </select>
                       </div>
                   </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Năm</label>
                            <select name="year" class="form-control" id="year">
                                <?php
                                for($y=date('Y')-1;$y<=date('Y')+1;$y++){
                                ?>
                                <option <?php  if(date('Y')==$y){ echo "selected"; } ?> value="{!! $y !!}">{!! $y !!}</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tổng tiền</label>
                            <input type="number" name="total_Money" id="total_Money" class="form-control" placeholder="Tổng tiền">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tạm ứng</label>
                            <input type="number" name="suggest_Money" id="suggest_Money" class="form-control" placeholder="Tạm ứng">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Lương thực tĩnh</label>
                            <input type="number" name="realField_Money" id="realField_Money" class="form-control" placeholder="Lương thực lĩnh">
                        </div>
                    </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script>

            // Lấy dữ liệu lương của nhân viên đó :
        $(".btnUpdatePayment").click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/admin/users/edit-payment/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    // return false;
                    $("#month").val(data['month']);
                    $("#year").val(data['year']);
                    $("#total_Money").val(data['total_Money']);
                    $("#suggest_Money").val(data['suggest_Money']);
                    $("#realField_Money").val(data['realField_Money']);
                    var action = "<?php echo url('/'); ?>/admin/users/update-payment/"+id;
                    document.getElementById("frmUpdatePayment").action =  action;
                }
            });
        });
        // Update lương
        $(document).on('submit', '#frmUpdatePayment', function(event) {
            event.preventDefault();
            var urlAction = $("#frmUpdatePayment").attr('action');
            $.ajax({
                url: urlAction,
                type: 'POST',
                dataType: 'json',
                data: new FormData(document.getElementById("frmUpdatePayment")),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                cache:false,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    if(data['message']=='success'){
                        Lobibox.notify('success', {
                            title: 'Thành công',
                            msg: 'Cập nhật thành công',
                            delay: 1500
                        });
                        setTimeout(function(){
                            location.reload();
                        },1500);
                    }
                    else {
                        Lobibox.notify('error', {
                            title: 'Có lỗi',
                            msg: 'Cập nhật thất bại'
                        });
                    }
                }
            });
        });

        // Xóa lương của 1 nhân viên :
        $(".btnDeletePayment").click(function () {
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa vĩnh viễn không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/users/delete-payment/"+id;
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
                                        msg: 'Đã xóa thanh toán lương thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Hủy thanh toán lương thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });

        // Hủy thanh toán cho nhân viên
        $(".cancelSendPaymentSalary").click(function(event){
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn hủy thanh toán cho nhân viên không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/users/cancelSendPaymentSalary/"+id;
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
                                        msg: 'Đã hủy thanh toán lương thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Hủy thanh toán lương thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });

            $(".sendPaymentSalary").click(function(event){
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn thanh toán cho nhân viên không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/thanh-toan-luong/"+id;
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
                                        msg: 'Đã thanh toán lương thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Thanh toán lương thất bại'
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

    .listMonthYear {
        display: inline-flex;
        font-size: 18px;
    }
    .listMonthYear span a {
        padding: 4px 10px;
        background: #1ab394;
        color: #FFF;
    }
    .listMonthYear span a.active {
        background: #f8ac59;
    }
    .listMonthYear div{
        margin-right: 10px;
    }
    .day-month {
        display: inline-block;
        padding: 6px 25px;
        background: #0090da;
        color: #FFF;
        border-radius: 4px;
        font-weight: 600;
    }
    .head-date .month {
        display: inline-flex;
        justify-content: space-between;
        width: 135px;
    }
    .head-date .year {
        display: inline-flex;
        justify-content: space-between;
        width: 135px;
    }
    .head-date {
        display: inline-flex;
        justify-content: space-between;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
        border-bottom: 1px solid #F1F1F1;
        padding-bottom: 10px;
    }
    .head-date>div{
        margin: 0 10px;
    }
    .item-time a.active {
        background: #f8ac59 !important;
    }

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
    .list-date-month .list-time .item-time{
        display: inline-block;
    }
    .list-date-month .list-time .item-time a {
        padding: 0 10px;
        background: #1ab394;
        border-radius: 4px;
        color: #FFF;
        display: inline-block;
        margin-bottom: 10px;
        margin-right: 3px;
        font-size: 20px;
    }
    .totalTimeKeeping ul{
        display: inline-flex;
        margin-left: 0;
        padding-left: 0;
    }
    .totalTimeKeeping ul li{
        list-style: none;
        margin-right: 10px;
    }

    .timeTimekeeping {
        padding: 5px 15px;
        background: #0090da;
        color: #FFF;
        display: inline-block;
        border-radius: 4px;
        font-weight: 600;
    }
    .createTimeKeeping .form-group label {
        margin-bottom: 10px;
    }
    .timegosing {
        display: inline-flex;
        overflow: hidden;
        width: 100%;
        justify-content: space-between;
        font-weight: 600;
    }
        .item-box-timekeeping .dropdown-menu > li > a{
            color: #FFF;
        }
        .cancelSendPaymentSalary a{
            color: #FFF;
        }
        .item-box-timekeeping .dropdown-menu{
                left: unset !important;
                right: 0 !important;
                top: 25px;
                position: absolute;
        }
        .list-datetime  {
            margin-bottom: 0;
        }
         .list-datetime .panel-body{
            padding-bottom: 0;
         }
        .item-time {
            display: inline-block;
        }
        .item-time a {
            display: inline-block;
            padding: 5px 10px;
            background: #eeeeee;
            margin: 5px 0;
            border-radius: 5px;
        }
        .item-time a.active  {
            background: #f8ac59;
            color: #FFF;
        }
        .list-user-timekeeping{
            overflow: hidden;
            position: relative;
        }
        .box-view-timekeeping a{
            background: #99c85e;
            width: 40px;
            height: 40px;
            display: block;
            text-align: center;
            border-radius: 50%;
            color: #FFF;
            position: fixed;
            right: 15px;
            font-size: 12px;
            bottom: 60px;
            line-height: 40px;
        }

        #detailTimeKeeping .modal-header{
            background: #0090da;
        }
        #detailTimeKeeping .modal-body {
            padding: 10px;
        }
    .item-box-timekeeping .img-user {
                width: 15%;
                height: 55px;
                float: left;
    }
   
    .item-box-timekeeping .img-user img {
               width: 45px;
                height: 45px;
                object-fit: cover;
                border-radius: 50%;
    }

    .item-box-timekeeping .info-user .list-timekeeping li{
        list-style-type: none;
    }  
     .item-box-timekeeping .info-user .list-timekeeping {
        display: inline-flex;
        justify-content: space-between;
        width: 100%;
    } 
    .checkin .check-text {
            color: green;
            font-weight: 700;
    }
    .checkout .check-text{
            color: #b30a1b;
            font-weight: 700;
    }
     .item-box-timekeeping .list-timekeeping .info-user .fullname, h3.fullname{
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 700;
            color: #337ab7;
    }

    .list-user-timekeeping .item-box-timekeeping{
        position: relative;
        padding: 5px;
        background: rgba(255, 255, 255, 0.68);
        border-radius: 5px;
        margin-bottom: 10px;
        width: 100%;
        float: left;
    }
    .item-box-timekeeping button.dropdown-toggle{
           position: absolute;
            right: 10px;
            top: 10px;
    }
    .time {
        padding: 6px 0;
        font-weight: 700;
    }
    .info-user {
        display: inline-block;
        width: 85%;
        padding-left: 10px;
    }
   
    .list-user-timekeeping .panel-default{
        background: none;
        border: 0;
        box-shadow: none;
        border-radius: 0;
    }
    .list-user-timekeeping .panel-default .panel-heading {
        background: none;
        padding-left: 0;
        padding-right: 0;
    }
    .list-user-timekeeping .panel-default .panel-heading .panel-title {
        font-size: 16px;
        font-weight: 700;
    }
    .list-user-timekeeping .panel-default .panel-body {
        padding-left: 0;
        padding-right: 0;
    }
</style>
        @else
            {!! redirect()->route('login') !!}
        @endif
@endsection