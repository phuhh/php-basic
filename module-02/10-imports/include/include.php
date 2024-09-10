<?php

/**
 * include
 * - cho phép nhúng tập tin php khác vào.
 * 
 * Cú pháp:
 * - include 'path-to-php-file'
 * - include('path-to-php-file')
 * 
 */
$path_dir = __DIR__;
include $path_dir . '/partials/header.php';

include $path_dir . '/partials/content.php';

echo 'Nội dung tập tin index.php';

include($path_dir . '/partials/footer.php');
