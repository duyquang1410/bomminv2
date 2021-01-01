<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta property="og:image" content="{!! URL::asset('public/uploads/site/article_2686.jpg') !!}"/>
    <meta property="og:type" content="blog" />
    <meta property="og:site_name" content="{!! url('/') !!}" /> 
    <meta property="og:title" content="Phần mềm quản lý chấm công nhân viên - Công ty Bom min (Karaoke)" />
    <meta property="og:description" content="" />
    <title>Phần mềm quản lý chấm công nhân viên - Công ty Bom min (Karaoke)</title>

    <link href="{!! URL::asset('public/cms') !!}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="{!! URL::asset('public/cms') !!}/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/css/animate.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/css/style.css" rel="stylesheet">
    <link href="{!! URL::asset('public/cms') !!}/css/scss/style.css" rel="stylesheet">
    <!-- File upload -->
    <link rel="stylesheet" href="{!! URL::asset('public/cms') !!}/lobibox/dist/css/lobibox.min.css"/>
    <link rel="stylesheet" href="{!! URL::asset('public/cms') !!}/lobibox/demo/demo.css"/>

    <script src="{!! URL::asset('public/cms') !!}/js/jquery-2.1.1.js"></script>
   {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    <script src="{!! URL::asset('public/cms') !!}/js/bootstrap.min.js"></script>
    <script src="{!! URL::asset('public/cms/lobibox/js/') !!}/lobibox.js" type="text/javascript"></script>
    <script src="{!! URL::asset('public/cms/lobibox/') !!}/demo/demo.js"></script>
    <!-- Load Thư viện jQuery vào trước khi load jQuery Validate-->

    <script type="text/javascript" src="{!! URL::asset('public/cms/js/jquery.validate.min.js') !!}"></script>
</head>
<body>
<div id="menuApp" class="head-menu-mobile">
    <div class="list-box">
        <div class=""><a href="javascript:;" onclick="window.history.back();"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>
        <div class="title"><a href="">Phần mềm Quản lý Nhân viên</a></div>
        <div class="notification hidden">
            <div><a href=""><i class="fa fa-bell-o" aria-hidden="true"></i></a></div>
            <div class="number"><a href="">0</a></div>
        </div>
        <div class="avatar-header">
            @if(empty(Auth::user()->id))
                <img src="{!! URL::asset('public/uploads/user/icon1.png') !!}">
            @else
                <img src="{!! URL::asset('public/uploads/user/'.Auth::user()->avatar) !!}">
            @endif
        </div>
    </div>
</div>

<style type="text/css">
    .avatar-header img{
        width: 42px;
        height: 42px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #FFF;
    }
    .head-menu-mobile {
        background: #0090da;
        color: #FFF;
    }
    .notification {
        position: relative;
    }
    .notification .number{
        background: #99c85e;
        position: absolute;
        display: inline-block;
        line-height: normal;
        width: 20px;
        height: 20px;
        text-align: center;
        top: 0;
        right: -5px;
        border-radius: 50%;
        font-size: 14px;
    }

    .head-menu-mobile.has-fix-menu-default-type {
               background: #0090da;
                position: fixed;
                width: 100%;
                top: 0;
                left: 0;
                right: 0;
                z-index: 100;
    }
    .head-menu-mobile .list-box {
          display: inline-flex;
        width: 100%;
        justify-content: unset;
        height: 45px;
        color: #FFF;
        line-height: 45px;
        padding: 0 10px;
        font-size: 16px;
    }
    .head-menu-mobile .list-box a {
        color: #FFF;
        text-decoration: none;
    }
    .title {
        font-size: 16px;
        text-transform: uppercase;
        margin: auto;
    }
    .has-fix-menu-default-type {
          box-shadow: 1px 1px 10px rgba(0,0,0,0.15);
          animation: stuckMoveDown .6s;
          -webkit-transition: all .6s ease-in-out;
    }
   @keyframes stuckMoveDown {
     0% {
         transform: translateY(-100%);
    }
     100% {
         transform: translateY(0);
    }
}
</style>