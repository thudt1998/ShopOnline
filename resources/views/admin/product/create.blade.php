@extends('layout.admin.index')
@section('title')
    <title>Tạo sản phẩm mới</title>
@endsection

@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><i class="fa fa-sitemap"></i> Tạo mới sản phẩm</h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    @if (count($errors) > 0)
                        <div class="ibox-content">
                            <div class="alert alert-danger" style="margin-bottom:0px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="ibox-content">
                        <form action="{{route('product.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"><label class="col-sm-3 control-label">Tên sản phẩm</label>
                                <div class="col-sm-9"><input name="product_group_name" type="text"
                                                             class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Tên nhóm sản phẩm</label>
                                <div class="col-sm-9">
                                    <select class="form-control m-b" name="product_group_id">
                                        <option value="0">--Chọn nhóm sản phẩm---</option>
                                        @foreach($productGroups as $productGroup)
                                            <option
                                                value="{{$productGroup->id}}">{{$productGroup->product_group_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Xuất sứ</label>
                                <div class="col-sm-9">
                                    <input name="origin" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Ảnh đại diện sản phẩm</label>
                                <div class="col-sm-9">
                                    <input name="product_primary_image" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Ảnh mô tả sản phẩm</label>
                                <div class="col-sm-9">
                                    <input name="product_images[]" type="file"
                                           class="form-control" multiple>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Tên thương hiệu</label>
                                <div class="col-sm-9">
                                    <select class="form-control m-b" name="parent_id">
                                        <option value="0">--Chọn tên thương hiệu---</option>
                                        @foreach($brands as $brand)
                                            <option
                                                value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                    Thêm thương hiệu <a href="{{route('brand.create')}}"
                                                        style="color: #953b39;text-decoration: underline">tại đây</a>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Mã sản phẩm</label>
                                <div class="col-sm-9">
                                    <input name="product_code" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Barcode</label>
                                <div class="col-sm-9">
                                    <input name="barcode" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Giá bán</label>
                                <div class="col-sm-9">
                                    <div class="input-group m-b">
                                        <input name="price" type="text" class="form-control">
                                        <span class="input-group-addon">vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Giá khuyến mại</label>
                                <div class="col-sm-9">
                                    <div class="input-group m-b">
                                        <input name="promotion_price" type="text" class="form-control">
                                        <span class="input-group-addon">vnđ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Cảnh báo hết hàng</label>
                                <div class="col-sm-9">
                                    <input name="warning_out_of_stock" type="text" class="form-control"
                                           placeholder="Nhập số lượng cảnh báo sắp hết hàng trong kho">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Mô tả</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control" id="editor1"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Cân nặng - Thể tích</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" name="weight"
                                               class="form-control js_price ng-pristine ng-untouched ng-valid"
                                               placeholder="Nhập cân nặng sản phẩm">
                                        <span class="input-group-addon btn-flat ng-binding">0 <sup>g</sup></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" name="volume"
                                               class="form-control js_price ng-pristine ng-valid ng-touched"
                                               placeholder="Nhập thể tích sản phẩm">
                                        <span class="input-group-addon btn-flat ng-binding">0 <sup>ml</sup></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Lưu thông tin</button>
                                    <button class="btn btn-danger" type="reset">Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
