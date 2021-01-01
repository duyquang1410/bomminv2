@extends('layout.master')
@section('content')
    <div class="container">
        <div class="detail-user-salary">
            <div class="panel panel-default list-date-month"> 
                <div class="panel-heading"> 
                    <div class="panel-title">Ngày:</div>
                </div>
                <div class="panel-body">
                    <div class="list-time">
                         <?php 
                            for($i=1;$i<=31;$i++){
                                ?>
                                <div class="item-time"><a class="@if(!empty($id) && $id == $i) active @endif" href="{!! route('users.adminListTimekeeping', ['id'=>$i]) !!}" title="" class="">{!! $i !!}</a></div>
                                <?php
                            }
                         ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                   <div class="box-left-title">
                       @if(!empty($id))
                        <div class="panel-title">Danh sách nhân viên báo thời gian đi hát , đi bay ngày <span style="background: #f8ac59; padding: 0px 10px; border-radius: 4px;color: #FFF;">{!! !empty($id)?$id:'' !!}/{!! date('m/Y') !!} </span> &nbsp; @if(!empty($id) && $id== date('d')) ( Hôm nay ) @endif
                       </div>
                           @else
                           <div class="panel-title">Danh sách nhân viên báo thời gian đi hát , đi bay  <span style="background: #f8ac59; padding: 0px 10px; border-radius: 4px;color: #FFF;">{!! date('m/Y') !!} </span> &nbsp; @if(!empty($id) && $id== date('d')) ( Hôm nay ) @endif
                           </div>
                           @endif
                    </div>
                </div>
                 <div class="totalTimeKeeping">
                           <div class="box-item">
                                <div class="text-left"> Tổng số giờ đi hát : </div>
                                <div class="text-right">
                                    <span style="padding: 5px 15px; background: #0090da; color: #FFF; border-radius: 4px"> {!! !empty($timeHourGoSing)?$timeHourGoSing:0 !!} giờ {!! !empty($timeMinGoSing)?$timeMinGoSing:0 !!} phút </span>
                                </div>
                            </div>
                           <div class="box-item">
                                <div class="text-left">Đi bay : </div>
                                <div class="text-right">
                                    <span  style="padding: 5px 15px; background: #f8ac59; color: #FFF; border-radius: 4px"> {!! !empty($timeHourGoFly)?$timeHourGoFly:0 !!} giờ {!! !empty($timeMinGoFly)?$timeMinGoFly:0 !!} phút </span>
                                </div>
                          </div>
                </div>
                <div class="panel-body">
                    <div class="detail-salary">
                        @if(!empty($data))
                        @foreach($data as $items)
                        <div class="item-detail-box">
                            <div class="box-left-intro">
                                <div class="avatar">
                                <img width="50px" height="50px" alt="avatar.png" src="{!! URL::asset('public/uploads/user/'.$items['user']['avatar']) !!}" alt="">
                                </div>
                            </div>
                            <div class="box-right">
                                <div class="fullname">
                                        <b>
                                        <a href="">{!! !empty($items['user']['fullname'])?$items['user']['fullname']:'' !!}</a>
                                        </b>
                                </div>
                                <div class="date" style="padding-left: 10px;">Thời gian : {!! !empty($items['day'])?$items['day']:'' !!}/{!! !empty($items['month'])?$items['month']:'' !!}/{!! !empty($items['year'])?$items['year']:'' !!}</div>
                                    <div class="listTime">
                                        <div class="timeHourGoSing">Số giờ hát : <span><b>{!! !empty($items['timeHourGoSing'])?$items['timeHourGoSing']:0 !!}h{!! !empty($items['timeMinGoSing'])?$items['timeMinGoSing']:0 !!}</b></span></div>
                                        <div class="timeHourGoSing">Số giờ bay : <span><b>{!! !empty($items['timeHourGoFly'])?$items['timeHourGoFly']:0 !!}h{!! !empty($items['timeMinGoFly'])?$items['timeMinGoFly']:0 !!}</b></span></div>
                                    </div>
                                    <div class="info-user">
                                            @if($items['adminStatus']==1)
                                                <div class="adminStatus" style="color: #1ab394;font-weight: 600;"><i class="fa fa-check-square" aria-hidden="true"></i> Đã được duyệt</div>
                                            @elseif($items['adminStatus']==0)
                                                <div class="emptyAdminStatus" style="color: #a94442;font-weight: 600;"><i class="fa fa-check-square" aria-hidden="true"></i> Chưa được duyệt</div>
                                            @else
                                                <div class="adminNoStatus" style="color: #f8ac59;font-weight: 600;"><i class="fa fa-check-square" aria-hidden="true"></i> Không được duyệt</div>
                                            @endif
                                    </div>
                            </div>
                            <div class="action">
                                 <div class="dropdown">
                                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-sliders" aria-hidden="true"></i></button>
                                    <ul class="dropdown-menu">
                                      <li> 
                                        <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#EditTimeKeeping" class="btn btn-xs btn-warning btnEditTime"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                      </li>
                                         @if($items['adminStatus']==0)
                                       <li> <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" title="Duyệt" class="btn btn-xs btn-primary confirmTimekeeping"><i class="fa fa-floppy-o" aria-hidden="true"></i> Duyệt</a> </li>
                                        <li> <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" title="Xóa" class="btn btn-xs btn-danger btnDeleteTimeKeeping"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></li>
                                        @else
                                        <li>
                                            <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" title="Hủy duyệt" class="btn btn-xs btn-danger cancelConfirmTimekeeping"><i class="fa fa-floppy-o" aria-hidden="true"></i> Hủy duyệt ?</a>
                                        </li>
                                        @endif
                                    </ul>
                                  </div>
                               
                            </div>
                        </div>
                        @endforeach
                        @endif
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
                                     Phút <input type="number" width="100px" name="timeMinGoFly" id="timeMinGoFlyEdit" class="form-control" placeholder="Ví dụ : 15 hoặc 30 hoặc 45">
                                   </div>
                                </div>
                                <?php
                                $serviceGoFly = DB::table('services')->select('*')->where('code', 2)->get()->first();
                                ?>
                                <input type="number" class="hidden" name="priceGoFlyEdit" value="{!! !empty($serviceGoFly->price)?$serviceGoFly->price:0 !!}">
                                <input type="number" class="hidden" name="priceAdminGoFlyEdit" value="{!! !empty($serviceGoFly->priceAdmin)?$serviceGoFly->priceAdmin:0 !!}">
                            </div>

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


    <!-- Modal -->
