
<!-- Modal -->
<div class="modal fade editService" id="editService" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="frmUpdate"  method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cập nhật dịch vụ</h4>
            </div>
            <div class="modal-body row">
               <div class="col-md-12">
                    <div class="form-group">
                            <label for="">Tên dịch vụ (*)</label>
                            <input type="text" name="name" id="nameEdit" class="form-control" placeholder="Dịch vụ">
                    </div>
                     <div class="form-group">
                            <label for="">Tiền trả cho nhân viên/ giờ (*)</label>
                            <input type="number" name="price" id="priceEdit" class="form-control" placeholder="Tiền trả cho nhân viên/ giờ">
                    </div>

                    <div class="form-group">
                            <label for="">Tiền thu của khách / giờ (*)</label>
                            <input type="number" name=" priceAdmin" id="priceAdminEdit" class="form-control" placeholder="Tiền thu của khách / giờ">
                    </div>

 					<div class="form-group">
                            <label for="">Ghi chú</label>
                           <textarea class="form-control" name="note" id="noteEdit"></textarea>
                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
            </div>
            </form>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<style>
   a.btnEditService{
        background: #05c705;
        color: #FFF;
        border: 0;
        margin-bottom: 0
    }
     a.btnEditService:hover {
        background: #05c705;
        color: #FFF;
     }
</style>
<script>
   $(document).ready(function () {

       //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
       $("#frmUpdate").validate({
           rules: {
               name: "required",
               price: "required",
               priceAdmin: "required",
           },
           messages: {
               name: {
                   required: 'Tên dịch vụ'
               },
               price:{
                   required : 'Tiền trả cho nhân viên / giờ không được để trống'
               },
               priceAdmin:{
                   required : 'Tiền nhận của khách / giờ không được bỏ trống'
               }
           },
           invalidHandler: function(form, validator) {
               var count=validator.numberOfInvalids(), messages = [];
               if(count){
                   for(var i in validator.errorList)
                   {
                       var prefix = '', elem = validator.errorList[i].element;
                       var m = prefix + validator.errorList[i].message;
                       console.log(m);
                       if(messages.indexOf(m) == -1 && messages.length < 4){
                           messages.push(m +'<br>');
                       }
                       console.log(messages);
                   }
               }
               Lobibox.notify('error', {
                   title: 'Có lỗi',
                   msg: messages
               });
           },
       });

        // edit service 
        $(".btnEdit").click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/admin/services/edit/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    $("#nameEdit").val(data['name']);
                    $("#priceEdit").val(data['price']);
                    $("#priceAdminEdit").val(data['priceAdmin']);
                    $("#noteEdit").val(data['note']);

                    var action = "<?php echo url('/'); ?>/admin/services/update/"+id;
                   document.getElementById("frmUpdate").action =  action;
                }
            });
        });

        // update service
       $(document).on('submit', '#frmUpdate', function(event) {
           event.preventDefault();
           var urlAction = $("#frmUpdate").attr('action');
           $.ajax({
               url: urlAction,
               type: 'POST',
               dataType: 'json',
               data: new FormData(document.getElementById("frmUpdate")),
               contentType: false,
               processData: false,
               enctype: 'multipart/form-data',
               cache:false,
               success: function (data, textStatus, xhr) {
                   console.log(data);
                   if(data['message']=='success'){
                       Lobibox.notify('success', {
                           title: 'Thành công',
                           msg: 'Cập nhật dịch vụ thành công',
                           delay: 2000
                       });
                       setTimeout(function(){
                           location.reload();
                       },2000);
                   }
                   else {
                       Lobibox.notify('error', {
                           title: 'Có lỗi',
                           msg: 'Cập nhật Thất bại'
                       });
                   }
               }
           });
       });

   });
</script>