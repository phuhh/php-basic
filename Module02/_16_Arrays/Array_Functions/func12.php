<?php

/**
 * Lấy key ngẫu nhiên trong mảng: array_rand($ten_mang[, $so_luong_key])
 * 
 * Hàm có tác dụng lấy ra key ngẫu nhiên trong mảng với number là số lượng muốn lấy
 */


$customer = [
    'id' => '00001',
    'name' => 'Nguyễn Văn An',
    'age' => 30,
    'address' => 'TP.HCM',
];

echo "<pre>";
print_r($customer);
echo "</pre>";

$result = array_rand($customer);

echo $result;
echo '<hr>';

$resultArr = array_rand($customer, 3);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
