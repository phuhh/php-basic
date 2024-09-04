<?php

/**
 * Kiểm tra tồn tại key không: array_key_exists($key, $array)
 * 
 * Hàm kiểm tra xem mảng $array có tồn tại từ khoá $key không. Trả về TRUE nếu tồn tại và ngược lại
 */
$customer = [
    'id' => '00001',
    'name' => 'Nguyễn Văn An',
    'age' => 30,
    'address' => 'TP.HCM',
    'phone' => '0123456789',
    'email' => 'annv@gmail.com'
];

$check = array_key_exists('phone', $customer);

if ($check) {
    echo 'Tồn tại';
} else {
    echo 'Không tồn tại';
}

echo '<hr>';

$check = array_key_exists('phone2', $customer);

if ($check) {
    echo 'Tồn tại';
} else {
    echo 'Không tồn tại';
}
