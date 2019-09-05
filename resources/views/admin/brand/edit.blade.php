@extends('layout.admin.index')
@section('title')
    <title>Sửa nhóm sản phẩm</title>
@endsection
@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><i class="fa fa-sitemap"></i> Sửa nhóm sản phẩm</h2>
        </div>
        <div class="col-lg-2">

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
                        <form method="post" action="{{route('brand.update',$brand->id)}}"
                              class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="form-group"><label class="col-sm-2 control-label">Tên thương hiệu</label>
                                <div class="col-sm-10">
                                    <input name="brand_name" type="text" class="form-control"
                                           value="{{$brand->brand_name}}">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Quốc gia</label>
                                <div class="col-sm-10">
                                    <input name="nation" type="text" class="form-control" value="{{$brand->nation}}">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control noresize" id="encCss"
                                              rows="15">{{$brand->description}}</textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Cập nhật thông tin</button>
                                    <a href="{{route('brand.index')}}" class="btn btn-warning">Thoát</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
