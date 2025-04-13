<?php
session_start();
ob_start();

// Imports
require_once '../config.php';

require_once _WEB_ROOT_PATH . '/Includes/connect.php'; // Connect Database
require_once _WEB_ROOT_PATH . '/Includes/database.php';
// Import PHPMailer
require_once _WEB_ROOT_PATH . '/Includes/PHPMailer/Exception.php';
require_once _WEB_ROOT_PATH . '/Includes/PHPMailer/SMTP.php';
require_once _WEB_ROOT_PATH . '/Includes/PHPMailer/PHPMailer.php';

require_once _WEB_ROOT_PATH . '/Includes/functions.php';
require_once _WEB_ROOT_PATH . '/Includes/session.php';

// Điều hướng (routes)
$module = _ADMIN_MODULE_DEFAULT;
$action = _ADMIN_ACTION_DEFAULT;

if (!empty($_GET['module']) && is_string($_GET['module'])) {
    $module = strtolower(trim($_GET['module']));
}

if (!empty($_GET['action']) && is_string($_GET['action'])) {
    $action = strtolower(trim($_GET['action']));
}
// echo $module . '<br>';
// echo $action . '<br>';
// $path = './Modules/' . $module . '/' . $action . '.php';
$path = _ADMIN_ROOT_PATH . '/Modules/' . $module . '/' . $action . '.php'; // read file

// Load page
if (file_exists($path)) {
    require $path;
} else {
    // require './Modules/Errors/404.php';
    require _ADMIN_ROOT_PATH . '/Modules/errors/404.php';
}
