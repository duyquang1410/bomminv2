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
                    <a id="btnChangePasswordUser" class="btn btn-default btnChangePasswordUser">Cập nhật</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    a.btnChangePasswordUser{
        background: #05c705;
        color: #FFF;
        border: 0;
        margin-bottom: 0;
    }
</style>
