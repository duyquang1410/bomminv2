<!-- Modal importProduct-->
<div class="modal fade importProduct" id="importProduct" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="frmImportProduct" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nhập hàng</h4>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="">Số lượng nhập <span style="color: red">(*)</span></label>
                            <input type="text" name="total" id="totalImport" class="form-control" placeholder="Số lượng nhập">
                        </div>

                        <div class="form-group">
                            <label for="">Tổng sô tiền nhập  <span style="color: red">(*)</span></label>
                            <input type="number" name="totalAmountEntered" id="totalAmountEntered" class="form-control" placeholder="Số tiền nhập">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default mb-0" style="margin-bottom: 0; background: #4bac4d; color: #FFF; border: 0;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#frmImportProduct").validate({
            rules: {
                total: "required",
                totalAmountEntered: "required",
            },
            messages: {
                total:{
                    required : 'Số lượng nhập : không được để trống'
                },
                totalAmountEntered: {
                    required: 'Tổng số tiền không được để trống',
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
    });

    // Import product
    $(".btnimportProduct").click(function(){
        var id = $(this).attr('id');
        var action = "<?php echo url('/'); ?>/admin/products/importProduct/"+id;
        document.getElementById("frmImportProduct").action =  action;
    });

    $(document).on('submit', '#frmImportProduct', function(event) {
        event.preventDefault();
        var urlAction = $("#frmImportProduct").attr('action');
        $.ajax({
            url: urlAction,
            type: 'POST',
            dataType: 'json',
            data: new FormData(document.getElementById("frmImportProduct")),
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            cache: false,
            success: function(data, textStatus, xhr) {
                console.log(data);
                if (data['message'] == 'success') {
                    Lobibox.notify('success', {
                        title: 'Thành công',
                        msg: 'Nhập hàng thành công',
                        delay: 1500
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    Lobibox.notify('error', {
                        title: 'Có lỗi',
                        msg: 'Nhập hàng thất bại'
                    });
                }
            }
        });
    });
</script>