<html>
<head></head>
<body onload="window.print();">
<div class="print-button">
   <span class="print-button__content  js__action--print">
      <div id="page" class="page">
         <div class="header">
            <div class="phone">ĐT: 0963806102</div>
            <div class="company">Quán Karaoke FlyHourse</div>
         </div>
         <br/>
         <div class="title">
            HÓA ĐƠN THANH TOÁN PHÒNG {!! !empty($data['room_id'])?$data['room_id']:'' !!}
            <br/>
            -------oOo-------
         </div>
         <br/>
         <div class="listTime">
             <div class="itemtime">
                 <li>Giờ vào :</li>
                 <li>{!! !empty($data['startDate'])?date('H:i d/m/Y', strtotime($data['startDate'])):'' !!}</li>
             </div>
             <div class="itemtime">
                 <li>Giờ ra : </li>
                 <li>{!! !empty($data['endDate'])?date('H:i d/m/Y', strtotime($data['endDate'])):'' !!}</li>
             </div>
             <div class="itemtime">
                 <li>Thời gian :</li>
                 <li>{!! !empty($data['totalTimeHour'])?$data['totalTimeHour']:'0' !!} giờ {!! !empty($data['totalTimeMin'])?$data['totalTimeMin']:'0' !!} phút</li>
             </div>
             <div class="itemtime">
                 <li>Tiền giờ :</li>
                  <li> {!! !empty($data['price'])?number_format($data['price'], 0):'' !!} đ/ giờ </li>
             </div>
         </div>
         <table class="TableData">
            <thead>
               <tr>
               <tr>
                  <th>STT</th>
                  <th>Tên </th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>
                  <th>Thành tiền</th>
               </tr>
            </thead>
            <tbody>
                   @if(!empty(Cart::content()))
                       <?php $dem = 1; ?>
                   @foreach(Cart::content() as $cart)
                       <tr>
                            <td>{!! $dem !!}</td>
                            <td>{!! !empty($cart->name)?$cart->name:'' !!}</td>
                            <td>{!! !empty($cart->qty)?$cart->qty:'' !!}</td>
                            <td>{!! !empty($cart->price)?$cart->price:'' !!}</td>
                            <td>{!! number_format($cart->qty*$cart->price, 0) !!} </td>
                        </tr>
                       <?php $dem++; ?>
                       @endforeach
                   @endif
            </tbody>
         </table>
            <div class="box-payment">
                   <div class="item-payment">
                       <li>Tổng tiền đồ ăn, thức uống</li>
                       <li>{!! Cart::subtotal() !!}</li>
                   </div>
                    <div class="item-payment">
                       <li>Tổng tiền giờ hát</li>
                       <li>{!! !empty($data['totalMoneySing'])?number_format($data['totalMoneySing'],0):'' !!}</li>
                   </div>

                    <div class="item-payment payment-total">
                       <li>Tổng hóa đơn</li>
                       <li><b>{!! number_format(Cart::subtotal(2,'.','') + $data['totalMoneySing'], 0) !!} VND</b></li>
                   </div>
            </div>
         <div class="footer-right"> Thái Nguyên, {!! date('d') !!}/{!! date('m') !!}/{!! date('Y') !!}<br/>
            Người tạo
            <br>
            {!! Auth::user()->fullname !!}
         </div>
            <div class="clearfix"></div>
          <div class="box-thanks"><span class="text-center">Xin cảm ơn và hẹn gặp lại quý khách</span></div>
      </div>
   </span>
</div>

<style>
    .header {
        display: inline-flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 20px;
    }
    .header .phone {
        font-size: 14px;
    }
    .box-thanks {
        display: inline-block;
        text-align: center;
        width: 100%;
        margin: 20px 0;
        border-top: 1px solid #f1f1f1;
        padding: 10px 0;
    }
        .box-thanks span{
            text-align: center;
            font-size: 14px;
            font-weight: 700;
        }
    .listTime  .itemtime{
        display: inline-flex;
        justify-content: space-between;
        width: 100%;
        padding: 2px 0;
    }
    .listTime  .itemtime li{
        list-style-type: none;
    }
    .box-payment{
        margin: 5px 0;
    }
    .box-payment .item-payment{
        display: inline-flex;
        justify-content: space-between;
        width: 100%;
        padding: 2px 0;
    }
    .box-payment .item-payment li{
        list-style-type: none;
    }
    .page {
        width: 80mm;
        overflow:hidden;
        min-height:297mm;
        padding: 20px;
        margin-left:auto;
        margin-right:auto;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
    }
    button {
        width:100px;
        height: 24px;
    }
    .header {
        overflow:hidden;
    }
    .logo {
        background-color:#FFFFFF;
        text-align:left;
        float:left;
    }
    .company {
        background-color:#FFFFFF;
        text-align:right;
        float:right;
        font-size:13px;
    }
    .title {
        text-align:center;
        position:relative;
        color:#0000FF;
        font-size: 16px;
        top:1px;
    }
    .footer-left {
        text-align:center;
        text-transform:uppercase;
        padding-top:24px;
        position:relative;
        height: 150px;
        width:50%;
        color:#000;
        float:left;
        font-size: 12px;
        bottom:1px;
    }
    .footer-right {
        text-align:right;
        padding-top:24px;
        position:relative;
        width:100%;
        color:#000;
        font-size: 11px;
        float:right;
        bottom:1px;
    }
    .TableData {
        background:#ffffff;
        font: 11px;
        width:100%;
        border-collapse:collapse;
        font-family:Verdana, Arial, Helvetica, sans-serif;
        font-size:12px;
        border:thin solid #d3d3d3;
    }
    .TableData TH {
        background: rgba(0,0,255,0.1);
        text-align: center;
        font-weight: bold;
        color: #000;
        border: solid 1px #ccc;
        height: 20px;
        font-size: 11px
    }
    .TableData TR {
        height: 24px;
        border:thin solid #d3d3d3;
    }
    .TableData TR TD {
        padding-right: 2px;
        padding-left: 2px;
        border:thin solid #d3d3d3;
        font-size: 11px;
    }
    .TableData TR:hover {
        background: rgba(0,0,0,0.05);
    }
    .TableData .cotSTT {
        text-align:center;
        width: 10%;
    }
    .TableData .cotTenSanPham {
        text-align:left;
        width: 40%;
    }
    .TableData .cotHangSanXuat {
        text-align:left;
        width: 20%;
    }
    .TableData .cotGia {
        text-align:right;
        width: 120px;
    }
    .TableData .cotSoLuong {
        text-align: center;
        width: 50px;
    }
    .TableData .cotSo {
        text-align: right;
        width: 120px;
    }
    .TableData .tong {
        text-align: right;
        font-weight:bold;
        text-transform:uppercase;
        padding-right: 4px;
    }
    .TableData .cotSoLuong input {
        text-align: center;
    }
    .listTime {

    }
    .listTime li{
        text-decoration: none;
        list-style: none;
        padding-right: 20px;
        font-size: 12px;
    }

</style>
<script>
    // $('.js__action--print').click(function() {
    //     window.print();
    //     return false;
    // });
</script>
</body>
</html>


