<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

if (!isLogin()) {
    redirect('?module=auth&action=login');
}

updateLastActivity();
autoRemoveLoginToken();

$data = [
  'pageTitle' => 'Hệ Thống Quản Lý Người Dùng'
];

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

<div class="container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="col-md-12 text-center">
              <h1 class="text-uppercase">Hệ thống quản lý người dùng</h1>
              <a href="?module=users" class="btn btn-success">Truy cập</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= _WEB_HOST_TEMPLATES ?>/js/jquery.slim.min.js"></script>
<script src="<?= _WEB_HOST_TEMPLATES ?>/js/bootstrap.min.js"></script>
<script src="<?= _WEB_HOST_TEMPLATES ?>/js/script.js"></script>
</body>

</html>
