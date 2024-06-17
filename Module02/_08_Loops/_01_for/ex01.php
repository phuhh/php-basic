<?php

/**
 * Vòng lặp for (lặp với số lần lặp được xác định trước)
 * 
 * for($ten-bien = gia-tri-bat-dau; dieu-kien-dung; bieu-thuc-tang-hoac-giam) {
 *    // code
 * }
 * 
 * Ví dụ: Vòng lặp for tăng
 */

$count = 10; // Xác định số lần lặp
$start = 0; // Xác định giá trị bắt đầu
for ($i = $start; $i < $count; $i++) {
    echo 'Đây là vòng lặp thứ ' . $i . '<br>';
}
echo '<hr>';

// Ví dụ: Tăng 2 đơn vị
for ($i = $start; $i < $count; $i += 2) {
    echo 'Đây là vòng lặp thứ ' . $i . '<br>';
}
echo '<hr>';

// Ví dụ: Tính tổng S = 1+2+3+4+5+...+n
$number = 10;
$result = 0; // Giả định giá trị ban đầu là 0
for ($i = 1; $i < $number; $i++) {
    $result += $i; // $result = $result + $i
}
echo $result;

/**
 * Giải thích:
 * $result = 0; // Giá trị ban đầu
 * 
 * Khởi tạo $i = 0; 0 nhỏ hơn 10 => TRUE; $result = 0 + 1 => $result = 1;
 * $i = 1; 1 nhỏ hơn 10 => TRUE; $result = 1 + 1 => $result = 2;
 * $i = 2; 2 nhỏ hơn 10 => TRUE; $result = 2 + 2 => $result = 4;
 * $i = 3; 3 nhỏ hơn 10 => TRUE; $result = 3 + 3 => $result = 6;
 * $i = 4; 4 nhỏ hơn 10 => TRUE; $result = 6 + 4 => $result = 10;
 * $i = 5; 5 nhỏ hơn 10 => TRUE; $result = 10 + 5 => $result = 15;
 * ...
 * $i = 9; 9 nhỏ hơn 10 => TRUE; $result = 36 + 9 => $result = 45;
 * $i = 10; 10 nhỏ hơn 10 => FALSE;
 * 
 * OUTPUT: 45;
 */
echo '<hr>';

// Ví dụ: Vòng lặp for giảm
for ($i = 20; $i > 0; $i--) {
    echo 'Đây là vòng lặp thứ ' . $i . '<br>';
}
echo '<hr>';
