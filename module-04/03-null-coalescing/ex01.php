<?php

/**
 * Toán tử null coalescing (??) Có từ phiên bản 7.x trở về sau
 * 
 * Dùng để viết ngắn gọn lại cho toán tử 3 ngôi
 */

$a = null;
// $b = isset($a) ? $a : 'Giá trị null';
$b = $a ?? 'Giá trị null';
var_dump($b);
echo '<hr>';


// $result = isset($undefine) ? $undefine : 'Biến không tồn tại';
$result = $undefine ?? 'Biến không tồn tại';
var_dump($result);
