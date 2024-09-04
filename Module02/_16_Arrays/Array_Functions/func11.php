<?php

/**
 * Gộp 2 hoặc nhiều mảng: array_merge($ten_mang_1, ten_mang_2,... ten_mang_n);
 * 
 * Hàm có tác dụng gộp 2 hoặc nhiều mảng thành 1 mảng
 * 
 * Lưu ý: Sau khi gộp mảng, index sẽ được đánh lại.
 */

$arrFirst = ['foo', 'bar'];
$arrSecond = ['baz', 'qux'];
$arrThird = ['baz', 'qux'];

$resultArr = array_merge($arrFirst, $arrSecond, $arrThird);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
