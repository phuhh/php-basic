<?php

/**
 * Đảo key thành value và ngược lại: array_flip($ten_mang)
 * 
 * Hàm này có tác dụng chuyển đổi key của mảng thành value và ngược lại
 */
$customer = [
    'id' => '00001',
    'name' => 'Nguyễn Văn An',
    'age' => 30,
    'address' => 'TP.HCM',
    202,
];

echo "<pre>";
print_r($customer);
echo "</pre>";

$customer = array_flip($customer);

echo "<pre>";
print_r($customer);
echo "</pre>";
