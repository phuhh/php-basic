<?php
/**
 * Bài tập 3: Kiểm tra 1 số có phải là số nguyên tố không và hiển thị kết quả
 *
 * Xác định INPUT OUTPUT là gì ????
 * INPUT: Số Nguyên N
 * OUTPUT: Thông báo số N có phải là số nguyên tố không ???
 *
 * Công Thức là gì ???
 * Điều kiện số nguyên tố:
 * - Phải lớn hơn 1
 * - Chỉ chia hết cho 1 và chính nó
 *
 * Giải pháp là gì ???
 * Giải thuật
 * - Kiểm tra số n có lớn hơn 1 hay không ?
 * - Nếu số N lớn hơn 1
 * + Dùng vòng lặp chạy từ 2 đến N - 1
 * + Kiểm tra trong phạm vi từ 2 đến N - 1 có chia hết cho hết nào không?
 * -- Nếu có chia hết => kết quả không phải số nguyên tố
 * -- Nếu KHÔNG chia hết => kết quả là số nguyên tố
 * - Nếu số N nhỏ hơn 1 hoặc bằng 1 thì => thông báo không phải số nguyên tố
 */

$n = 5; // số cần kiểm tra
if ($n > 1) {
    $check = true; // Gắn cờ - Kiểm tra có phải số nguyên tố không (Giải định n là số nguyên)
    for ($index = 2; $index < $n; $index++) {
        if ($n % $index === 0) {
            $check = false;
        }
    }

    if ($check) { // if($check == true)
        echo $n . ' là số nguyên tố';
    } else {
        echo $n . ' không phải số nguyên tố';
    }
} else {
    echo $n . ' Không phải là số nguyên số';
}
