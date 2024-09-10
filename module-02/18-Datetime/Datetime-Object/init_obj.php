<?php

/**
 * Giới thiệu và cách khỏi tạo object
 * - Object Timezone
 * - Object Datetime
 * 
 * - Chú ý: khi dùng object datetime mà có timezone, phải dùng object timezone
 * 
 * - Mục địch sử dụng object để dễ tính toán hoặc so sánh ngày giờ. 
 * Còn muốn sử dụng chuỗi ngày giờ tính toán hoặc so sánh phải chuyển đổi sang timestamp mới có giải quyết.
 */


// Khởi tạo 1 object Timezone
$timezoneObj = timezone_open('Asia/Bangkok');
echo "<pre>";
print_r($timezoneObj);
echo "</pre>";

echo '<hr>';

// khởi tạo 1 object Datetime
$datetimeObj = date_create();
echo "<pre>";
print_r($datetimeObj);
echo "</pre>";

$datetimeObj = date_create('2024-09-10 21:55');
echo "<pre>";
print_r($datetimeObj);
echo "</pre>";

$datetimeObj = date_create('2024-09-10 21:55', $timezoneObj);
echo "<pre>";
print_r($datetimeObj);
echo "</pre>";

echo '<hr>';

// Khởi tạo 1 object Datetime phải đúng định dạng 
$datetimeObj = date_create_from_format('m-d-Y', '09-10-2024');
echo "<pre>";
var_dump($datetimeObj);
echo "</pre>";

$datetimeObj = date_create_from_format('mdY', '09102024', $timezoneObj);
echo "<pre>";
var_dump($datetimeObj);
echo "</pre>";

// Nếu không đúng định dạng hoặc sai định dạng, sẽ trả về FALSE
$datetimeObj = date_create_from_format('d-m-Y', '09/10/2024', $timezoneObj);
echo "<pre>";
var_dump($datetimeObj);
echo "</pre>";

/**
 * Các định dạng thường dùng
 * 
 * Y-m-d H:i:s --> Thường xuyên được dùng, cũng định dạng chuẩn trong MySQL
 * m-Y-d H:i:s
 * Y/m/d H:i:s
 * m/d/Y H:i:s
 */
