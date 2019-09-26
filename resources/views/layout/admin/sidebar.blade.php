<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" style="cursor: default">
                        <span class="clear">
                            <span class="text-muted text-xs block text-center"><h3> Quản lý hệ thống </h3></span>
                             <span class="block m-t-xs usr-name text-center">
                                 <img src="{{asset(Storage::url('avatar/default.jpg'))}}"
                                      style="width: 60px;height: 50px" class="img img-circle"><br>
                                Chào,{{ isset(Auth::user()->user_name) ? Auth::user()->user_name : Auth::user()->name }}
                            </span>
{{--                            <span class="block m-t-xs usr-name text-center"><a href="#">Xem thông tin cá nhân</a></span>--}}
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    Ls
                </div>
            </li>
            <li class="@if(Request::is('system/dashboard')) active @endif">
                <a href="/system/dashboard">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">Tổng quan</span>
                    <span class="fa arrow"></span>
                </a>
            </li>
            <li>
                <a href="/system/orders/index?filter-order-status=0">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="nav-label">Bán hàng</span>
                    <span class="fa arrow"></span>
                </a>
            </li>

            <li class="@if(Request::is('system/product*')||Request::is('system/brand*')) active @endif">
                <a>
                    <i class="fa fa-database"></i>
                    <span class="nav-label">Quản lý kho </span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="/system/product-group"
                           style="@if(Request::is('system/product-group*')) color: #a8d3ec; @endif">
                            <i class="fa fa-sitemap"></i>
                            Nhóm sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="/system/brand"
                           style="@if(Request::is('system/brand*')) color: #a8d3ec; @endif">
                            <i class="fa fa-copyright"></i>
                            Thương hiệu
                        </a>
                    </li>
                    <li>
                        <a href="/system/product"
                           style="@if(Request::is('system/product/*')||Request::is('system/product')) color: #a8d3ec; @endif">
                            <i class="fa fa-list"></i>
                            Sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="/system/stock" style="@if(Request::is('system/stock/*')) color: #a8d3ec; @endif">
                            <i class="fa fa-database"></i>
                            Kho hàng
                        </a>
                    </li>
                    <li>
                        <a href="/system/inventory/index"
                           style="@if(Request::is('system/inventory*')) color: #a8d3ec; @endif">
                            <i class="fa fa-cubes"></i>Hàng tồn kho
                        </a>
                    </li>
                    <li>
                        <a href="/system/stock-receipt/index"
                           style="@if(Request::is('system/stock-receipt*')) color: #a8d3ec; @endif">
                            <i class="fa fa-indent"></i>
                            Nhập kho
                        </a>
                    </li>
                    <li>
                        <a href="/system/return-product/index"
                           style="@if(Request::is('system/return-product*')) color: #a8d3ec; @endif">
                            <i class="fa fa-retweet"></i>
                            Trả hàng
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="/system/statistic/sales/dashboard">
                    <i class="fa fa-bar-chart-o"></i>
                    <span class="nav-label">Thống kê, báo cáo</span>
                    <span class="fa arrow"></span>
                </a>
            </li>

            <li>
                <a href="/system/staff/index">
                    <i class="fa fa-sitemap"></i>
                    <span class="nav-label">Nhân viên</span>
                    <span class="fa arrow"></span>
                </a>
            </li>

            <li>
                <a href="/system/customer/index">
                    <i class="fa fa-user"></i>
                    <span class="nav-label">Khách hàng</span>
                    <span class="fa arrow"></span>
                </a>
            </li>

            <li>
                <a href="/system/landing-page/index">
                    <i class="fa fa-magic"></i>
                    <span class="nav-label">Landing Page </span>
                    <span class="fa arrow"></span>
                </a>
            </li>

            <li>
                <a href="javascript">
                    <i class="fa fa-leaf"></i>
                    <span class="nav-label">Website</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a>Tin tức</a>
                    </li>
                    <li>
                        <a>Trang tĩnh</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
