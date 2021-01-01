@extends('layout.master')
@section('content')
    <div class="updateInfo">
            <div class="container">
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' name="avatar" id="imageUploadCreateStudent"  />
                        <label for="imageUploadCreateStudent" class="hidden"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreviewCreateStudent" style="background-image: url('public/uploads/user/{!! Auth::user()->avatar; !!}');"></div>
                    </div>
                    <div class="fullname">{!! Auth::user()->fullname !!} ({!! Auth::user()->username !!})</div>
                    <div class="address-user text-center"><i class="fa fa-map-marker" aria-hidden="true"></i> {!! Auth::user()->address !!}</div>
                </div>

                <div class="updateInfo text-center"><a id="{!! Auth::user()->id !!}" href="javascript:;" class="btn btn-primary btnEditUser" data-toggle="modal" data-target="#updateUser"><i class="fa fa-pencil" aria-hidden="true"></i>
                         Cập nhật thông tin</a></div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Thông tin</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="item-info">
                            <div class="item-left">Họ tên :</div>
                            <div class="item-right"><b>{!! Auth::user()->fullname !!}</b></div>
                        </div>
                        <div class="item-info">
                            <div class="item-left">Ngày sinh :</div>
                            <div class="item-right">{!! date('d/m/Y', strtotime(Auth::user()->birthday)) !!}</div>
                        </div>

                        <div class="item-info">
                            <div class="item-left">Số điện thoại :</div>
                            <div class="item-right">{!! Auth::user()->phone !!}</div>
                        </div>
                        <div class="item-info">
                            <div class="item-left">Địa chỉ :</div>
                            <div class="item-right">{!! Auth::user()->address !!}</div>
                        </div>

                        <div class="item-info">
                            <div class="item-left">Facebook :</div>
                            <div class="item-right">{!! Auth::user()->facebook !!}</div>
                        </div>

                        <div class="item-info">
                            <div class="item-left">Email :</div>
                            <div class="item-right">{!! Auth::user()->email !!}</div>
                        </div>

                        <div class="item-info">
                            <div class="item-left">Giới thiệu :</div>
                            <div class="item-right">{!! Auth::user()->information !!}</div>
                        </div>

                    </div>
                </div>
            </div>
    </div>

    <!-- Modal updateUser-->
    <div class="modal fade updateUser" id="updateUser" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="frmUpdateUser" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật thông tin nhân viên</h4>
                    </div>
                    <div class="modal-body row">
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
                                            <div id="imagePreviewUpdate" style="background-image: url('public/uploads/user/anh-dai-dien.jpg');"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="row">
                                    <div class="form-group">
                                        <label for="">Họ và tên <span style="color: red">(*)</span></label>
                                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Họ tên">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Ngày sinh</label>
                                        <!-- Datepicker as text field -->
                                        <div class="input-group date" data-date-format="dd.mm.yyyy">
                                            <input  type="text" name="birthday" id="birthday" class="form-control" placeholder="dd.mm.yyyy">
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
                                        <select name="gender" id="gender" class="form-control">
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
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Địa chỉ">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Facebook</label>
                                        <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Zalo</label>
                                        <input type="text" name="zalo" id="zalo" class="form-control" placeholder="Zalo">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="email">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Giới thiệu bản thân</label>
                                        <textarea type="text" name="information" id="information" class="form-control" placeholder="Giới thiệu"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default btnUpdateUser mb-0" id="btnUpdateUser"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
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
                        $('#imagePreviewUpdate').css('background-image', 'url('+e.target.result +')');
                        $('#imagePreviewUpdate').hide();
                        $('#imagePreviewUpdate').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUploadAdd").change(function() {
                readURL(this);
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
                    $("#username").val(data['username']);
                    $("#fullname").val(data['fullname']);
                    $("#phone").val(data['phone']);
                    $("#address").val(data['address']);
                    $("#zalo").val(data['zalo']);
                    $("#email").val(data['email']);
                    $("#information").val(data['information']);
                    $("#facebook").val(data['facebook']);
                    $("#birthday").val(data['birthday']);

                    if(data['gender']){
                        document.getElementById("gender").value = data['gender'];
                    }else {
                        document.getElementById("gender").value = 1;
                    }
                    if(data['avatar']){
                        document.getElementById('imagePreviewUpdate').style.backgroundImage = "url("+"{!! URL::asset('public/uploads/user') !!}/"+data['avatar']+")";
                    }else {
                        document.getElementById('imagePreviewUpdate').style.backgroundImage = "url("+"{!! URL::asset('public/uploads/user/anh-dai-dien.jpg') !!}"+")";
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
                            msg: 'Cập nhật thông tin thành công',
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

    </script>
    <style>
        .btnUpdateUser {
            margin-bottom: 0;
            background: #4bac4d;
            color: #fff;
            border: 0;
        }
       .updateInfo .fullname {
            text-align: center;
            margin: 20px 0 8px;
            font-size: 18px;
            color: #333;
            font-weight: 700;
        }
        .updateInfo .nav-tabs li a{
            border: 0 !important;
            color: #333;
            font-size: 14px;
            border-left: 2px solid #0090da !important;
            border-radius: 0;
            padding-left: 10px;
            padding-right: 10px;
        }
        .updateInfo .tab-content {
            background: rgba(255, 255, 255, 0.68);
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            color: #333;
        }
       .updateInfo .item-info{
            overflow: hidden;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .updateInfo .item-info .item-left{
            width: 40%;
            float: left;
        }
        .updateInfo .item-info .item-right{
            width: 60%;
            float: left;
        }
       .updateInfo {
            margin-bottom: 30px;
        }
    </style>
@endsection