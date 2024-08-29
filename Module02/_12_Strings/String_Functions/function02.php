<?php

/**
 * Chuyển đổi Chuỗi thành Mảng, ngược lại
 * 
 * 4. Chuyển Chuỗi thành Mảng
 * 
 * Cú pháp: explode($separator, $str)
 * 
 * Tách ra bởi khoảng cách
 */
$str = 'Trung tâm đào tạo lập trình Unicode';
$arr = explode(' ', $str); // Output: Array ( [0] => Trung [1] => tâm [2] => đào [3] => tạo [4] => lập [5] => trình [6] => Unicode )
print_r($arr);
echo '<br>';

// Tách ra bởi chữ t
$arr = explode('t', $str); // Output: Array ( [0] => Trung [1] => âm đào [2] => ào lập [3] => rình Unicode )
print_r($arr);
echo '<hr>';

/**
 * 5. Chuyển Mảng thành Chuỗi
 * 
 * Cú pháp: implode($separator, $arr)
 * 
 * Nối lại với nhau bằng khoảng cách
 */
$arr = ['Trung', 'tâm', 'đào', 'tạo', 'lập', 'trình', 'Unicode'];
$str = implode(' ', $arr); // Output: Trung tâm đào tạo lập trình Unicode
echo $str . '<br>';

// Nối lại với nhau bằng dấu gạch ngang
$str = implode('-', $arr); // Output: Trung-tâm-đào-tạo-lập-trình-Unicode
echo $str . '<br>';
