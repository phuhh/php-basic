<?php
// Kiểu chuỗi (STRING)
// Chuỗi là các ký tự được đặt trong dấu ngoặc kép hoặc dấu ngoặc đơn (Hiểu đơn giản)
// Định nghĩa cơ bản về chuỗi là Mảng ký tự được kết thúc bằng ký tự null

// Khai báo
$str = 'Lorem Ipsum';
var_dump($str);
echo '<br>';

// Ép Kiểu
$str = 3.14;
$str = (string) $str;
var_dump($str); // Gọi là Chuỗi số
echo '<br>';

// Kiểm Tra có phải kiểu chuỗi hay không ?
$check = is_string("Lorem Ipsum");
var_dump($check); // OUTPUT: true
echo '<br>';

$check = is_string('10');
var_dump($check); // OUTPUT: true
echo '<br>';

$check = is_string(10);
var_dump($check); // OUTPUT: false
echo '<br>';

$check = is_string(true);
var_dump($check); // OUTPUT: false
echo '<br>';
