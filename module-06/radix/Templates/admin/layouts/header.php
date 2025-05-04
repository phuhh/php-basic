<?php defined('_ACCESS_DENIED') or die('Access Denied !!!');

if (!isLogin()) {
    redirect('/admin/?module=auth&action=login');
}

updateLastActivity();
autoRemoveLoginToken();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $data['pageTitle'] ?? '' ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= _ADMIN_HOST_TEMPLATES ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= _ADMIN_HOST_TEMPLATES ?>/assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= _ADMIN_HOST_TEMPLATES ?>/assets/css/style.css?v=<?= rand() ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i> Hi, <?= getFullname() ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?= getLinkAdmin('user', 'profile') ?>" class="dropdown-item">
                            <i class="fas fa-info-circle mr-2"></i> Thông tin hồ sơ
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= getLinkAdmin('user', 'changePassword') ?>" class="dropdown-item">
                            <i class="fas fa-sync mr-2"></i> Thay đổi mật khẩu
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= getLinkAdmin('auth', 'logout') ?>" class="dropdown-item dropdown-footer">
                            <i class="fas fa-sign-out-alt"></i>
                            Đăng Xuất
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->