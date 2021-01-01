@extends('layout.master')
@section('content')
    @if(Auth::user()->role==1)
    <div class="container">
        <div class="list-overview row">
           <div class="col-xs-6">
               <div class="item-overview">
                   <a href="{!! route('users.adminListUser') !!}">
                       <div class="font-awesome"><i class="fa fa-users" aria-hidden="true"></i></div>
                       <div class="title">Nhân viên</div>
                       <div class="brief">Danh sách nhân viên</div>
                   </a>
               </div>
           </div>

            <div class="col-xs-6">
                    <div class="item-overview">
                        <a href="{!! route('users.listTimeKeeping', ['id'=>0]) !!}">
                            <div class="font-awesome"><i class="fa fa-clone" aria-hidden="true"></i></div>
                            <div class="title">Quản lý Chấm công</div>
                            <div class="brief">Thời gian check in, checkout của nhân viên</div>
                        </a>
                    </div>
            </div>

            <div class="col-xs-6">
                    <div class="item-overview">
                        <a href="{!! route('users.adminListSalary', ['id'=>0]) !!}">
                            <div class="font-awesome"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <div class="title">Quản lý Lương</div>
                            <div class="brief">Lưu trữ lương tất cả nhân viên theo tháng</div>
                        </a>
                    </div>
            </div>

            <div class="col-xs-6">
                    <div class="item-overview">
                        <a href="{!! route('users.adminListSuggestMoney') !!}">
                            <div class="font-awesome"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                            <div class="title">Tạm ứng</div>
                            <div class="brief">Danh sách xin tạm ứng lương của nhân viên</div>
                        </a>
                    </div>
            </div>

            <div class="col-xs-6">
                    <div class="item-overview">
                        <a href="{!! route('users.listSevice') !!}">
                            <div class="font-awesome"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                            <div class="title">Dịch vụ</div>
                            <div class="brief">Cập nhật trả công theo dịch vụ</div>
                        </a>
                    </div>
            </div>

        </div>
    </div>

    <style>
        .list-overview .item-overview {
            min-height: 140px;
            background: #FFF;
            border-radius: 10px;
            margin: 10px 0;
            padding: 10px;
            text-align: center;
        }
        .list-overview .item-overview .brief {
            margin: 10px 0 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 13px;
            color: #555;
        }
        .list-overview .item-overview .title {
            font-size: 14px;
            font-weight: 700;
            color: #0090da;
        }
        .font-awesome {
            margin-bottom: 10px;
        }
        .font-awesome .fa {
            font-size: 24px;
            color: #0090da;
            font-weight: 700;
        }
    </style>
    @else
        {!! redirect()->route('login') !!}
    @endif
@endsection