@extends('layout.admin.index')

@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><i class="fa fa-align-justify"></i> Cập nhật thông tin kênh bán hàng</h2>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        @include('layout.admin.sidebar-settings')
        <div class="col-lg-9 animated fadeInRight">

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

            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="{{route('channel.update',$channel->id)}}"
                              class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="form-group"><label class="col-sm-3 control-label">Tên kênh bán hàng</label>
                                <div class="col-sm-9"><input value="{{$channel->name}}" name="name"
                                                             type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Link</label>
                                <div class="col-sm-9"><input value="{{$channel->link}}" name="link"
                                                             type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Trạng thái</label>
                                <div class="col-sm-9">
                                    <input type="radio" value="1" class="" name="status" @if($channel->status===1) checked @endif>Đang hoạt động
                                    <input type="radio" value="0" class="" name="status" @if($channel->status===0   ) checked @endif>Dừng hoạt động
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">Lưu thông tin</button>
                                    <a href="javascript:history.back()" class="btn btn-warning">Thoát</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
