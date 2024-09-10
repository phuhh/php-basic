<?php

/**
 * Kiểm tra số nguyên và số thực bằng hàm filter_var($ten_bien, $hang_so_loc_du_lieu)
 * 
 * Hàm filter_var() sẽ kiểm tra dữ liệu có hợp lệ không ?
 * - Hợp lệ sẽ trả về giá trị ngược lại trả về FALSE nếu không hợp lệ
 */

$num = 12;
$check = filter_var($num, FILTER_VALIDATE_INT);
var_dump($check); // OUTPUT: int(12)
echo '<br>';

$check = filter_var($num, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
var_dump($check); // OUTPUT: int(12)
echo '<br>';

$check = filter_var($num, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 10]]);
var_dump($check); // OUTPUT: false
echo '<hr>';
// Tiện ích sử dụng filter_var() là có thể kiểm tra kiểu dữ liệu là gì và các loại kiểm tra khác của kiểu dữ đó.

// Trường hợp không sử dụng filter_var()
$check = is_int($num) && $num > 0 && $num < 11;
var_dump($check); // OUTPUT: false
echo '<hr>';

$num = '12';
$check = filter_var($num, FILTER_VALIDATE_INT);
var_dump($check); // OUTPUT: int(12)
echo '<br>';

/**
 * Kiểm tra số thực
 */
$num = '3.14';
$check = filter_var($num, FILTER_VALIDATE_INT);
var_dump($check); // OUTPUT: false
echo '<br>';

$num = '3.14';
$check = filter_var($num, FILTER_VALIDATE_FLOAT);
var_dump($check); // OUTPUT: float(3.14)
echo '<br>';

$num = 3.14;
$check = filter_var($num, FILTER_VALIDATE_FLOAT);
var_dump($check); // OUTPUT: float(3.14)
echo '<br>';

$num = 12;
$check = filter_var($num, FILTER_VALIDATE_FLOAT);
var_dump($check); // OUTPUT: float(12)
echo '<br>';
