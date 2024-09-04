<?php

/**
 * Kiểm tra số nguyên - số thực
 * 
 * Kiểm tra số nguyên is_int($ten_bien) hoặc is_integer($ten_bien)
 */

$num = 1;
$check = is_int($num);
var_dump($check); // OUTPUT: true
echo '<br>';

$num = 1;
$check = is_integer($num);
var_dump($check); // OUTPUT: true
echo '<br>';

$num = '1';
$check = is_int($num);
var_dump($check); // OUTPUT: false
echo '<br>';

$num = 3.14;
$check = is_int($num);
var_dump($check); // OUTPUT: false
echo '<hr>';

/**
 * Kiểm tra số thực (số thập phân) is_float($ten_bien)
 */

$num = 3.14;
$check = is_float($num);
var_dump($check); // OUTPUT: true
echo '<br>';

$num = '3.14';
$check = is_float($num);
var_dump($check); // OUTPUT: false
echo '<br>';

$num = 1;
$check = is_float($num);
var_dump($check); // OUTPUT: false
echo '<br>';
