@extends('layout.master')
@section('content')
<div class="container">
   <div class="row">
         <div class="wrapper white-bg page-heading">Tổng quan</div>
         <div class="list-dashbroad">
         
            <div class="col-md-3 col-sm-6 col-xs-12">
               <div class="item-2 item-box">
                  <a  title="Nhân viên" href="{!! route('users.listUserTimeKeeping', ['month'=>date('m'), 'year'=>date('Y')]) !!}" class="main-item">
                     <div class="item-img"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                     <div class="item-content">
                        <div class="item-content-inner">
                             <div class="fixItem" style="height:70px"></div>
                              <div class="fixItemConetent transition">
                                 <div class="number fa-3x mb-10">{!! !empty($timeHourGoSing)?$timeHourGoSing:0 !!} giờ {!! !empty($timeMinGoSing)?$timeMinGoSing:0 !!} </div>
                                 <div class="text mgt-text">Số giờ đi hát tháng {!! date('m') !!}/{!! date('Y') !!} </div>
                              </div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
               <div class="item-3 item-box">
                  <a  title="Nhân viên" href="{!! route('users.listUserTimeKeeping', ['month'=>date('m'), 'year'=>date('Y')]) !!}" class="main-item">
                     <div class="item-img"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <div class="item-content">
                        <div class="item-content-inner">
                          <div class="fixItem" style="height:70px"></div>
                              <div class="fixItemConetent transition">
                                 <div class="number fa-3x mb-10">{!! !empty($timeHourGoFly)?$timeHourGoFly:0 !!} giờ {!! !empty($timeMinGoFly)?$timeMinGoFly:0 !!}</div>
                                 <div class="text mgt-text">Số giờ đi bay tháng {!! date('m') !!}/{!! date('Y') !!}</div>
                              </div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
               <div class="item-4 item-box">
                  <a  title="Nhân viên" href="javascript:;" class="main-item">
                     <div class="item-img"><i class="fa fa-calculator" aria-hidden="true"></i></div>
                    <div class="item-content">
                        <div class="item-content-inner">
                              <div class="fixItem" style="height:70px"></div>
                              <div class="fixItemConetent transition">
                                 <div style="margin-bottom: 20px" class="text mgt-text ">Tổng thực lĩnh (đã duyệt): <span style="background: #f8ac59; padding: 5px 10px;     border-radius: 4px; color: #FFF">{!! !empty($totalMoney)?number_format($totalMoney, 0):0 !!} đ</span></div>
                                 <div class="text mgt-text" > Tạm ứng ( đã trừ ):
                                    <span style="background: #8a6d3b; padding: 5px 10px;     border-radius: 4px; color: #FFF"> {!! !empty($suggest_Money)?number_format($suggest_Money, 0):0 !!} đ</span></div>
                              </div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>

         </div>
          <div class="clearfix"></div>
   </div>
</div>

<style>
   @media (max-width: 768px){
      .item-box .item-img i.fa{
         font-size: 3em !important;
      }
      .fixItemConetent .fa-3x{
            font-size: 18px;
            font-weight: 600;
      }
   }
</style>
@endsection