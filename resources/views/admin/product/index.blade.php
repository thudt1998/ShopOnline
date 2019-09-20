@extends('layout.admin.index')
@section('title')
    <title>Product Management</title>
@endsection
@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2><i class="fa fa-list"></i> Danh sách sản phẩm</h2>
        </div>
        <div class="col-lg-3 btn-add">
            <a href="{{route('product.create')}}" class="btn btn-primary "><i class="fa fa-plus"></i>&nbsp;Thêm sản phẩm</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        @if (Session::has('flash_message'))
                            <div class="ibox-content">
                                <div class="alert alert-success" style="margin-bottom:0px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{Session::get('flash_message')}}
                                </div>
                            </div>
                        @endif
                        <div class="ibox-content">
                            <div class="table-responsive" style="overflow-x: inherit;">
                                <table class="table table-striped table-bordered table-hover table-zip"
                                       id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã Sản phẩm</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Nhóm sản phẩm</th>
                                        <th>Thương hiệu</th>
                                        <th>Hình ảnh đại diện</th>
                                        <th>Giá bán <sup> - vnđ </sup></th>
                                        <th>Giá khuyến mãi <sup> - vnđ </sup></th>
                                        <th width="70">Tồn kho</th>
                                        <th>Đánh giá</th>
                                        <th>Chi tiết</th>
                                        <th class="text-right" width="120">Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->product_code}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->productGroup->product_group_name}}</td>
                                            <td>@if($product->brand_id===NULL)NO
                                                BRAND @else {{$product->brand->brand_name}} @endif </td>
                                            <td><img src="{{$product->productImagePrimary}}" style="width: 100px;height: 100px"></td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->promotion_price}}</td>
                                            <td></td>
                                            <td>{{$product->rate}}</td>
                                            <td><a href="{{route('product.show',$product->id)}}">Xem chi tiết</a></td>
                                            <td class="text-right footable-visible footable-last-column">
                                                <div class="btn-group">
                                                    <a href="" class="btn-white btn btn-xs">
                                                        <i class="fa fa-edit "></i> Sửa
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#confirm-delete"
                                                       data-href="" class="btn-white btn btn-xs">
                                                        <i class="fa fa-trash "></i> Xoá
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox">
                                        <div class="ibox-content bg-block">
                                            <div class="sp-14-400"><a href="system/statistic/product"><i
                                                        class="fa fa-bar-chart-o"></i> Thống kê sản phẩm</a></div>
                                            <table class="table table-stripped m-t-md">
                                                <tbody>
                                                <tr>
                                                    <td class="" width="10">
                                                        <i class="fa fa-circle text-success"></i>
                                                    </td>
                                                    <td class="">
                                                        Tổng số lượng sản phẩm: <span class="text-danger"></span> sản
                                                        phẩm
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10">
                                                        <i class="fa fa-circle text-success"></i>
                                                    </td>
                                                    <td>
                                                        Tổng số lượng sản phẩm tồn kho: <span
                                                            class="text-danger"></span> sản phẩm
                                                    </td>
                                                </tr>
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
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Xoá dữ liệu Sản phẩm
                </div>
                <div class="modal-body">
                    Bạn có muốn xoá dữ liệu này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ thao tác</button>
                    <a class="btn btn-danger btn-ok">Xoá dữ liệu</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="lightweight/readmore.js"></script>
    <script>
        $(document).ready(function () {
            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
        $('.article').readmore({
            speed: 100,
            collapsedHeight: 100,
            heightMargin: 16,
            moreLink: '<a href="#">Xem thêm</a>',
            lessLink: '<a href="#">Rút gọn</a>',
            embedCSS: true,
            blockCSS: 'display: block; width: 100%;',
            startOpen: false
        });
    </script>
@endsection
