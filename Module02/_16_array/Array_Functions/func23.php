<?php

/**
 * Kiểm tra kiểu mảng pk: is_array($ten_mang)
 * 
 * Hàm có tác dụng kiểm tra xem 1 biến có phải mảng hay khôn. Trả về TRUE nếu là mảng và ngược lại.
 */

$arr = [
    'name' => 'Nguyễn Văn A',
    'age' => 30,
    'address' => 'Bến Tre',
    'email' => 'nguyenvana@gmail.com'
];

$check = is_array($arr);

if ($check) {
    echo 'Mảng Hợp lệ';
} else {
    echo 'Không hợp lệ';
}
