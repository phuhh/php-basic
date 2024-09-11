<?php

/**
 * Định dạng ngày giờ cho datetime object
 * 
 * 1. dùng hàm date_format($datetimeObject, $format)
 */

$datetimeObject = date_create();

$output = date_format($datetimeObject, 'd/m/Y H:i:s');
echo $output;
echo '<br>';

$d = date_format($datetimeObject, 'd');
$m = date_format($datetimeObject, 'm');
$y = date_format($datetimeObject, 'Y');
$output = 'Ngày ' . $d . ' Tháng ' . $m . ' Năm ' . $y;
echo $output;
echo '<br>';

$h = date_format($datetimeObject, 'H');
$m = date_format($datetimeObject, 'i');
$i = date_format($datetimeObject, 's');
$output = 'Giờ ' . $h . ' Phút ' . $m . ' Giây ' . $i;
echo $output;
echo '<hr>';

// Định dạng ngày giờ bằng hàm date_create_form_format($format, $str);
$datetimeObject = date_create_from_format('Y-m-d H:i:s', '2024-09-11 22:31:21');
echo date_format($datetimeObject, 'd/m/Y H:i A');
echo '<hr>';

/**
 * 2. Định dạng ngày giờ bằng cách truy cập trực tiếp phương thức format() có trong datetime object
 * 
 * Nên thường xuyên dùng.
 */
echo $datetimeObject->format('d-m-Y');
