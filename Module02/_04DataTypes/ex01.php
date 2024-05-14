<?php
// Kiểu Số Nguyên (INT or INTEGER)

// Khai báo
$num = 31;
var_dump($num);
echo '<br>';
// Kể từ PHP 7.4 trở đi, PHP cho phép khai báo kiểu dữ liệu trước tên biến (Typed Properties)
// public int $num;

// Ép kiểu
$num2 = 30.5;
var_dump($num2);
echo '<br>';

$num2 = (int) $num2;
var_dump($num2);
echo '<br>';

// Kiểm tra phải kiểu số nguyên hay không ?
$check = is_int(30);
var_dump($check); // OUTPUT: true
echo '<br>';

$check = is_integer(30);
var_dump($check); // OUTPUT: true
echo '<br>';

$check = is_int(30.5);
var_dump($check); // OUTPUT: false
echo '<br>';

$check = is_int('30');
var_dump($check); // OUTPUT: false
echo '<br>';
