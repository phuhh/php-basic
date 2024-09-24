<?php

/**
 * Định dạng ngày giờ cho datetime object
 * 
 * 1. dùng hàm date_format($dateTimeObject, $format)
 */

$dateTimeObject = date_create();

$output = date_format($dateTimeObject, 'd/m/Y H:i:s');
echo $output;
echo '<br>';

$d = date_format($dateTimeObject, 'd');
$m = date_format($dateTimeObject, 'm');
$y = date_format($dateTimeObject, 'Y');
$output = 'Ngày ' . $d . ' Tháng ' . $m . ' Năm ' . $y;
echo $output;
echo '<br>';

$h = date_format($dateTimeObject, 'H');
$m = date_format($dateTimeObject, 'i');
$i = date_format($dateTimeObject, 's');
$output = 'Giờ ' . $h . ' Phút ' . $m . ' Giây ' . $i;
echo $output;
echo '<hr>';

// Định dạng ngày giờ bằng hàm date_create_form_format($format, $str);
$dateTimeObject = date_create_from_format('Y-m-d H:i:s', '2024-09-11 22:31:21');
echo date_format($dateTimeObject, 'd/m/Y H:i A');
echo '<hr>';

/**
 * 2. Định dạng ngày giờ qua phương thức format() có trong datetime object (OOP)
 * 
 * Nên thường xuyên dùng.
 */
echo $dateTimeObject->format('d-m-Y');
