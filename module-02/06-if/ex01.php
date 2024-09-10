<?php

/** 
 * Câu lệnh điều kiện (câu lệnh rẽ nhánh)
 * 
 * Cấu lệnh if 
 * 
 * if (dieu-kien) {
 *     // Thực thi code nếu điều kiện đúng
 * }
 * */

$number = 1;
if ($number > 0) {
    echo $number . ' Là số nguyên dương';
}
echo '<br>';

$check = $number > 0;
if ($check) { // Tương đượng $check == true
    echo $number . ' Là số nguyên dương';
}
echo '<br>';

// Lưu ý: nếu chỉ 1 câu lệnh thì không cần dấu ngoặc nhọn
if ($check) echo $number . ' Là số nguyên dương';

echo '<br>';

/**
 * Cấu lệnh if...else...
 * 
 * if (dieu-kien) {
 *     // Thực thi code nếu điều kiện đúng
 * } else {
 *     // Ngược lại thực thi code nếu điều kiện sai
 * }
 */
$number = -1;
$check = $number > 0;

if ($check) {
    echo $number . ' Là số nguyên dương';
} else {
    echo $number . ' Không phải là số nguyên dương';
}
echo '<br>';

/** 
 * Viết tắt câu lệnh if...else 
 * 
 * Cú pháp: dieu-kien ? thuc-thi-code-neu-dung : thuc-thi-code-neu-sai;
 */
echo $check ? 'Số nguyên dương' : 'Không phải số nguyên dương';

echo '<br>';

/**
 * Cấu lệnh if...elseif...else
 * 
 * if (dien-kien-1) {
 *      // Thực thi code nếu điều kiện 1 đúng
 * } elseif (dien-kien-2) {
 *      // Thực thi code nếu điều kiện 1 sai và điều kiện 2 đúng
 * } else {
 *      // Ngược lại thực thi code nếu tất cả điều kiện trên sai
 * }
 * 
 * Có thể có nhiều elseif() trong câu lệnh điều kiện
 */
$point = -1;

if ($point == 10) {
    echo 'Học sinh Giỏi';
} elseif ($point == 9 || $point == 8) {
    echo 'Học sinh Khá';
} elseif ($point <= 7 && $point >= 5) {
    echo 'Học sinh Trung Bình';
} elseif ($point >= 0 && $point <= 4) {
    echo 'Học sinh Chưa Đạt';
} else {
    echo 'Không hợp lệ';
}
echo '<br>';

/**
 * Cấu lệnh if...else lồng nhau 
 * 
 * if (dieu-kien-1) { // Điều kiện cha
 *     if (dieu-kien-2) { // Điều kiện con
 *         // Thực thi code nếu điều kiện 1 đúng và điều kiện 2 đúng
 *     } else {
 *         // Ngược lại thực thi code nếu điều kiện 1 đúng và điều kiện 2 sai
 *     }
 * } else {
 *     // Ngược lại thực thi code nếu điều kiện 1 sai
 * }
 */
$number = 10;

if ($number > 5) {
    if ($number > 9) {
        echo 'Lơn hơn 9';
    } else {
        echo 'Nhỏ hơn 9';
    }
} else {
    echo 'Nhỏ hơn 5';
}
