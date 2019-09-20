@extends('layout.admin.index')
@section('title')
    <title>Product Management</title>
@endsection
@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2><i class="fa fa-list"></i> Chi tiết sản phẩm</h2>
        </div>
        <div class="col-lg-3 btn-add">
            <a href="system/product/create" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Thêm sản phẩm</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <table class="table table-bordered table-hover table-zip table-striped">
                            <tr>
                                <td>#</td>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <td>Nhóm sản phẩm</td>
                                <td>{{$product->productGroup->product_group_name}}</td>
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td>{{$product->product_name}}</td>
                            </tr>
                            <tr>
                                <td>Thương hiệu</td>
                                <td>@if($product->brand_id===NULL)NO
                                    BRAND @else {{$product->brand->brand_name}} @endif </td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Đánh giá</td>
                                <td>{{$product->rate}}</td>
                            </tr>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>{{$product->product_code}}</td>
                            </tr>
                            <tr>
                                <td>Mã vạch</td>
                                <td>{{$product->barcode}}</td>
                            </tr>
                            <tr>
                                <td>Giá sản phẩm</td>
                                <td>{{$product->price}}</td>
                            </tr>
                            <tr>
                                <td>Mô tả</td>
                                <td width="1000px">{{$product->description}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
@endsection
