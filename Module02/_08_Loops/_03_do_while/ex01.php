<?php

/**
 * Vòng lặp do...while (lặp với số lần không được xác định trước - chạy ít nhất 1 lần)
 * 
 * do {
 *     // code
 * } while(dieu-kien-dung);
 * 
 * - Giống vòng lặp while
 * - Khác 1 điểm vòng lặp while là do...while sẽ chạy ít nhất 1 lần dù điều kiện đúng hay sai 
 * 
 * Ví dụ: bài toán biết trước số lần lặp
 */

$i = 1;
do {
    echo 'Vòng lặp thứ ' . $i . '<br>';
    $i++;
} while ($i <= 10);
echo '<hr>';

/**
 * Ví dụ: bài toán do...while chạy ít nhất 1 lần dù điều kiện SAI
 */
$i = 1;
do {
    echo 'Vòng lặp thứ ' . $i . '<br>';
    $i++;
} while ($i <= 0);

echo '<hr>';

/**
 * Bài tập: 1/2 + 1/4 + 1/6 + ... 1/n
 * Điều kiện: 1/n < 0.0001
 */
$total = 0;
$i = 2;
do {
    $total += 1 / $i;
    $i += 2;
} while (1 / $i >= 0.0001);
echo 'Tổng = ' . $total . '<br>';
