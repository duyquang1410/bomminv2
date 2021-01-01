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
                                <input type='file' name="avatar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
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

<style>
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
                   $('#imagePreviewEit').css('background-image', 'url('+e.target.result +')');
                   $('#imagePreviewEit').hide();
                   $('#imagePreviewEit').fadeIn(650);
               }
               reader.readAsDataURL(input.files[0]);
           }
       }
       $("#imageUpload").change(function() {
           readURL(this);
       });
       $('.input-group.date').datepicker({format: "dd.mm.yyyy"});

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
                        document.getElementById('imagePreviewEit').style.backgroundImage = "url("+"{!! URL::asset('uploads/user') !!}/"+data['avatar']+")";
                    }else {
                    document.getElementById('imagePreviewEit').style.backgroundImage = "url("+"{!! URL::asset('uploads/user/anh-dai-dien.jpg') !!}"+")";
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

   });
</script>