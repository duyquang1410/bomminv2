<div class="col-md-12">
    <div class="list-product ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <span>Quản lý đồ ăn nước uống</span>
                    <span class="btn btn-primary pull-right" style="margin-top: -7px;"><a href="javascript:;" data-toggle="modal" data-target="#createProduct">Thêm mới</a></span>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered  table-responsive dataTables-example">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Tổng Số lượng</th>
                        <th>Tổng đã bán</th>
                        <th>Tổng còn lại</th>
                        <th>Giá bán</th>
                        <th width="230px">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($product))
                        @foreach($product as $key => $items)
                            <tr>
                                <td>{!! $key+1 !!}</td>
                                <td>
                                    <div class="inline-flex">
                                        <div class="img"><img width="50px" height="50px" src="{!! URL::asset('public/uploads/product/'.$items['image']) !!}" alt=""></div>
                                        <div class="title"><a href="">{!! !empty($items['title'])?$items['title']:'' !!}</a></div>
                                    </div>
                                </td>
                                <td>{!! !empty($items['total'])?$items['total']:0 !!}</td>
                                <td>{!! !empty($items['totalSold'])?$items['totalSold']:0 !!}</td>
                                <td>{!! !empty($items['totalRest'])?$items['totalRest']:0 !!}</td>
                                <td>{!! !empty($items['price'])?number_format($items['price'], 0):'' !!} VNĐ</td>
                                <td>
                                    <a href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-primary btnimportProduct" data-toggle="modal" data-target="#importProduct"> Nhập hàng</a>
                                    <a id="{!! !empty($items['id'])?$items['id']:0 !!}" href="javascript:;" class="btn btn-xs btn-info btnEdit" data-toggle="modal" data-target="#editProduct"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a id="{!! !empty($items['id'])?$items['id']:0 !!}" href="javascript:;" class="btn btn-xs btn-danger btnDelete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <a id="{!! !empty($items['id'])?$items['id']:0 !!}" href="javascript:;" href="javascript:;" class="btn btn-xs btn-info btnDetail" data-toggle="modal" data-target="#detailProduct">Xem chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>