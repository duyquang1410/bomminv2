@extends('layout.master')
@section('content')
    @if(!empty(Auth::user()->role==1))
        <div class="container">
            <div class="row">
                <div class="col-md-12 box-right">
                    <div class="row wrapper white-bg page-heading">
                        <div class="col-lg-12">
                            <h2>Quản lý phòng hát </h2>
                        </div>
                    </div>
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                   <div class="ibox-content row">
                                    <div class="col-md-9 logosellhide">
                                        <form method="POST" id="frmUpdateCart" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên hàng hóa</th>
                                                    <th style="width: 120px;">Số lượng</th>
                                                    <th>Đơn giá (VND)</th>
                                                    <th>Thành tiền (VND)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="shopping_cart">
                                                @if(!empty($product))
                                                    @foreach($product as $key => $items)
                                                    <tr>
                                                        <td>{!! $key+1 !!}</td>
                                                        <td><b>{!! !empty($items['title'])?$items['title']:'' !!}</b></td>
                                                        <td>
                                                        <?php $dem=0; ?>
                                                        @foreach(Cart::content() as $cart)
                                                            @if($cart->id == $items['id'])
                                                                <input type="number" min="0" class="form-control" value="{!! !empty($cart->qty)?$cart->qty:0 !!}" name="qty[{!! !empty($items['id'])?$items['id']:0 !!}]" style="width: 120px;">
                                                            <?php $dem++; ?>
                                                            @endif
                                                        @endforeach
                                                        <?php 
                                                            if($dem==0){
                                                        ?>
                                                            <input type="number" min="0" class="form-control" name="qty[{!! !empty($items['id'])?$items['id']:0 !!}]" style="width: 120px;">
                                                        <?php 
                                                            }
                                                        ?>
                                                        </td>
                                                        <td>{!! !empty($items['price'])?number_format($items['price'], 0):'' !!}</td>
                                                        <td>
                                                             <?php $dem=0; ?>
                                                                @foreach(Cart::content() as $cart)
                                                                    @if($cart->id == $items['id'])
                                                                        <?php $total = $cart->qty*$cart->price;  ?>
                                                                        {!! !empty($total)?number_format($total):'' !!}
                                                                    <?php $dem++; ?>
                                                                    @endif
                                                                @endforeach
                                                                <?php 
                                                                    if($dem==0){
                                                                ?>
                                                                    0
                                                                <?php 
                                                                    }
                                                                ?>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif

                                                <tr>
                                                    <td colspan="4" class="text-right"><b>Tổng tiền</b></td>
                                                    <td><b>
                                                        @if(!empty(Cart::content()))
                                                            {!! Cart::subtotal() !!}
                                                        @endif
                                                    </b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="clear"></div>
                                        <div class="inline-flex update-destroy">
                                               <div class="btnDestroy text-right"><a href="javascript:;"  class="btn btn-danger btnDestroyCart"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa toàn bộ</a></div>
                                                <div class="btnUpdate text-right"><button type="submit" class="btn btn-primary btnUpdateCart"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cập nhật</button></div>
                                        </div>
                                    </form>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="panel panel-default frame-payment">
                                            <div class="panel-heading"> 
                                                    <div class="panel-title">Thông tin thanh toán</div>
                                            </div>
                                            <div class="panel-body">
                                                <h2 style="font-size: 22px;">Thanh toán phòng hát <b>{!! !empty($data['room']['title'])?$data['room']['title']:'' !!}</b></h2>
                                               <div class="info-pay">
                                                   <div class="item">
                                                       <div class="title-pay"><b>Giờ vào :</b></div>
                                                       <div class="timeInput"><b>{!! !empty($data['startDate'])?date('H:i', strtotime($data['startDate'])):'' !!}</b></div>
                                                   </div>

                                                   <div class="item">
                                                       <div class="title-pay"><b>Giờ ra :</b></div>
                                                       <div class="timeInput"><b>{!! !empty($data['endDate'])?date('H:i', strtotime($data['endDate'])):'' !!}</b></div>
                                                   </div>

                                                   <div class="item">
                                                       <div class="title-pay"><b>Tổng số giờ hát :</b></div>
                                                       <div class="timeInput"><b>{!! !empty($data['totalTimeHour'])?$data['totalTimeHour']:'0' !!}h{!! !empty($data['totalTimeMin'])?$data['totalTimeMin']:'0' !!}</b></div>
                                                   </div>

                                                   <div class="item">
                                                       <div class="title-pay"><b>Giá phòng / h :</b></div>
                                                       <div class="timeInput"><b>{!! !empty($data['price'])?number_format($data['price'], 0):'0' !!}</b></div>
                                                   </div>

                                                     <div class="item">
                                                        <div class="title-pay"><b>Tổng tiền hát:</b></div>
                                                        <div class="total-pay"><span><b>{!! !empty($data['totalMoneySing'])?number_format($data['totalMoneySing'],0):0 !!}</b></span> VNĐ</div>
                                                    </div>

                                                   <div class="item">
                                                       <div class="title-pay"><b>Tổng tiền đồ ăn thức uống:</b></div>
                                                       <div class="total-pay"><span><b>{!! !empty(Cart::subtotal())?Cart::subtotal():'0' !!}</b></span> VNĐ</div>
                                                   </div>

                                                   <div class="item">
                                                       <div class="title-pay"><b>Tổng tiền :</b></div>


                                                       <div class="total-pay"><span style="padding: 6px 15px; background: #e84e40;color: #FFF; border-radius: 7px; margin-bottom: 10px">{!! number_format(Cart::subtotal(2,'.','') + $data['totalMoneySing']) !!}</span> VNĐ</div>
                                                   </div>

                                                     <div class="item hidden">
                                                        <div class="title-pay"><b>Tiền khách trả :</b></div>
                                                        <div class="total-pay"><input type="number" name="" class="form-control" placeholder="Tiền khách trả"></div>
                                                    </div>

                                                     <div class="item hidden">
                                                        <div class="title-pay"><b>Tiền thừa :</b></div>
                                                        <div class="total-pay">200.000 VNĐ</div>
                                                    </div>
                                               </div>
                                               <div class="payment-export">
                                                    <div class="export"><a id="{!! $data['id'] !!}" href="{!! route('payments.exportFile', ['id'=>$data['id']]) !!}" target="_blank" class="exportFile" >Xuất file</a></div>
                                                    <div class="payment-buy"><a id="{!! !empty($data['id'])?$data['id']:'0' !!}" href="javascript:;" class="paymentBuy" >Thanh toán</a></div>
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

        <!-- Modal add-->
        <div class="modal fade createProduct" id="createProduct" role="dialog">
            <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content">
                    <form id="frmUpdateUser" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm mới sản phẩm</h4>
                        </div>
                        <div class="modal-body row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="">Tên sản phẩm <span style="color: red">(*)</span></label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Tên sản phẩm">
                                </div>

                                <div class="form-group">
                                    <label for="">Giá tiền</label>
                                    <input type="text" name="price" id="address" class="form-control" placeholder="Giá tiền">
                                </div>

                                <div class="form-group">
                                    <label for="">Số lượng</label>
                                    <input type="number" name="qty" id="address" class="form-control" placeholder="Số lượng">
                                </div>

                                <div class="form-group">
                                    <label for="">Ảnh sản phẩm</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="avatar" id="imageUploadAdd" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUploadAdd"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreviewUpdate" style="background-image: url('public/uploads/user/anh-dai-dien.jpg');"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-default btnUpdateUser mb-0" id="btnUpdateUser"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @else
        {!! redirect()->route('login') !!}
    @endif
            <script>
                load_cart_data();
                function load_cart_data()
                {
                    var url = "<?php echo url('/') ?>/admin/shoppingcarts/load_cart_data";
                    $.ajax({
                        url:url,
                        method:"POST",
                        type: "POST",
                        success:function(data)
                        {
                            console.log(data);
                            $('#shopping_cart').html(data);
                        }
                    });
                }

                // Thực hiện thanh toán ( bước cuối ): 
                $(".paymentBuy").click(function () {
                    var id = $(this).attr('id');
                    Lobibox.confirm({
                        msg: "Bạn có chắc chẵn muốn thanh toán không ?",
                        title: "Câu hỏi",
                        callback: function ($this, type) {
                            if (type === 'yes') {
                                var url = "<?php echo url('/') ?>/admin/payments/payment-buy-now/"+id;
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
                                       // return false;
                                        if(data['message']=='success'){
                                             Lobibox.notify('success', {

                                                title: 'Thành công',
                                                msg: 'Thanh toán thành công',
                                                delay: 1500
                                            });
                                            setTimeout(function(){
                                                location = "{!! route('users.singingRoom') !!}";
                                            },1500);
                                        }
                                        else {
                                            Lobibox.notify('error', {

                                                title: 'Thông báo',
                                                msg: 'Thanh toán thất bại',
                                                delay: 1500
                                            });
                                        }
                                    }
                                });
                            }
                        }
                    });
                });

                $(".addToCart").click(function () {
                    var id = $(this).attr('id');
                    Lobibox.confirm({
                        msg: "Bạn có chắc chẵn muốn thêm sản phẩm vào giỏ hàng ?",
                        title: "Câu hỏi",
                        callback: function ($this, type) {
                            if (type === 'yes') {
                                var url = "<?php echo url('/') ?>/admin/shoppingcarts/add-to-cart/"+id;
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
                                       // return false;
                                        if(data['message']=='error'){
                                            Lobibox.notify('error', {
                                                title: 'Có lỗi',
                                                msg: 'Thêm sản phẩm vào giỏ hàng thất bại'
                                            });
                                        }
                                        else {
                                            Lobibox.notify('success', {

                                                title: 'Thành công',
                                                msg: 'Thêm sản phẩm vào giỏ hàng thành công',
                                                delay: 1000
                                            });
                                            setTimeout(function(){
                                                location.reload();
                                            },1000);
                                        }
                                    }
                                });
                            }
                        }
                    });
                });

                $(".removeCart").click(function () {
                    var id = $(this).attr('id');
                    var url = "<?php echo url('/') ?>/admin/shoppingcarts/remove-cart/"+id;
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
                            if(data['message']=='error'){
                                Lobibox.notify('success', {
                                    title: 'Thành công',
                                    msg: 'Xóa sản phẩm ra khỏi giỏ hàng thành công',
                                    delay: 1500
                                });
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                            }
                            else {
                                Lobibox.notify('error', {
                                    title: 'Thất bại',
                                    msg: 'Xóa sản phẩm ra khỏi giỏ hàng thất bại',
                                    delay: 1500
                                });
                            }
                        }
                    });
                });

                // Cập nhật sản phẩm cần thanh toán
        {{--$(".btnUpdateCart").click(function () {--}}
            {{--var url = "{!! route('shoppingcarts.updateCart') !!}";--}}
                        {{--$.ajax({--}}
                            {{--url: url,--}}
                            {{--type: 'POST',--}}
                            {{--dataType: 'json',--}}
                            {{--data: new FormData(document.getElementById("frmUpdateCart")),--}}
                            {{--contentType: false,--}}
                            {{--processData: false,--}}
                            {{--enctype: 'multipart/form-data',--}}
                            {{--cache:false,--}}
                            {{--success: function (data, textStatus, xhr) {--}}
                                {{--console.log(data);--}}
                                {{--if(data['message']=='success'){--}}
                                    {{--Lobibox.notify('success', {--}}
                                        {{--title: 'Thành công',--}}
                                        {{--msg: 'Cập nhật thành công',--}}
                                        {{--delay: 2000--}}
                                    {{--});--}}
                                    {{--setTimeout(function(){--}}
                                        {{--location.reload();--}}
                                    {{--},2000);--}}
                                {{--}--}}
                                {{--else {--}}
                                    {{--Lobibox.notify('error', {--}}
                                        {{--title: 'Có lỗi',--}}
                                        {{--msg: 'Cập nhật thất bại'--}}
                                    {{--});--}}
                                {{--}--}}
                            {{--}--}}
                        {{--});--}}
        {{--});--}}


                $(document).on('submit', '#frmUpdateCart', function(event) {
                    event.preventDefault();
                    var url = "{!! route('shoppingcarts.updateCart') !!}";
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: new FormData(document.getElementById("frmUpdateCart")),
                        contentType: false,
                        processData: false,
                        enctype: 'multipart/form-data',
                        cache:false,
                        success: function (data, textStatus, xhr) {
                            console.log(data);
                            if(data['message']=='success'){
                                Lobibox.notify('success', {
                                    title: 'Thành công',
                                    msg: 'Cập nhật thành công',
                                    delay: 2000
                                });
                                setTimeout(function(){
                                    location.reload();
                                },2000);
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

                $(".updateRorIdCart").click(function () {
                    var id = $(this).attr('id');
                    var url = "<?php echo url('/') ?>/admin/shoppingcarts/update-cart/"+id;
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
                            if(data['message']=='error'){
                                Lobibox.notify('success', {
                                    title: 'Thành công',
                                    msg: 'Cập nhật giỏ hàng thành công',
                                    delay: 1500
                                });
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                            }
                            else {
                                Lobibox.notify('error', {
                                    title: 'Thất bại',
                                    msg: 'Cập nhật giỏ hàng thất bại',
                                    delay: 1500
                                });
                            }
                        }
                    });
                });


                $(".btnDestroyCart").click(function(){
                    var url = "{!! route('shoppingcarts.destroyCart') !!}";
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        enctype: 'multipart/form-data',
                        cache:false,
                        success: function (data, textStatus, xhr) {
                            console.log(data);
                            if(data['message']=='success'){
                                Lobibox.notify('success', {
                                    title: 'Thành công',
                                    msg: 'Xóa tất cả thành công',
                                    delay: 1500
                                });
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                            }
                            else {
                                Lobibox.notify('error', {
                                    title: 'Thất bại',
                                    msg: 'Xóa thất bại',
                                    delay: 1500
                                });
                            }
                        }
                    });
                });

            </script>

    <style type="text/css">
        @media (max-width: 768px){
            .list-product .panel-default{
                border: 0;
            }
            .list-product .panel-body {
                padding-left: 0;
                padding-right: 0;
            }
        }
        .update-destroy {
            display: inline-flex;
            float: right;
        }
        .update-destroy>div{
            margin: 0 10px;
        }
        .list-product {
            border-radius: 0;
            overflow: hidden;
            position: relative;
            width: 100%;
        }
         .list-product .panel-heading {
            background: none;
         }
          .list-product .panel-heading .panel-title {
            font-weight: 700;
            color: #333;
          }
        .item-product {
            overflow: hidden;
            border-radius: 10px;
            position: relative;
            margin-bottom: 15px;
        }
        .title-product {
                  position: absolute;
                bottom: 0;
                padding: 10px;
                text-align: center;
                width: 100%;
                background: #094c6fa3;
                color: #FFF;
                text-transform: uppercase;
                text-shadow: 1px 1px #3a7298;
                font-weight: 700;
        }
        .price-product {
                position: absolute;
                top: 0;
                right: 0;
                padding: 5px 10px;
                background: #e84e40ad;
                color: #FFF;
                font-weight: 700;
                border-radius: 26px;
        }
        .item-img img{
            height: 150px;
            width: 100%;
            object-fit: cover;
        }
        .payment-export {
            display: inline-flex;
            justify-content: space-between;
            width: 100%;
            margin: 15px 0;
        }
        .payment-export{
            margin: 30px 0;
        }
        .payment-export .export a{
            padding: 15px 15px;
            background: #ffc107;
            color: #FFF;
            border-radius: 7px;
        }
        .payment-buy a{
            background: #e84e40;
            color: #FFF;
             border-radius: 7px;
        }
        @media (min-width: 768px){
            .payment-buy a {
                padding: 15px 80px;
            }
        }
        @media (max-width: 768px){
            .payment-buy a {
                padding: 15px;
            }
        }
        .info-pay .item{
            display: inline-flex;
            justify-content: space-between;
            width: 100%;
            border-bottom: 1px solid #F1F1F1;
            padding: 8px 0;
        }
        .logosellhide {
            background: #f0f8ff;
            /*height: calc(100vh);*/
        }
        .frame-payment {
            background: none;
            border-radius: 0;
            border: 0;
            box-shadow: none;
        }
        .frame-payment .panel-heading {
            background: none;
            border: 0;
        }
        .frame-payment .panel-heading .panel-title {
            font-weight: 700;
        }

    </style>
@endsection