<?php

/**
 * Các vấn đề khi duyệt (đọc) mảng
 * 
 * Vấn đề 1: Kiểm tra xem biến phải là mảng không ???
 */
$arr = 'Lorem ipsum';
// Hàm is_array($ten_bien) kiểm tra biến phải là mảng không ? trả về kiểu boolean
if (is_array($arr)) {
    foreach ($arr as $key => $item) {
        echo $item . '<br>';
    }
} else {
    echo 'Mảng không hợp lệ. <br>';
}

/**
 * Vấn đề 2: Kiểm tra mảng có phần tử không ???
 */
$arr = [];
// Dùng hàm count($ten_bien) đếm có bao nhiêu phần tử trong mảng ? trả về kiểu int
// Kiểm tra mảng có lớn hơn 0
if (count($arr) > 0) {
    foreach ($arr as $key => $item) {
        echo $item . '<br>';
    }
} else {
    echo 'Không có phần tử nào. <br>';
}

/**
 * Kết hợp 2 vấn đề trên để khi duyệt mảng
 */
$arr = [];
if (is_array($arr) && count($arr) > 0) {
    foreach ($arr as $key => $item) {
        echo $item . '<br>';
    }
} else {
    echo 'Mảng không hợp lệ. <hr>';
}

/**
 * Vấn đề 3: kiểm tra thế nào biến tồn tại, phải là mảng và có phần tử không???
 * 
 * Tối ưu: trước khi duyệt mảng
 * 1. Kiểm tra biến có tồn tại
 * 2. Kiểm tra biến là mảng --> dùng hàm is_array($ten_bien)
 * 3. Kiểm tra mảng có phẩn tại
 * 
 * => 1 vs 3 -> dùng hàm !empty($ten_bien)
 */
$arr = [];
if (!empty($arr) && is_array($arr)) {
    foreach ($arr as $key => $item) {
        echo $item . '<br>';
    }
}

/**
 * Vấn đề 4: Khi duyệt mảng kiểm tra index hoặc key có tồn tại không ???
 */
$arr = ['Honda', 'Yamaha', 'Piaggio', 'Vinfast'];

if (!empty($arr) && is_array($arr)) {
    $countArr = count($arr);
    for ($i = 0; $i < $countArr; $i++) {
        // Kiểm tra xem index hoặc key có tồn tại không?
        if (isset($arr[$i])) {
            echo $arr[$i] . '<br>';
        }
    }
}
