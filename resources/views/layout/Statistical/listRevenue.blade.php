@extends('layout.master')
@section('content')
    @if(!empty(Auth::user()->role==1))
           <div class="container">
        <div class="row">
            <div class="col-md-12 box-right">
                <div class=" wrapper white-bg page-heading">
                    <div class="col-lg-12">
                        <h2 class="pull-left">Thống kê doanh thu <span style="color: #f8ac59;">{!! !empty($month)?$month:date('m') !!}/{!! !empty($year)?$year:date('Y') !!}</span></h2>
                         <div class="pull-right list-month-statistical">
                            <div class=""><b>Tháng / Năm (2020): </b></div>
                            <?php
                            for($i=1;$i<=12;$i++){
                            ?>
                            <div class="item-time"><a href="{!! route('statisticals.listRevenue', ['month'=>$i, 'year'=>2020]) !!}" class="<?php if($i==$month && $year==2020) echo 'active'; ?>">{!! $i !!}</a></div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="pull-right list-month-statistical">
                            <div class=""><b>Tháng / Năm (2021): </b></div>
                            <?php
                            for($i=1;$i<=12;$i++){
                            ?>
                            <div class="item-time"><a href="{!! route('statisticals.listRevenue', ['month'=>$i, 'year'=>2021]) !!}" class="<?php if($i==$month && $year==2021) echo 'active'; ?>">{!! $i !!}</a></div>
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
                                               <div class="panel-title">Danh sách</div>
                                           </div>
                                           <div class="panel-body">
                                               <table class="table table-bordered table-striped table-hover dataTables-example">
                                                   <thead>
                                                   <tr>
                                                       <th width="200px">Tổng giờ hát</th>
                                                       <th width="100px">Tổng giờ bay</th>
                                                       <th width="100px">Tổng trả NV (VND)</th>
                                                       <th width="100px">Tổng thu về (VND)</th>
                                                       <th width="100px">Tổng tiền (VND)</th>
                                                   </tr>
                                                   </thead>
                                                   <tbody>
                                                      <tr>
                                                        <td>{!! !empty($timeHourGoSing)?$timeHourGoSing:'' !!} h {!! !empty($timeMinGoSing)?$timeMinGoSing:'' !!}</td>
                                                        <td>{!! !empty($timeHourGoFly)?$timeHourGoFly:'' !!} h {!! !empty($timeMinGoFly)?$timeMinGoFly:'' !!}</td>
                                                        <td>{!! !empty($totalMoneyUser)?number_format($totalMoneyUser, 0):'' !!}</td>
                                                        <td><b>{!! !empty($totalMoneyAdmin)?number_format($totalMoneyAdmin, 0):'' !!}</b></td>
                                                        <td><b>{!! !empty($totalMoney)?number_format($totalMoney, 0):'' !!} đ</b></td>
                                                      </tr>
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
                           width: 100%;
                   }
                   .list-month-statistical .item-time a{
                       display: inline-block;
                       padding: 0px 12px;
                       background: #1ab394;
                       margin: 4px;
                       border-radius: 5px;
                       color: #FFF;
                       font-size: 16px;
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
                   .content .page-heading {
                        display: inline-block;
                        width: 100%;
                   }
                   .list-month-statistical {
                          font-size: 15px;
                   }
               </style>
@endsection