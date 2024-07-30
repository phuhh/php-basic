<?php

/**
 * Vòng lặp while (lặp với số lần không được xác định trước)
 *
 * while(dieu-kien-dung) {
 *     // code
 * }
 *
 * Ví dụ: Biểu diễn vòng lặp for bằng vòng lặp while
 */

$i = 1; // Giá trị ban đầu (Biến khởi tạo)
while ($i <= 10) {
    echo 'Vòng lặp thứ ' . $i . '<br>';
    $i++; // Xử lý điều kiện thoát vòng lặp 
    // - Chú ý: luôn đặt biến tăng hay biến giảm dưới đoạn code xử lý logic, nếu đặt trên sẽ cho ra kết quả khác.
}

/**
 * Giải thích
 * 
 * $i = 1; kiểm tra đk ĐÚNG; in ra 1; tăng $i = 2
 * $i = 2; kiểm tra đk Đúng; in ra 2; tăng $i = 3
 * $i = 3; kiểm tra đk Đúng; in ra 3; tăng $i = 4
 * ...
 * $i = 9; kiểm tra đk Đúng; in ra 9; tăng $i = 10
 * $i = 10; kiểm tra đk Đúng; in ra 10; tăng $i = 11
 * $i = 11; kiểm tra đk sai; dừng chạy
 * 
 * Bài tập : Tính tổng S = 1+2+3+4+5+...+n
 */
$n = 10;
$i = 1;
$total = 0; // Giả định bằng 0
while ($i <= $n) {
    $total += $i;
    $i++;
}
echo 'Tổng = ' . $total . '<hr>';

/**
 * Bài tập Đúng tính chất while: 1/2 + 1/4 + 1/6 + ... 1/n
 * Điều kiện: 1/n < 0.0001
 */

$total = 0; // giả định tổng = 0
$i = 2; // giả định biến tăng
while (1 / $i >= 0.0001) {
    // echo $i . '<br>';
    $total += 1 / $i;
    $i += 2;
}
echo 'Tổng = ' . $total . '<br>';

/**
 * Lưu ý:
 * - Những bài toán gì viết được tại vòng lặp for thì vòng lặp while đều viết được
 * - Nhưng bài toán viết được tại vòng lặp while chưa chắc vòng lặp for viết được
 */
