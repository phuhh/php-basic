<?php

/**
 * Kiểm tra tồn tại value không: in_array($key, $array)
 * 
 * Hàm kiểm tra xem mảng $array có tồn tại giá trị $value không. Trả về TRUE nếu tồn tại và ngược lại
 * 
 * Lưu ý: khác với hàm array_search() tìm thấy trả về key
 */
$customer = [
    'id' => '00001',
    'name' => 'Nguyễn Văn An',
    'age' => 30,
    'address' => 'TP.HCM',
    'phone' => '0123456789',
    'email' => 'annv@gmail.com'
];

$check = in_array('TP.HCM', $customer);

if ($check) {
    echo 'Tồn tại';
} else {
    echo 'Không tồn tại';
}

echo '<hr>';

$check = in_array('Sài Gòn', $customer);

if ($check) {
    echo 'Tồn tại';
} else {
    echo 'Không tồn tại';
}
