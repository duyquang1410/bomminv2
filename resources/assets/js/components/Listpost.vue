<template id="post-list">
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <h3>Bài viết</h3>
        <div class="span3 action-process">
            <div class=control-group">
                <select name="selectitem" style="width:50%" id="selectitem" class="form-control form-inline inline-table">
                    <option value="0" selected>Lựa chọn</option>
                    <option value="1">Nổi bật</option>
                    <option value="2">Ẩn chọn</option>
                    <option value="3">Xóa chọn</option>
                </select>
                <button class="btn btn-success form-inline inline-table">Xử lý</button>
            </div>
            
        </div>
        
        <!--End-Action boxes-->    
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><input type="checkbox" name="checkall" id="checkall"></span>
                <h5>Danh sách thành viên quản lý</h5>
                <a href="{!! route('posts.create') !!}" class="pull-right" ><h5 style="color: #FFF" class="btn btn-success ">Thêm mới</h5></a>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-striped table-bordered" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th width="7%">Hiện thị</th>
                            <th width="8%">Nổi bật</th>
                            <th width="60px">Ảnh</th>
                            <th width="25%">Tên bài viết</th>
                            <th width="15%">Danh mục</th>
                            <th width="15%">Lượt xem</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
