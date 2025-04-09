<?php
// Kiểu Số Nguyên (INT or INTEGER)

// Khai báo
$num = 31;
var_dump($num);
echo '<br>';
// Kể từ PHP 7.4 trở đi, PHP cho phép khai báo kiểu dữ liệu trước tên biến (Typed Properties)
// public int $num;

// Ép kiểu
$num2 = (int) '30.5';
var_dump($num2); // OUTPUT: 30.5
echo '<br>';

$num3 = (int) '123abc';
var_dump($num3); // OUTPUT: 123
echo '<br>';

$num4 = (int) 'abc123';
var_dump($num4); // OUTPUT: 0
echo '<hr>';

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
