<?php
// Kiểu BOOLEAN (BOOL)
// chỉ có 2 giá trị true hoặc false

// Khai báo
$enabled = true;
var_dump($enabled);
echo '<br>';

// Ép kiểu
$disabled = 0;
$disabled = (bool) $disabled;
var_dump($disabled);
echo '<br>';

// Các giá trị EMPTY, 0, NULL quy về FALSE, ngược lại thì là TRUE

// Kiểm tra có phải kiểu boolean hay không ?
$check = is_bool(false);
var_dump($check); // OUTPUT: true 
echo '<br>';

$check = is_bool(0); // OUTPUT: false
var_dump($check);
echo '<br>';
