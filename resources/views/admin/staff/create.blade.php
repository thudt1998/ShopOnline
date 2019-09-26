@extends('layout.admin.index')

@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Thêm nhân viên</h2>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">

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

            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{route('user.store')}}" method="POST" class="form-horizontal">
                           @csrf
                            <div class="form-group"><label class="col-sm-3 control-label">Họ và tên</label>
                                <div class="col-sm-9"><input name="name" type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9"><input name="email" type="email" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Mật khẩu</label>
                                <div class="col-sm-9"><input name="password" type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Số CMND</label>
                                <div class="col-sm-9"><input name="identity_card_number" type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9"><input name="phone" type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Địa chỉ </label>
                                <div class="col-sm-9"><input name="address" type="text" class="form-control"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label">Chức vụ</label>
                                <div class="col-sm-9">
                                    <select class="form-control m-b" name="user_position_id">
                                        <option value="" selected="">-- Chọn chức vụ  --</option>
                                        @foreach($userPositions as $userPosition)
                                            <option value="{{$userPosition->id}}">{{$userPosition->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
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

@stop

