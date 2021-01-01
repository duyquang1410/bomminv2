@extends('layout.master')
@section('content')
    <div class="container">
        <div class="detail-user-salary">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Chi tiết công chấm tháng 7 ( 2019 )</div>
                </div>
                <div class="panel-body">
                    <div class="info-total">
                        <div class="salary">Tổng lương : {!! !empty($salary['total_Money'])?number_format($salary['total_Money'], 0):'' !!} VND</div>
                        <div class="payment">Tạm ứng : {!! !empty($salary['suggest_Money'])?number_format($salary['suggest_Money'], 0):'' !!} VND</div>
                        <div class="payment">Tổng lương nhận : <span style="color: darkred; font-weight: 700; font-size: 15px"> {!! !empty($salary['realField_Money'])?number_format($salary['realField_Money'], 0):'' !!} VND</span></div>
                    </div>
                    <div class="detail-salary">

                        @if(!empty($data))
                            @foreach($data as $items)
                            <div class="item-detail-box">
                                <div class="datetime">
                                    <div class="date">Ngày</div>
                                    <div class="year">{!! !empty($items['day'])?$items['day']:'' !!}</div>
                                </div>
                                <div class="info-detail">
                                    <ul>
                                        <li><span class="checkin">CheckIn :</span> <span>{!! !empty($items['checkin'])?date('H:i', strtotime($items['created_at'])):'' !!}</span></li>

                                        <li><span class="checkout">CheckOut :</span> <span>{!! !empty($items['checkout'])?date('H:i', strtotime($items['created_at'])):'' !!}</span></li>
                                    </ul>
                                    <div class="totalwork">
                                        <div class="totalTime">Tổng số giờ làm : {!! !empty($items['hour'])?$items['hour']:'0' !!}h{!! !empty($items['min'])?$items['min']:'0' !!} phút</div>
                                        <div class="totalMonney">Tiền công : {!! !empty($items['totalmoney'])?number_format($items['totalmoney'], 0):'0' !!} VND</div>
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
    <style>
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
            overflow: hidden;
            background: rgba(255, 255, 255, 0.68);
            padding: 5px 8px;
            border-radius: 5px;
            margin: 8px 0;
        }
        .item-detail-box .datetime {
            display: inline-block;
            background: #FFF;
            width: 20%;
            height: 50px;
            text-align: center;
            margin: auto;
            border-radius: 8px;
            padding-top: 5px;
            color: #0090da;
            font-weight: 700;
            float: left;
        }
        .item-detail-box .datetime .date {
            font-size: 11px;
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
@endsection