@extends('layout.master')
@section('content')
    @if(!isMobile())
        <div class="container">
            <div class="row">
                <div class="col-md-12 box-right">
                    <div class="row wrapper white-bg page-heading">
                        <div class="col-lg-9">
                          <div class="row">
                                 <div class="col-md-12">
                                     <div class="listMonthYear">
                                        <div class="">Năm 2020 : Tháng </div>
                                        <div class="">
                                            @for($monthYear=1;$monthYear<=12;$monthYear++)
                                                @if(empty($date) && empty($month) && empty($year))
                                                <span><a href="{!! route('users.listMonthYear', ['month'=>$monthYear, 'year'=>'2020']) !!}" class="btn btn-xs  @if($monthYear==date('m') && date('Y')=='2020') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                                @else
                                                    <span><a href="{!! route('users.listMonthYear', ['month'=>$monthYear, 'year'=>'2020']) !!}" class="btn btn-xs  @if($monthYear==$month && $year=='2020') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
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
                                                @if(empty($date) && empty($month) && empty($year))
                                                <span><a href="{!! route('users.listMonthYear', ['month'=>$monthYear, 'year'=>'2021']) !!}" class="btn btn-xs @if($monthYear==date('m') && date('Y')=='2021') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                                @else
                                                    <span><a href="{!! route('users.listMonthYear', ['month'=>$monthYear, 'year'=>'2021']) !!}" class="btn btn-xs  @if($monthYear==$month && $year=='2021') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-12 hidden">
                                    <div class="listMonthYear">
                                        <div class="">Năm 2022 : Tháng </div>
                                        <div class="">
                                            @for($monthYear=1;$monthYear<=12;$monthYear++)
                                                <span><a href="{!! route('users.listMonthYear', ['month'=>$monthYear, 'year'=>'2022']) !!}" class="btn btn-xs @if($monthYear==date('m') && date('Y')=='2022') active @endif" title="">{!! !empty($monthYear)?$monthYear:0 !!}</a></span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(empty($day) && empty($month) && empty($year))
                                @if(!empty($id))
                                <h2>Danh sách đi hát , đi bay ngày <span style="background: #f8ac59; padding: 0px 10px; border-radius: 4px;color: #FFF;">{!! !empty($id)?$id:'' !!}/{!! date('m/Y') !!} </span> &nbsp; @if(!empty($id) && $id== date('d')) ( Hôm nay ) @endif</h2>
                                @else
                                <h2>Danh sách đi hát , đi bay <span style="background: #f8ac59; padding: 0px 10px; border-radius: 4px;color: #FFF;">{!! date('m/Y') !!} </span> &nbsp; @if(!empty($id) && $id== date('d')) ( Hôm nay ) @endif</h2>
                                @endif
                            @else
                                <h2>Danh sách đi hát , đi bay ngày <span style="background: #f8ac59; padding: 0px 10px; border-radius: 4px;color: #FFF;">{!! !empty($day)?$day:'' !!}/{!! !empty($month)?$month:'' !!}/{!! !empty($year)?$year:'' !!} </span> &nbsp; @if(!empty($day) && $day== date('d') && $month == date('m') && $year == date('Y')) ( Hôm nay ) @endif</h2>
                            @endif
                            <div class="totalTimeKeeping">
                                <ul>
                                    <li><h3>Tổng số giờ đi hát : <span style="padding: 5px 15px; background: #0090da; color: #FFF; border-radius: 4px"> {!! !empty($timeHourGoSing)?$timeHourGoSing:0 !!} giờ {!! !empty($timeMinGoSing)?$timeMinGoSing:0 !!} phút</span></h3></li>
                                    <li><h3>Tổng số giờ đi bay : <span  style="padding: 5px 15px; background: #f8ac59; color: #FFF; border-radius: 4px"> {!! !empty($timeHourGoFly)?$timeHourGoFly:0 !!} giờ {!! !empty($timeMinGoFly)?$timeMinGoFly:0 !!} phút</span></h3></li>
                                </ul>
                            </div>
                           <div class="totalAdmin hidden">
                                 <ul>
                                    <li><h3>Tổng tiền hát trả cho nhân viên: <span><b>{!! !empty($totalMoneyGoSing)?number_format($totalMoneyGoSing, 0):0 !!}</b> đ </span> còn lại là : <b>{!! !empty($totalMoneyGoSingAdmin)?number_format($totalMoneyGoSingAdmin, 0):0 !!}</b> đ</h3></li>
                                    <li><h3>Tổng tiền bay trả cho nhân viên : <span><b>{!! !empty($totalMoneyGoFly)?number_format($totalMoneyGoFly, 0):0 !!}</b> đ</span> còn lại là : <b>{!! !empty($totalMoneyGoFlyAdmin)?number_format($totalMoneyGoFlyAdmin, 0):0 !!}</b> đ</h3></li>
                                    <li><h3>Tổng trả Nhân viên: <span><b>{!! !empty($totalUser)?number_format($totalUser, 0):0 !!}</b> đ</span></h3></li>
                                    <li><h3>Tổng thu: <span> <b>{!! !empty($totalAdmin)?number_format($totalAdmin, 0):0 !!}</b> đ</span></h3></li>
                                </ul>
                           </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="list-date-month">
                                <div class="head-date">
                                    <div class="title-month">
                                        <div>Ngày :</div>
                                    </div>
                                    <div class="month hidden">
                                        <div class="">Tháng</div>
                                        <div>
                                            <select name="month" class="form-control" id="month">
                                                @for($m=1;$m<=12;$m++)
                                                    <option @if($m == date('m')) selected @endif value="{!! $m !!}">{!! $m !!}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="year hidden">
                                        <div class="">Năm</div>
                                        <div>
                                            <select name="year" class="form-control" id="">
                                                @for($y=2019;$y<=date('Y');$y++)
                                                    <option @if($y==date('Y')) selected @endif value="{!! $y !!}">{!! $y !!}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                 <div class="list-time" id="listDateDay">
                                     <?php
                                     for($i=1;$i<=31;$i++){
                                     ?>
                                     @if(empty($day) && empty($month) && empty($year))
                                     <div class="item-time" id="item-time"><a class="@if(!empty($id) && $id == $i) active @endif" href="{!! route('users.adminListTimekeeping', ['id'=>$i]) !!}" title="" class="">{!! $i !!}</a></div>
                                         @else
                                             <div class="item-time" id="item-time"><a class="@if(!empty($day) && $day == $i) active @endif" href="{!! route('users.listDayMonthYear', ['day'=>$i, 'month'=>$month, 'year'=>$year]) !!}" title="" class="">{!! $i !!}</a></div>
                                         @endif
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
                                                            <th width="100px">Ngày/tháng</th>
                                                            <th width="150px">Họ tên</th>
                                                            <th width="100px">Số giờ đi hát</th>
                                                            <th width="100px">Số giờ đi bay</th>
                                                            <th width="100px">Tổng tiền hát</th>
                                                            <th width="100px">Tổng tiền bay</th>
                                                            <th width="100px">Tổng tiền trả NV</th>
                                                            <th width="100px">Thu về</th>
                                                            <th width="100px">Trạng thái</th>
                                                            <th width="80px">Thao tác</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                        @if(!empty($data))
                                                            @foreach($data as $items)
                                                                <tr>
                                                                    <td>
                                                                        <div class="day-month">{!! !empty($items['day'])?$items['day']:0 !!}/{!! !empty($items['month'])?$items['month']:0 !!}/{!! !empty($items['year'])?$items['year']:0 !!}</div>
                                                                    </td>
                                                                    <td>
                                                                       <div class="avatar"><img width="50px" height="50px" alt="avatar.png" src="{!! URL::asset('public/uploads/user/'.$items['user']['avatar']) !!}" alt=""></div>
                                                                       <div class="fullname">
                                                                           <b>
                                                                               <a href="">{!! !empty($items['user']['fullname'])?$items['user']['fullname']:'' !!}</a>
                                                                           </b>
                                                                       </div>
                                                                    </td>
                                                                    <td><b>{!! !empty($items['timeHourGoSing'])?$items['timeHourGoSing']:0 !!}h{!! !empty($items['timeMinGoSing'])?$items['timeMinGoSing']:0 !!}</b> x <span>{!! !empty($items['priceGoSing'])?number_format($items['priceGoSing'], 0):0 !!} đ</span></td>
                                                                     <td><b>{!! !empty($items['timeHourGoFly'])?$items['timeHourGoFly']:0 !!}h{!! !empty($items['timeMinGoFly'])?$items['timeMinGoFly']:0 !!}</b> x <span>{!! !empty($items['priceGoFly'])?number_format($items['priceGoFly'], 0):0 !!} đ</span></td>


                                                                    <td>{!! !empty($items['totalMoneyGoSing'])?number_format($items['totalMoneyGoSing'], 0):0 !!}</td>
                                                                    <td>{!! !empty($items['totalMoneyGoFly'])?number_format($items['totalMoneyGoFly'], 0):0 !!}</td>
                                                                    <td>{!! !empty($items['totalMoney'])?number_format($items['totalMoney'], 0):0 !!}</td>
                                                                    <td><b>{!! number_format($items['totalMoneyAdmin']-$items['totalMoney'], 0) !!} đ</b></td>
                                                                    @if($items['adminStatus'] == 0)
                                                                    <td class="status"><span style="color: #a94442; font-weight: 600">Chưa được duyệt</span></td>
                                                                    @else
                                                                    <td class="status"><span style="color: #1f8c22; font-weight: 600">Đã Duyệt</span></td>
                                                                    @endif
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
    @include('layout.Mobile.User.listTimeKeeping')
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

    <style type="text/css">

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
    </style>
@endsection
