@extends('layout.master')
@section('content')
<div class="timekeeping">
    <div class="container">
        <div id="clockDiv"></div>
        <div class="fullname-pagehome">Xin chào bạn : <b>{!! Auth::user()->fullname !!}</b></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text"><h3>Bạn đã chấm công <span style="color: green; font-weight: 700">( check in )</span> lúc <b>{!! date('H:i', strtotime($timeKeeping[0]['checkin'])) !!}</b> ngày <b>
                        {!! date('d-m-Y', strtotime($timeKeeping[0]['checkin'])) !!}
                    </b></h3></div>
                    <div class="text"><h4>Bạn hãy check out nếu hoàn thành công việc :</h4></div>
                    <div class="btnCheckOut"><a href="javascript:;" id="{!! !empty($timeKeeping[0]['id'])?$timeKeeping[0]['id']:0 !!}" class="btncheckOut" title="">Check out</a></div>
                </div>
            </div>
    </div>
</div>
<style>
    .timekeeping .text{
        color: #333;
    }
    .timekeeping h3{
        line-height: 1.4;
    }
    .btnCheckOut {
        text-align:center;
        margin-top: 30px;
    }
    .btnCheckOut a{
        text-align: center;
        background: #a94442;
        padding: 10px 30px;
        color: #FFF;
        border-radius: 26px;
    }
    .fullname-pagehome {
        color: #333;
        font-size: 14px;
    }
    .timekeeping .panel-default{
        background: none;
        border: 0;
        border-radius: 0;
        box-shadow: none;

    }
    .timekeeping .panel-default .panel-heading {
        border: 0;
        background: none;
        padding: 20px 0;
    }
    .timekeeping .panel-default .panel-heading .panel-title {
        text-align: center;
        font-size: 18px;
        font-weight: 700;
    }
    .timekeeping .panel-default .panel-body {
        padding-left: 0;
        padding-right: 0;
    }
    .timekeeping .form-control {
        height: 40px;
        border-radius: 26px;
    }
    a.btn-default{
        height: 40px;
        border-radius: 26px;
        width: 100%;
        display: inline-block;
        background: #0090da;
        color: #FFF;
        border: 0;
        box-shadow: 0 3px 2px rgba(0,0,0,.3);
    }
    a.btn-default a {
        color: #333;
        text-align: center;
    }
    #clockDiv{
            font-size: 13px;
            font-weight: 700;
            margin: 10px 0;
            color: #333;
    }
</style>
<script>
    var myVar=setInterval(function(){Clock()},1000);
    function Clock() {
    a=new Date();
    w=Array("Chủ Nhật","Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy");
    var a=w[a.getDay()],
    w=new Date,
    d=w.getDate();
    m=w.getMonth()+1;
    y=w.getFullYear();
    h=w.getHours();
    mi=w.getMinutes();
    se=w.getSeconds();
    if(10>d){d="0"+d}
    if(10>m){m="0"+m}
    if(10>h){h="0"+h}
    if(10>mi){mi="0"+mi}
    if(10>se){se="0"+se}
    document.getElementById("clockDiv").innerHTML="Hôm nay: "+a+", "+d+" / "+m+" / "+y+" - "+h+":"+mi+":"+se+"";
    }
    $(".btncheckOut").click(function(){
        var id = $(this).attr('id');
                Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn check out không ?",
                callback: function ($this, type) {
                    if (type === 'yes') {
                     var url = "<?php echo url('/') ?>/check-out/"+id;
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
                                        msg: 'Checkout thành công',
                                        delay: 2000
                                        });
                                        setTimeout(function(){
                                        location.reload();
                                        },2000);
                                    }
                                else {
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                            msg: 'Checkout thất bại'
                                            });
                                        }
                                    }
                            });
                    }
                }
            });
    });
</script>
@endsection