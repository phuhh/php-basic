<?php

/**
 * Xoá khoảng trắng hoặc ký tự trước và sau chuỗi
 * 
 * 24. Xoá ký tự đầu và cuối (xoá 2 bên trái và phải)
 * 
 * Cú pháp: trim($str, $characters)
 * 
 * mặc định: không truyền tham số thứ 2 thì xoá khoảng
 * 
 */
$str = '     Lập Trình PHP    ';
$str = trim($str);
var_dump($str); // Output: string(16) "Lập Trình PHP"
echo '<br>';

// Ví vụ khác: xoá ký tự chỉ định
$str = '     Lập Trình PHP    ';
$str = trim($str, ' LP');
var_dump($str); // Output: string(14) "ập Trình PH"
echo '<br>';

// Ví vụ khác: 
$url = 'http://localhost/php-basic/module02/_12_String/';
$url = trim($url, '/'); // Ouput: http://localhost/php-basic/module02/_12_String
echo $url . '<hr>';

/**
 * 25. Xoá ký tự bên trái
 * 
 * Cú pháp: ltrim($str, $characters)
 */
$str = '*****Lập Trình PHP*****';
$str = ltrim($str, '*'); // Output: string(21) "Lập Trình PHP*****"
var_dump($str);
echo '<hr>';

/**
 * 26. Xoá ký tự bên phải
 * 
 * Cú pháp: rtrim($str, $characters)
 */
$str = '*****Lập Trình PHP*****';
$str = rtrim($str, '*'); // Output: string(21) "*****Lập Trình PHP"
var_dump($str);
echo '<br>';
