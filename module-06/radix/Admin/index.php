<?php
session_start();

// Imports
require_once '../config.php';

require_once _WEB_PATH_ROOT . '/Includes/connect.php'; // Connect Database
require_once _WEB_PATH_ROOT . '/Includes/database.php';
// Import PHPMailer
require_once _WEB_PATH_ROOT . '/Includes/PHPMailer/Exception.php';
require_once _WEB_PATH_ROOT . '/Includes/PHPMailer/SMTP.php';
require_once _WEB_PATH_ROOT . '/Includes/PHPMailer/PHPMailer.php';

require_once _WEB_PATH_ROOT . '/Includes/functions.php';
require_once _WEB_PATH_ROOT . '/Includes/session.php';

// Điều hướng (routes)
$module = _ADMIN_MODULE_DEFAULT;
$action = _ADMIN_ACTION_DEFAULT;

if (!empty($_GET['module']) && is_string($_GET['module'])) {
    $module = trim($_GET['module']);
}

if (!empty($_GET['action']) && is_string($_GET['action'])) {
    $action = trim($_GET['action']);
}
// echo $module . '<br>';
// echo $action . '<br>';
// $path = './Modules/' . $module . '/' . $action . '.php';
$path = _ADMIN_PATH_ROOT . '/Modules/' . $module . '/' . $action . '.php';
echo $path;

// Load page
if (file_exists($path)) {
    require $path;
} else {
    // require './Modules/Errors/404.php';
    require _ADMIN_PATH_ROOT . '/Modules/Errors/404.php';
}
