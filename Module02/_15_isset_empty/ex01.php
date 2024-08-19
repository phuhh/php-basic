<?php

/**
 * Hàm isset() - Kiểm tra Biến tồn tại hay không ???
 *  - Trả về kiểu dữ liệu boolean
 *  - Trả về TRUE nếu biến tồn tại và không có giá trị NULL
 *  - Ngược lại trả về FALSE
 * 
 * Khi cần kiểm tra biến đó có tồn tại không ? =>  không tồn tại thì trả về FALSE.
 * Kiểm tra biến giá trị có NULL không ? => nếu NULL thì trả về FALSE.
 */

$num = 1;

$check = isset($num);
var_dump($check);
echo '<br>';

if ($check) {
    echo $num;
} else {
    echo 'Không hợp lệ.';
}
echo '<hr>';

// Biến $a không tồn tại
//$a;        // false
$b = null;   // false
$c = 'null'; // true
$d = '';     // true
$e = 0;      // true
$f = '0';    // true
$g = 0.0;    // true
$h = [];     // true

echo '<pre>';
var_dump([
    '$a' => isset($a),
    '$b' => isset($b),
    '$c' => isset($c),
    '$d' => isset($d),
    '$e' => isset($e),
    '$f' => isset($f),
    '$g' => isset($g),
    '$h' => isset($h),
]);
echo '</pre>';

// Ví dụ: Kiếm tra biến có tồn tại không và có giá trị không?
$str = 'lorem ipsum';
if (isset($str) && $str) {
    echo '$str thoả điều kiện';
} else {
    echo '$str => không thoả điều kiện';
}
// OUTPUT: $str thoả điều kiện
echo '<br>';

$strTwo = '0';
if (isset($strTwo) && $strTwo) {
    echo '$strTwo thoả điều kiện';
} else {
    echo '$strTwo => không thoả điều kiện';
}
// OUTPUT: $strTwo  không thoả điều kiện


/**
 * Kết luận:
 *     isset($str) && $str TƯƠNG ĐƯƠNG BIỂU THỨC !empty($str)
 */
