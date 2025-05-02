<?php

/**
 * Trong PHP String mutable
 * 
 * Chú ý:
 * 
 * 1 - Bản chất của chuỗi là 1 mảng ký tự.
 *    - Truy cập 1 ký tự bất kì trong chuỗi, dùng cú pháp: $tenBien[chiSo]
 *    - chiSo bắt đầu từ 0 (từ trái sang phải)
 * 2 - Một số hàm chuỗi hỗ trợ UTF-8 (tiếng việt) thường có tiền tố mb_tenham
 * 
 */
$str = 'Hoc lap trinh tai Unicode';

// Truy cập ký tự đầu tiên trong chuỗi
echo $str[0] . '<br>';

// Truy cập tất cả các ký tự trong chuỗi
for ($i = 0; $i < strlen($str); $i++) {
    echo "index: {$i} - character: {$str[$i]} <br>";
}
echo '<hr>';

// Truy cập các ký tự tiếng việt
$str = 'Học lập trình tại Unicode';
for ($i = 0; $i < mb_strlen($str); $i++) {
    // echo "index: {$i} - character: {$str[$i]} <br>"; // Lỗi không hiển thị chính xác ký tự tiếng việt
    echo mb_substr($str, $i, 1, 'UTF-8') . '<br>';
}
echo '<hr>';
