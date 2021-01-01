@extends('layout.master')
@section('content')
@if(!empty(Auth::user()->role==1))
@if(!isMobile())
    <div class="container">
        <div class="row">
            <div class="col-md-12 box-right">
                <div class="row wrapper white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Nhân viên</h2>
                    </div>
                    <div class="col-lg-2">
                        <h2 class="text-right"><a  href="javascript:;" data-toggle="modal" data-target="#createUser" class="btn btn-w-m btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                Thêm mới</a>
                        </h2>
                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="thaotac">
                                            <div class="col-sm-2 m-b-xs">
                                                <select name="selectitem" class="input-sm form-control input-s-sm inline">
                                                    <option value="0">Chọn tác vụ</option>
                                                    <option value="1">Nổi bật</option>
                                                    <option value="2">Ẩn</option>
                                                    <option value="3">Hiện thị</option>
                                                    <option value="4">Xóa vĩnh viễn</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-1 m-b-xs">
                                                <button type="submit" class="btn btn-primary " type="button"><i class="fa fa-check"></i>&nbsp;Áp dụng</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th width="10px"><input type="checkbox"  name=""></th>
                                                        <th width="150px">Họ tên</th>
                                                        <th width="100px">Địa chỉ</th>
                                                        <th width="100px">Số ĐT</th>
                                                        <th width="80px">Chức vụ</th>
                                                        <th width="50px">Tài khoản</th>
                                                        <th width="50px">Mật khẩu</th>
                                                        <th width="20px">Ngày tạo</th>
                                                        <th width="80px">Thao tác</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                        @if(!empty($data))
                                                        @foreach($data as $items)
                                                            <tr>
                                                                <td width="10px"><input type="checkbox"  name=""></td>
                                                                <td class="box-img-fullname">
                                                                   <div class="img-user">
                                                                        <span>
                                                                            @if(empty($items['avatar']))
                                                                            <img src="{!! URL::asset('public/uploads/user/icon1.png') !!}">
                                                                              @else 
                                                                            <img src="{!! URL::asset('public/uploads/user/'.$items['avatar']) !!}">
                                                                              @endif
                                                                            <a href="">{!! !empty($items['fullname'])?$items['fullname']:'' !!}</a>

                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>{!! !empty($items['address'])?$items['address']:'Chưa cập nhật' !!}</td>
                                                                <td>{!! !empty($items['phone'])?$items['phone']:'Chưa cập nhật' !!}</td>
                                                                <td width="30px">
                                                                    @if(!empty($items['role']) && $items['role']==1)
                                                                        Quản trị viên
                                                                    @else
                                                                        Nhân viên
                                                                    @endif
                                                                </td>
                                                                <td width="30px">{!! !empty($items['username'])?$items['username']:'' !!}</td>
                                                                <td width="30px">{!! !empty($items['passtext'])?$items['passtext']:'' !!}</td>
                                                                <td width="30px">{!! date('d-m-Y H:i', strtotime($items['created_at'])) !!}</td>
                                                                <td width="100px">
                                                                   <span>
                                                                        <a id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#changePassUser" title="Đổi mật khẩu" class="btn btn-primary btn-xs changepassUser"><i class="fa fa-key" aria-hidden="true"></i></a>
                                                                   </span>
                                                                    <span><a data-toggle="modal" data-target="#editUser" href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-warning btnEditUser"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                                                                    @if(Auth::user()->id==$items['id'])
                                                                    <span class="hidden"><a id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger btndeleteUser"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
                                                                    @else
                                                                     <span><a id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger btndeleteUser"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
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

    <!-- Modal add-->
<div class="modal fade createUser" id="createUser" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="frmCreateUser" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới tài khoản người dùng</h4>
            </div>
            <div class="modal-body row">

               <div class="col-md-9">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Họ và tên (*)</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Họ và tên">
                        </div>
                    </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Ngày sinh</label>
                           <!-- Datepicker as text field -->
                           <div class="input-group date" data-date-format="dd.mm.yyyy">
                               <input  type="text" name="birthday" class="form-control" placeholder="dd.mm.yyyy">
                               <div class="input-group-addon" >
                                   <span class="glyphicon glyphicon-th"></span>
                               </div>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Giới tính</label>
                           <select name="gender" id="" class="form-control">
                               <option value="1">Nam</option>
                               <option value="2">Nữ</option>
                           </select>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Số điện thoại (*)</label>
                           <input type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại">
                       </div>
                   </div>


                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Địa chỉ</label>
                           <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Vai trò</label>
                           <select name="role" id="" class="form-control">
                              <option value="2">Nhân viên</option>
                              <option value="1">Quản trị viên</option>
                           </select>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Tên đăng nhập (*)</label>
                           <input type="text" name="username" id="username" class="form-control" placeholder="Tên đăng nhập">
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Mật khẩu</label>
                           <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                       </div>
                   </div>
                
               </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Ảnh đại diện</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="avatar" id="imageUploadAdd" accept=".png, .jpg, .jpeg" />
                                <label for="imageUploadAdd"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('../public/uploads/user/anh-dai-dien.jpg');">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Hoạt động</option>
                            <option value="2">Không hoạt động</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btnCreateUser" id="btnCreateUser"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal edit-->
