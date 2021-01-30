@extends('layout.master')
@section('content')
@if(Auth::user()->role==1)
@if(!isMobile())
<div class="container">
    <div class="list-user-timekeeping">
        <div class="panel panel-default list-datetime"> 
            <div class="panel-heading"> 
                <div class="panel-title">Quản lý lương theo tháng</div>
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
            <div class="panel-title">Danh sách nhân viên lương tháng @if(!empty($month) && !empty($year)) {!! $month !!} / {!! $year !!}  @else {!! date('m/Y') !!}  @endif</div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover table-striped dataTables-example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Tổng lương</th>
                        <th>Tạm ứng</th>
                        <th>Lương thực lĩnh</th>
                        <th>Thu về</th>
                        <th>Duyệt</th>
                        <th>Trạng thái</th>
                        <th width="300px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($data))
                    @foreach($data as $key => $items)
                        @if(!empty($items['user']['id']))
                            <tr>
                                <td>{!! $key+1 !!}</td>
                                <td>
                                    <div class="avatar"><img width="50px" height="50px" alt="avatar.png" src="{!! URL::asset('public/uploads/user/'.$items['user']['avatar']) !!}" alt=""></div>
                                    <div class="fullname">
                                        <b>
                                            <a href="{!! route('statisticals.detail', ['id'=>$items['user']['id'], 'month'=>$month, 'year'=>2020]) !!}">{!! !empty($items['user']['fullname'])?$items['user']['fullname']:'' !!}</a>
                                        </b>
                                    </div>
                                </td>
                                <td><b>{!! !empty($items['total_Money'])?number_format($items['total_Money'], 0):0 !!} đ</b></td>
                                <td>
                                    <?php
                                    $totalSuggest = 0;
                                    $dataSuggest_Money = DB::table('suggestmoneys')->where('user_id', $items['user']['id'])->where('month', $month)->where('year', $year)->where('status', 1)->get()->toArray();
                                    if(!empty($dataSuggest_Money)){
                                        $totalSuggest = 0;
                                        foreach($dataSuggest_Money as $itemSuggest){
                                            $totalSuggest = $totalSuggest+$itemSuggest->numberMoney;
                                        }
                                    }
                                    ?>
                                   <b> <a href="{!! route('statisticals.suggest', ['id'=>$items['user']['id'], 'month'=>$month, 'year'=>$year]) !!}" title="Chi tiết ứng lương">
                                           {!! !empty($totalSuggest)?number_format($totalSuggest, 0):'' !!} đ
                                       </a></b>
                                </td>
                                <td>
                                    <?php
                                    if(!empty($items['total_Money'])){
                                        $totalSalarys = $items['total_Money'] - $totalSuggest;
                                    }
                                    ?>
                                    <b>{!! !empty($totalSalarys)?number_format($totalSalarys, 0):'' !!} đ</b>
                                </td>
                                <td>
                                    <?php
                                   // $totalMoney = DB::table('timekeepings')->select('*')->where('user_id', $items['user']['id'])->where('month', $month)->where('year', $year)->where('adminStatus', 1)->sum('totalMoney');

                                    // Tổng quản lý thu của khách từ nhân viên này
                                    $totalAdminMoney = DB::table('timekeepings')->select('*')->where('user_id', $items['user']['id'])->where('month', $month)->where('year', $year)->where('adminStatus', 1)->sum('totalMoneyAdmin');

                                    if(!empty($totalAdminMoney)){
                                        $totalMoneyCollected = $totalAdminMoney - $items['total_Money'];
                                    }else{
                                        $totalMoneyCollected = 0;
                                    }
                                    ?>
                                    <b>{!! !empty($totalMoneyCollected)?number_format($totalMoneyCollected, 0):'' !!} đ</b>
                                </td>
                                <td>
                                    <?php
                                    // Thống kê Tổng tiền đi bay
                                    $adminStatus_0 =  DB::table('timekeepings')->where('month', $month)->where('year', $year)->where('user_id', $items['user']['id'])->where('adminStatus', 0)->get()->toArray();
                                    $adminStatus_1 =  DB::table('timekeepings')->where('month', $month)->where('year', $year)->where('user_id', $items['user']['id'])->where('adminStatus', 1)->get()->toArray();
                                    ?>
                                    <div class="">Đã duyệt: <span class="duyet">{!! !empty($adminStatus_1)?count($adminStatus_1):0 !!}</span></div>
                                    <div class="">Chưa duyệt: <span class="chuaduyet">{!! !empty($adminStatus_0)?count($adminStatus_0):0 !!}</span></div>
                                </td>
                                @if($items['status']==1)
                                    <td><span style="color: #3c763d; font-weight: 600">Đã thanh toán</span></td>
                                @else
                                    <td><span style="color: #a94442; font-weight: 600">Chưa thanh toán</span></td>
                                @endif
                                <td>
                                    @if($items['status']==0)
                                        <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-primary sendPaymentSalary">Thanh toán</a>
                                    @else
                                        <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger cancelSendPaymentSalary">Hủy thanh toán</a>
                                    @endif
                                    <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#btnEditPayment" class="btn btn-xs btn-warning btnUpdatePayment"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                    <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger btnDeletePayment"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
                                    @if(!empty($adminStatus_0) && $adminStatus_0 > 0 || !empty($adminStatus_1) && $adminStatus_1 > 0)
                                        <a href="{!! route('statisticals.detail', ['id'=>$items['user']['id'], 'month'=>$month, 'year'=>$year]) !!}" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Xem chi tiết</a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
            </table>
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
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

@else
    @include('layout.Mobile.Admin.listSalary')
@endif
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
            var url = "<?php echo url('/') ?>/admin/users/update-payment/"+id;
            $.ajax({
                url: url,
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

            // Thanh toán cho nhân viên        
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
    .timegosing input{
        margin-left: 12px;
        margin-right: 12px;
    }
    a.btnChangePasswordUser{
        background: #05c705;
        color: #FFF;
        border: 0;
        margin-bottom: 0;
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

    a.btnCreateUser{
        background: #05c705;
        color: #FFF;
        border: 0;
        margin-bottom: 0
    }
    a.btnCreateUser:hover {
        background: #05c705;
        color: #FFF;
    }

    .duyet {
        width: 25px;
        height: 25px;
        background: #1ab394;
        display: inline-block;
        text-align: center;
        color: #FFF;
        line-height: 25px;
        border-radius: 50%;
        margin-left: 16px;
    }
    .chuaduyet{
        width: 25px;
        height: 25px;
        background: #a94442;
        display: inline-block;
        text-align: center;
        color: #FFF;
        line-height: 25px;
        border-radius: 50%;
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
            padding: 5px 12px;
            background: #1ab394;
            margin: 4px;
            border-radius: 5px;
            color: #FFF;
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