<?php

/**
 * Ép kiểu số thực - cú pháp: (float) $ten_bien;
 */

$num = '3.14';
$num = (float) $num;
var_dump($num); // OUPUT: float(3.14)
echo '<br>';

$num = '3';
$num = (float) $num;
var_dump($num); // OUPUT: float(3)
echo '<br>';

$num = '3,14';
$num = (float) $num;
var_dump($num); // OUPUT: float(3)
echo '<br>';

$num = true;
$num = (float) $num;
var_dump($num); // OUPUT: float(1)
echo '<br>';

$num = '1.884.939,25';
$num = (float) $num;
var_dump($num); // OUPUT: float(1.884)
echo '<br>';
