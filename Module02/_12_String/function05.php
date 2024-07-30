<?php

/**
 * Mã hoá chuỗi 1 chiều
 * 
 * 10. Mã hoá 1 chiều 32 ký tự
 * 
 * Cú pháp: md5($str)
 */
$str = 'a';
$encrypt = md5($str); // Output: 0cc175b9c0f1b6a831c399e269772661
var_dump($encrypt); // Output: string(32) "0cc175b9c0f1b6a831c399e269772661"
echo '<br>';

$str = '123456';
$encrypt = md5($str); // Output: e10adc3949ba59abbe56e057f20f883e
echo $encrypt . '<hr>';

/**
 * 11. Mã hoá 1 chiều 40 ký tự
 * 
 * Cú pháp: sha1($str)
 */
$str = '123456';
$encrypt = sha1($str); // Ouput: 7c4a8d09ca3762af61e59520943dc26494f8941b
var_dump($encrypt); // Output: string(40) "7c4a8d09ca3762af61e59520943dc26494f8941b"
