<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Dùng để viết các hàm chung

function loadLayout($layoutName = 'header', $data = [])
{
    if (file_exists(_WEB_PATH_TEMPLATES . '//layouts//' . $layoutName . '.php'))
        require_once _WEB_PATH_TEMPLATES . '//layouts//' . $layoutName . '.php';
}