<div class="modal fade editUser" id="editUser" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="frmUpdateUser" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhật tài khoản người dùng</h4>
            </div>
            <div class="modal-body row">

               <div class="col-md-9">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Họ và tên (*)</label>
                            <input type="text" name="fullname" id="fullnameEdit" class="form-control" placeholder="Họ và tên">
                        </div>
                    </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Ngày sinh</label>
                           <!-- Datepicker as text field -->
                           <div class="input-group date" data-date-format="dd.mm.yyyy">
                               <input  type="text" name="birthday" id="birthdayEdit" class="form-control" placeholder="dd.mm.yyyy">
                               <div class="input-group-addon" >
                                   <span class="glyphicon glyphicon-th"></span>
                               </div>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Giới tính</label>
                           <select name="gender" id="genderEdit" class="form-control">
                               <option value="1">Nam</option>
                               <option value="2">Nữ</option>
                           </select>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Số điện thoại (*)</label>
                           <input type="text" name="phone" id="phoneEdit" class="form-control" placeholder="Số điện thoại">
                       </div>
                   </div>


                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Địa chỉ</label>
                           <input type="text" name="address" id="addressEdit" class="form-control" placeholder="Địa chỉ">
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Vai trò</label>
                           <select name="role" id="roleEdit" class="form-control">
                              <option value="2">Nhân viên</option>
                              <option value="1">Quản trị viên</option>
                           </select>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Tên đăng nhập (*)</label>
                           <input type="text" name="username" id="usernameEdit" class="form-control" placeholder="Tên đăng nhập">
                       </div>
                   </div>

                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Hoạt động</option>
                            <option value="2">Không hoạt động</option>
                        </select>
                    </div>
                   </div>
                
               </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Ảnh đại diện</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="avatar" id="imageUploadEdit" accept=".png, .jpg, .jpeg" />
                                <label for="imageUploadEdit"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreviewEit"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary btnUpdateUser" id="btnUpdateUser"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal changepass-->
