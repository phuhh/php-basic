<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đăng ký hệ thống
$data = [
    'pageTitle' => 'Đăng Ký Tài Khoản'
];
loadLayout('header_login', $data);
?>

<div class="container">
    <div class="row">
        <div class="col-6" style="margin: 20px auto;">
            <h3 class="text-center text-uppercase">Đăng Ký Tài Khoản</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" placeholder="Nhập email..." name="email">
                </div>
                <div class="form-group">
                    <label for="pass">Mật Khẩu:</label>
                    <input type="password" class="form-control" placeholder="Nhập mật khẩu..." name="pass">
                </div>
                <div class="form-group">
                    <label for="repass">Nhập Lại MK:</label>
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu..." name="repass">
                </div>
                <div class="form-group">
                    <label for="fullname">Họ Tên:</label>
                    <input type="text" class="form-control" placeholder="Nhập họ tên..." name="fullname">
                </div>
                <div class="form-group">
                    <label for="phone">SĐT:</label>
                    <input type="text" class="form-control" placeholder="Nhập sđt..." name="phone">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
                <hr>
                <p class="text-center"><a href="?module=auth&action=login">Đăng Nhập</a></p>
            </form>
        </div>
    </div>
</div>


<?php loadLayout('footer_login'); ?>