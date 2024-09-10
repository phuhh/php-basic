<?php
// Kiểu Mảng (ARRAY)

// Khai báo trong hàm array()
$arr = array('Apple', 'Samsung', 'Huawei');
var_dump($arr);
echo '<br>';
// hoặc khai báo trong dấu ngoặc vuông
$arr = ['FORD', 'TOYOTA', 'HYUNDAI', 'HONDA'];
var_dump($arr);
echo '<br>';

// Ép kiểu
$str = 'lorem ipsum';
$str = (array) $str;
var_dump($str);
echo '<hr>';

// Kiểm tra có phải kiểu mảng hay không ?
$check = is_array(['lorem ipsum']);
var_dump($check); // OUTPUT: true
echo '<br>';

$check = is_array('lorem ipsum');
var_dump($check); // OUTPUT: false
echo '<br>';
