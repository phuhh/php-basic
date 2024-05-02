<?php
// Kiểu số thực (FLOAT) - tương tự số nguyên
// Trong máy tính để hiểu được số thực dùng dấu chấm . tuyệt đối KHÔNG dùng dấu phẩy ,


// Khai báo
$point = 9.5;
var_dump($point);
echo '<br>';

// Ép kiểu
$pi = '3.14';
$pi = (float) $pi;
var_dump($pi);
echo '<br>';

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
