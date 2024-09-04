<?php

/**
 * Sắp xếp lại phần tử: sort($ten_mang)
 * 
 * Hàm có tác dụng sắp xếp lại mảng theo chiều tăng dần và trả về giá trị TRUE nếu thành công
 * và ngược lại FALSE nếu thất bại
 */

$dataArr = [7, 10, 5, 6, 8, 9];

echo "<pre>";
print_r($dataArr);
echo "</pre>";

$checkSort = sort($dataArr);

echo "<pre>";
print_r($dataArr);
echo "</pre>";

if ($checkSort) {
    echo 'Sắp xếp thành công ^_^';
} else {
    echo 'Sắp xếp thất bại T_T';
}
echo '<hr>';

// Lưu ý: Tiếng Việt sẽ hiểu ký tự đặt biệt nó sắp xếp cuối
$dataArr = ['f', 'b', 'đ', 'd', 'a', 'e', 'c'];

echo "<pre>";
print_r($dataArr);
echo "</pre>";

$checkSort = sort($dataArr);

echo "<pre>";
print_r($dataArr);
echo "</pre>";

if ($checkSort) {
    echo 'Sắp xếp thành công ^_^';
} else {
    echo 'Sắp xếp thất bại T_T';
}
