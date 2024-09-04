<?php

/**
 * Bỏ các giá trị trùng nhau trong mảng: array_unique($ten_mang)
 * 
 * Hàm có tác dụng loại bỏ các phần tử trùng hợp trong mảng và trả về 1 mảng mới sau khi đã loại bỏ
 */

$customer = [
    'id' => '00001',
    'name' => 'Nguyễn Văn An',
    'age' => 30,
    'email' => 'annv@gmail.com',
    'address' => 'TP.HCM',
    'phone' => '0123456789',
    'email2' => 'annv@gmail.com',
    'phone2' => '0123456789',
];

echo "<pre>";
print_r($customer);
echo "</pre>";

$customer = array_unique($customer);

echo "<pre>";
print_r($customer);
echo "</pre>";
