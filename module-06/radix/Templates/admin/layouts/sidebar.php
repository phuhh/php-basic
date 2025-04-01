<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light text-uppercase">radix company</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= _ADMIN_HOST_TEMPLATES ?>/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= _ADMIN_HOST_ROOT ?>?module=dashboard" class="nav-link<?= isActiveMenuSidebar('dashboard') ? ' active' : false ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tổng Quát
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview<?= isActiveMenuSidebar('categoryBlog') ? ' menu-open' : false ?>">
                    <a href="#" class="nav-link<?= isActiveMenuSidebar('categoryBlog') ? ' active' : false ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Danh Mục Bài Viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= _ADMIN_HOST_ROOT ?>?module=categoryBlog&action=add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= _ADMIN_HOST_ROOT ?>?module=categoryBlog" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview<?= isActiveMenuSidebar('blog') ? ' menu-open' : false ?>">
                    <a href="#" class="nav-link<?= isActiveMenuSidebar('blog') ? ' active' : false ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Bài Viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= _ADMIN_HOST_ROOT ?>?module=blog&action=add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= _ADMIN_HOST_ROOT ?>?module=blog" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách</p>
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">