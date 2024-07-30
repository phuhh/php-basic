<?php

/**
 * require_once tương tự require
 * - Khác 1 điểm: chỉ cho phép nhúng 1 tên tập tin còn tập tin cùng tên nhúng bên dưới sẽ không có chạy
 * 
 * Cú pháp:
 * - require_once 'path-to-php-file'
 * - require_once('path-to-php-file')
 * 
 */

echo '<i>import database(1)</i> <br>';
require_once './core/database.php';

echo '<i>import database(2)</i> <br>';
require_once './core/database.php';

require './core/routers.php';

echo 'Run..';
