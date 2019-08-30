@extends('layout.admin.index')
@section('title')
    <title>Tạo nhóm sản phẩm mới</title>
@endsection

@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><i class="fa fa-sitemap"></i> Tạo mới nhóm sản phẩm</h2>
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
                        <form action="{{route('product-group.store')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group"><label class="col-sm-2 control-label">Tên nhóm</label>
                                <div class="col-sm-10"><input name="product_group_name" type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Tên danh mục cha</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="parent_id">
                                        <option value="0">--Chọn danh mục cha---</option>
                                        @foreach($productGroups as $productGroup)
                                            <option value="{{$productGroup->id}}">{{$productGroup->product_group_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="encCss" rows="5"></textarea>
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
