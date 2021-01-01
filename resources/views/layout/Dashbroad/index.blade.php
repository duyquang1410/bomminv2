@extends('layout.master')
@section('content')
<div class="container">
   <div class="row">
         <div class="wrapper white-bg page-heading">Tổng quan</div>
         <div class="list-dashbroad">
         
            <div class="col-md-3 col-sm-6 col-xs-12">
               <div class="item-2 item-box">
                  <a  title="Nhân viên" href="{!! route('users.adminListTimekeeping', ['id'=>date('d')]) !!}" class="main-item">
                     <div class="item-img"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                     <div class="item-content">
                        <div class="item-content-inner">
                           <div class="item1">Số giờ hát : <span> {!! !empty($timeHourGoSing)?$timeHourGoSing:0 !!} giờ {!! !empty($timeMinGoSing)?$timeMinGoSing:0 !!} phút</span></div>
                           <div class="item1">Số giờ bay : <span> {!! !empty($timeHourGoFly)?$timeHourGoFly:0 !!} giờ {!! !empty($timeMinGoFly)?$timeMinGoFly:0 !!} phút</span></div>
                        </div>
                         <div class="day">Hôm nay</div>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
               <div class="item-3 item-box">
                  <a  title="Nhân viên" href="" class="main-item">
                     <div class="item-img"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <div class="item-content">
                        <div class="item-content-inner">
                           <div class="item2">Số giờ hát : <span> {!! !empty($timeHourGoSing_Month)?$timeHourGoSing_Month:0 !!} giờ {!! !empty($timeMinGoSing_Month)?$timeMinGoSing_Month:0 !!} phút </span></div>
                           <div class="item2">Số giờ bay : <span> {!! !empty($timeHourGoFly_Month)?$timeHourGoFly_Month:0 !!} giờ {!! !empty($timeMinGoFly_Month)?$timeMinGoFly_Month:0 !!} phút</span></div>
                        </div>
                        <div class="month">Tháng {!! date('m') !!}</div>
                     </div>
                  </a>
               </div>
            </div>

             <div class="col-md-3 col-sm-6 col-xs-12">
                 <div class="item-4 item-box">
                     <a  title="Tổng tiền trả Nhân viên tháng {!! date('m') !!}" href="{!! route('users.adminListSalary', ['month'=>date('m'), 'year'=>date('Y')]) !!}" class="main-item">
                         <div class="item-img"><i class="fa fa-users" aria-hidden="true"></i></div>
                         <div class="item-content">
                             <div class="item-content-inner">
                                 <div class="fixItem" style="height:70px"></div>
                                 <div class="fixItemConetent transition">
                                     <div class="number fa-3x mb-10">{!! !empty($totalMoneyUser)?number_format($totalMoneyUser, 0):0 !!} đ</div>

                                 </div>
                             </div>
                         </div>
                     </a>
                     <div class="text mgt-text">Tổng tiền trả Nhân viên tháng {!! date('m') !!}</div>
                 </div>
             </div>

             <div class="col-md-3 col-sm-6 col-xs-12">
                 <div class="item-4 item-box">
                     <a  title="Tổng tiền trả Nhân viên tháng {!! date('m') !!}" href="{!! route('users.adminListSalary', ['month'=>date('m'), 'year'=>date('Y')]) !!}" class="main-item">
                         <div class="item-img"><i class="fa fa-users" aria-hidden="true"></i></div>
                         <div class="item-content">
                             <div class="item-content-inner">
                                 <div class="fixItem" style="height:70px"></div>
                                 <div class="fixItemConetent transition">
                                     <div class="number fa-3x mb-10">{!! !empty($totalMoneyAdmin)?number_format($totalMoneyAdmin, 0):0 !!} đ</div>

                                 </div>
                             </div>
                         </div>
                     </a>
                     <div class="text mgt-text">Tổng tiền thu về tháng {!! date('m') !!}</div>
                 </div>
             </div>

             <div class="col-md-3 col-sm-6 col-xs-12">
               <div class="item-1 item-box">
                  <a  title="Nhân viên" href="{!! route('users.index') !!}" class="main-item">
                     <div class="item-img"><i class="fa fa-users" aria-hidden="true"></i></div>
                     <div class="item-content">
                        <div class="item-content-inner">
                           <div class="fixItem" style="height:70px"></div>
                           <div class="fixItemConetent transition">
                              <div class="number fa-3x mb-10">{!! !empty($totalUser)?$totalUser:0 !!}</div>
                              <div class="text mgt-text">Nhân viên</div>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
          <div class="clearfix"></div>
   </div>
   <div class="list-user-timekeeping"> 
               <div class="panel panel-default">
                  <div class="panel panel-heading">
                        <div class="panel-title">10 khai báo công chấm gần nhất</div>
                  </div>
                  <div class="panel-body">
                        <table class="table table-bordered table-striped dataTables-example">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>#</th>
                                 <th>Tên nhân viên</th>
                                 <th>Số giờ hát</th>
                                 <th>Số giờ bay</th>
                                 <th>Tổng tiền trả NV</th>
                                 <th>Tổng quản lý thu về</th>
                                 <th>Trạng thái</th>
                                 <th>Thao tác</th>
                              </tr>
                           </thead>
                           <tbody>
                              @if(!empty($timekeeping))
                                 @foreach($timekeeping as $key => $items)
                                    <tr>
                                       <td>{!! $key+1 !!}</td>
                                       <td>{!! !empty($items['day'])?$items['day']:'' !!}/{!! !empty($items['month'])?$items['month']:'' !!}</{!! !empty($items['year'])?$items['year']:'' !!}td>
                                       <td>
                                          <div class="avatar"><img width="50px" height="50px" alt="avatar.png" src="{!! URL::asset('public/uploads/user/'.$items['user']['avatar']) !!}" alt=""></div>
                                          <div class="fullname">
                                                <b>
                                                   <a href="">{!! !empty($items['user']['fullname'])?$items['user']['fullname']:'' !!}</a>
                                                </b>
                                          </div>
                                       </td>
                                       <td>{!! !empty($items['timeHourGoSing'])?$items['timeHourGoSing']:0 !!}h{!! !empty($items['timeMinGoSing'])?$items['timeMinGoSing']:0 !!}</td>
                                        <td>{!! !empty($items['timeHourGoFly'])?$items['timeHourGoFly']:0 !!}h{!! !empty($items['timeMinGoFly'])?$items['timeMinGoFly']:0 !!}</td>
                                        <td>{!! !empty($items['totalMoney'])?number_format($items['totalMoney'], 0):0 !!} đ</td>
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
                                             @else
                                             <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" title="Hủy duyệt" class="btn btn-xs btn-danger cancelConfirmTimekeeping"><i class="fa fa-floppy-o" aria-hidden="true"></i> Hủy duyệt ?</a>
                                             @endif
                                             <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" title="Xóa" class="btn btn-xs btn-danger btnDeleteTimeKeeping"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
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
</script>
<style>
    .item-4 .mgt-text{
        position: absolute;
        bottom: 10px;
        font-size: 20px;
        text-shadow: 1px 1px 1px #999;
    }
    @media (max-width: 425px){
        .item-4 .mgt-text{
            font-size: 16px !important;
        }
        .month{
            font-size: 16px !important;
        }
        .day {
            font-size: 16px !important;
        }
        .item-4 .fa-3x {
            font-size: 21px !important;
            font-weight: 700;
        }
    }
    .month {
        position: absolute;
        bottom: 10px;
        right: 10px;
        font-size: 20px;
        color: #FFF;
        text-shadow: 2px 2px 4px #000000;
    }
    .day {
        position: absolute;
        bottom: 10px;
        right: 10px;
        font-size: 20px;
        color: #FFF;
        text-shadow: 2px 2px 4px #000000;
    }
    .item-4 .fa-3x{
        font-size: 2em;
    }
    .list-dashbroad .item-content-inner {
        display: inline-block;
    }
   @media (max-width: 768px){
      .item-1 .fa-3x{
             font-size: 2em;
      }
      .item-content-inner .item1,  .item-content-inner .item2 {
            font-size: 14px !important;
            margin-bottom: 20px;
      }
      .item-content-inner .item3{
          font-size: 12px !important;
          margin-bottom: 20px;
      }
      .item-box .item-img i.fa{
         font-size: 2em;
         display: none;
      }
      .list-user-timekeeping .dt-bootstrap .html5buttons{
         display: none;
      }
      .list-user-timekeeping .dt-bootstrap .dataTables_filter{
          display: none;
      }
      .list-user-timekeeping .dt-bootstrap .dataTables_info{
          display: none;
      }
       .list-user-timekeeping .panel-default {
         background: transparent;
       }
       .list-user-timekeeping .panel-body{
         background: #FFF;
       }
       .list-user-timekeeping .panel-heading{
            background: none;
            border-radius: 0;
            border: 0;
            padding-right: 0;
            padding-left: 0;
       }
       .list-user-timekeeping .panel-heading .panel-title span{
            font-size: 14px;
       }
   }
   .list-user-timekeeping .panel-default{
      border: 0;
      border-radius: 0;
      box-shadow: none;
   }
   .list-user-timekeeping .panel-default .panel-title {
         font-weight: 700;
         text-align: center;
         font-size: 20px;
   }
  @media (min-width: 768px){
       .fullname {
               padding: 10px;
               display: inline-block;
      }
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

   @media (min-width: 769px){
      .item-content-inner .item1{
         padding: 10px;
      }
      .item-content-inner .item2{
          padding: 10px;
      }
      .item-content-inner .item3 {
          padding: 10px;
      }
   }
   .item-content-inner .item1 {
      color: #FFF;
      font-size: 14px;
   }
   .item-content-inner .item1 span{
         background: #135252;
          padding: 6px 15px;
          border-radius: 5px;
         font-size: 14px;
   }

   .item-content-inner .item2 {
      color: #FFF;
      font-size: 14px;
     
   }
   .item-content-inner .item2 span{
         background: #333;
          padding: 6px 15px;
          border-radius: 5px;
         font-size: 14px;
   }

   .item-content-inner .item3 {
      color: #FFF;
      font-size: 14px;
   }
   .item-content-inner .item3 span{
         background: #135252;
          padding: 6px 15px;
          border-radius: 5px;
   }
   span.money{
   font-size: 15px;
    font-weight: 600;
   }
   .item-box .item-img {
      opacity: 0.5;
   }
</style>
@endsection