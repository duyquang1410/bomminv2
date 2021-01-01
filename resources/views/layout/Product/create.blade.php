
<!-- Modal add-->
<div class="modal fade createProduct" id="createProduct" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="frmCreateProduct" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm mới sản phẩm</h4>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="">Tên sản phẩm <span style="color: red">(*)</span></label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <label for="">Giá nhập <span style="color: red;">(*)</span></label>
                            <input type="text" name="priceEntry" id="priceEntry" class="form-control" placeholder="Giá nhập hàng">
                        </div>

                        <div class="form-group">
                            <label for="">Giá bán cho khách <span style="color: red;">(*)</span></label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Giá bán">
                        </div>

                        <div class="form-group">
                            <label for="">Số lượng <span style="color: red;">(*)</span></label>
                            <input type="number" name="total" id="total" class="form-control" placeholder="Số lượng">
                        </div>

                        <div class="form-group">
                            <label for="">Tổng tiền nhập </label>
                            <input type="number" name="totalAmountEntered" id="totalAmountEntered" class="form-control" placeholder="Tổng tiền nhập">
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh sản phẩm</label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="image" id="imageUploadAdd" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUploadAdd"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url('public/uploads/icon/imgicon.jpg');"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default mb-0" style="margin-bottom: 0; background: #4bac4d; color: #FFF; border: 0;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#frmCreateProduct").validate({
            rules: {
                title: "required",
                priceEntry: "required",
                price: "required",
                total: "required"
            },
            messages: {
                title: {
                    required: 'Tên sản phẩm : không được để trống'
                },
                priceEntry:{
                    required : 'Giá nhập : Không được để trống'
                },
                price:{
                    required : 'Giá bán cho khách : Không được để trống'
                },
                total:{
                    required : 'Số lượng không được để trống'
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

        $(document).on('submit', '#frmCreateProduct', function(event) {
            event.preventDefault();
            var url = "{!! route('products.store') !!}";
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: new FormData(document.getElementById("frmCreateProduct")),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                cache:false,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    if(data['message']=='success'){
                        Lobibox.notify('success', {
                            title: 'Thành công',
                            msg: 'Thêm mới sản phẩm thành công',
                            delay: 1500
                        });
                        setTimeout(function(){
                            location.reload();
                        },1500);
                    }
                    else {
                        Lobibox.notify('error', {
                            title: 'Có lỗi',
                            msg: 'Thêm mới sản phẩm thất bại'
                        });
                    }
                }
            });
        });
    });
</script>