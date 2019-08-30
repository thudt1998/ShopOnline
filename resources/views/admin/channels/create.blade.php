@extends('layout.admin.index')

@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><i class="fa fa-align-justify"></i> Tạo kênh bán hàng</h2>
        </div>
    </div>
@endsection

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


            @if (Session::has('flash_message'))
                <div class="ibox-content">
                    <div class="alert alert-success" style="margin-bottom:0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{Session::get('flash_message')}}
                    </div>
                </div>
            @endif

            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('channel.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group"><label class="col-sm-3 control-label">Kênh bán hàng</label>
                                <div class="col-sm-9"><input placeholder="Ví dụ: Bán hàng qua Facebook"
                                                             name="name" type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Đường dẫn</label>
                                <div class="col-sm-9"><input placeholder="Ví dụ: http://facebook.com"
                                                             name="link" type="text" class="form-control"></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">Lưu thông tin</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


