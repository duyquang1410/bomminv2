@extends('layout.master')
@section('content')
<div class="timekeeping">
    <div class="container">
        <div id="clockDiv"></div>
        <div class="fullname-pagehome">Xin chào bạn : <b>{!! Auth::user()->fullname !!}</b></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Thực hiện chấm công theo giờ làm việc</div>
                </div>
                <div class="panel-body">
                    <form id="frmCreateTimekeeping" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                       <div class="form-group">
                           <select name="service_id" id="service_id" class="form-control">
                                @if(!empty($service))
                                    @foreach($service as $items)
                                       <option value="{!! !empty($items['id'])?$items['id']:0 !!}">{!! !empty($items['name'])?$items['name']:'' !!}</option>
                                    @endforeach
                               @endif
                           </select>
                       </div>
                        <div class="form-group">
                            <input type="text" name="address_cv" id="address_cv" class="form-control" placeholder="Địa chỉ quán làm">
                        </div>

                        <a class="btn btn-default" id="btnCheckin">Chấm công</a>
                    </form>
                </div>
            </div>
    </div>
</div>
<style>
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
    $("#btnCheckin").click(function(){
            Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn check in không ?",
                callback: function ($this, type) {
                    if (type === 'yes') {
                          var url = "{!! route('users.checkin') !!}";
                          $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            data: new FormData(document.getElementById("frmCreateTimekeeping")),
                            contentType: false,
                            processData: false,
                            enctype: 'multipart/form-data',
                            cache:false,
                            success: function (data, textStatus, xhr) {
                            if(data['message']=='success'){
                                Lobibox.notify('success', {
                                    title: 'Thành công',
                                    msg: 'Check in thành công',
                                    delay: 2000
                                    });
                                    setTimeout(function(){
                                    location.reload();
                                    },2000);
                                }
                            else {
                                Lobibox.notify('error', {
                                    title: 'Có lỗi',
                                        msg: 'Check in Thất bại'
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