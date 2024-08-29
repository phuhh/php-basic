<?php

/**
 * Chuyển số âm thành số dương: abs($ten_bien)
 * 
 * Lấy giá trị tuyệt đối hàm 
 */


$num = -9;
$result = abs($num);
var_dump($result); // OUTPUT: 9
echo '<br>';

$num = 9;
$result = abs($num);
var_dump($result); // OUTPUT: 9
echo '<br>';

$num = -3.14;
$result = abs($num);
var_dump($result); // OUTPUT: 3.14
echo '<br>';
