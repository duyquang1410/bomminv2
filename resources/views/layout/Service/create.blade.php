
<!-- Modal -->
<div class="modal fade createService" id="createService" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="frmCreateUser"  method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm mới dịch vụ</h4>
            </div>
            <div class="modal-body row">
               <div class="col-md-12">
                    <div class="form-group">
                            <label for="">Tên dịch vụ (*)</label>
                            <input type="text" name="name" class="form-control" placeholder="Dịch vụ">
                    </div>
                     <div class="form-group">
                            <label for="">Thành tiền/ giờ (*)</label>
                            <input type="number" name="price" class="form-control" placeholder="Thành tiền / h">
                    </div>
 					<div class="form-group">
                            <label for="">Ghi chú</label>
                           <textarea class="form-control" name="note"></textarea>
                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <a  class="btn btn-default btnCreateService" id="btnCreateService"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
            </div>
            </form>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<style>
   a.btnCreateService{
        background: #05c705;
        color: #FFF;
        border: 0;
        margin-bottom: 0
    }
     a.btnCreateService:hover {
        background: #05c705;
        color: #FFF;
     }
</style>
<script>
   $(document).ready(function () {
        // add service
        $("#btnCreateService").click(function(event){
                var url = "{!! route('services.store') !!}";
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
                                        msg: 'Thêm mới dịch vụ thành công',
                                        delay: 2000
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    },2000);
                                }
                                else {
                                     Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Thêm mới Thất bại'
                                    });
                                }
                              }
                          });
                     });

                });
</script>