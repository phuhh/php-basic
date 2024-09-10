<?php

/**
 * Đếm mảng: count($ten_mang)
 * 
 * hàm này có tác dụng đếm mảng có bao nhiêu phần tử
 */

$dataArr = ['foo', 'bar', 'baz', 'qux', 'quux', 'quuz'];

// Lưu ý: tham số bắt buộc là mảng. Nếu không phải mảng sẽ bị lỗi 
$countArr = count($dataArr);
echo $countArr;
echo '<br>';

// Lưu ý: Chỉ xử lý danh sách đối số truyền vào, danh sách con không xử lý
$dataArr = [
    ['foo', 'bar'],
    ['baz', 'qux'],
    ['quux', 'quuz']
];
$countArr = count($dataArr);
echo $countArr;
