<?php
// Kiểu Đối Tượng (Object)
// Kiểu dữ liệu này lưu trữ dữ liệu, và cách xử lý dữ liệu đó. (OOP - Lập Trình Hướng Đối Tượng)

// Khai báo
$obj = new stdClass();
$obj->name = 'Tony';
$obj->age = 30;
$obj->job = 'Web Developer';
var_dump($obj);
echo '<br>';

// Ép Kiểu
$staff = ['Tony', 33, 'Web Developer'];
$staff = (object) $staff;
var_dump($staff);
echo '<br>';

// Kiểu tra có phải kiểu object hay không;
$check = is_object($staff);
var_dump($check); // OUTPUT: true
echo '<br>';

$check = is_object(['Tony', 33, 'Web Developer']);
var_dump($check); // OUTPUT: false
echo '<br>';
