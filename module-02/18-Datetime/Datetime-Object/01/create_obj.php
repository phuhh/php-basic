<?php

/**
 * Giới thiệu và cách khởi tạo object
 * - Object Timezone
 * - Object Datetime
 * 
 * - Chú ý: khi dùng object datetime mà có timezone, phải dùng object timezone
 * 
 * - Mục địch sử dụng object để dễ tính toán hoặc so sánh ngày giờ. 
 * Còn muốn sử dụng chuỗi ngày giờ tính toán hoặc so sánh phải chuyển đổi sang timestamp mới có giải quyết.
 */


// Tạo ra 1 object Timezone từ chỉ định định vùng
$timezoneObj = timezone_open('Asia/Bangkok');
echo "<pre>";
print_r($timezoneObj);
echo "</pre>";

echo '<hr>';

// date_create() tạo ra object date hiện tại
$dateObj = date_create();
echo "<pre>";
print_r($dateObj);
echo "</pre>";

// Tạo ra 1 object date theo chỉ định có sẵn
$dateObj = date_create('2024-09-10 21:55');
echo "<pre>";
print_r($dateObj);
echo "</pre>";

// Tạo ra 1 object date theo chỉ định có sẵn cùng cùng tham số 1 object Timezone 
$dateObj = date_create('2024-09-10 21:55', $timezoneObj);
echo "<pre>";
print_r($dateObj);
echo "</pre>";

echo '<hr>';

// Tạo ra 1 object date có ĐỊNH DẠNG ĐÚNG với chỉ định có sẵn
$dateObj = date_create_from_format('m-d-Y', '09-10-2024');
echo "<pre>";
var_dump($dateObj);
echo "</pre>";

// Tạo ra 1 object date có ĐỊNH DẠNG ĐÚNG với chỉ định có sẵn cùng tham số 1 object Timezone 
$dateObj = date_create_from_format('mdY', '09102024', $timezoneObj);
echo "<pre>";
var_dump($dateObj);
echo "</pre>";

// Nếu không đúng định dạng hoặc sai định dạng, sẽ trả về FALSE
$dateObj = date_create_from_format('d-m-Y', '09/10/2024', $timezoneObj);
echo "<pre>";
var_dump($dateObj);
echo "</pre>";

/**
 * Các định dạng thường dùng
 * 
 * Y-m-d H:i:s --> Thường xuyên được dùng, cũng định dạng chuẩn trong MySQL
 * m-Y-d H:i:s
 * Y/m/d H:i:s
 * m/d/Y H:i:s
 */
