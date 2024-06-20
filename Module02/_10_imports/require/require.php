<?php

/**
 * require
 * - cho phép nhúng tập tin php khác vào nhưng khi gặp lỗi chương trình sẽ dừng
 * 
 * Cú pháp:
 * - require 'path-to-php-file'
 * - require('path-to-php-file')
 * 
 */

require './core/database.php';

require './core/routers.php';

require './core/error.php';

echo 'Run..';
