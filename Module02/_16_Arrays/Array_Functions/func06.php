<?php

/**
 * Xoá 1 phần tử đầu tiên: array_shift($ten_mang)
 * 
 * Hàm này xoá phần tử đầu tiên của mảng và trả về kết quả vừa xoá
 */

$dataArr = ['foo', 'bar', 'baz', 'qux', 'quux', 'quuz'];

echo "<pre>";
print_r($dataArr);
echo "</pre>";

$deletedElement = array_shift($dataArr);
echo 'Phần tử đã xoá: ' . $deletedElement;
echo '<br>';

echo "<pre>";
print_r($dataArr);
echo "</pre>";
