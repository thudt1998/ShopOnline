@extends('layout.admin.index')
@section('title')
    <title>Nhóm sản phẩm</title>
@endsection
@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2><i class="fa fa-sitemap"></i> Danh sách nhóm sản phẩm</h2>
        </div>
        <div class="col-lg-3 btn-add">
            <a href="{{route('product-group.create')}}" class="btn btn-primary "><i class="fa fa-plus"></i>&nbsp;Thêm
                nhóm sản
                phẩm</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    @if(Session::has('flash_message'))
                        <div class="ibox-content">
                            <div class="alert alert-success" style="margin-bottom:0px;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('flash_message') }}
                            </div>
                        </div>
                    @endif
                        @if(Session::has('error_message'))
                            <div class="ibox-content">
                                <div class="alert alert-danger" style="margin-bottom:0px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('error_message') }}
                                </div>
                            </div>
                        @endif
                    <div class="ibox">
                        <div class="ibox-content">

                            <table class="table table-striped table-bordered table-hover table-zip" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên nhóm</th>
                                    <th>Tên danh mục cha</th>
                                    <th>Mô tả</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productGroups as $productGroup)
                                    <tr>
                                        <td>{{$productGroup->id}}</td>
                                        <td>{{$productGroup->name}}</td>
                                        <td>{{$productGroup->parent['name']}}</td>
                                        <td>{{$productGroup->description}}</td>
                                        <td class="text-right footable-visible footable-last-column">
                                            <div class="btn-group">
                                                <a href="{{route('product-group.edit',$productGroup->id)}}"
                                                   class="btn-white btn btn-xs">
                                                    <i class="fa fa-edit "></i> Sửa
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#confirm-delete"
                                                   data-href="{{route('product-group.delete',$productGroup->id)}}"
                                                   class="btn-white btn btn-xs">
                                                    <i class="fa fa-trash "></i> Xoá
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$productGroups->links()}}
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
                    Xoá dữ liệu Nhóm sản phẩm
                </div>
                <div class="modal-body">
                    Bạn có muốn xoá dữ liệu này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ thao tác</button>
                    <a type="submit" class="btn btn-danger btn-ok">Xoá dữ liệu
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
@endsection
