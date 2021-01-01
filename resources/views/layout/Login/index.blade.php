<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hệ thống học tập trực tuyến Study</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="{!! URL::asset('cms/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! URL::asset('cms/font-awesome/css/font-awesome.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{!! URL::asset('layout/css/style.css') !!}">

  <link rel="stylesheet" href="{!! URL::asset('cms') !!}/lobibox/dist/css/Lobibox.min.css"/>
  <link rel="stylesheet" href="{!! URL::asset('cms') !!}/lobibox/demo/demo.css"/>
  <script src="{!! URL::asset('cms/js/jquery.min.js') !!}"></script>
  <script src="{!! URL::asset('cms/lobibox/js/lobibox.js') !!}" type="text/javascript"></script>
  <script src="{!! URL::asset('cms/lobibox/demo/demo.js') !!}"></script>

   <!-- Load Thư viện jQuery vào trước khi load jQuery Validate-->
    <script type="text/javascript" src="{!! URL::asset('cms/js/jquery.validate.min.js') !!}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .login{
                background: #33333391;
        }
        .login h3{
            text-align: center;
            color: #fff;
            margin-bottom: 40px;
        }
        .login input.form-control{
            border-radius: 0;
            height: 40px;
            background: #f1f1f1;
            padding-left: 40px
        }

        .login .form-group{
            position: relative;
            margin-bottom: 10px !important;
        }
        i.fa-user{
               position: absolute;
                height: 40px;
                line-height: 40px;
                left: 0;
                width: 30px;
                text-align: center;
                background: #F1F1F1;
        }
        i.fa-unlock-alt{
                position: absolute;
                height: 40px;
                line-height: 40px;
                left: 0;
                width: 30px;
                text-align: center;
                background: #F1F1F1;
        }

        .text-pass {
               width: 100%;
                justify-content: space-between;
                display: inline-flex;
                padding: 10px 0;
                margin-bottom: 20px;
                color: #FFF;
        }
        .text-pass li{
            list-style: none;
        }
        a.btn-default{
            height: 40px;
            border-radius: 0;
            background: #00aeed;
            border: 0;
            color: #FFF;
        }
        a.btn-default:hover {
            background: #00aeed;
            color: #FFF;
        }
    </style>
</head>
<body>
    <div class="frame-user-login">
        <div class="container">
            <div class="formLogin row">
                <div class="col-md-7">
                    <h1>Phần mềm quản lý chấm công & tiền lương Nhân viên </h1>
                </div>
                <div class="col-md-5">
                    <div class="logo"><img src="{!! URL::asset('/uploads/icon/edu4.png') !!}" alt=""></div>
                    <div class="login">
                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Học viên</a></li>
                              <li><a data-toggle="tab" href="#menu1">Giảng viên</a></li>
                            </ul>

                            <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                 <h3>Học viên - Đăng nhập hệ thống</h3>
                                 <form id="formLoginStudent" method="POST">
                                    {!! csrf_field() !!}
                                    <div class="form-group" style="margin-bottom: 0">
                                        <span><i class="fa fa-user" aria-hidden="true"></i><input type="text" name="username" value="quanghs" placeholder="Tên đăng nhập" class="form-control user"> </span>
                                    </div>

                                    <div class="form-group">
                                        <span><i class="fa fa-unlock-alt" aria-hidden="true"></i><input type="password" name="password" value="admin123" placeholder="Mật khẩu" class="form-control pass"></span>
                                    </div>

                                    <div class="text-pass">
                                        <li><span><input type="checkbox"> Ghi nhớ mật khẩu</span></li>
                                        <li><span><a href="">Quên mật khẩu</a></span></li>
                                    </div>

                                    <a class="btn btn-default btnLoginStudent" id="btnLoginStudent" style="width: 100%">Đăng nhập</a>
                                </form>
                              </div>
                              <div id="menu1" class="tab-pane fade">
                                <h3>Giáo viên - Đăng nhập hệ thống</h3>
                                 <form id="formLogin" method="POST">
                                    {!! csrf_field() !!}
                                    <div class="form-group" style="margin-bottom: 0">
                                        <span><i class="fa fa-user" aria-hidden="true"></i><input type="text" name="username" value="gvedutech" placeholder="Tên đăng nhập" class="form-control user"> </span>
                                    </div>

                                    <div class="form-group">
                                        <span><i class="fa fa-unlock-alt" aria-hidden="true"></i><input type="password" name="password" value="admin123" placeholder="Mật khẩu" class="form-control pass"></span>
                                    </div>

                                    <div class="text-pass">
                                        <li><span><input type="checkbox"> Ghi nhớ mật khẩu</span></li>
                                        <li><span><a href="">Quên mật khẩu</a></span></li>
                                    </div>

                                    <a class="btn btn-default btnLogin" id="btnLogin" style="width: 100%">Đăng nhập</a>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            //  chức năng login giao vien
            $("#btnLogin").click(function(){
                var url = "{!! route('login') !!}"; 
                var data = new FormData(document.getElementById("formLogin"));
                     $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            data: data,
                            contentType: false,
                            processData: false,
                            enctype: 'multipart/form-data',
                            cache:false,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                     Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Đăng nhập thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        window.location.href = "{!! route('dashbroad.index') !!}";
                                    },1500);
                                }
                                else if(data['message'] == 'warning'){
                                    if(data['msg_user']!=0){
                                        data['msg_user'] = data['msg_user']+"<br>";
                                    }
                                    else {
                                       data['msg_user']= '';
                                    }

                                    if(data['msg_pass']!=0){
                                        data['msg_pass'] = data['msg_pass']+"<br>";
                                    }
                                    else {
                                       data['msg_pass']= '';
                                    }
                                    Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: data['msg_user']+data['msg_pass']
                                  });
                                }
                                else {
                                     Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Đăng nhập Thất bại, hoặc tài khoản chưa được phê duyệt'
                                    });
                                }
                            }
                    });
                });
        
    </script>
</body>
</html>
