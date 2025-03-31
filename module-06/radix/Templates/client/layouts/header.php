<?php defined('_ACCESS_DENIED') or die('Access Denied !!!');

if (!isLogin()) {
  redirect('?module=auth&action=login');
}
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
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo getFullname(); ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Thông tin tài khoản</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?module=auth&action=logout">Đăng Xuất</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>