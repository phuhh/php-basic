<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

if (!isLogin()) {
    redirect('?module=auth&action=login');
}

echo '<h1>Trang Chính</h1>';
