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
@stop

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
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                    @if (Session::has('flash_message'))
                        <div class="ibox-content">
                            <div class="alert alert-success" style="margin-bottom:0px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {!! Session::get('flash_message') !!}
                            </div>
                        </div>
                    @endif


                    <div class="ibox-content">
                        <form method="post" action="{{route('product-group.update',$productGroup->id)}}"
                              class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="form-group"><label class="col-sm-2 control-label">Tên nhóm</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control"
                                           value="{{$productGroup->name}}">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Chọn danh mục cha</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="parent_id">
                                        <option value="{{$productGroup->parent_id}}"
                                                selected="">{{$productGroup->parent['name']}}</option>
                                        @foreach($productGroups as $productGroup)
                                            <option value="{{$productGroup->id}}">{{$productGroup->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control noresize" id="encCss"
                                              rows="3">{{$productGroup->description}}</textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Cập nhật thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


