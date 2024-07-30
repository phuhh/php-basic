<?php
// Biến trong PHP

// Khai báo Biến
// Bắt đầu bằng dấu đô la $
$customerName;
$customerEmail;

// Gán Biến
$customerName = 'Tony';
$customerEmail = 'tony@localhost.com';
$customerAge = 30;

// In Biến
echo $customerName;
echo '<br/>';
// in ra 1 chuỗi
echo 'Học Lập Trình PHP <br/>';
// in ra 1 số
echo 2024;
echo '<br/>';
echo $customerEmail;
echo '<br/>';
echo $customerAge;
echo '<br/>';

// Gán giá trị mới vào Biến có sẵn
$customerAge = 35;
echo $customerAge;
echo '<br/>';

// Lệnh Comment (Ghi chú)

// Ghi chú 1 dòng
// Ghi chú 1 dòng

/*
Ghú chú nhiều dòng
Ghú chú nhiều dòng
*/

// Lệnh Debug
var_dump($customerName); // In ra kiểu dữ liệu, độ dài theo kiểu dữ liệu và cuối cùng là giá trị.
echo '<br>';
var_dump($customerAge);

echo '<pre>';
$arr = array('HTML', 'CSS', 'JS', 'PHP', 'MYSQL');
print_r($arr); // In ra giá trị mảng hoặc object;
echo '</pre>';
