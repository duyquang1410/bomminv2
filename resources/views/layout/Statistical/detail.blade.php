@extends('layout.master')
@section('content')
    @if(!empty(Auth::user()->role==1))
        <div class="container">
            <div class="row">
                <div class="col-md-12 box-right">
                    <div class=" wrapper white-bg page-heading">
                        <div class="col-lg-12">
                            <h2 class="pull-left">Thống kê công của nhân viên tháng <span style="color: #f8ac59;">@if(!empty($month) && !empty($year)) {!! $month !!}/{!! $year !!} @else {!! date('m') !!}/{!! date('Y') !!} @endif</span></h2>
                            <div class="pull-right hidden list-month-statistical">
                                <div class=""><b>Tháng : </b></div>
                                <?php
                                for($i=1;$i<=12;$i++){
                                ?>
                                <div class="item-time"><a href="" title="" class="">{!! $i !!}</a></div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content row">
                                        <div class="clearfix"></div>
                                        <div class="list-payment">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div class="panel-title pull-left">Nhân viên: <img width="45px" height="45px" style="border-radius: 50%; object-fit: cover" alt="avatar.png" src="{!! URL::asset('public/uploads/user/'.(!empty($data[0]['user']['avatar'])?$data[0]['user']['avatar']:'')) !!}" alt=""> <b style="color: #0090da; font-weight: 600">{!! !empty($data[0]['user']['fullname'])?$data[0]['user']['fullname']:'' !!}</b></div>
                                                    <div class="totalMoney pull-right"><b>Tổng tiền lương</b> :  <span style="">{!! !empty($salary->total_Money)?number_format($salary->total_Money, 0):'0' !!}</span> (Đi hát , bay ) - <span style="">{!! !empty($salary->suggest_Money)?number_format($salary->suggest_Money, 0):'0' !!} </span> (Tạm ứng) = <span style="">{!! !empty($salary->realField_Money)?number_format($salary->realField_Money, 0):0 !!} </span> VND</div>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-bordered table-striped table-hover dataTables-example">
                                                        <thead>
                                                        <tr>
                                                            <th width="100px">Ngày/tháng</th>
                                                            <th width="100px">Số giờ hát</th>
                                                            <th width="100px">Số giờ bay</th>
                                                            <th width="100px">Tiền hát</th>
                                                            <th width="100px">Tiền bay</th>
                                                            <th width="100px">Tổng tiền</th>
                                                            <th width="100px">Thu về</th>
                                                            <th width="100px">Trạng thái</th>
                                                            <th width="100px">Thao tác</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(!empty($data))
                                                            @foreach($data as $items)
                                                                <tr>
                                                                    <td>
                                                                        <div class="day-month">{!! !empty($items['day'])?$items['day']:0 !!}/{!! !empty($items['month'])?$items['month']:0 !!}</div>
                                                                    </td>
                                                                    <td>{!! !empty($items['timeHourGoSing'])?$items['timeHourGoSing']:0 !!}h{!! !empty($items['timeMinGoSing'])?$items['timeMinGoSing']:0 !!}</td>
                                                                    <td>{!! !empty($items['timeHourGoFly'])?$items['timeHourGoFly']:0 !!}h{!! !empty($items['timeMinGoFly'])?$items['timeMinGoFly']:0 !!}</td>
                                                                    <td>{!! !empty($items['totalMoneyGoSing'])?number_format($items['totalMoneyGoSing'], 0):0 !!} đ</td>
                                                                    <td>{!! !empty($items['totalMoneyGoFly'])?number_format($items['totalMoneyGoFly'], 0):0 !!} đ</td>
                                                                    <td><b>{!! !empty($items['totalMoney'])?number_format($items['totalMoney'], 0):0 !!} đ</b></td>
                                                                    <td><b>{!! !empty($items['totalMoneyAdmin'])?number_format($items['totalMoneyAdmin']-$items['totalMoney']):0 !!} đ</b></td>
                                                                    <td class="status">
                                                                        @if($items['adminStatus'] == 0)
                                                                        <span style="color: #a94442; font-weight: 600">Chưa được duyệt</span>
                                                                        @else
                                                                        <span style="color: #1f8c22; font-weight: 600">Đã Duyệt</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#EditTimeKeeping" class="btn btn-xs btn-warning btnEditTime"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                                                        @if($items['adminStatus']==0)
                                                                            <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" title="Duyệt" class="btn btn-xs btn-primary confirmTimekeeping"><i class="fa fa-floppy-o" aria-hidden="true"></i> Duyệt</a>
                                                                            <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" title="Xóa" class="btn btn-xs btn-danger btnDeleteTimeKeeping"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
                                                                        @else
                                                                            <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" title="Hủy duyệt" class="btn btn-xs btn-danger cancelConfirmTimekeeping"><i class="fa fa-floppy-o" aria-hidden="true"></i> Hủy duyệt ?</a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit -->
        <div class="modal fade EditTimeKeeping" id="EditTimeKeeping" role="dialog">
            <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content">
                    <form id="frmUpdateTimeKeeping" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cập nhật Khai báo thời gian làm việc</h4>
                        </div>
                        <div class="modal-body row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="">Số giờ đi hát</label>
                                    <div class="timegosing row">
                                        <div class="col-xs-6">
                                            Giờ <input type="number" name="timeHourGoSing" id="timeHourGoSingEdit" class="form-control" placeholder="Ví dụ : 2">
                                        </div>
                                        <div class="col-xs-6">
                                            Phút <input type="number" width="100px" name="timeMinGoSing" id="timeMinGoSingEdit" class="form-control" placeholder="Ví dụ : 30">
                                        </div>
                                    </div>
                                    <?php
                                    $serviceGoSing = DB::table('services')->select('*')->where('code', 1)->get()->first();
                                    ?>
                                    <input type="number" class="hidden" id="priceGoSingEdit" name="priceGoSing" value="{!! !empty($serviceGoSing->price)?$serviceGoSing->price:0 !!}">
                                    <input type="number" class="hidden" id="priceAdminGoSingEdit" name="priceAdminGoSing" value="{!! !empty($serviceGoSing->priceAdmin)?$serviceGoSing->priceAdmin:0 !!}">
                                </div>

                                <div class="form-group">
                                    <label for="">Số giờ đi bay </label>
                                    <div class="timegosing row">
                                        <div class="col-xs-6">
                                            Giờ <input type="number"  name="timeHourGoFly" id="timeHourGoFlyEdit" class="form-control" placeholder="Ví dụ : 2">
                                        </div>
                                        <div class="col-xs-6">
                                            Phút <input type="number" width="100px" name="timeMinGoFly" id="timeMinGoFlyEdit" class="form-control" placeholder="Ví dụ : 30">
                                        </div>
                                    </div>
                                    <?php
                                    $serviceGoFly = DB::table('services')->select('*')->where('code', 2)->get()->first();
                                    ?>
                                    <input type="number" class="hidden" name="priceGoFlyEdit" value="{!! !empty($serviceGoFly->price)?$serviceGoFly->price:0 !!}">
                                    <input type="number" class="hidden" name="priceAdminGoFlyEdit" value="{!! !empty($serviceGoFly->priceAdmin)?$serviceGoFly->priceAdmin:0 !!}">
                                </div>

                                <div class="form-group">
                                    <label for="">Thời gian đi hát, bay</label>
                                    <div class="timeTimeKeeping row">
                                        <div class="col-xs-4 col-md-4">
                                            Ngày <select name="day" id="dayEdit" class="form-control">
                                                <?php
                                                for($day=1;$day<=31;$day++){
                                                ?>
                                                <option @if($day==date('d')) selected="selected" @endif value="{!! $day !!}">{!! $day !!}</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-4 col-md-4">
                                            Tháng  <select name="month" id="monthEdit" class="form-control">
                                                <?php
                                                for($month=1;$month<=12;$month++){
                                                ?>
                                                <option @if($month==date('m')) selected="selected" @endif value="{!! $month !!}">{!! $month !!}</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-4 col-md-4">
                                            Năm <select name="year" id="yearEdit" class="form-control">
                                                <?php
                                                for($year=(date('Y')-1);$year<=(date('Y')+1);$year++){
                                                ?>
                                                <option @if($year==date('Y')) selected="selected" @endif value="{!! $year !!}">{!! $year !!}</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="note" style="font-size: 13px; font-style: italic; margin-top: 30px;"><span style="color: red;">Ghi chú</span> : <span><b>Số giờ đi hát , số giờ đi bay </b> là tổng số giờ đi hát , bay trong 1 ngày và phải là số nguyên , chẵn .</span></div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default mb-0" style="margin-bottom: 0; background: #4bac4d; color: #FFF; border: 0;" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            @else
                {!! redirect()->route('login') !!}
            @endif

    <script>
        // Hủy duyệt chấm công
        $(".cancelConfirmTimekeeping").click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/admin/users/cancelConfirmTimekeeping/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    if (data['message'] == 'success') {
                        Lobibox.notify('success', {
                            title: 'Thành công',
                            msg: 'Hủy duyệt thành công',
                            delay: 1500
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    } else {
                        Lobibox.notify('error', {
                            title: 'Có lỗi',
                            msg: 'Hủy duyệt thất bại'
                        });
                    }
                }
            });
        });
        // Duyệt chấm công
        $(".confirmTimekeeping").click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/admin/users/confirmTimekeeping/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    if (data['message'] == 'success') {
                        Lobibox.notify('success', {
                            title: 'Thành công',
                            msg: 'Duyệt thành công',
                            delay: 1500
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    } else {
                        Lobibox.notify('error', {
                            title: 'Có lỗi',
                            msg: 'Duyệt thất bại'
                        });
                    }
                }
            });
        });

        // Xóa giờ làm việc của nhân viên :
        $(".btnDeleteTimeKeeping").click(function(){
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa không ?",
                title: "Câu hỏi",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/users/deleteTimekeeping/"+id;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: id,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if (data['message'] == 'success') {
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Xóa thành công',
                                        delay: 1500
                                    });
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1500);
                                } else {
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
        // Cập nhật giờ làm việc :
        $(".btnEditTime").click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/timekeepings/edit/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    $("#timeHourGoSingEdit").val(data['timeHourGoSing']);
                    $("#timeMinGoSingEdit").val(data['timeMinGoSing']);
                    $("#timeHourGoFlyEdit").val(data['timeHourGoFly']);
                    $("#timeMinGoFlyEdit").val(data['timeMinGoFly']);
                    $("#dayEdit").val(data['day']);
                    $("#monthEdit").val(data['month']);
                    $("#yearEdit").val(data['year']);

                    var action = "<?php echo url('/'); ?>/timekeepings/update/"+id;
                    document.getElementById("frmUpdateTimeKeeping").action =  action;
                }
            });
        });
        $(document).on('submit', '#frmUpdateTimeKeeping', function(event) {
            event.preventDefault();
            var urlAction = $("#frmUpdateTimeKeeping").attr('action');
            $.ajax({
                url: urlAction,
                type: 'POST',
                dataType: 'json',
                data: new FormData(document.getElementById("frmUpdateTimeKeeping")),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                cache: false,
                success: function(data, textStatus, xhr) {
                    console.log(data);
                    if (data['message'] == 'success') {
                        Lobibox.notify('success', {
                            title: 'Thành công',
                            msg: 'Cập nhật thời gian thành công',
                            delay: 1500
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                    else if(data['message'] == 'info'){
                        Lobibox.notify('warning', {
                            title: 'Thông báo',
                            msg: 'Số phút đi hát phải là 30 hoặc 0'
                        });
                        setTimeout(function(){
                            location.reload();
                        },3000);
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

        $(document).ready(function(){
            $(document).on('submit', '#frmCreateTimeKeeping', function(event) {
                event.preventDefault();
                var url = "{!! route('users.postTimeKeeping') !!}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: new FormData(document.getElementById("frmCreateTimeKeeping")),
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data',
                    cache:false,
                    success: function (data, textStatus, xhr) {
                        console.log(data);
                        if(data['message']=='success'){
                            Lobibox.notify('success', {
                                title: 'Thành công',
                                msg: 'Khai báo giờ làm thành công',
                                delay: 1500
                            });
                            setTimeout(function(){
                                location.reload();
                            },1500);
                        }
                        else if(data['message'] == 'warning'){
                            Lobibox.notify('warning', {
                                title: 'Thông báo',
                                msg: 'Ngày chỉ được khai báo 1 lần , bạn hãy sửa khai báo trước'
                            });
                            setTimeout(function(){
                                location.reload();
                            },3000);
                        }
                        else {
                            Lobibox.notify('error', {
                                title: 'Thông báo',
                                msg: 'Khai báo giờ làm thất bại'
                            });
                        }
                    }
                });
            });
        });
    </script>
            <style>
                .list-payment .panel-default .panel-heading{
                    overflow: hidden;
                }
                .totalMoney{
                    line-height: 40px;
                }
                .totalMoney span {
                    font-weight: 700;
                    font-size: 16px;
                    color: #a94442;
                }
                .day-month {
                    display: inline-block;
                    padding: 6px 25px;
                    background: #0090da;
                    color: #FFF;
                    border-radius: 4px;
                    font-weight: 600;
                }
                .list-month-statistical {
                    display: inline-flex;
                }
                .list-month-statistical .item-time a{
                    display: inline-block;
                    padding: 0px 12px;
                    background: #1ab394;
                    margin: 4px;
                    border-radius: 5px;
                    color: #FFF;
                    font-size: 20px;
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
                @media (max-width: 768px){
                    .content .box-right{
                        padding-right: 0;
                    }
                }
                .fixItemConetent li{
                    list-style: none;
                    padding: 2px 0;
                }
                .list-statisticals .item-box .number{
                    font-size: 24px;
                }
                .list-statisticals .item-box .mgt-text {

                }
                .list-payment a.titleRoom{
                    background: #0090da;
                    color: #FFF;
                }
                .list-payment .panel-default {
                    background: none;
                    border-radius: 0;
                    box-shadow: none;
                }
                .list-payment .panel-default .panel-heading{
                    border: 0;
                }
                .list-payment .panel-default .panel-heading .panel-title {
                    font-weight: 600;
                    font-size: 16px;
                }
            </style>
@endsection