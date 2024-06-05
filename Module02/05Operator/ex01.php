<?php

/**
 * Biểu Thức - Toán Tử
 * 
 * Biểu Thức 
 */

$a = 1;
$b = 2;
$result = $a + $b + 7;
// Giải Thích:
// $result = $a + $b + 7    => gọi là Biểu thức
// $a, $b, 7, $result       => gọi là Toán hạng
// +, =                     => gọi là Toán tử

// Lưu ý: code đọc từ trên xuống, đọc từ trái sang phải

/**
 * Toán Tử Gán 
 * 
 * Toán tử = (BẰNG là phép gán giá trị)
 */

// Cú pháp: ten_bien = gia_tri;
$age = 30;
print_r($age); //OUTPUT: 30
echo '<br>';

// Cú pháp: HANG_SO = gia_tri;
const LANG = 'vietnamese';
print_r(LANG); //OUTPUT: vietnamese
echo '<br>';

/** 
 * Toán tử .= (CHẤM BẰNG là phép nối chuỗi và gán giá trị) 
 */
$str = 'Học Lập Trình';
$str .= ' PHP'; // Tương tự như:  $str = $str . ' PHP';
$str .= ' Cơ Bản';
print_r($str); //OUTPUT: Học Lập Trình PHP Cơ Bản
echo '<br>';
