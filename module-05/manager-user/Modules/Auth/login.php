<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đăng nhập hệ thống
$data = [
    'pageTitle' => 'Đăng Nhập Hệ Thống'
];
loadLayout('header_login', $data);
?>

<div class="container">
    <div class="row">
        <div class="col-6" style="margin: 20px auto;">
            <h3 class="text-center text-uppercase">Đăng Nhập</h3>
            <form action="/" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" placeholder="Nhập email..." id="email">
                </div>
                <div class="form-group">
                    <label for="pass">Mật Khẩu:</label>
                    <input type="password" class="form-control" placeholder="Nhập mật khẩu..." id="pass">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                <hr>
                <p class="text-center"><a href="?module=auth&action=forgot">Quên Mật Khẩu</a></p>
                <p class="text-center"><a href="?module=auth&action=register">Đăng Ký Tài Khoản</a></p>
            </form>
        </div>
    </div>
</div>


<?php loadLayout('footer_login'); ?>