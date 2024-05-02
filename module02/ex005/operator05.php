<?php
/* Toán tử lý luận */
// Trả về giá trị BOOLEAN: true/false

/** Toán tử and && (và) **/
// Cả biểu thức ĐÚNG khi tất cả biểu thức con ĐỀU ĐÚNG.
// Ngược lại nếu 1 biếu thức con SAI thì cả biểu thức SAI.
$a = 10;
$b = 20;
// $check = $a <= $b and $b >= $a;
$check = $a <= $b && $b >= $a;
var_dump($check); //OUTPUT: true
echo '<br>';

/*** Cách gom nhóm (trong dấu ngoặc tròn) ***/
$c = 30;
$check = ($a <= $b) && ($b >= $a && $c <= $a);
var_dump($check); //OUTPUT: false
echo '<br>';

/** Toán tử or || (hoặc) **/
// Cả biều thức ĐÚNG khi 1 biểu thức con ĐÚNG.
// Cả biểu thức SAI khi tất cả biểu thức con ĐỀU SAI.
$check = $a <= $b || $b >= $c;
var_dump($check); //OUTPUT: true
echo '<br>';

$check = $c <= $a || $b >= $c;
var_dump($check); //OUTPUT: false
echo '<br>';

/** Toán tử not ! (phủ định) **/
// Phủ định ngược lại giá trị kiểu dữ boolean
$isActive = false;
$check = !$isActive;
var_dump($check); //OUTPUT: true
echo '<br>';

$isDelete = true;
$check = !$isDelete;
var_dump($check); //OUTPUT: false
echo '<br>';

// ĐỘ ƯU TIÊN NOT -> AND -> OR