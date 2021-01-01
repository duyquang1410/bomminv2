@extends('layout.master')
@section('content')
    @if(!empty(Auth::user()->role==1))
           <div class="container">
        <div class="row">
            <div class="col-md-12 box-right">
                <div class=" wrapper white-bg page-heading">
                    <div class="col-lg-12">
                        <h2 class="pull-left">Thống kê tháng công của tất cả nhân viên <span style="color: #f8ac59;">{!! date('m') !!}/{!! date('Y') !!}</span></h2>
                        <div class="pull-right list-month-statistical">
                            <div class=""><b>Tháng : </b></div>
                            <?php
                            for($i=1;$i<=12;$i++){
                            ?>
                            <div class="item-time"><a href="" class="<?php if($i==date('m')) echo 'active'; ?>">{!! $i !!}</a></div>
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
                                               <div class="panel-title">Danh sách Nhân viên</div>
                                           </div>
                                           <div class="panel-body">
                                               <table class="table table-bordered table-striped table-hover dataTables-example">
                                                   <thead>
                                                   <tr>
                                                       <th width="200px">Tên nhân viên</th>
                                                       <th width="100px">Số giờ hát</th>
                                                       <th width="100px">Số giờ bay</th>
                                                       <th width="100px">Tiền hát</th>
                                                       <th width="100px">Tiền bay</th>
                                                       <th width="100px">Tổng tiền</th>
                                                       <th width="100px">Duyệt</th>
                                                       <th width="100px">Xem</th>
                                                   </tr>
                                                   </thead>
                                                   <tbody>
                                                    @if(!empty($data))
                                                            @foreach($data as $items)
                                                                <tr>
                                                                    <td class="box-img-fullname">
                                                                        <div class="img-user">
                                                                        <span>
                                                                            @if(empty($items['avatar']))
                                                                                <img src="{!! URL::asset('public/uploads/user/icon1.png') !!}">
                                                                            @else
                                                                                <img src="{!! URL::asset('public/uploads/user/'.$items['avatar']) !!}">
                                                                            @endif
                                                                            <a href="">{!! !empty($items['fullname'])?$items['fullname']:'' !!}</a>

                                                                        </span>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-weight: 600;">
                                                                    <?php
                                                                        // Thống kê tổng số giờ hát của tháng này
                                                                        $timeHourGoSing =  DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->sum('timeHourGoSing');
                                                                        $timeMinGoSing = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->sum('timeMinGoSing');

                                                                        $timemin = $timeMinGoSing;
                                                                        $hour = floor($timemin/60);
                                                                        $min = $timemin%60;

                                                                        $timeHourGoSing = $timeHourGoSing + $hour;
                                                                        $timeMinGoSing =  $min;
                                                                    ?>
                                                                        {!! !empty($timeHourGoSing)?$timeHourGoSing:0 !!} h/{!! !empty($timeMinGoSing )?$timeMinGoSing :0 !!}
                                                                    </td>
                                                                    <td style="font-weight: 600">
                                                                        <?php
                                                                        // Thống kê tổng số giờ bay của tháng này
                                                                        $timeHourGoFly = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->sum('timeHourGoFly');
                                                                        $timeMinGoFly = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->sum('timeMinGoFly');
                                                                        $timemin = $timeMinGoFly;
                                                                        $hour = floor($timemin/60);
                                                                        $min = $timemin%60;

                                                                        $timeHourGoFly = $timeHourGoFly + $hour;
                                                                        $timeMinGoFly =  $min;
                                                                        ?>
                                                                            {!! !empty($timeHourGoFly)?$timeHourGoFly:0 !!} h/{!! !empty($timeMinGoFly)?$timeMinGoFly:0 !!}
                                                                    </td>
                                                                    <td style="font-weight: 600">
                                                                    <?php
                                                                        // Thống kê Tổng tiền đi hát
                                                                        $totalMoneyGoSing =  DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->sum('totalMoneyGoSing');
                                                                    ?>
                                                                        {!! !empty($totalMoneyGoSing)?number_format($totalMoneyGoSing, 0):'0' !!}đ
                                                                    </td>
                                                                    <td style="font-weight: 600">
                                                                        <?php
                                                                        // Thống kê Tổng tiền đi bay
                                                                        $totalMoneyGoFly =  DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->sum('totalMoneyGoFly');
                                                                        ?>
                                                                        {!! !empty($totalMoneyGoFly)?number_format($totalMoneyGoFly, 0):'0' !!}đ
                                                                    </td>
                                                                    <td >
                                                                        <?php
                                                                        // Thống kê Tổng tiền
                                                                        $totalMoney  =  DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->sum('totalMoney');
                                                                        ?>
                                                                        {!! !empty($totalMoney)?number_format($totalMoney, 0):'0' !!}đ
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        // Thống kê Tổng tiền đi bay
                                                                        $adminStatus_0 =  DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->where('adminStatus', 0)->get()->toArray();
                                                                        $adminStatus_1 =  DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', $items['id'])->where('adminStatus', 1)->get()->toArray();
                                                                        ?>
                                                                        <div class="">Đã duyệt: <span class="duyet">{!! !empty($adminStatus_1)?count($adminStatus_1):0 !!}</span></div>
                                                                        <div class="">Chưa duyệt: <span class="chuaduyet">{!! !empty($adminStatus_0)?count($adminStatus_0):0 !!}</span></div>
                                                                    </td>
                                                                    <td><a href="{!! route('statisticals.detail', ['id'=>$items['id']]) !!}" class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a></td>
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


               <!-- Modal add-->
               <div class="modal fade detailPayment" id="detailPayment" role="dialog">
                   <div class="modal-dialog modal-md">
                       <!-- Modal content-->
                       <div class="modal-content">
                           <form id="frmCreateProduct" method="POST" enctype="multipart/form-data">
                               {!! csrf_field() !!}
                               <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   <h4 class="modal-title">Chi tiết thanh toán</h4>
                               </div>
                               <div class="modal-body row">
                                   <div class="col-md-12">
                                        <table class="table table-borrdered table-striped">
                                           <tr>
                                               <td>Tên phòng</td>
                                               <td class="titleDetail" id="titleDetail">13131</td>
                                           </tr>
                                            <tr>
                                                <td>Giờ vào</td>
                                                <td class="startDateDetail" id="startDateDetail"></td>
                                            </tr>
                                            <tr>
                                                <td>Giờ ra</td>
                                                <td class="endDateDetail" id="endDateDetail"></td>
                                            </tr>
                                            <tr>
                                                <td>Số giờ hát</td>
                                                <td class="totalDateDetail" id="totalDateDetail"></td>
                                            </tr>
                                            <tr>
                                                <td>Tiền hát</td>
                                                <td class="totalMoneySingDetail" id="totalMoneySingDetail"></td>
                                            </tr>
                                            <tr>
                                                <td>Tổn tiền đồ ăn thức uống</td>
                                                <td class="totalMoneyFoodDetail" id="totalMoneyFoodDetail"></td>
                                            </tr>
                                            <tr>
                                                <td>Tổng thu</td>
                                                <td><b class="totalMoneyDetail" id="totalMoneyDetail"></b></td>
                                            </tr>

                                            <div class="bill-detail">

                                            </div>
                                        </table>
                                   </div>
                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng lại</button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
    @else
        {!! redirect()->route('login') !!}
    @endif

               <style>
                   .item-time a.active {
                       background: #f8ac59 !important;
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