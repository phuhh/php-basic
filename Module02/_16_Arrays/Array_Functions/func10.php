<?php

/**
 * Đảo ngược lại phần tử: array_reverse($ten_mang)
 * 
 * Ví dụ: 1,2,3,4,5 --> 5,4,3,2,1
 * 
 * Hàm có tác dụng đảo ngược lại vị trí của các phần tử trong mảng
 */

$dataArr = [7, 10, 5, 6, 8, 9];

echo "<pre>";
print_r($dataArr);
echo "</pre>";

$resultArr = array_reverse($dataArr);

echo "<pre>";
print_r($resultArr);
echo "</pre>";

echo '<hr>';
/**
 * Kết hợp với sort($ten_mang) vừa sắp xếp và đảo ngược (theo chiều giảm dần)
 */
$dataArr = [7, 10, 5, 6, 8, 9];

echo "<pre>";
print_r($dataArr);
echo "</pre>";

$checkSort = sort($dataArr);
if ($checkSort) {
    $resultArr = array_reverse($dataArr);
}

echo "<pre>";
print_r($resultArr);
echo "</pre>";
