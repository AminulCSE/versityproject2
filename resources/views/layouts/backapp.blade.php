@include('inc.adminheader')
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel"></div>
                            <ul class="pcoded-item pcoded-left-item">

                                <li class="">
                                    <a href="{{ route('admin.home') }}">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>



                                <li class="pcoded-hasmenu {{ request()->is('category/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Category</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('category/add_category') ? 'active':'' }}">
                                            <a href="{{ url('category/add_category') }}">
                                                <span class="pcoded-mtext">Add Category</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('category/all_category') ? 'active':'' }}">
                                            <a href="{{ url('category/all_category') }}">
                                                <span class="pcoded-mtext">All Category</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="pcoded-hasmenu {{ request()->is('subcategory/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Sub Category</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('subcategory/add_sub_category') ? 'active':'' }}">
                                            <a href="{{ url('subcategory/add_sub_category') }}">
                                                <span class="pcoded-mtext">Add Sub Category</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('subcategory/all_sub_category') ? 'active':'' }}">
                                            <a href="{{ url('subcategory/all_sub_category') }}">
                                                <span class="pcoded-mtext">All Sub Category</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="pcoded-hasmenu {{ request()->is('slider/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Slider</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('slider/add_slider') ? 'active':'' }}">
                                            <a href="{{ url('slider/add_slider') }}">
                                                <span class="pcoded-mtext">Add Slider</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('slider/all_slider') ? 'active':'' }}">
                                            <a href="{{ url('slider/all_slider') }}">
                                                <span class="pcoded-mtext">All Slider</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="pcoded-hasmenu {{ request()->is('ourservice/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Our Service/ About us</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('ourservice/add_our_service') ? 'active':'' }}">
                                            <a href="{{ url('ourservice/add_our_service') }}">
                                                <span class="pcoded-mtext">Add Service</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('ourservice/view_our_service') ? 'active':'' }}">
                                            <a href="{{ url('ourservice/view_our_service') }}">
                                                <span class="pcoded-mtext">View Our Service</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="pcoded-hasmenu {{ request()->is('blog/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Blog</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('blog/add_blog') ? 'active':'' }}">
                                            <a href="{{ url('blog/add_blog') }}">
                                                <span class="pcoded-mtext">Add Blog</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('blog/all_blog') ? 'active':'' }}">
                                            <a href="{{ url('blog/all_blog') }}">
                                                <span class="pcoded-mtext">All Blog</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                                 <li class="pcoded-hasmenu {{ request()->is('banner/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Banner</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('banner/add_banner') ? 'active':'' }}">
                                            <a href="{{ url('banner/add_banner') }}">
                                                <span class="pcoded-mtext">Add Banner</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('banner/all_banner') ? 'active':'' }}">
                                            <a href="{{ url('banner/all_banner') }}">
                                                <span class="pcoded-mtext">All Banner</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="pcoded-hasmenu {{ request()->is('logo/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Logo</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('logo/add_logo') ? 'active':'' }}">
                                            <a href="{{ url('logo/add_logo') }}">
                                                <span class="pcoded-mtext">Add Logo</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('logo/all_logo') ? 'active':'' }}">
                                            <a href="{{ url('logo/all_logo') }}">
                                                <span class="pcoded-mtext">All Logo</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="pcoded-hasmenu {{ request()->is('product/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Product</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('product/add_product') ? 'active':'' }}">
                                            <a href="{{ url('product/add_product') }}">
                                                <span class="pcoded-mtext">Add Product</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('product/all_product') ? 'active':'' }}">
                                            <a href="{{ url('product/all_product') }}">
                                                <span class="pcoded-mtext">All Product</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="pcoded-hasmenu {{ request()->is('customer/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Customer</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('customer/all_customer') ? 'active':'' }}">
                                            <a href="{{ url('customer/all_customer') }}">
                                                <span class="pcoded-mtext">All Customer</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('customer/all_draft_customer') ? 'active':'' }}">
                                            <a href="{{ url('customer/all_draft_customer') }}">
                                                <span class="pcoded-mtext">Draft Customer</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="pcoded-hasmenu {{ request()->is('orders/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Orders</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('orders/approved_orders') ? 'active':'' }}">
                                            <a href="{{ url('orders/approved_orders') }}">
                                                <span class="pcoded-mtext">Approved Orders</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('orders/pending_orders') ? 'active':'' }}">
                                            <a href="{{ url('orders/pending_orders') }}">
                                                <span class="pcoded-mtext">Pending Orders</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                                 <li class="pcoded-hasmenu {{ request()->is('admin/*') ? 'pcoded-trigger':'' }}">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Admin</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="{{ request()->is('admin/add_admin') ? 'active':'' }}">
                                            <a href="{{ url('admin/add_admin') }}">
                                                <span class="pcoded-mtext">Add Admin</span>
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('admin/all_admin') ? 'active':'' }}">
                                            <a href="{{ url('admin/all_admin') }}">
                                                <span class="pcoded-mtext">All Admin</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </nav>
                    @yield('backend_content')
@include('inc.adminfooter')