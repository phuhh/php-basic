<?php

/**
 * 27. Tách chuỗi lớn thành từng phần chuỗi nhỏ
 *
 * Cú pháp: chunk_split($str, $length, $characters)
 * 
 * Tham số $length: độ dài ký tự tách ra
 */
$str = 'HelloHelloHello';
$str = chunk_split($str, 5, ', ');
var_dump($str); // Output: string(21) "Hello, Hello, Hello, "
echo '<hr>';

// kết hợp: Xoá ký tự dư thừa
$str = rtrim($str, ', ');
var_dump($str); // Output: string(19) "Hello, Hello, Hello"
