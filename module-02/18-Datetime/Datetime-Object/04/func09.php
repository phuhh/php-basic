<?php

/**
 * Định dạng ngày giờ cho date object
 * 
 * Cách 1: dùng hàm date_format($dateObj, $format)
 */

$dateObj = date_create();
$output = date_format($dateObj, 'd/m/Y H:i:s');
echo $output;
echo '<br>';

$d = date_format($dateObj, 'd');
$m = date_format($dateObj, 'm');
$y = date_format($dateObj, 'Y');
$output = 'Ngày ' . $d . ' Tháng ' . $m . ' Năm ' . $y;
echo $output;
echo '<br>';

$h = date_format($dateObj, 'H');
$m = date_format($dateObj, 'i');
$i = date_format($dateObj, 's');
$output = 'Giờ ' . $h . ' Phút ' . $m . ' Giây ' . $i;
echo $output;
echo '<hr>';

$dateObj = date_create('2024-09-11 22:31:21');
$output = date_format($dateObj, 'd/m/Y H:i:s');
echo $output;
echo '<br>';

// Định dạng thời gian bằng từ date_create_form_format($format, $str);
$dateObj = date_create_from_format('Y-m-d H:i:s', '2024-09-11 22:31:21');
echo date_format($dateObj, 'd/m/Y H:i A');
echo '<hr>';

/**
 * Cách 2. Định dạng thời gian qua phương thức format() có trong datetime object (OOP)
 * 
 * Nên thường xuyên dùng.
 */
$dateObj = date_create('2024-09-11 22:31:21');
echo $dateObj->format('d-m-Y');
