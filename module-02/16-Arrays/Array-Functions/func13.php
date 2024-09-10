<?php

/**
 * Tìm kiếm giá trị trong mảng trả về key: array_search($tu_khoa, $ten_mang)
 * 
 * Hàm có tác dụng tìm kiếm giá trị của mảng và trả về key của phần tử đó (nếu có)
 * 
 * Lưu ý: khác với hàm in_array() tìm thấy trả về giá trị TRUE.
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

$resultKey = array_search('Nguyễn Văn An', $customer);
var_dump($resultKey);
echo '<hr>';

$resultKey = array_search('Văn An', $customer);
var_dump($resultKey);
