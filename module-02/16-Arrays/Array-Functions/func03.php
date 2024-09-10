<?php

/**
 * Chuyển thành mảng tuần tự nhưng phần tử là key: array_keys($ten_mang)
 * 
 * Hàm này có tác dụng trả về 1 mảng tuần tự với phần tử là key của mảng ban đầu
 */
$customer = [
    'id' => '00001',
    'name' => 'Nguyễn Văn An',
    'age' => 30,
    'address' => 'TP.HCM',
    202,
    true
];

echo "<pre>";
print_r($customer);
echo "</pre>";

$customer = array_keys($customer);

echo "<pre>";
print_r($customer);
echo "</pre>";
