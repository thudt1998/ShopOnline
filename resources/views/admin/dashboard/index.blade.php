@extends('layout.admin.index')
@section('title')
<title>Admin</title>
@endsection
@section('breadcrumbs')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><i class="fa fa-th-large"></i> Tổng quan</h2>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-wrap">
                <span>Trạng thái đơn hàng</span>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-content" style="background:#fbfbfb;">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget style1 lb-sm-waiting ">
                                <div class="row">
                                    <a style="color:#565454;" href="system/orders/index?filter-order-status=0">
                                        <div class="col-xs-4">
                                            <i class="fa fa-undo fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <span> Chờ duyệt </span>
                                            <h2 class="font-bold">10 đơn</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="widget style1 lb-sm-delivery">
                                <div class="row">
                                    <a style="color:#565454;" href="system/orders/index?filter-order-status=2">
                                        <div class="col-xs-4">
                                            <i class="fa fa-truck fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <span> Vận đơn </span>
                                            <h2 class="font-bold">10 đơn</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="widget style1 lb-sm-success">
                                <div class="row">
                                    <a style="color:#565454;" href="system/orders/index?filter-order-status=3">
                                        <div class="col-xs-4">
                                            <i class="fa fa-check fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <span> Thành công </span>
                                            <h2 class="font-bold">10 đơn</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="widget style1 lb-sm-cancel">
                                <div class="row">
                                    <a style="color:#565454 ;" href="system/orders/index?filter-order-status=4">
                                        <div class="col-xs-4">
                                            <i class="fa fa-times fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <span> Đơn huỷ </span>
                                            <h2 class="font-bold">10 đơn</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-container" style="margin-top:15px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-success"> Thành công</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-return">Hàng hoàn</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-cancel">Huỷ đơn</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-success" class="tab-pane active">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">10000
                                                                <sup>đ</sup></h4>
                                                            <a href="system/orders/index?filter-order-status=3&filter-order-time=today">
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Hôm nay
                                                                </h3>
                                                            </a>

                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">10 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm bán ra: <span
                                                                    class="text-danger">10 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">10000
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Tuần này
                                                                </h3>
                                                            </a>

                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">10 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm bán ra: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Tháng này
                                                                </h3>
                                                            </a>

                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm bán ra: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Năm nay
                                                                </h3>
                                                            </a>

                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm bán ra: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tab-return" class="tab-pane">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Hôm nay
                                                                </h3>
                                                            </a>
                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm trả về: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold  margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Tuần này
                                                                </h3>
                                                            </a>
                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm trả về: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold  margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Tháng này
                                                                </h3>
                                                            </a>
                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm trả về: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold  margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Năm nay
                                                                </h3>
                                                            </a>
                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm trả về: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tab-cancel" class="tab-pane">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Hôm nay
                                                                </h3>
                                                            </a>

                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm bán ra: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Tuần này
                                                                </h3>
                                                            </a>

                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm bán ra: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Tháng này
                                                                </h3>
                                                            </a>

                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm bán ra: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="widget no-padding dashboard-wrap">
                                                        <div class="p-m">
                                                            <h4 class="text-normal">1
                                                                <sup>đ</sup></h4>
                                                            <a>
                                                                <h3 class="font-bold margin-bottom-normal-px text-normal padding-bottom-normal-px border-bottom-grey">
                                                                    Năm nay
                                                                </h3>
                                                            </a>

                                                            <p class="no-margins">
                                                                <small class="small-fix">Tổng số đơn: <span
                                                                        class="text-danger">1 đơn</span></small>
                                                            </p>
                                                            <small class="small-fix">Sản phẩm bán ra: <span
                                                                    class="text-danger">1 sản phẩm</span></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
