<?php
session_start();

// Imports
require_once './config.php';
// require_once './Includes/functions.php';
require_once _WEB_PATH_ROOT . '/Includes/connect.php'; // Import Connect Database
require_once _WEB_PATH_ROOT . '/Includes/functions.php';
require_once _WEB_PATH_ROOT . '/Includes/session.php';

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

// $path = './Modules/' . $module . '/' . $action . '.php';
$path = _WEB_PATH_ROOT . '//Modules/' . $module . '/' . $action . '.php';

// Load page
if (file_exists($path)) {
    require $path;
} else {
    // require './Modules/Errors/404.php';
    require _WEB_PATH_ROOT . '/Modules/Errors/404.php';
}
