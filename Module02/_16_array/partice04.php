<?php

/**
 * Kỹ thuật: Đặt lính canh
 * - Giả định giá trị phân tử đầu tiên là đúng.
 * - Kiểm tra từng giá trị nếu thoả điều kiện thì gán lại giá trị mới.
 * 
 * Bài 04: Tìm giá trị lớn nhất, nhỏ nhất của (mảng 1 chiều)
 * 
 * Mảng tuần tự
 */

$arr = [14, 22, 4, 20, 24, 7];

$maxFlag = null;
$minFlag = null;
if (!empty($arr) && is_array($arr)) {
    $maxFlag = ['index' => 0, 'value' => $arr[0]]; // Giả định phần tử đầu tiên lớn nhất
    $minFlag = $maxFlag; // Giả định phần tử đầu tiên nhỏ nhất

    $countArr = count($arr);
    for ($i = 0; $i < $countArr; $i++) {
        if ($maxFlag['value'] <= $arr[$i]) {
            $maxFlag['index'] = $i;
            $maxFlag['value'] = $arr[$i];
        }

        if ($minFlag['value'] >= $arr[$i]) {
            $minFlag['index'] = $i;
            $minFlag['value'] = $arr[$i];
        }
    }
}

echo 'Giá trị lớn nhất: ' . $maxFlag['value'] . ' - Chỉ số:' . $maxFlag['index'] . '<br>';
echo 'Giá trị Nhỏ nhất: ' . $minFlag['value'] . ' - Chỉ số:' . $minFlag['index'] . '<hr>';

/**
 * Mảng bất tuần tự
 * - lấy ra vị trị đầu tiên
 */
$arr = ['a' => 14, 'b' => 22, 'c' => 4, 'd' => 20, 'e' => 24, 'f' => 7];

$maxFlag = null;
if (!empty($arr) && is_array($arr)) {
    // tìm phần tử đầu tiên của mảng bất tuần tự
    foreach ($arr as $key => $item) {
        $maxFlag = ['key' => $key, 'value' => $item];
        break;
    }

    foreach ($arr as $key => $item) {
        if ($maxFlag['value'] <= $item) {
            $maxFlag = ['key' => $key, 'value' => $item];
        }
    }
}

echo 'Giá trị lớn nhất: ' . $maxFlag['value'] . ' - Key: ' . $maxFlag['key'] . '<br>';
