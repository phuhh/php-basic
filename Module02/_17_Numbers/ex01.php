<?php

/**
 * Kiểm tra phải kiểu số không ?
 *     - is_numeric($ten_bien) : kiểm tra số nguyên, số thực và chuỗi số
 *     - hoặc filter_var()
 */

$num = 1;
$check = is_numeric($num);
var_dump($check); // OUTPUT: true
echo "<br>";

$num = 3.14159265359;
$check = is_numeric($num);
var_dump($check); // OUTPUT: true
echo "<br>";

$num = '1';
$check = is_numeric($num);
var_dump($check); // OUTPUT: true
echo "<br>";

$num = '3.14159265359';
$check = is_numeric($num);
var_dump($check); // OUTPUT: true
echo "<hr>";

$num = '3,14159265359';
$check = is_numeric($num);
var_dump($check); // OUTPUT: false
echo "<br>";

$num = '3 14159265359';
$check = is_numeric($num);
var_dump($check); // OUTPUT: false
echo "<hr>";

// Chuyển đổi chuỗi thành số cho hợp lệ

$input = '   3. 14 159 265,359   ';
// Xoá dấu phẩy (,)
// Xoá khoảng trống
// Xoá khoảng trống trước và sau

$num = trim(str_replace(' ', '',  str_replace(',', '', $input)));
var_dump($num); // OUTPUT: string(13) "3.14159265359"
echo '<br>';

$check = is_numeric($num);
var_dump($check); // OUTPUT: true
echo "<br>";
