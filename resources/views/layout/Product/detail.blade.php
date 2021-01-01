<!-- Modal detail-->
<div class="modal fade detailProduct" id="detailProduct" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết Thông tin sản phẩm</h4>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="">Tên sản phẩm </label>
                            <input type="text" name="title" id="titleDetail" class="form-control" disabled="disabled" placeholder="Tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <label for="">Giá nhập </label>
                            <input type="text" name="priceEntry" id="priceEntryDetail" class="form-control" disabled="disabled" placeholder="Giá nhập hàng">
                        </div>

                        <div class="form-group">
                            <label for="">Giá bán cho khách </label>
                            <input type="text" name="price" id="priceDetail" class="form-control" disabled="disabled" placeholder="Giá bán">
                        </div>

                        <div class="form-group">
                            <label for="">Số lượng </label>
                            <input type="number" name="total" id="totalDetail" class="form-control" disabled="disabled" placeholder="Số lượng">
                        </div>

                        <div class="form-group">
                            <label for="">Tổng tiền nhập </label>
                            <input type="number" name="totalAmountEntered" id="totalAmountEnteredDetail" disabled="disabled" class="form-control" placeholder="Tổng tiền nhập">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tổng số hàng đã bán </label>
                                    <input type="number" name="totalSold" id="totalSoldDetail" disabled="disabled" class="form-control" placeholder="Đã bán">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tổng số hàng còn</label>
                                    <input type="number" name="totalRest" id="totalRestDetail" disabled="disabled" class="form-control" placeholder="Tổng số hàng còn">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh sản phẩm</label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="image" id="imageUploadDetail" accept=".png, .jpg, .jpeg" />
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreviewDetail" style="background-image: url('public/uploads/icon/imgicon.jpg');"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.btnDetail').click(function(){
            var id = $(this).attr('id');
            var url = "<?php echo url('/') ?>/admin/products/detail/"+id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: id,
                success: function (data, textStatus, xhr) {
                    console.log(data);
                    $("#titleDetail").val(data['title']);
                    $("#priceEntryDetail").val(data['price']);
                    $("#priceDetail").val(data['price']);
                    //Tổng Số lượng
                    $("#totalDetail").val(data['total']);
                    // Tổng tiền nhập hàng
                    $("#totalAmountEnteredDetail").val(data['totalAmountEntered']);
                    // Tổng số hàng còn
                    $("#totalRestDetail").val(data['totalRest']);
                    // Tổng số hàng đã bán
                    $("#totalSoldDetail").val(data['totalSold']);

                    if(data['image']){
                        document.getElementById('imagePreviewDetail').style.backgroundImage = "url("+"{!! URL::asset('public/uploads/product') !!}/"+data['image']+")";
                    }else {
                        document.getElementById('imagePreviewDetail').style.backgroundImage = "url("+"{!! URL::asset('public/uploads/icon/imgicon.jpg') !!}"+")";
                    }

                }
            });
        });
    });
</script>