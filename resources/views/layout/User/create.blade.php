<!-- Modal -->
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
                            <input type="text" name="fullname" class="form-control" placeholder="Họ và tên">
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
                           <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
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
                           <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
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
                                <input type='file' name="avatar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('../uploads/user/anh-dai-dien.jpg');">
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
                <a class="btn btn-default btnCreateUser" id="btnCreateUser">Thêm mới</a>
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
                   $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                   $('#imagePreview').hide();
                   $('#imagePreview').fadeIn(650);
               }
               reader.readAsDataURL(input.files[0]);
           }
       }
       $("#imageUpload").change(function() {
           readURL(this);
       });
       $('.input-group.date').datepicker({format: "dd.mm.yyyy"});
               // Add teacher
        $("#btnCreateUser").click(function(){
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

                });
</script>