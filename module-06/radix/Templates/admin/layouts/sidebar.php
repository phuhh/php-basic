<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= getLinkAdmin('dashboard') ?>" class="brand-link">
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
                <a href="<?= getLinkAdmin('auth', 'profile') ?>" class="d-block"><?= getFullname() ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false" role="menu">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= getLinkAdmin('dashboard') ?>" class="nav-link<?= isActiveMenuSidebar('dashboard') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tổng quan
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview<?= isActiveMenuSidebar('services') ? ' menu-open' : '' ?>">
                    <a href="javascript:void(0)" class="nav-link<?= isActiveMenuSidebar('services') ? ' active' : '' ?>">
                        <i class="nav-icon fab fa-servicestack"></i>
                        <p>
                            Dịch vụ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= getLinkAdmin('services', 'create') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= getLinkAdmin('services') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview<?= isActiveMenuSidebar('groups') ? ' menu-open' : '' ?>">
                    <a href="javascript:void(0)" class="nav-link<?= isActiveMenuSidebar('groups') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Nhóm người dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= getLinkAdmin('groups', 'create') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= getLinkAdmin('groups') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview<?= isActiveMenuSidebar('users') ? ' menu-open' : '' ?>">
                    <a href="javascript:void(0)" class="nav-link<?= isActiveMenuSidebar('users') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Người dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= getLinkAdmin('users', 'create') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= getLinkAdmin('users') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
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