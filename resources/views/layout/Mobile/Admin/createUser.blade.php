
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

          alert('adad');
          return false;

                var fullname = $("#fullname").val();
                var username = $("#username").val();
                var phone = $("#phone").val();
                if(fullname.length==0){
                    Lobibox.notify('error', {
                        title: 'Có lỗi',
                        msg: 'Bạn phải Họ và tên nhân viên'
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
                 if(phone.length==0){
                    Lobibox.notify('error', {
                        title: 'Có lỗi',
                        msg: 'Bạn phải nhập số điện thoại'
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

                });
</script>