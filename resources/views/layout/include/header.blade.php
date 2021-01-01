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
    @toastr_css
    <!-- File upload -->
    <link href="{!! URL::asset('public/cms/uploadImg') !!}/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{!! URL::asset('public/cms/uploadImg') !!}/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{!! URL::asset('public/cms') !!}/lobibox/dist/css/lobibox.min.css"/>
    <link rel="stylesheet" href="{!! URL::asset('public/cms') !!}/lobibox/demo/demo.css"/>



    <script src="{!! URL::asset('public/cms') !!}/js/jquery-2.1.1.js"></script>
   {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    <script src="{!! URL::asset('public/cms') !!}/js/bootstrap.min.js"></script>
    <script src="{!! URL::asset('public/cms/lobibox/js/') !!}/lobibox.js" type="text/javascript"></script>
    <script src="{!! URL::asset('public/cms/lobibox/') !!}/demo/demo.js"></script>
    <!-- Load Thư viện jQuery vào trước khi load jQuery Validate-->

    <script type="text/javascript" src="{!! URL::asset('public/cms/js/jquery.validate.min.js') !!}"></script>

    <style>
        @if(!isMobile())
        body {
                background: #FFF
        }
        .detail-salary {
               margin-bottom: 80px !important;
        }
        .logoTop li a{
            font-size: 16px !important;
        }
        @endif
        @media (max-width: 768px){
             .head-top .logoTop{
                display: none;
            }
        }
         @media (min-width: 769px){


            .head-menu .logoTop{
                display: none;
            }
         }
    </style>
</head>
<body>
<div class="head-top">
        <div class="col-md-12">
            <div class="row">
                @if(!isMobile())
                <div class="col-md-6 col-xs-12">
                    <div class="logoTop box-title-soft">
                        <a href="{!! route('dashbroads.user') !!}"><?php if(!isMobile()){ echo "Phần mềm quản lý Chấm công & Tiền lương Nhân viên"; }else { echo "Phần mềm quản lý Nhân viên"; } ?></a>
                    </div>
                </div>
                @endif
                    <div class="col-md-6 col-xs-12">
                         <div class="box-nav-right">
                                 <ul class="">
                                        <li class="logout"><a href="{!! route('logout') !!}">Đăng xuất <i class="fa fa-sign-out" aria-hidden="true"></i> </a></li>
                                        @if(!isMobile())
                                        <li class=""><a href="javascript:;">Hướng dẫn sử dụng <i class="fa fa-file-text-o" aria-hidden="true"></i></a></li>
                                        @endif
                                        <li class="userLogin">
                                                        <a href="{!! route('users.infoAccount') !!}"> {!! Auth::user()->fullname !!} @if(!empty(Auth::user()->avatar))<img width="40px" height="40px" style="object-fit: cover; border-radius: 50%" src="{!! URL::asset('public/uploads/user/'.Auth::user()->avatar) !!}" alt=""> @else <img width="40px" height="40px" style="object-fit: cover; border-radius: 50%" src="{!! URL::asset('/uploads/user/icon1.png') !!}" alt="">  @endif</a>
                                            <ul class="sub-menu hidden">
                                                <li><a href="">Tài khoản <i class="fa fa-user" aria-hidden="true"></i> </a></li>
                                                <li><a href="">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                </ul>
                        </div>
                    </div>
            </div>
        </div>
</div>
<div class="clearfix"></div>
<div id="menu" class="head-menu">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <div class="logoTop">
                   <a href="{!! route('dashbroads.user') !!}"><?php if(!isMobile()){ echo "Phần mềm quản lý Chấm công & Tiền lương Nhân viên"; }else { echo "Phần mềm quản lý Nhân viên"; } ?></a>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                   @if(!empty(Auth::user()->role==1))
                   <li class="active "><a href="{!! route('dashbroad.index') !!}"> <i class="fa fa-eye" aria-hidden="true"></i> Tổng quan & Thống kê</a></li>
                    <li><a href="{!! route('users.index') !!}"><i class="fa fa-users" aria-hidden="true"></i> Nhân viên</a></li>
                    <li class=""><a href="{!! route('users.adminListTimekeepingMonth') !!}"> <i class="fa fa-users" aria-hidden="true"></i> Quản lý Chấm công <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="{!! route('users.adminListTimekeepingMonth') !!}">Tháng hiện tại</a></li>
                            <li><a href="{!! route('users.adminAllTimekeeping') !!}">Tất cả</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="{!! route('users.adminListSalary', ['month'=>date('m'), 'year'=>date('Y')]) !!}"> <i class="fa fa-credit-card-alt" aria-hidden="true"></i> Quản lý tiền lương</a></li>
                    <li class=""><a href="{!! route('users.adminListSuggestMoney') !!}"> <i class="fa fa-money" aria-hidden="true"></i> Quản lý tạm ứng</a></li>
                    <li class=""><a href="{!! route('services.index') !!}"> <i class="fa fa-exchange" aria-hidden="true"></i> Dịch vụ</a></li>
                    <li><a href="{!! route('statisticals.listRevenue', ['month'=>date('m'), 'year'=>date('Y')]) !!}"> <i class="fa fa-exchange" aria-hidden="true"></i> Thống kê</a></li>
                    <li class="hidden"><a href="{!! route('users.singingRoom') !!}"><i class="fa fa-users" aria-hidden="true"></i> Quản lý phòng hát</a></li>
                    <li class="hidden"><a href="{!! route('statisticals.index') !!}"><i class="fa fa-tachometer" aria-hidden="true"></i> Thống kê</a></li>
                       @else

                        <li><a href="{!! route('dashbroads.user') !!}"> <i class="fa fa-exchange" aria-hidden="true"></i> Tổng quan</a></li>
                       <li><a href="{!! route('users.listUserTimeKeeping', ['month'=>date('m'), 'year'=>date('Y')]) !!}"> <i class="fa fa-exchange" aria-hidden="true"></i> Quản lý Chấm công</a></li>
                       <li><a href="{!! route('users.listSalary') !!}"> <i class="fa fa-exchange" aria-hidden="true"></i> Bảng lương</a></li>
                       <li><a href="{!! route('users.listSuggestMoney') !!}"> <i class="fa fa-exchange" aria-hidden="true"></i> Tạm ứng</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right hidden">
                    <li class=""><a href="./">Facebook<span class="sr-only"></span></a></li>
                    <li class=""><a href="./">Zalo<span class="sr-only"></span></a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</div>
