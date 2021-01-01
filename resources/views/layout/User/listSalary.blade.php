@extends('layout.master')
@section('content')
    @if(!isMobile())
        <div class="container">
            <div class="row">
                <div class="col-md-12 box-right">
                    <div class="row wrapper white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>Bảng lương</h2>
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
                                                            <th width="150px">Tháng</th>
                                                            <th width="100px">Tổng số giờ hát</th>
                                                            <th width="100px">Tổng số giờ bay</th>
                                                            <th width="100px">Tạm ứng</th>
                                                            <th width="100px">Tổng lương</th>
                                                            <th width="100px">Trạng thái</th>
                                                            <th width="80px">Thao tác</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                        @if(!empty($data))
                                                            @foreach($data as $items)
                                                                <tr>
                                                                    <td></td>
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
    @else
        @include('layout.Mobile.User.listSalary')
    @endif

    <style type="text/css">
        a.btnChangePasswordUser{
            background: #05c705;
            color: #FFF;
            border: 0;
            margin-bottom: 0;
        }
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

        a.btnCreateUser{
            background: #05c705;
            color: #FFF;
            border: 0;
            margin-bottom: 0
        }
        a.btnCreateUser:hover {
            background: #05c705;
            color: #FFF;
        }
    </style>
@endsection