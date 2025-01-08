<?php

/**
 * Làm tròn
 * 
 * 1. Round($ten_bien, $so_thap_phan)
 * - bằng/trên 5 làm tròn lên
 * - dưới 5 làm tròn xuống
 */

$num = 1.5;
$result = round($num);
var_dump($result); // OUTPUT: float(2)
echo '<br>';

$num = 1.4;
$result = round($num);
var_dump($result); // OUTPUT: float(1)
echo '<hr>';

$num = 3.54;
$result = round($num);
var_dump($result); // OUTPUT: float(3)
echo '<br>';

$num = 3.54;
$result = round($num, 1);
var_dump($result); // OUTPUT: float(3.5)
echo '<br>';

$num = 3.54;
$result = round($num, 2);
var_dump($result); // OUTPUT: float(3.54)
echo '<br>';

$num = 3.555;
$result = round($num, 2);
var_dump($result); // OUTPUT: float(3.56)
echo '<hr>';

/**
 * Làm tròn xuống: floor($ten_bien)
 */
$num = 1.5;
$result = floor($num);
var_dump($result); // OUTPUT: float(1)
echo '<br>';

$num = 1.4;
$result = floor($num);
var_dump($result); // OUTPUT: float(1)
echo '<hr>';

/**
 * Làm tròn lên: ceil($ten_bien)
 * 
 * - Thường dùng trong lúc phân trang
 *     + Tổng bài viết
 *     + Số bài viết xuất hiện 1 trang
 *     Công thức: số trang = ceil(Tổng bài viết / Số bài viết xuất hiện 1 trang)
 *     Ví dụ: 48 / 7 = 6.8 => 7 trang
 *
 */
$num = 1.5;
$result = ceil($num);
var_dump($result); // OUTPUT: float(2)
echo '<br>';

$num = 1.4;
$result = ceil($num);
var_dump($result); // OUTPUT: float(2)
echo '<hr>';
