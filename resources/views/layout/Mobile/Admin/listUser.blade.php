@extends('layout.master')
@section('content')
    @if(Auth::user()->role==1)
    <div class="container">
        <div class="list-user-timekeeping">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Danh sách Nhân viên</div>
                    <div class="ntmApp"><a class="btn btn-xs btn-primary" href="javascript:;" data-toggle="modal" data-target="#createUser"><i class="fa fa-user-plus" aria-hidden="true"></i> Thêm mới</a></div>
                </div>
                <div class="panel-body">
                    @if(!empty($data))
                        @foreach($data as $items)
                            <div class="item-box-timekeeping">
                                <div class="img-user">
                                    <a href="javascript:;" class="dataDetail" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#detailTimeKeeping">
                                        @if(empty($items['avatar']))
                                            <img src="{!! URL::asset('public/uploads/user/icon1.png') !!}">
                                        @else
                                            <img src="{!! URL::asset('public/uploads/user/'.$items['avatar']) !!}">
                                        @endif
                                    </a>
                                </div>
                                <div class="info-user">
                                    <a href="javascript:;" class="dataDetail" id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#detailTimeKeeping"><h3 class="fullname">{!! !empty($items['fullname'])?$items['fullname']:'' !!}</h3></a>
                                    <div class="list-timekeeping">
                                        <div class="box-info-user">
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i> {!! !empty($items['phone'])?$items['phone']:'' !!}</div>
                                            <div class="gender"><i class="fa fa-transgender" aria-hidden="true"></i> @if($items['gender']==1)Nam @else Nữ @endif</div>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> {!! !empty($items['address'])?$items['address']:' Cần cập nhật' !!}</div>
                                        <div class="user"><i class="fa fa-user-o" aria-hidden="true"></i> Tài khoản : {!! !empty($items['username'])?$items['username']:'' !!}</div>
                                        <div class="pass"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Mật khẩu : {!! !empty($items['passtext'])?$items['passtext']:'' !!}</div>
                                         <div class="role"><i class="fa fa-user-o" aria-hidden="true"></i>
                                            @if(!empty($items['role']) && $items['role']==1)
                                            <span>Quản trị viên</span>
                                            @else
                                            <span>Nhân viên</span>
                                            @endif
                                         </div>
                                    </div>
                                </div>

                                <div class="btn-action">
                                    <li> <a id="{!! !empty($items['id'])?$items['id']:0 !!}" data-toggle="modal" data-target="#changePassUser" title="Đổi mật khẩu" class="btn btn-primary btn-xs changepassUser"><i class="fa fa-key" aria-hidden="true"></i></a></li>
                                    <li><a data-toggle="modal" data-target="#editUser" href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-warning btnEditUser"><i class="fa fa-pencil" aria-hidden="true"></i></a></span></li>
                                    <li><a href="javascript:;" id="{!! $items['id'] !!}" class="btn btn-xs btn-danger btndeleteUser"><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="nodata text-center">Không có nhân viên nào ...</div>
                    @endif
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
                <h4 class="modal-title">Thêm mới tài khoản nhân viên</h4>
            </div>
            <div class="modal-body row">
               <div class="col-md-12">
                   <div class="row"> 
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Họ và tên <span style="color: red">(*)</span></label>
                              <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Họ và tên">
                          </div>
                       </div>
                   </div>

                   <div class="col-md-6">
                      <div class="row"> 
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
                   </div>

                   <div class="col-md-6">
                      <div class="row"> 
                           <div class="form-group">
                             <label for="">Giới tính</label>
                             <select name="gender" id="" class="form-control">
                                 <option value="1">Nam</option>
                                 <option value="2">Nữ</option>
                             </select>
                         </div>
                      </div>
                   </div>

                   <div class="col-md-6">
                       <div class="row">
                            <div class="form-group">
                               <label for="">Số điện thoại <span style="color: red">(*)</span></label>
                               <input type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại">
                           </div>
                       </div>
                   </div>


                   <div class="col-md-6">
                      <div class="row"> 
                             <div class="form-group">
                               <label for="">Địa chỉ</label>
                               <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                           </div>
                      </div>
                   </div>

                   <div class="col-md-6">
                      <div class="row"> 
                           <div class="form-group">
                             <label for="">Vai trò</label>
                             <select name="role" id="" class="form-control">
                                <option value="2">Nhân viên</option>
                                <option value="1">Quản trị viên</option>
                             </select>
                         </div>
                      </div>
                   </div>

                   <div class="col-md-6">
                      <div class="row"> 
                           <div class="form-group">
                             <label for="">Tên đăng nhập <span style="color: red">(*)</span></label>
                             <input type="text" name="username" id="username" class="form-control" placeholder="Tên đăng nhập">
                         </div>
                      </div>  
                   </div>

                   <div class="col-md-6">
                        <div class="row"> 
                             <div class="form-group">
                               <label for="">Mật khẩu</label>
                               <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                               <div class="note" style="color: red; font-size: 12px;padding: 5px 10px 0;">Ghi chú : Nếu không nhập mặc định sẽ lấy mật khẩu là số điện thoại</div>
                           </div>
                        </div>
                   </div>
                
               </div>
                <div class="col-md-12">
                   <div class="row">
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
                <h4 class="modal-title">Cập nhật tài khoản nhận viên</h4>
            </div>
            <div class="modal-body row">

               <div class="col-md-12">
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
                <div class="col-md-12">
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
                <a class="btn btn-primary btnUpdateUser" id="btnUpdateUser">Cập nhật</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal change password-->
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
                            <label for="">Mật khẩu mới <span style="color: red">(*)</span></label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu <span style="color: red">(*)</span></label>
                            <input type="text" class="form-control" name="confirmPassword">
                        </div>
                </div>
                <div class="modal-footer">
                    <a id="btnChangePasswordUser" class="btn btn-default btnChangePasswordUser">Cập nhật</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
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


        // Add User
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
        
        //  delete user
        $('.btndeleteUser').click(function () {
             var id = $(this).attr('id');
           Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa nhân viên không ?",
                title: "Thông báo",
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

    <style>
    .list-user-timekeeping .fullname{
        width: 150px;
    }
       a.btnCreateUser, a.btnChangePasswordUser{
        background: #05c705;
        color: #FFF;
        border: 0;
        margin-bottom: 0
        }
        a.btnCreateUser:hover {
            background: #05c705;
            color: #FFF;
         }
        .list-user-timekeeping .panel-heading {
            display: inline-flex;
            width: 100%;
            justify-content: space-between;
        }
        .item-box-timekeeping .panel-heading .btn-action{
            display: inline-flex;
        }
        .box-info-user {
            display: inline-flex;
        }
        .list-user-timekeeping .list-user-timekeeping .btn-action {

        }
        .list-user-timekeeping .btn-action li{
            list-style-type: none;
            display: block;
        }
        .list-user-timekeeping .btn-action li a{
            margin: 0px 3px;
        }

        .list-user-timekeeping .btn-action .btn-action {
            display: inline-flex;
            position: absolute;
            top: 0;
            right: 0;
            text-align: right;
            padding: 10px 0;
        }
        .list-user-timekeeping .btn-action{
            display: inline-flex;
            position: absolute;
            top: 10px;
            right: 0;
        }
        .list-user-timekeeping .btn-action li {
            display: brarnd;
        }
        .box-info-user .gender{
            margin: 0 10px;
        }
        .list-datetime  {
            margin-bottom: 0;
        }
        .list-datetime .panel-body{
            padding-bottom: 0;
        }
        .item-time {
            display: inline-block;
        }
        .item-time a {
            display: inline-block;
            padding: 5px 10px;
            background: #eeeeee;
            margin: 5px 0;
            border-radius: 5px;
        }
        .item-time a.active  {
            background: #f8ac59;
            color: #FFF;
        }
        .list-user-timekeeping{
            overflow: hidden;
            position: relative;
        }
        .box-view-timekeeping a{
            background: #99c85e;
            width: 40px;
            height: 40px;
            display: block;
            text-align: center;
            border-radius: 50%;
            color: #FFF;
            position: fixed;
            right: 15px;
            font-size: 12px;
            bottom: 60px;
            line-height: 40px;
        }

        #detailTimeKeeping .modal-header{
            background: #0090da;
        }
        #detailTimeKeeping .modal-body {
            padding: 10px;
        }
        .item-box-timekeeping {
            overflow: hidden;
        }
        .item-box-timekeeping .img-user {
            width: 15%;
            height: 55px;
            float: left;
        }

        .item-box-timekeeping .img-user img {
               width: 45px;
                height: 45px;
                object-fit: cover;
                border-radius: 50%;
        }

        .item-box-timekeeping .info-user .list-timekeeping li{
            list-style-type: none;
        }
        .item-box-timekeeping .info-user .list-timekeeping {
        }
        .checkin .check-text {
            color: green;
            font-weight: 700;
        }
        .checkout .check-text{
            color: #b30a1b;
            font-weight: 700;
        }
        .item-box-timekeeping .list-timekeeping .info-user .fullname, h3.fullname{
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 700;
            color: #337ab7;
        }

        .list-user-timekeeping .item-box-timekeeping{
            position: relative;
            padding: 5px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.68);
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
            float: left;
        }
        .time {
            padding: 6px 0;
            font-weight: 700;
        }
        .info-user {
            display: inline-block;
            width: 85%;
            padding-left: 10px;
        }

        .list-user-timekeeping .panel-default{
            background: none;
            border: 0;
            box-shadow: none;
            border-radius: 0;
        }
        .list-user-timekeeping .panel-default .panel-heading {
            background: none;
            padding-left: 0;
            padding-right: 0;
        }
        .list-user-timekeeping .panel-default .panel-heading .panel-title {
            font-size: 16px;
            font-weight: 700;
        }
        .list-user-timekeeping .panel-default .panel-body {
            padding-left: 0;
            padding-right: 0;
        }
    </style>
    @else
        {!! redirect()->route('login') !!}
    @endif
@endsection