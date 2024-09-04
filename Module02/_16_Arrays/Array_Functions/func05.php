<?php

/**
 * Thêm 1 hoặc nhiều phần tử cuối mảng: array_push($ten_mang, $value_1, $value_2,..., $value_n)
 * 
 * Hàm này có tác dụng thêm 1 hoặc nhiều phần tử cuối mảng 
 * và trả về số lượng phần tử của mảng sau khi thêm
 * 
 * Lưu ý: Sau khi thêm phần tử, index sẽ được đánh lại.
 */

$dataArr = ['foo', 'bar', 'baz'];

echo "<pre>";
print_r($dataArr);
echo "</pre>";

$totalArr = array_push($dataArr, 'qux');

echo "<pre>";
print_r($dataArr);
echo "</pre>";

echo 'Tổng phần tử: ' . $totalArr;
echo '<br>';

$totalArr = array_push($dataArr, 'quux', 'quuz');

echo "<pre>";
print_r($dataArr);
echo "</pre>";

echo 'Tổng phần tử: ' . $totalArr;
echo '<br>';
