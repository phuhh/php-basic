<?php

/**
 * Toán tử so sánh 
 * 
 * Trả về giá trị BOOLEAN: true/false
 * 
 * Toán tử: > (lớn hơn), < (nhỏ hơn), >= (Lớn hoặc Bằng), <= (Nhỏ hoặc Bằng)
 */

$a = 10;
$b = 5;
$check = $a > $b;
var_dump($check); //OUPTUT: true
echo '<br>';

$check = $a < $b;
var_dump($check); //OUPTUT: false
echo '<br>';

$b = 10;
$check = $a >= $b; //OUPTUT: true
var_dump($check);
echo '<br>';

$check = $a <= $b; //OUPTUT: true
var_dump($check);
echo '<br>';

/** 
 * Toán tử == (So sánh BẰNG - với 2 Dấu Bằng - So sánh giá trị) 
 */
$check = $a == $b; //OUPTUT: true
var_dump($check);
echo '<br>';

/** 
 * Toán tử === (So sánh Bằng - 3 Dấu Bằng - So sánh giá trị và kiểu dữ liệu) 
 */
$b = '10'; // Chuỗi số
$check = $a === $b; //OUPTUT: false
var_dump($check);
echo '<br>';

/** 
 * Toán tử != (Khác Bằng - Ngược lại với Bằng) 
 */
$a = 20;
$b = 20;
$check = $a != $b; //OUPTUT: false
var_dump($check);
echo '<br>';

/** 
 * Toán tử !== (Khác Bằng - Ngược lại với 3 dấu Bằng) 
 */
$a = 20;
$b = '20';
$check = $a !== $b; //OUPTUT: true
var_dump($check);
echo '<br>';
