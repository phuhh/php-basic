<?php
/* Toán tử số học */

/** Toán tử + (phép Cộng) **/
$a = 10;
$b = 20;
$result = $a + $b;
print_r($result); //OUTPUT: 30
echo '<br>';

/** Toán tử - (phép Trừ) **/
$a = 30;
$b = 10;
$result = $a - $b;
print_r($result); //OUTPUT: 20
echo '<br>';

/** Toán tử * (1 dấu SAO là phép Nhân) **/
$a = 10;
$b = 5;
$result = $a * $b;
print_r($result); //OUTPUT: 50
echo '<br>';

/** Toán tử / (dấu GẠCH CHÉO là phép chia) **/
$a = 10;
$b = 5;
$result = $a / $b;
print_r($result); //OUTPUT: 2
echo '<br>';

/** Toán tử % (dấu PHẦN TRĂM là phép lấy dư) **/
$a = 10;
$b = 3;
$result = $a % $b; //OUTPUT: 1
print_r($result);
echo '<br>';

$a = 10;
$b = 2;
$result = $a % $b; //OUTPUT: 0
print_r($result);
echo '<br>';

/** Toán tử ** (2 dấu SAO là phép luỹ thừa) **/
$a = 3; // $a gọi cơ số
$b = 2; // $b gọi số mũ
$result = $a ** $b;
print_r($result); //OUTPUT: 9
echo '<br>';

$a = 5;
$b = 2;
$result = $a ** $b;
print_r($result); //OUTPUT: 25
echo '<br>';

/** Toán tử ++ (Tăng 1 đơn vị) **/
$count = 0;
$count = $count + 1;
print_r($count); //OUTPUT: 1
echo '<br>';

/***  Tăng 1 đơn vị với $bien++ ***/
$count = 0;
$count++; // Tượng tự như: $count = $count + 1;
print_r($count); //OUTPUT: 1
echo '<br>';

/*** Tăng 1 đơn vị với ++$bien ***/
$count = 0;
++$count;
print_r($count); //OUTPUT: 1
echo '<br>';

/*** Sự khác nhau giữa $bien++ và ++$bien***/
$count = 0;
$result = $count++; //  Câu lệnh sẽ là: (Gán) $result = $count; (tăng) $count = $count + 1;
print_r($count);  //OUTPUT: 1
echo '<br>';
print_r($result); //OUTPUT: 0
echo '<br>';

$count = 0;
$result = ++$count; // Câu lệnh sẽ là: (tăng) $count = $count + 1; (gán) $result = $count;
print_r($count);  //OUTPUT: 1
echo '<br>';
print_r($result); //OUTPUT: 1
echo '<br>';

/** Toán tử -- (Giảm 1 đơn vị) **/
$count = 0;
$count = $count - 1;
print_r($count); //OUTPUT: -1
echo '<br>';

// Tương tự như ++ thì -- 
/***  Giảm 1 đơn vị với $bien-- ***/
$count = 0;
$result = $count--;
print_r($count); //OUTPUT: -1
echo '<br>';
print_r($result); //OUTPUT: 0
echo '<br>';

/***  Giảm 1 đơn vị với --$bien ***/
$count = 0;
$result = --$count;
print_r($count); //OUTPUT: -1
echo '<br>';
print_r($result); //OUTPUT: -1
echo '<br>';
