@extends('layout.admin.index')
@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2><i class="fa fa-align-justify"></i> Danh sách kênh bán hàng</h2>
        </div>
        <div class="col-lg-3 btn-add">
            <a href="{{route('channel.create')}}" class="btn btn-primary "><i class="fa fa-plus"></i>&nbsp;Tạo kênh bán
                hàng</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @include('layout.admin.sidebar-settings')
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox">

                        @if (Session::has('flash_message'))
                            <div class="ibox-content">
                                <div class="alert alert-success" style="margin-bottom:0px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>
                        @endif

                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                                <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Kênh bán hàng</th>
                                    <th>Đường dẫn</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th width="120" class="text-right">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($channels as $channel)
                                    <tr>
                                        <td>{{$channel->id}}</td>
                                        <td>{{$channel->name}}</td>
                                        <td>{{$channel->link}}</td>
                                        <td>{{$channel->status}}</td>
                                        <td>{{$channel->created_at}}</td>
                                        <td class="text-right footable-visible footable-last-column">
                                            <div class="btn-group">
                                                <a href="{{route('channel.edit',$channel->id)}}"
                                                   class="btn-white btn btn-xs">
                                                    <i class="fa fa-edit "></i> Sửa
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#confirm-delete"
                                                   data-href=""
                                                   class="btn-white btn btn-xs">
                                                    <i class="fa fa-trash "></i> Xoá
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                    <i class="fa fa-minus-circle"></i> Xoá dữ liệu kênh bán hàng
                </div>
                <div class="modal-body">
                    Nếu xoá dữ liệu kênh bán hàng, các dữ liệu liên quan đến kênh bán hàng này sẽ không được hiển thị.
                    <b>Bạn có chắc chắn muốn xoá dữ liệu kênh bán hàng này không ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ thao tác</button>
                    <a class="btn btn-danger btn-ok">Xoá dữ liệu</a>
                </div>
            </div>
        </div>
    </div>

@endsection

