<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đăng xuất hệ thống

if (!isLogin()) {
    redirect('/admin/?module=auth&action=login');
}
$token = getSession('login_token');
// Delele Token
delete('radix_login_token', "token_string = '{$token}'");
// Remove Session Token
removeSession('login_token');
// Redirect
setFlashData('msg', 'Đăng xuất thành công.');
setFlashData('msg_type', 'warning');
redirect('/admin/?module=auth&action=login');
