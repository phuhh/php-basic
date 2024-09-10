<?php
// Khai báo và sử dụng HẰNG SỐ

// Khai báo HẰNG SỐ = hàm define()
define('MYSQL_HOST', 'localhost');
echo MYSQL_HOST;
echo '<br>';
// Lưu ý:
// TÊN HẰNG SỐ chỉ được khai báo 1 lần 
// Giá trị HẰNG SỐ không thay đổi, ngược lại với Biến.

// Đặt tên theo kiểu underscore (viết cách nhau bằng dấu gạch dưới), ví dụ: MYSQL_HOST 
// hoặc Bắt Đầu dấu gạch dưới phía, ví dụ: trước _MYSQL_USERNAME
define('_MYSQL_USERNAME', 'admin');
echo _MYSQL_USERNAME;
echo '<br>';

// Khai báo HẰNG SỐ với từ khoá const
const _MYSQL_PASSWORD = '123456';
echo _MYSQL_PASSWORD;
echo '<br>';

// Kiểm tra tồn tại HẰNG SỐ = hàm defined()
$checkConst = defined('MYSQL_HOST');
var_dump($checkConst);
echo '<br>';

// example
defined('CONSTANT') or define('CONSTANT', 'SomeDefaultValue');
echo CONSTANT;
echo '<br>';
