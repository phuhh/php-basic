<?php

/**
 * Bài tập 1: Hiển thị số chẵn, số lẻ trong dãy số từ 1,2,3,...,100
 */

$startIndex = 1;
$endIndex = 1;

$resultEven = null;
$resultOdd = null;

$evenCount = 0;
$oddCount = 0;

for ($index = $startIndex; $index <= $endIndex; $index++) { // Kiểm tra số chẵn - số lẻ 
    if ($index % 2 === 0) {
        // echo $index . ' Là số chẵn <br>' ; 
        $resultEven .= $index . ' ';
        $evenCount++;
    } else {
        // echo $index . ' Là số lẻ <br>' ; 
        $resultOdd .= $index . ' ';
        $oddCount++;
    }
}
if ($evenCount > 0) {
    echo 'Tìm thấy ' . $evenCount . ' số chẵn: ' . $resultEven . '<br>';
} else {
    echo 'Không tìm thấy số chẵn<br>';
}

if ($oddCount > 0) {
    echo 'Tìm thấy ' . $oddCount . ' số lẻ: ' . $resultOdd . '<br>';
} else {
    echo 'Không tìm thấy số lẻ<br>';
}
echo '<hr>';
/**
 * Bài tập 2: Tính giai thừa của 1 số và hiển thị kết quả
 *
 * INPUT: nhập số N
 * OUTPUT: in ra kết quả N!
 *
 * Công thức: N ! = 1 * 2 * 3 * ... * N
 */

$n = 5;
if ($n) {
    // Xử lý tính giai thừa
    $result = 1; // Giải định = 1 vì là phép nhân, nếu giả định = 0 tính phép nhân cho ra kết quả = 0
    for ($index = 1; $index <= 5; $index++) {
        $result *= $index;
    }
    echo $n . '! = ' . $result;
} else {
    echo $n . ' không hợp lệ';
}
