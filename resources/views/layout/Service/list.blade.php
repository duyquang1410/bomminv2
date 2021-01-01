@extends('layout.master')
@section('content')
@if(!empty(Auth::user()->role==1))
    <div class="container">
        <div class="row">
            <div class="col-md-12 box-right">
                <div class="row wrapper white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Dịch vụ</h2>
                    </div>
                    <div class="col-lg-2 ">
                        <h2 class="text-right hidden"><a  href="javascript:;" data-toggle="modal" data-target="#createService" class="btn btn-w-m btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                Thêm mới</a>
                        </h2>
                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="thaotac">
                                            <div class="col-sm-2 m-b-xs">
                                                <select name="selectitem" class="input-sm form-control input-s-sm inline">
                                                    <option value="0">Chọn tác vụ</option>
                                                    <option value="1">Nổi bật</option>
                                                    <option value="2">Ẩn</option>
                                                    <option value="3">Hiện thị</option>
                                                    <option value="4">Xóa vĩnh viễn</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-1 m-b-xs">
                                                <button type="submit" class="btn btn-primary " type="button"><i class="fa fa-check"></i>&nbsp;Áp dụng</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th width="10px"><input type="checkbox"  name=""></th>
                                                        <th width="200px">Tên dịch vụ</th>
                                                        <th width="100px">Tiền trả nhân viên / giờ</th>
                                                        <th width="100px">Tiền thu của khách / giờ</th>
                                                        <th width="200px">Mô tả</th>
                                                        <th width="20px">Ngày tạo</th>
                                                        <th width="80px">Thao tác</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                        @if(!empty($data))
                                                        @foreach($data as $items)
                                                            <tr>
                                                                <td width="10px"><input type="checkbox"  name=""></td>
                                                                <td><b><a href="javascript:;">{!! !empty($items['name'])?$items['name']:'' !!}</a></b></td>
                                                                <td>{!! !empty($items['price'])?number_format($items['price'], 0):'' !!} đ</td>
                                                                <td>{!! !empty($items['priceAdmin'])?number_format($items['priceAdmin'], 0):'' !!} đ</td>
                                                                <td>{!! !empty($items['note'])?$items['note']:'' !!}</td>
                                                                <td>{!! !empty($items['created_at'])?date('d/m/Y H:i', strtotime($items['created_at'])):'' !!}</td>
                                                                <td width="100px">
                                                                    <span><a data-toggle="modal" data-target="#editService" href="javascript:;" id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-warning btnEdit"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                                                                    <span class="hidden"><a id="{!! !empty($items['id'])?$items['id']:0 !!}" class="btn btn-xs btn-danger btndelete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("layout/Service/create")
    @include("layout/Service/edit")

    <style type="text/css">
        .box-img-fullname img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .img-user a {
            font-weight: 700;
            margin-left: 15px;
        }
        .info-user li{
            list-style: none;
        }
    </style>

    <script>
              //  delete user
        $('.btndelete').click(function () {
             var id = $(this).attr('id');
           Lobibox.confirm({
                msg: "Bạn có chắc chẵn muốn xóa không ?",
                callback: function ($this, type) {
                    if (type === 'yes') {
                        var url = "<?php echo url('/') ?>/admin/services/destroy/"+id;
                           $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: id,
                            success: function (data, textStatus, xhr) {
                                console.log(data);
                                if(data['message']=='success'){
                                     Lobibox.notify('success', {
                                        title: 'Thành công',
                                        msg: 'Xóa thành công',
                                    });
                                  setTimeout(function(){
                                      location.reload();
                                  },1500);
                                }
                                else {
                                     Lobibox.notify('error', {
                                        title: 'Có lỗi',
                                        msg: 'Xóa thất bại'
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });
    </script>
    @else
        {!! redirect()->route('login') !!}
    @endif
    @endsection