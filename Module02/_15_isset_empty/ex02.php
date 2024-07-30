<?php

/**
 * Hàm empty() Kiểm tra giá trị rỗng không ???
 * - Trả về kiểu dữ liệu boolean
 * - Trả về TRUE nếu giá trị như sau:
 *     ''                rông
 *     '0'               chuỗi không
 *     0                 số không
 *     false   
 *     null
 *     []                mảng rỗng
 *     object            đối tượng rỗng
 * Hoặc     
 *     !isset($ten_bien)
 * 
 * Dùng để kiểm tra giá trị có rỗng không => Nếu rỗng trả về TRUE
 * Kiểm tra xem biến đó có tồn tại hay không => Nếu không tồn tại trả về TRUE
 * 
 * Ngược lại:
 * Trả về TRUE nếu biến tồn tại và giá trị không rỗng
 */

$str = 'lorem ipsum';

$check = empty($str);

if ($check) {
    echo $str;
} else {
    echo 'Không tồn tại';
}

$a = '';             // true
$b = '0';            // true
$c = 0;              // true
$d = 0.0;            // true
$e = false;          // true
$f = [];             // true

$obj = new stdClass;
$g = (array) $obj;   // true

$h = 'null';         // false
$i = 'false';        // false

// Biến $j không tồn tại
//$j                 // true

echo '<pre>';
var_dump([
    '$a' => empty($a),
    '$b' => empty($b),
    '$c' => empty($c),
    '$d' => empty($d),
    '$e' => empty($e),
    '$f' => empty($f),
    '$g' => empty($g),
    '$h' => empty($h),
    '$i' => empty($i),
    '$j' => empty($j),
]);
echo '</pre>';


// Ví dụ

$numOne = 1;
if (!empty($numOne)) {
    echo '$numOne = ' . $numOne . ' => tồn tại';
} else {
    echo '$numOne =  ' . $numOne . ' => không tồn tại';
}
echo '<br>';

$numTwo = 0;
if (!empty($numTwo)) {
    echo '$numTwo = ' . $numTwo . ' => tồn tại';
} else {
    echo '$numTwo =  ' . $numTwo . ' => không tồn tại';
}
echo '<br>';

// $numThree = 0;
if (!empty($numThree)) {
    echo '$numThree => tồn tại';
} else {
    echo '$numThree => không tồn tại';
}
