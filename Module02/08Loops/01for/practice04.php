<?php

/**
 * Bài 6: Vẽ Tam giác với N dòng
 * 
 * *
 * **
 * ***
 * ****
 * *****
 * ******
 * 
 * Input: Số dòng N
 * Output: Tam giác vuống với N dòng
 */

$num = 5;
for ($row = 1; $row <= $num; $row++) {
    // echo '* <br>';
    for ($col = 1; $col <= $row; $col++) {
        // echo '* ';
        if ($col < $row) {
            echo '* ';
        } else {
            echo '*';
        }
    }
    echo '<br>';
}
echo '<hr>';

/**
 * Bài 7: Vẽ Tam giác đối xứng với N x 2 dòng
 * 
 * *
 * **
 * ***
 * ****
 * *****
 * ******
 * ******
 * *****
 * ****
 * ***
 * **
 * *
 * 
 * Input: Số dòng N
 * Output: Tam giác vuống với N dòng
 */

$num = 5;
$start = 1;
for ($row = $start; $row <= $num; $row++) {
    for ($col = $start; $col <= $row; $col++) {
        if ($col < $row) {
            echo '* ';
        } else {
            echo '*';
        }
    }
    echo '<br>';
}
// Đảo ngược lại $row bắt đầu 5 , điều kiện nhỏ hơn hoặc bằng 1; giảm dần
for ($row = $num; $row >= 1; $row--) {
    for ($col = $start; $col <= $row; $col++) {
        if ($col < $row) {
            echo '* ';
        } else {
            echo '*';
        }
    }
    echo '<br>';
}

echo '<hr>';

/**
 * Bài 8: Vẽ tam giác số tăng dần với n dòng
 */
$num = 5;
$start = 1;
$count = 0;

for ($row = $start; $row <= $num; $row++) {
    for ($col = $start; $col <= $row; $col++) {
        $count++;
        if ($col < $row) {
            echo $count . ' ';
        } else {
            echo $count;
        }
    }
    echo '<br>';
}