<div class="modal fade" id="detailUserTimeKeeping" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chi tiết công chấm</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nội dung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Họ tên</td>
                            <td id="nameDetail"></td>
                        </tr>
                        <tr>
                            <td>Công việc</td>
                            <td id="serviceDetail"></td>
                        </tr>
                        <tr>
                            <td>Check in </td>
                            <td id="checkInDetail"></td>
                        </tr>
                        <tr>
                            <td>Check out </td>
                            <td id="checkOutDetail"></td>
                        </tr>
                        <tr>
                            <td>Địa điểm quán </td>
                            <td id="addressDetail"></td>
                        </tr>

                        <tr>
                            <td>Số giờ làm </td>
                            <td><span id="totalTime"></span> phút</td>
                        </tr>

                        <tr>
                            <td>Số tiền được cộng </td>
                            <td>+ <span id="totalMoney"></span> VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>
    <style>
        .item-time a.active {
            background: #f8ac59 !important;
        }
        .action li a {
            color: #FFF;
        }
        .action button.dropdown-toggle{
                position: absolute;
                top: 0;
                right: 5px;
        }
        .action .dropdown .dropdown-menu{
            left: unset !important;
            right: 0;
            top: 25px;
        }
        .box-right{

        }
        .box-left-intro{
            width: 50px;
            float: left;
        }
         .fullname {
            display: inline-block;
            padding-left: 10px;
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
                 padding: 5px 12px;
                background: #1ab394;
                border-radius: 4px;
                color: #FFF;
                display: inline-block;
                margin-bottom: 10px;
                margin-right: 3px;
        }
        @media (max-width: 425px){
            .box-item {
                display: inline-flex;
                width: 100%;
                justify-content: space-between;
                margin: 8px 0;
            }
            .box-item .text-left{
                font-weight: 600;
                font-size: 16px;
            }
        }
      
        @media (min-width: 425px){
              .totalTimeKeeping {
                margin: 15px 0;
                width: 100%;
                justify-content: space-between;
                display: inline-flex;
            }
              .totalTimeKeeping .box-item{
                display: inline-flex;
            }
            .text-right {
            margin-left: 5px;
            }
            .text-left {
                font-weight: 600;
            }
        }
        
        .item-detail-box{
            position: relative;
        }
        .box-right {
            width: 80%;
            float: left;
        }
        .listTime {
                display: inline-flex;
                width: 100%;
                justify-content: space-between;
                padding: 0 10px;
                margin-bottom: 5px;
        }
        .detail-user-salary .panel-heading{
            display: inline-flex;
            justify-content: space-between;
            width: 100%;
        }
        .detail-user-salary{
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
        #detailUserTimeKeeping .modal-header{
            background: #0090da;
        }
        #detailUserTimeKeeping .modal-body {
            padding: 10px;
        }
        .info-total>div{
            color: #333;
            font-weight: 700;
        }
        .detail-user-salary .panel-default{
            background: none;
            border: 0;
            border-radius: 0;
            box-shadow: none;
        }
        .detail-user-salary .panel-default .panel-heading {
            background: none;
            border: 0;
            padding-left: 0;
            padding-right: 0;
            border-bottom: 1px solid #f1f1f1;
        }
        .detail-user-salary .panel-default .panel-title {
            font-size: 16px;
            color: #333;
            font-weight: 700;
        }
        .detail-user-salary .panel-default .panel-body {
            padding-left: 0;
            padding-right: 0;
        }
        .item-detail-box {
            background: rgba(255, 255, 255, 0.68);
            padding: 5px 8px;
            border-radius: 5px;
            margin: 8px 0;
            position: relative;
            display: inline-block;
        }
        .item-detail-box .datetime {
            display: inline-block;
            background: #FFF;
            width: 15%;
            height: 50px;
            text-align: center;
            margin: auto;
            border-radius: 8px;
            padding-top: 5px;
            color: #0090da;
            font-weight: 700;
            float: left;
        }
        .item-detail-box .info-user {
            display: inline-block;
            width: 85%;
            padding-left: 10px;
        }
        .item-detail-box .list-timekeeping {
            display: inline-flex;
            justify-content: space-between;
            width: 100%;
        }
        .item-detail-box .list-timekeeping li {
            list-style-type: none;
        }
        .item-detail-box .datetime .date {
            font-size: 11px;
        }
        .checkin .check-text {
            color: green;
            font-weight: 700;
        }
        .checkout .check-text{
            color: #b30a1b;
            font-weight: 700;
        }
        .item-detail-box .datetime .year{
            font-size: 18px;
        }
        .info-detail ul {
            padding-left: 0;
            display: inline-flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 0;
        }
        .info-detail ul li{
            list-style: none;
            font-weight: 700;
            color: #333;
            font-size: 12px;
        }
        .info-detail {
            width: 80%;
            float: left;
            padding-left: 10px;
        }
        .item-detail-box li span.checkin {
            color: green;
            font-weight: 700;
        }
        .item-detail-box li span.checkout {
            color: #b30a1b;
            font-weight: 700;
        }
        .totalwork {
            color: #333;
        }
    </style>
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
                            } else {
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
                                        msg: 'Ngày chỉ được khai báo 1 lần , bạn hãy sửa khai báo trước đó'
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

            $('.dataDetail').click(function(){
                    var id = $(this).attr('id');
                    var url = "<?php echo url('/') ?>/chi-tiet-cong/"+id;
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        data: id,
                        success: function (data, textStatus, xhr) {
                            console.log(data);
                             document.getElementById("nameDetail").innerHTML = '<b>'+data['user']['fullname']+'</b>';
                             document.getElementById("serviceDetail").innerHTML = data['service']['name'];
                             document.getElementById("checkInDetail").innerHTML = data['checkin'];
                             document.getElementById("checkOutDetail").innerHTML = data['checkout'];
                             document.getElementById("addressDetail").innerHTML = data['address_cv'];
                             document.getElementById("totalTime").innerHTML = data['hour']+'h'+data['min'];
                             document.getElementById("totalMoney").innerHTML = data['totalmoney'];
                        }
                    });
            });
</script>
@endsection