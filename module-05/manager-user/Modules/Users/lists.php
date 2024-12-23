<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Hiển thi danh sách users (bao gồm phân trang, tìm kiếm)
if (!isLogin()) {
    redirect('?module=auth&action=login');
}

echo '<h1>Danh sách người dùng</h1>';
