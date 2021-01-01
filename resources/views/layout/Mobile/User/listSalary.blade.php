@extends('layout.master')
@section('content')
    @if(!empty(Auth::user()->id) && Auth::user()->role==2)
    <div class="container">
        <div class="list-user-salary">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Danh sách lương</div>
                </div>
                <div class="panel-body">
                    <div class="list-salary">

                        @if(!empty($data))
                            @foreach($data as $items)
                                <div class="item-box">
                                    <div class="img-box"><a href="{!! route('users.detailSalary', ['id'=>$items['id']]) !!}"><img src="{!! URL::asset('public/uploads/user/salary.png') !!}"></a></div>
                                    <div class="box-info">
                                        <div class="title-salary"><a href="{!! route('users.detailSalary', ['id'=>1]) !!}">Bảng lương tháng {!! !empty($items['month'])?$items['month']:'' !!} ({!! !empty($items['year'])?$items['year']:'' !!})</a></div>
                                        <div class="total_Money"> Tổng lương : {!! !empty($items['total_Money'])?number_format($items['total_Money'], 0):'0' !!} VND</div>
                                        @if(!empty($items['suggest_Money']))
                                            <div class="text-payment"><span>Tạm ứng: </span> <span class="pricePayment">{!! !empty($items['suggest_Money'])?number_format($items['suggest_Money'], 0):'0' !!} VNĐ  </span></div>
                                        @endif
                                        <div class="realField_Money">Lương thực lĩnh : <b>{!! !empty($items['realField_Money'])?number_format($items['realField_Money'], 0):'0' !!} VND</b> </div>
                                            @if($items['status'] == 0)
                                               <div class="totalMonney">Trạng thái : <span class="unpaid"> Chưa thanh toán</span></div>
                                            @else
                                                 <div class="totalMonney">Trạng thái : <span class="paid">Đã trả lương</span></div>
                                            @endif
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="text-center">Bạn chưa có bảng lương nào</div>
                        @endif

                        <div class="item-box hidden">
                            <div class="img-box"><img src="{!! URL::asset('public/uploads/user/salary.png') !!}"></div>
                            <div class="box-info">
                                <div class="title-salary"><a href="{!! route('users.detailSalary', ['id'=>1]) !!}">Bảng lương tháng 6 (2019)</a></div>
                                <div class="text-brief"><span>Tổng tiền: </span> <span class="priceTotal">10.450.000 VNĐ</span></div>
                                <div class="text-payment"><span>Tạm ứng: </span> <span class="pricePayment">2.000.000 VNĐ </span> <span> ( Chưa nhận )</span></div>
                                <div class="totalMonney">Trạng thái : <span class="paid">Đã trả lương</span></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .item-box .total_Money{
            color: #333;
        }
        .realField_Money {
            color: #333;
        }
        .text-payment {
            font-size: 14px;
            color: #333;
        }
        .pricePayment {
            font-weight: 700;
        }
        #userPayment {
            margin-top: 60px;
        }
        #userPayment .modal-header {
            background: #0090da;
        }
        .list-user-salary .panel-default{
            background: none;
            border: 0;
            border-radius: 0;
            box-shadow: none;
        }
        .list-user-salary .panel-default .panel-heading{
            background: none;
            border: 0;
            padding-left: 0;
            padding-right: 0;
            display: inline-flex;
            width: 100%;
            justify-content: space-between;
        }
        .list-user-salary .panel-default .panel-heading .panel-btn {
            margin-top: 10px;
        }
        .list-user-salary .panel-default .panel-heading .panel-btn a {
            color: #FFF;
            background: #0090da;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .list-user-salary .panel-default .panel-title {
            font-weight: 700;
            color: #333;
            font-size: 16px;
            margin-top: 10px;
        }
        .list-user-salary .panel-default .panel-body {
            padding-left: 0;
            padding-right: 0;
        }
        .list-salary .item-box{
            padding-right: inherit;
            overflow: hidden;
            height: auto;
            background: rgba(255, 255, 255, 0.68);
            margin-bottom: 10px;
        }
        .img-box {
            width: 20%;
            float: left;
        }
        .img-box img{
            width: 55px;
            height: 55px;
            background: #fff9;
            border-radius: 50%;
        }
        .box-info {
            display: inline-block;
            padding-left: 10px;
            width: 80%;
        }
        .box-info .title-salary a{
            font-weight: 700;
            font-size: 14px;
        }
        .box-info .text-brief{
            color: #333;
            font-size: 14px;
            padding-top: 5px;
        }
        .priceTotal {
            font-weight: 700;
        }
        .totalMonney {
            color: #333;
            font-size: 14px;
        }
        .totalMonney .unpaid {
            color: darkred;
            font-weight: 600;
        }
        .totalMonney .paid {
            color: green;
            font-weight: 600;
        }
    </style>

    @else
        {!! redirect()->route('login') !!}
    @endif
@endsection