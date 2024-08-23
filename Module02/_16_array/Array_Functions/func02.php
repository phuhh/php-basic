<?php

/**
 * Chuyển mảng tuần tự: array_values($ten_mang)
 * 
 * Hàm có tác dụng đưa mảng về mảng tuần tự (key là số 0,1,2,3,4,...)
 *
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

$customer = array_values($customer);

echo "<pre>";
print_r($customer);
echo "</pre>";
