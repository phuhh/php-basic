<?php

/**
 * Tách mảng: array_slice($ten_mang, $bat_dau[, $do_dai])
 * 
 * Hàm có tác dụng lấy ra $length phần tử bắt từ $begin trong mảng
 */

$customer = [
    'id' => '00001',
    'name' => 'Nguyễn Văn An',
    'age' => 30,
    'address' => 'TP.HCM',
    'phone' => '0123456789',
    'email' => 'annv@gmail.com'
];

echo "<pre>";
print_r($customer);
echo "</pre>";

$resultArr = array_slice($customer, 1);

echo "<pre>";
print_r($resultArr);
echo "</pre>";

echo '<hr>';

$resultArr = array_slice($customer, 1, 3);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
