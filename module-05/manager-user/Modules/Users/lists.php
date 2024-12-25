<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Hiển thi danh sách users (bao gồm phân trang, tìm kiếm)
if (!isLogin()) {
    redirect('?module=auth&action=login');
}

$data = [
    'pageTitle' => 'Tạo mật khẩu mới'
];
// Load Template Login
loadLayout('header', $data);
?>

<h1>Danh sách nhân viên</h1>

<?php loadLayout('footer', $data); ?>