<?php

/**
 * Sự khác nhau giữa path và url
 * 
 * path
 * - được hiểu là vị trí đường dẫn file hoặc folder được lưu trữ trên ổ đĩa trên máy tính (server)
 * 
 * ví dụ: 
 * - Đường dẫn tập tin path_url.php như sau:
 * /Applications/XAMPP/xamppfiles/htdocs/php-basic/module02/_10_imports/path_url.php
 * 
 * - Đường dẫn thư mục path_url.php như sau:
 * /Applications/XAMPP/xamppfiles/htdocs/php-basic/module02/_10_imports/
 */

$path_file = __FILE__; // Lấy ra đầy đủ tên và đường dẫn tập tin
echo $path_file . '<br>';

$path_dir = __DIR__; // Lấy ra đường dẫn thư mục tập tin
echo $path_dir . '<br>';

/**
 * url
 * 
 * Cấu trúc: https://tuoitre.vn/cong-nghe.htm
 * 
 * Giao thức : http:// hoặc https://
 * Hostname (Domain): tuoitre.vn/ 
 * Path (path of url): cong-nghe.htm
 * Port: 80 hoặc 443
 */
