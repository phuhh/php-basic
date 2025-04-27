<?php
defined('_48_HOURS') or define('_48_HOURS', 176400);
//If you close your browser your session is lost.
//session.cookie_lifetime specifies the lifetime of the cookie in seconds which is sent to the browser.
ini_set('session.cookie_lifetime', _48_HOURS);
//session.gc_maxlifetime specifies the number of seconds after which data will be seen as 'garbage' and potentially cleaned up.
ini_set('session.gc_maxlifetime', _48_HOURS);
session_start();

// Imports
require_once './config.php';

require_once _WEB_ROOT_PATH . '/Includes/connect.php'; // Connect Database
require_once _WEB_ROOT_PATH . '/Includes/database.php';
// Import PHPMailer
require_once _WEB_ROOT_PATH . '/Includes/PHPMailer/Exception.php';
require_once _WEB_ROOT_PATH . '/Includes/PHPMailer/SMTP.php';
require_once _WEB_ROOT_PATH . '/Includes/PHPMailer/PHPMailer.php';

require_once _WEB_ROOT_PATH . '/Includes/functions.php';
require_once _WEB_ROOT_PATH . '/Includes/session.php';

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
$path = _WEB_ROOT_PATH . '/Modules/' . $module . '/' . $action . '.php';
// echo $path;

// Load page
if (file_exists($path)) {
    require $path;
} else {
    // require './Modules/Errors/404.php';
    require _WEB_ROOT_PATH . '/Modules/Errors/404.php';
}
