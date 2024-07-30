<?php

/**
 * Toán tử 3 ngôi
 * 
 * Cú pháp thông thường của if...else
 */
$age = 18;
if ($age >= 18) {
    echo 'Đủ tuổi lái xe';
} else {
    echo 'Chưa đủ tuổi lái xe';
}
echo '<br>';

/**
 * Cú pháp thay thế câu lệnh rẽ nhánh if...else đơn giản
 */
echo $age >= 18 ? 'Đủ tuổi lái xe' : 'Chưa đủ tuổi lái xe';
echo '<br>';
// kết quả có thể in ra trực tiếp hoặc gán vào 1 biến
$printStr = $age >= 18 ? 'Đủ tuổi lái xe' : 'Chưa đủ tuổi lái xe';
var_dump($printStr);
echo '<br>';
/**
 * Cú pháp:
 *     - bieu-thuc-dieu-kien ? gia-tri-dung : gia-tri-sai;
 * 
 * Lưu ý:
 *     - Toán tử 3 ngôi phải gắn với 1 biểu thức (gán hoặc echo)
 *     - Luôn luôn phải có giá trị SAI (nếu không muốn hiển thị giá trị có gán null, false hoặc '' tr)
 */
$printStr = $age >= 22 ? 'Đủ tuổi lái xe hơi' : '';
var_dump($printStr);
