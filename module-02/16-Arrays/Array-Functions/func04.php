<?php

/**
 * Xoá 1 phần tử cuối cùng: array_pop($ten_mang)
 * 
 * Hàm này xoá phần tử cuối cùng của mảng và trả về kết quả vừa xoá
 */

$dataArr = ['foo', 'bar', 'baz', 'qux', 'quux', 'quuz'];

echo "<pre>";
print_r($dataArr);
echo "</pre>";

$deletedElement = array_pop($dataArr);
echo 'Phần tử đã xoá: ' . $deletedElement;
echo '<br>';

echo "<pre>";
print_r($dataArr);
echo "</pre>";
