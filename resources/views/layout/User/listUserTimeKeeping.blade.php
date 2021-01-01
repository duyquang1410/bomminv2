@extends('layout.master')
@section('content')
    @if(!isMobile())
        <div class="container">
            <div class="row">
                <div class="col-md-12 box-right">
                    <div class="row wrapper white-bg page-heading">
                        <div class="col-lg-9">
                            <h2>Danh sách báo Thời gian làm việc tháng @if(!empty($id)) <span style="background: #f8ac59; padding: 0px 10px; border-radius: 4px;color: #FFF;">{!! $id !!}/ {!! date('Y') !!}</span> @else <span style="background: #f8ac59; padding: 0px 10px; border-radius: 4px;color: #FFF;">{!! date('m/Y') !!}</span> @endif</h2>
                            <div class="totalTimeKeeping">
                                <ul>
                                    <li><h3>Tổng số giờ đi hát : <span style="padding: 5px 15px; background: #0090da; color: #FFF; border-radius: 4px"> {!! !empty($timeHourGoSing)?$timeHourGoSing:0 !!} giờ  {!! !empty($timeMinGoSing)?$timeMinGoSing:0 !!}</span></h3></li>
                                    <li><h3>Tổng số giờ đi bay : <span  style="padding: 5px 15px; background: #f8ac59; color: #FFF; border-radius: 4px"> {!! !empty($timeHourGoFly)?$timeHourGoFly:0 !!} giờ {!! !empty($timeMinGoFly)?$timeMinGoFly:0 !!}</span></h3></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h2 class="text-right"><a  href="javascript:;" data-toggle="modal" data-target="#createTimeKeeping" class="btn btn-w-m btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                    Báo giờ làm</a>
                            </h2>

                            <div class="list-date-month">
                            <div class="title-month">Tháng :</div>
                                    <div class="list-time">
                                         <?php 
                                            for($i=1;$i<=12;$i++){
                                                ?>
                                                <div class="item-time"><a class="@if(!empty($id) && $id==$i) active @endif" href="{!! route('users.listUserTimeKeeping', ['id'=>$i]) !!}" title="" class="">{!! $i !!}</a></div>
                                                <?php
                                            }
                                         ?>
                                    </div>
                            </div>

                        </div>
                    </div>
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="thaotac">
                                                <div class="col-sm-2 m-b-xs">
                                                    <select name="selectitem" class="input-sm form-control input-s-sm inline">
                                                        <option value="0">Chọn tác vụ</option>
                                                        <option value="1">Nổi bật</option>
                                                        <option value="2">Ẩn</option>
                                                        <option value="3">Hiện thị</option>
                                                        <option value="4">Xóa vĩnh viễn</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1 m-b-xs">
                                                    <button type="submit" class="btn btn-primary " type="button"><i class="fa fa-check"></i>&nbsp;Áp dụng</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                        <thead>
                                                        <tr>
                                                            <th width="10px"><input type="checkbox"  name=""></th>
                                                            <th width="150px">Ngày làm việc</th>
                                                            <th width="100px">Số giờ đi hát</th>
                                                            <th width="100px">Số giờ đi bay</th>
                                                            <th width="100px">Tổng tiền hát</th>
                                                            <th width="100px">Tổng tiền bay</th>
                                                            <th width="100px">Tổng tiền</th>
                                                            <th width="100px">Trạng thái</th>
                                                            <th width="80px">Thao tác</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                        @if(!empty($data))
                                                            @foreach($data as $items)
                                                                <tr>
                                                                    <td><input type="checkbox"  name=""></td>
                                                                    <td>
                                                                        <div class="timeTimekeeping">{!! !empty($items['day'])?$items['day']:0 !!}/{!! !empty($items['month'])?$items['month']:0 !!}/{!! !empty($items['year'])?$items['year']:0 !!}</div>
                                                                    </td>
                                                                    <td>{!! !empty($items['timeHourGoSing'])?$items['timeHourGoSing']:0 !!}h{!! !empty($items['timeMinGoSing'])?$items['timeMinGoSing']:0 !!}</td>
                                                                     <td>{!! !empty($items['timeHourGoFly'])?$items['timeHourGoFly']:0 !!}h{!! !empty($items['timeMinGoFly'])?$items['timeMinGoFly']:0 !!}</td>

                                                                     @if($items['statusGoSing']==1 || $items['adminStatus']==1)
                                                                    <td>{!! !empty($items['totalMoneyGoSing'])?number_format($items['totalMoneyGoSing'], 0):0 !!}</td>
                                                                    @else
                                                                    <td></td>
                                                                    @endif

                                                                    @if($items['statusGoFly']==1 || $items['adminStatus']==1)
                                                                    <td>{!! !empty($items['totalMoneyGoFly'])?number_format($items['totalMoneyGoFly'], 0):0 !!}</td>
                                                                    @else
                                                                        <td></td>
                                                                    @endif

                                                                    @if($items['adminStatus']==1)
                                                                    <td>{!! !empty($items['totalMoney'])?number_format($items['totalMoney'], 0):0 !!}</td>
                                                                    @else
                                                                    <td></td>
                                                                    @endif
                                                                    
                                                                   @if($items['adminStatus'] == 0)
                                                                    <td class="status"><span style="color: #a94442; font-weight: 600">Chưa được duyệt</span></td>
                                                                    @else
                                                                    <td class="status"><span style="color: #1f8c22; font-weight: 600">Đã Duyệt</span></td>
                                                                    @endif

                                                                    <td>
                                                                        @if($items['adminStatus'] == 0)
                                                                       <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#EditTimeKeeping" class="btn btn-xs btn-warning btnEditTime"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            @else
                                                            <div class="text-center">Chưa có giờ nào khai báo làm</div>
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

            <!-- Modal add  room-->
    <div class="modal fade createTimeKeeping" id="createTimeKeeping" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="frmCreateTimeKeeping" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Khai báo thời gian làm việc</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Số giờ đi hát</label>
                                <div class="timegosing">
                                   Giờ <input type="number"  name="timeHourGoSing" id="timeHourGoSing" class="form-control" placeholder="Ví dụ : 2"> 
                                   Phút <input type="number" width="100px" name="timeMinGoSing" id="timeMinGoSing" class="form-control" placeholder="Ví dụ: 30">
                                </div>
                                <?php
                                $serviceGoSing = DB::table('services')->select('*')->where('code', 1)->get()->first();
                                ?>
                                <input type="number" class="hidden" name="priceGoSing" value="{!! !empty($serviceGoSing->price)?$serviceGoSing->price:0 !!}">
                                <input type="number" class="hidden" name="priceAdminGoSing" value="{!! !empty($serviceGoSing->priceAdmin)?$serviceGoSing->priceAdmin:0 !!}">
                            </div>

                            <div class="form-group">
                                <label for="">Số giờ đi bay </label>
                                <div class="timegosing">
                                   Giờ <input type="number"  name="timeHourGoFly" id="timeHourGoFly" class="form-control" placeholder="Ví dụ : 2"> 
                                   Phút <input type="number" width="100px" name="timeMinGoFly" id="timeMinGoFly" class="form-control" placeholder="Ví dụ: 30">
                                </div>
                                <?php
                                $serviceGoFly = DB::table('services')->select('*')->where('code', 2)->get()->first();
                                ?>
                                <input type="number" class="hidden" name="priceGoFly" value="{!! !empty($serviceGoFly->price)?$serviceGoFly->price:0 !!}">
                                <input type="number" class="hidden" name="priceAdminGoFly" value="{!! !empty($serviceGoFly->priceAdmin)?$serviceGoFly->priceAdmin:0 !!}">
                            </div>

                            <div class="form-group">
                                <label for="">Thời gian đi hát, bay</label>
                                <div class="timeTimeKeeping row">
                                    <div class="col-xs-4">
                                        Ngày <select name="day" id="day" class="form-control">
                                            <?php
                                            for($day=1;$day<=31;$day++){
                                            ?>
                                            <option @if($day==date('d')) selected="selected" @endif value="{!! $day !!}">{!! $day !!}</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        Tháng  <select name="month" id="month" class="form-control">
                                            <?php
                                            for($month=1;$month<=12;$month++){
                                            ?>
                                            <option @if($month==date('m')) selected="selected" @endif value="{!! $month !!}">{!! $month !!}</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        Năm <select name="year" id="year" class="form-control">
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
                        <button class="btn btn-default mb-0" style="margin-bottom: 0; background: #4bac4d; color: #FFF; border: 0;" id="btnCreateRoom"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                    </div>
                </form>
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
                                       Phút <input type="number" width="100px" name="timeMinGoSing" id="timeMinGoSingEdit" class="form-control" placeholder="Ví dụ : 15 hoặc 30 hoặc 45">
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
    @include('layout.Mobile.User.listUserTimeKeeping')
    @endif

    <script>

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
                                        msg: 'Số phút đi hát hoặc bay phải là 30 hoặc 0'
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
                                        title: 'Thông báo',
                                        msg: 'Khai báo giờ làm thất bại'
                                    });
                                }
                            }
                        });
                    });
            });
    </script>

    <style type="text/css">
        .item-time a.active {
            background: #f8ac59 !important;
        }
        .list-date-month .list-time .item-time{
            display: inline-block;
        }
        .list-date-month .list-time .item-time a {
                 padding: 0 12px;
                background: #1ab394;
                border-radius: 4px;
                color: #FFF;
                display: inline-block;
                margin-bottom: 10px;
                margin-right: 3px;
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
    </style>
@endsection