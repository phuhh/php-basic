<?php

/**
 * Trích xuất chuỗi, Tìm vị trí trong chuỗi
 * 
 * 15. Lấy ra chuỗi con từ chuỗi cha
 * 
 * Cú pháp: substr($str, $offset, $length)
 * Lưu ý: Vị trí bắt đầu là 0
 */
$str = 'Trung tam dao tao lap trinh Unicode';
$subStr = substr($str, 0, 5); // Output: Trung
echo $subStr . '<br>';

/**
 * Hàm tương tự hỗ trợ UTF-8 (tiếng việt)
 * Cú pháp: mb_substr($str, $offset, $length, $encoding)
 */
$str = 'Trung tâm đào tạo lập trình Unicode';
$subStr = mb_substr($str, 0, 9, 'UTF-8'); // Output: Trung tâm
echo $subStr . '<br>';

// Ví dụ khác:
$str = 'Trung tâm đào tạo lập trình Unicode';
$subStr = mb_substr($str, 10, 7); // Output: đào tạo
echo $subStr . '<br>';

/**
 * Lấy chuỗi theo chiều ngược lại, tham số 2 là số âm
 * Chú ý: Vị trí cuối cùng bắt đầu là 1 -> đếm từ phải sang trái
 */
$str = 'Trung tâm đào tạo lập trình Unicode';
$subStr = mb_substr($str, -7); // Output: Unicode
echo $subStr . '<br>';

// Ví dụ khác: hỗ trợ utf-8
$str = 'Trung tâm đào tạo lập trình Unicode';
$subStr = mb_substr($str, -14, null, 'UTF-8'); // Output: trình Unicode
echo $subStr . '<hr>';

/**
 * 16. Tách chuỗi từ ký tự cho trước cho đến hết chuỗi
 * 
 * Cú pháp: strstr($str, $needle)
 */
$str = 'Trung tâm đào tạo lập trình Unicode';
$subStr = strstr($str, 'đào'); // Output: đào tạo lập trình Unicode
echo $subStr . '<br>';

// Tham số thứ 3: Tìm và lấy chuỗi theo chiều ngược lại (bỏ qua ký tự tìm)
$subStr = strstr($str, 'đào', true); // Output: Trung tâm
echo $subStr . '<hr>';

/**
 * 17. Tìm và trả về vị trí đầu tiên tìm thấy. Ngược lại, tìm không thấy trả về false
 * 
 * Cú pháp: strpos($str, $needle)
 * Lưu ý: Vị trí bắt đầu là 0
 */
$str = 'Trung tam dao tao lap trinh Unicode';
$position = strpos($str, 'd'); // Output: 10
echo $position . '<br>';

// Nếu không tìm thấy trả về false
$str = 'Trung tam dao tao lap trinh Unicode';
$position = strpos($str, 'f'); // Output: false
var_dump($position);
echo '<br>';

/**
 * Hàm tương tự có hỗ trợ tiếng việt
 * 
 * Cú pháp: mb_strpos($str, $needle, $offset, $encoding)
 */
$str = 'Trung tâm đào tạo lập trình Unicode';
$position = mb_strpos($str, 'đ', 0, 'UTF-8'); // Output: 10
echo $position . '<br>';

/**
 * Tìm và trả về vị trí cuối cùng tìm thấy.
 */
$str = 'Trung tam dao tao lap trinh Unicode';
$position = strripos($str, 'd'); // Output: 33
echo $position . '<hr>';

/**
 * 18. Tìm, Xoá và Thay Thế 
 * 
 * Cú pháp: substr_replace($str, $replace, $offset, $length)
 * 
 * Lưu ý: không có hỗ trợ tiếng việt, có chêch lệch vị trí
 * 
 * Trường hợp 1: Lấy ra chuỗi con (từ độ dài cho trước)
 */
$str = 'Trung tâm đào tạo lập trình Unicode';
$str = substr_replace($str, '', 5); // Output: Trung
echo $str . '<br>';

// Trường hợp 2: Tìm vào thay thế
$str = 'Trung tâm đào tạo lập trình Unicode';
$str = substr_replace($str, '', 6, 4); // Output: Trung đào tạo lập trình Unicode
echo $str . '<br>';

$str = 'Trung tâm đào tạo lập trình Unicode';
$str = substr_replace($str, '@', 6, 4); // Output: Trung @ đào tạo lập trình Unicode
echo $str . '<br>';
