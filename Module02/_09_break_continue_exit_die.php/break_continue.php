<?php

/**
 * Từ khoá break và continue sẽ thường dùng trong các vòng lặp
 * 
 * - Từ khoá break dùng để thoát khỏi vòng lặp, trong đó cả câu lệnh rẽ nhánh switch
 * - Trong switch, tất cả đoạn mã nằm trong câu lệnh case sẽ được thực thi cho đến 
 * khi gặp break sẽ dừng lại và thoát ra khỏi switch. Đối với các case khác cũng vậy.
 */
for ($i = 1; $i <= 10; $i++) {
    if ($i === 5) {
        break; // Thoát khỏi vòng lặp khi thoả mãn điều kiện
    }
    echo 'Vòng lặp thứ ' . $i . '<br>';
}
echo '<br>';
/**
 * Ví dụ bài tập: Kiểm tra số nguyên
 */
$n = 3;
if ($n > 1) {
    $check = true; // giả định là số nguyên tố
    for ($i = 2; $i < $n; $i++) {
        if ($n % $i === 0) {
            $check = false;
            break;
        }
    }
    if ($check) {
        echo $n . ' là số nguyên tố';
    } else {
        echo $n . ' không phải là số nguyên tố';
    }
} else {
    echo $n . ' không phải là số nguyên tố';
}
/**
 * $n = 2;
 * $i = 2; (2 < 2) => false; // Thoát vòng lặp
 * // OUTPUT: số nguyên tố;
 * 
 * $n = 3
 * $i = 2; (2 < 3) => true; (3 % 2 === 0) => false; $i = 3;
 * $i = 3; (3 < 3) => false; // Thoát vòng lặp
 * // OUTPUT: số nguyên tố;
 * 
 * $n = 4
 * $i = 2; (2 < 4) => true; (4 % 2 === 0) => true; break; // Từ khoá break Thoát khỏi vòng lặp khi chưa hết vòng lặp
 * // OUTPUT: không số nguyên tố;
 * 
 * Ưu điểm:
 * - Thoát khỏi vòng lặp giúp bài toán xử lý nhanh hơn
 * - Cho ra kết quả bài toán được chính xác hơn
 */
echo '<hr>';

/**
 * Từ khoá continue dùng để kết thúc lần lặp hiện tại và tiếp tục lần lặp tiếp theo
 * 
 * Bài toán: $i mà khác 5 thì in biến $i
 * 
 * Cách 1:
 */

for ($i = 1; $i <= 10; $i++) {
    if ($i !== 5) {
        echo 'Vòng lặp thứ ' . $i . '<br>';
    }
}
echo '<br>';
/**
 * Cách 2: dùng continue
 */
for ($i = 1; $i <= 10; $i++) {
    if ($i === 5) continue; // Bỏ qua vòng lặp
    echo 'Vòng lặp thứ ' . $i . '<br>';
}
echo '<hr>';
