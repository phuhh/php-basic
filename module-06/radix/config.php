<?php
// Định nghĩa múi giờ
date_default_timezone_set('Asia/Bangkok');

// Định nghĩa giờ, phút
defined('_MINUTE') or define('_MINUTE', 60);
defined('_HOUR') or define('_HOUR', 3600);
defined('_DAY') or define('_DAY', 86400);

// Routes Default
defined('_MODULE_DEFAULT') or define('_MODULE_DEFAULT', 'home');
defined('_ACTION_DEFAULT') or define('_ACTION_DEFAULT', 'lists');

// Routes Admin
defined('_ADMIN_MODULE_DEFAULT') or define('_ADMIN_MODULE_DEFAULT', 'dashboard');
defined('_ADMIN_ACTION_DEFAULT') or define('_ADMIN_ACTION_DEFAULT', 'lists');

// Ngăn chặn người dùng truy cập vào files trực tiếp
defined('_ACCESS_DENIED') or define('_ACCESS_DENIED', true);

// Thiết lập đường dẫn Host Root
defined('_SUB_DIRECTORY') or define('_SUB_DIRECTORY', '/php-basic/module-06/radix');
// defined('_SUB_DIRECTORY') or define('_SUB_DIRECTORY', '/module-06/radix');

defined('_WEB_HOST_ROOT') or define(
    '_WEB_HOST_ROOT',
    'http://' . $_SERVER['HTTP_HOST'] . _SUB_DIRECTORY
);

defined('_ADMIN_HOST_ROOT') or define(
    '_ADMIN_HOST_ROOT',
    'http://' . $_SERVER['HTTP_HOST'] . _SUB_DIRECTORY . '/admin'
);

// Thiết lập dường dẫn Host Templates
defined('_WEB_HOST_TEMPLATES') or define(
    '_WEB_HOST_TEMPLATES',
    _WEB_HOST_ROOT . '/Templates/client'
);

defined('_ADMIN_HOST_TEMPLATES') or define(
    '_ADMIN_HOST_TEMPLATES',
    _WEB_HOST_ROOT . '/Templates/admin'
);

// Thiết lập đường dẫn cấu trúc dự án Root
// defined('_WEB_ROOT_PATH') or define('_WEB_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/php-basic/module-05/manager-user');
defined('_WEB_ROOT_PATH') or define('_WEB_ROOT_PATH', __DIR__);
defined('_ADMIN_ROOT_PATH') or define('_ADMIN_ROOT_PATH', _WEB_ROOT_PATH . '/Admin');

// Thiết lập đường dẫn cấu trúc dự án Templates
defined('_WEB_PATH_TEMPLATES') or define('_WEB_PATH_TEMPLATES', _WEB_ROOT_PATH . '/Templates');

// Thiết lập kết nối csdl
defined('DB_DRIVER ') || define('DB_DRIVER', 'mysql');
defined('DB_HOST ') || define('DB_HOST', 'localhost');
defined('DB_SCHEMA ') || define('DB_SCHEMA', 'PHP_basic_radix');
defined('DB_USERNAME ') || define('DB_USERNAME', 'root');
defined('DB_PASSWORD ') || define('DB_PASSWORD', '');

//Thiết lập phân trang
defined('_PAGE_PER') || define('_PAGE_PER', 3);
defined('_PAGINATION_BUTTONS') || define('_PAGINATION_BUTTONS', 2);
