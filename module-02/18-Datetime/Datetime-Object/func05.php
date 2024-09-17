<?php

/**
 * Lấy ra thông tin thời gian
 * 
 * 1. Lấy thông tin từ chuỗi thời gian: date_parse($str);
 */
$str = '2024-09-11 21:42';
$info = date_parse($str);

echo "<pre>";
print_r($info);
echo "</pre>";

// Lỗi nếu: Định dạng ngày tháng năm và dấu gạch chéo
$str = '13/09/2024 21:42';

$error = date_parse($str);

echo "<pre>";
print_r($error);
echo "</pre>";

echo '<hr>';

/**
 * 2. Lấy thông tin thời gian trả ra datetime object: date_create_from_format($format, $str)
 */
$str = '2024-09-11';
$format = 'Y-m-d';

$dateTimeObject = date_create_from_format($format, $str);

echo "<pre>";
var_dump($dateTimeObject);
echo "<pre>";
