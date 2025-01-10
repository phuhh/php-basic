<?php defined('_ACCESS_DENIED') or die('Access Denied !!!');

if (!isLogin()) {
  redirect('?module=auth&action=login');
}
$auth = getAuth();

updateLastActivity();
autoRemoveLoginToken();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?= _WEB_HOST_ROOT ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['pageTitle'] ?? null ?></title>
  <link rel="stylesheet" href="<?= _WEB_HOST_TEMPLATES ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= _WEB_HOST_TEMPLATES ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= _WEB_HOST_TEMPLATES ?>/css/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Manager User</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="?module=users">Tài Khoản</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= !empty($auth['FullName']) ? $auth['FullName'] : false ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Thông tin</a>
            <a class="dropdown-item" href="#">Cập nhật mật khẩu</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?module=auth&action=logout">Đăng Xuất</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>