<div class="modal fade changePassUser" id="changePassUser" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="frmchangepassUser" action="" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập nhật mật khẩu mới</h4>
                </div>
                <div class="modal-body row">
                        <div class="form-group">
                            <label for="">Mật khẩu mới (*)</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu (*)</label>
                            <input type="password" class="form-control" name="confirmPassword">
                        </div>
                </div>
                <div class="modal-footer">
                    <a id="btnChangePasswordUser" class="btn btn-default btnChangePasswordUser"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <style type="text/css">

     a.btnChangePasswordUser{
        background: #05c705;
        color: #FFF;
        border: 0;
        margin-bottom: 0;
    }
        .box-img-fullname img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .img-user a {
            font-weight: 700;
            margin-left: 15px;
        }
        .info-user li{
            list-style: none;
        }

    a.btnCreateUser{
        background: #05c705;
        color: #FFF;
        border: 0;
        margin-bottom: 0
    }
     a.btnCreateUser:hover {
        background: #05c705;
        color: #FFF;
     }
    </style>

    <script>

        $(document).ready(function () {
            function readURL(input) {
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();
                       reader.onload = function(e) {
                           $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                           $('#imagePreview').hide();
                           $('#imagePreview').fadeIn(650);
                       }
                       reader.readAsDataURL(input.files[0]);
                   }
               }
               $("#imageUploadAdd").change(function() {
                   readURL(this);
               });

            function readURLEdit(input) {
                   if (input.files && input.files[0]) {
                       var reader = new FileReader();
                       reader.onload = function(e) {
                           $('#imagePreviewEit').css('background-image', 'url('+e.target.result +')');
                           $('#imagePreviewEit').hide();
                           $('#imagePreviewEit').fadeIn(650);
                       }
                       reader.readAsDataURL(input.files[0]);
                   }
               }
               $("#imageUploadEdit").change(function() {
                   readURLEdit(this);
               });

            $('.input-group.date').datepicker({format: "dd.mm.yyyy"});
        });


        // edit user
        $('.btnEditUser').click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/admin/users/edit/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                   // return false;
                    $("#usernameEdit").val(data['username']);
                    $("#fullnameEdit").val(data['fullname']);
                    $("#phoneEdit").val(data['phone']);
                    $("#addressEdit").val(data['address']);
                    $("#phoneEdit").val(data['phone']);
                    $("#birthdayEdit").val(data['birthday']);
                    
                    if(data['gender']){
                        document.getElementById("genderEdit").value = data['gender'];
                    }else {
                        document.getElementById("genderEdit").value = 1;
                    }
                    if(data['role']){
                        document.getElementById("roleEdit").value = data['role'];
                    }else {
                        document.getElementById("roleEdit").value = 1;
                    }
                    if(data['avatar']){
                        document.getElementById('imagePreviewEit').style.backgroundImage = "url("+"{!! URL::asset('public/uploads/user') !!}/"+data['avatar']+")";
                    }else {
                    document.getElementById('imagePreviewEit').style.backgroundImage = "url("+"{!! URL::asset('public/uploads/user/anh-dai-dien.jpg') !!}"+")";
                    }
                    var action = "<?php echo url('/'); ?>/admin/users/update/"+id;
                   document.getElementById("frmUpdateUser").action =  action;
                }
            });
        });

        // Update user
        $("#btnUpdateUser").click(function() {
                    var urlAction = $("#frmUpdateUser").attr('action');
                    $.ajax({
                        url: urlAction,
                        type: 'POST',
                        dataType: 'json',
                        data: new FormData(document.getElementById("frmUpdateUser")),
                        contentType: false,
                        processData: false,
                        enctype: 'multipart/form-data',
                        cache: false,
                        success: function(data, textStatus, xhr) {
                            console.log(data);
                            if (data['message'] == 'success') {
                                Lobibox.notify('success', {
                                    title: 'Thành công',
                                    msg: 'Cập nhật nhân viên thành công',
                                    delay: 3000
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                Lobibox.notify('error', {
                                    title: 'Có lỗi',
                                    msg: 'Cập nhật thất bại'
                            });
                        }
                    }
                });
            });

        // Add user
        $("#btnCreateUser").click(function(){

                var fullname = $("#fullname").val();
                var username = $("#username").val();
                var phone = $("#phone").val();
                if(fullname.length==0){
                    Lobibox.notify('error', {
                        title: 'Có lỗi',
                        msg: 'Bạn phải nhập họ tên nhân viên'
                    });
                    return false;
                }
                if(phone.length==0){
                    Lobibox.notify('error', {
                        title: 'Có lỗi',
                        msg: 'Bạn phải nhập số điện thoại'
                    });
                    return false;
                }
                if(username.length==0){
                    Lobibox.notify('error', {
                        title: 'Có lỗi',
                        msg: 'Bạn phải nhập tên tài khoản'
                    });
                    return false;
                }

                var url = "{!! route('users.store') !!}";
                     $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            data: new FormData(document.getElementById("frmCreateUser")),
                            contentType: false,
                            processData: false,
                            enctype: 'multipart/form-data',
                            cache:false,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                     Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Thêm mới nhân viên thành công',
                                        delay: 3000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                     Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Đăng ký Thất bại'
                                    });
                                }
                              }
                        });
                    });

        //  delete user
        $('.btndeleteUser').click(function () {
             var id = $(this).attr('id');
           Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa không ?",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/users/destroy/"+id;
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
                                    });
                                  setTimeout(function(){
                                      location.reload();
                                  },1500);
                                }
                                else {
                                     Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Xóa thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });

        // Lấy dữ liệu id cập nhật password 
        $('.changepassUser').click(function () {
            var id = $(this).attr('id');
            var action = "<?php echo url('/'); ?>/admin/users/changepassword/"+id;
            document.getElementById("frmchangepassUser").action =  action;
            // Đổi mật mật khẩu Nhân viên
            $("#btnChangePasswordUser").click(function(){
                   var urlaction = $("#frmchangepassUser").attr('action');
                   $.ajax({
                    url: urlaction,
                    type: 'POST',
                    data: new FormData(document.getElementById("frmchangepassUser")),
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
                                            msg: 'Cập nhật mật khẩu thành công',
                                            delay: 2000
                                        });
                                        setTimeout(function(){
                                            location.reload();
                                        },2000);
                                    }
                                    else if(data['msg_confirmPassword']!=0 || data['msg_password']!=0){
                                        if(data['msg_password']!=0){
                                            data['msg_password'] = data['msg_password']+"<br>";
                                        }
                                        else {
                                                data['msg_password'] = '';
                                        }
                                        if(data['msg_confirmPassword']!=0){
                                            data['msg_confirmPassword'] = data['msg_confirmPassword']+"<br>";
                                        }
                                        else{
                                            data['msg_confirmPassword'] = '';
                                        }
                                        Lobibox.notify('error', {
                                            title: 'Có lỗi',
                                            msg: data['msg_password']+data['msg_confirmPassword']
                                        });
                                    }
                                    else {
                                         Lobibox.notify('error', {
                                            title: 'Thất bại',
                                            msg: 'Cập nhật mật khẩu thất bại',
                                            delay: 2000
                                    });
                                }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log('Error in Operation');
                    }
                 });
            });
        });
    </script>
    @else
        @include('layout.Mobile.Admin.listUser')
    @endif

    @else
        {!! redirect()->route('login') !!}
    @endif
    @endsection