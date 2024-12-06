<?php
session_start();

// Imports
require_once './config.php';
require_once './Includes/functions.php';

// Điều hướng (routes)
$module = _MODULE_DEFAULT;
$action = _ACTION_DEFAULT;

if (!empty($_GET['module']) && is_string($_GET['module'])) {
    $module = trim($_GET['module']);
}

if (!empty($_GET['action']) && is_string($_GET['action'])) {
    $action = trim($_GET['action']);
}
// echo $module . '<br>';
// echo $action . '<br>';

$path = './Modules/' . $module . '/' . $action . '.php';
// Load page
if (file_exists($path)) {
    require $path;
} else {
    require './Modules/Errors/404.php';
}
