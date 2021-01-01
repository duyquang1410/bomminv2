@extends('layout.master')
@section('content')
    @if(Auth::user()->role==1)
    <div class="container">
        <div class="listSuggestMoney">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Danh sách ứng lương</div>
                </div>
                <div class="panel-body">
                    <div class="list-suggest">

                        @if(!empty($data))
                            @foreach($data as $items)
                                <div class="item-suggest">
                                   @if(empty($items['user']['avatar']))
                                        <div class="img-icon"><img src="{!! URL::asset('public/uploads/icon/money-bag.png') !!}" alt=""></div>
                                       @else
                                        <div class="img-icon"><img src="{!! URL::asset('public/uploads/user/'.$items['user']['avatar']) !!}" alt=""></div>
                                       @endif
                                    <div class="info-suggest">
                                        <a href="">
                                            <div class="fullname">{!! !empty($items['user']['fullname'])?$items['user']['fullname']:'' !!}</div>
                                        </a>
                                        <h4>Số tiền cần ứng : <span>{!! !empty($items['numberMoney'])?number_format($items['numberMoney'], 0):0 !!} VND</span></h4>
                                        <div class=""><i class="fa fa-clock-o" aria-hidden="true"></i> Ngày tạo :  {!! !empty($items['created_at'])?date('d/m/Y H:i', strtotime($items['created_at'])):0 !!}</div>
                                        <div class="">Trạng thái:
                                            @if($items['status']==0)
                                                <span style="color: #a94442; font-weight: 700">Chưa được ứng</span>
                                            @elseif($items['status']==2)
                                            <span style="color: red; font-weight: 700">Bạn Đã Hủy ứng</span>
                                            @else
                                                <span style="color: green; font-weight: 700">Đã ứng</span>
                                            @endif
                                        </div>
                                    </div>
                                       @if($items['status'] == 0)
                                    <div class="dropdown">
                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                        <ul class="dropdown-menu">
                                            @if($items['status'] == 0)
                                            <li><a id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-primary btnSalaryPayment">Ứng lương</a></li> 
                                             <li>
                                                 <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger btnCancelSugguest">Hủy ứng lương ?</a>
                                             </li>
                                                <li>
                                                    <a id="{!! !empty($items['id'])?$items['id']:0 !!}" href="javascript:;" class="btn btn-xs btn-danger deleteSuggestUser"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa bỏ</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    @elseif($items['status']==2)
                                    <div class="dropdown">
                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                        <ul class="dropdown-menu">
                                           <li>
                                                <a id="{!! !empty($items['id'])?$items['id']:0 !!}" href="javascript:;" class="btn btn-xs btn-danger deleteSuggestUser"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa bỏ</a>
                                             </li>
                                        </ul>
                                    </div>
                                       @endif
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        // Xóa ứng lương ( Bản lương  chưa được ứng + đã hủy ứng )
        $('.deleteSuggestUser').click(function(){
            var id = $(this).attr('id');
                Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa ứng lương ?",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/users/deleteSuggestUser/"+id;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: id,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Xóa thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Thông báo',
                                        msg: 'Xóa thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });

                // Hủy ứng lương
            $('.btnCancelSugguest').click(function(){
                        var id = $(this).attr('id');
                        Lobibox.confirm({
                            msg: "Bạn có chắc chẵn muốn hủy ứng lương không ?",
                            callback: function ($this, type) {
                                if (type === 'yes') {
                                    var url = "<?php echo url('/') ?>/huy-ung-luong/"+id;
                                        $.ajax({
                                            url: url,
                                            type: 'GET',
                                            dataType: 'json',
                                            data: id,
                                            success: function (data, textStatus, xhr) {
                                                console.log(data);
                                                if(data['message']=='success'){
                                                         Lobibox.notify('success', {
                                                            title: 'Thành công',
                                                            msg: 'Hủy Tạm ứng thành công',
                                                            delay: 2000
                                                        });
                                                        setTimeout(function(){
                                                            location.reload();
                                                        },2000);
                                                    }
                                                    else {
                                                         Lobibox.notify('error', {
                                                            title: 'Có lỗi',
                                                            msg: 'Hủy Tạm ứng thất bại'
                                                });
                                        }
                                    }
                                });
                            }
                        }
                    });
                });

             // Duyệt ứng lương :

        $(".btnSalaryPayment").click(function(event){
            var id = $(this).attr('id');
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn ứng lương cho nhân viên không ?",
                title: "Thông báo",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/users/salaryPayment/"+id;
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: id,
                            contentType: false,
                            processData: false,
                            enctype: 'multipart/form-data',
                            cache:false,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                    Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Đã ứng lương thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else if(data['message']=='warning'){
                                     Lobibox.notify('warning', {
                                        title: 'Thông báo',
                                        msg: 'Tháng đó đã thanh toán , không được ứng lương',
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },4000);
                                }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Ứng lương thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });
    </script>
    <style>
        .listSuggestMoney .item-suggest .img-icon img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
        }
        .item-suggest button.dropdown-toggle
        {
            position: absolute;
            right: 0;
            top: 0;
        }
        .item-suggest .dropdown-menu {
            left: unset !important;
            right: 0 !important;
            top: 25px;
        }
        .item-suggest .dropdown-menu a{
            color: #FFF;
        }
        .info-suggest .fullname {
            font-weight: 700;
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
            background: rgba(255, 255, 255, 0.68);
            padding: 5px 8px;
            border-radius: 5px;
            margin: 8px 0;
            position: relative;
            float: left;
            width: 100%;
        }
    </style>
    @else
        {!! redirect()->route('login') !!}
    @endif
@endsection