<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đăng xuất hệ thống

if(!isLogin()){
    redirect('?module=auth&action=login');
}

removeSession('login_token');

setFlashData('msg', 'Đăng xuất thành công!');
setFlashData('msg_type', 'warning');
redirect('?module=auth&action=login');