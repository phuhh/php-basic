<?php

/**
 * include_once tương tự include
 * - Khác 1 điểm: chỉ cho phép nhúng 1 tên tập tin còn tập tin cùng tên nhúng bên dưới sẽ không có chạy
 * 
 * Cú pháp:
 * - include_once 'path-to-php-file'
 * - include_once('path-to-php-file')
 * 
 */

echo '<i>import header (1)</i><br>';
include './partials/header.php';

echo '<i>import header (2)</i><br>';
include './partials/header.php';

echo '<i>import header (3)</i><br>';
include_once './partials/header.php';

echo '<i>import header (4)</i><br>';
include_once './partials/header.php';

include './partials/content.php';

include('./partials/footer.php');
