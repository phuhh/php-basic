<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

if (!isLogin()) {
    redirect('?module=auth&action=login');
}

// Hiển thi danh sách users (bao gồm phân trang, tìm kiếm)
echo '<h1>Danh sách người dùng</h1>';
