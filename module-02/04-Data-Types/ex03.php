<?php
// Kiểu số thực (FLOAT) - tương tự số nguyên
// Trong máy tính để hiểu được số thực dùng dấu chấm . tuyệt đối KHÔNG dùng dấu phẩy ,


// Khai báo
$point = 9.5;
var_dump($point);
echo '<br>';

// Ép kiểu
$pi = (float) '3.14';
var_dump($pi); // OUTPUT: 3.14
echo '<br>';

$num2 = (float) '1.2abc';
var_dump($num2); // OUTPUT: 1.2
echo '<br>';

$num3 = (float) 'abc1.2';
var_dump($num3); // OUTPUT: 0
echo '<hr>';

// Kiểm tra có phải số thực hay không ?
$check = is_float(3.14);
var_dump($check); // OUTPUT: true
echo '<br>';

$check = is_float(10);
var_dump($check); // OUTPUT: false
echo '<br>';

$check = is_float('3.14');
var_dump($check); // OUTPUT: false
echo '<br>';
