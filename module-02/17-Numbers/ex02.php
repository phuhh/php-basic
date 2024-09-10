<?php

/**
 * Dấu chấm (.) và Dấu phẩy (,)
 * 
 * Trong tin học
 * Dấu chấm (.) hiểu là thập phân
 * Dấu phẩy (,) không là gì hết (chỉ là ký tự bình thường)
 */
$num = '100.000';
$check = is_numeric($num);
var_dump($check); // OUTPUT: true
echo '<br>';

$result = $num + 200000;
var_dump($result); // OUTPUT: float(200100)
echo '<hr>';

// Chuyển đổi số thực thành số nguyên
$num = '100.000';
$num = str_replace('.', '', $num);
$result = $num + 200000;
var_dump($result); // OUTPUT: int(300000)
echo '<hr>';

// Chuyển đổi định dạng viết (đọc tiếng việt) thành máy tính hiểu
$input = '1.884.939,25';
// Xoá dấu chấm (.), tiếp thay thế dấu phẩy (,) thành dấu chấm (.)
$result = str_replace(',', '.', str_replace('.', '', $input));
var_dump($result); // OUTPUT: string(10) "1884939.25"
echo '<br>';
$check = is_numeric($result);
var_dump($check); // OUTPUT: true
