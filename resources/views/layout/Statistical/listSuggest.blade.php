@extends('layout.master')
@section('content')
    @if(!empty(Auth::user()->role==1))
        <div class="container">
            <div class="row">
                <div class="col-md-12 box-right">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content row">
                                        <div class="clearfix"></div>
                                        <div class="list-payment">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div class="user">
                                                      <div class="fullname"><b>{!! !empty($dataUser['fullname'])?$dataUser['fullname']:'' !!}</b></div>
                                                        <div class="avatar"><img width="50px" height="50px" alt="avatar.png" src="{!! URL::asset('public/uploads/user/'.$dataUser['avatar']) !!}" alt=""></div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-bordered table-striped table-hover dataTables-example">
                                                        <thead>
                                                        <tr>
                                                            <th width="50px">STT</th>
                                                            <th width="100px">Số tiền ứng</th>
                                                            <th width="100px">Nội dung ứng</th>
                                                            <th width="100px">Ngày tạo</th>
                                                            <th width="100px">Trạng thái</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(!empty($data))
                                                            @foreach($data as  $key => $items)
                                                            <tr>
                                                                <td>{!! $key+1 !!}</td>
                                                                <td><b>{!! !empty($items['numberMoney'])?number_format($items['numberMoney'], 0):'' !!} đ</b></td>
                                                                <td>{!! !empty($items['note'])?$items['note']:'' !!}</td>
                                                                <td>{!! !empty($items['created_at'])?date('d/m/Y H:i', strtotime($items['created_at'])):'' !!}</td>
                                                                <td>
                                                                    @if($items['status']==0)
                                                                        <span style="color: #a94442; font-weight: 700">Chưa được ứng</span>
                                                                    @elseif($items['status'] == 2)
                                                                        <span style="color: red; font-weight: 700">Đã Hủy ứng</span>
                                                                    @else
                                                                        <span style="color: green; font-weight: 700">Đã ứng</span>
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
    @else
        {!! redirect()->route('login') !!}
    @endif

    <style>
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
        .listSuggestMoney .panel-default {
            background: none;
            border-radius: 0;
            border: 0;
            box-shadow: none;
            margin-top: 10px;
        }
        .listSuggestMoney .panel-default .panel-heading {
            border: 0;
            background: none;
            padding-left: 0;
            padding-right: 0;
            border-bottom: 1px solid #f1f1f1;
            display: inline-flex;
            width: 100%;
            justify-content: space-between;
        }
        .listSuggestMoney .panel-default .panel-heading  .panel-btn a{
            color: #FFF;
            background: #0090da;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .listSuggestMoney .panel-default .panel-body {
            padding-left: 0;
            padding-right: 0;
        }
        .listSuggestMoney .panel-default .panel-heading .panel-title {
            font-size: 16px;
            color: #333;
            font-weight: 700;
        }
        .listSuggestMoney .item-suggest .img-icon{
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
        .listSuggestMoney .item-suggest .info-suggest {
            width: 80%;
            float: left;
            padding-left: 10px;
        }
        .listSuggestMoney .item-suggest .info-suggest h4{
            margin-bottom: 0;
        }
        .listSuggestMoney .item-suggest .img-icon img{
            width: 42px;
        }
        .item-suggest {
            overflow: hidden;
            background: rgba(255, 255, 255, 0.68);
            padding: 5px 8px;
            border-radius: 5px;
            margin: 8px 0;
        }
    </style>
@endsection