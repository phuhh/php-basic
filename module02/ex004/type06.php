<?php
// Kiểu NULL - rỗng

// Khai báo
$str = null; // viết hoa viết thường đều được
var_dump($str);
echo '<br>';

// Ép kiểu
// Từ INT => 0
$num = (int) null;
var_dump($num);
echo '<br>';

// Từ BOOLEAN => false
$isActive = (bool) null;
var_dump($isActive);
echo '<br>';

// Từ STRING => ''
$str = (string) null;
var_dump($str);
echo '<br>';

// Từ ARRAY => []
$arr = (array) null;
var_dump($arr);
echo '<br>';

// Kiểm tra có phải kiểu null hay không?
$check = is_null(null);
var_dump($check); // OUTPUT: true
echo '<br>';

$check = is_null('null');
var_dump($check); // OUTPUT: false
echo '<br>';

$check = is_null('');
var_dump($check); // OUTPUT: false
echo '<br>';

// Sự khác nhau giữa NULL (rỗng) và EMPTY (trống)

// Đều được dùng để khai báo biến cho ban đầu
$empty = '';
$null = null;

// null không thuộc kiểu dữ liệu nào để tính toán thực tế và không cần phải cấp vùng nhớ nào
// empty thuộc kiểu chuỗi và cung cấp 1 vùng nhớ để lưu trữ