<?php

/**
 * Ép kiểu số nguyên - cú pháp: (int) $ten_bien; hoặc (integer) $ten_bien;
 */

$num = '1';
$num = (int) $num;
var_dump($num); // OUTPUT: int(1)
echo '<br>';

$num = 3.14;
$num = (int) $num;
var_dump($num); // OUTPUT: int(3)
echo '<hr>';

$num = '3.14';
$num = (int) $num;
var_dump($num); // OUTPUT: int(3)
echo '<br>';

$num = '3,14';
$num = (int) $num;
var_dump($num); // OUTPUT: int(3)
echo '<br>';

$num = '3 14';
$num = (int) $num;
var_dump($num); // OUTPUT: int(3)
echo '<br>';

$num = '  3 14  ';
$num = (int) $num;
var_dump($num); // OUTPUT: int(3)
echo '<hr>';

$num = true;
$num = (int) $num;
var_dump($num); // OUTPUT: int(1)
echo '<br>';

$num = false;
$num = (int) $num;
var_dump($num); // OUTPUT: int(1)
echo '<br>';

$num = 'true';
$num = (int) $num;
var_dump($num); // OUTPUT: int(0)
echo '<br>';

$num = 'false';
$num = (int) $num;
var_dump($num); // OUTPUT: int(0)
echo '<hr>';

$num = null;
$num = (int) $num;
var_dump($num); // OUTPUT: int(0)
echo '<br>';
