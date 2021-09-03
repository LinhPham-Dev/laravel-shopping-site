@php
$list_menu = config('menu')
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('asset-backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('asset-backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @auth('admin')
                    {{ Auth::guard('admin')->user()->name }}
                    @endauth
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- List Menu -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/products' ) || request()->is('admin/products/*') ? 'active' : '' }}">
                        <i class="nav-icon fab fa-dropbox"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $total_item->totalProduct() }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/admin/products" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/admin/products/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/categories' ) || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $total_item->totalCategory() }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/admin/categories" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category Management</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/orders' ) || request()->is('admin/orders/*') ? 'active' : '' }}">
                        <i class=" nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Order
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $total_item->totalOrder() }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/admin/orders/show" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order Management</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/colors' ) || request()->is('admin/colors/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>
                            Color
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $total_item->totalColor() }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/admin/colors" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Color Management</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/sizes' ) || request()->is('admin/sizes/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-crop-alt"></i>
                        <p>
                            Size
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $total_item->totalSize() }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/admin/sizes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Size Management</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
