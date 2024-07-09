<?php

/**
 * Đếm chuỗi, đếm từ, lặp lại chuỗi
 * 
 * 6. Lấy ra độ dài của chuỗi
 * 
 * Cú pháp: strlen($str)
 */
$str = 'Trung tam dao tao lap trinh Unicode';
$length = strlen($str); // Ouput: 35
echo $length . '<br>';

// lưu ý: hàm này không hỗ trợ tiếng việt, độ dài chuỗi không chính xác
$str = 'Trung tâm đào tạo lập trình Unicode';
$length = strlen($str); // Ouput: 45
echo $length . '<br>';

/**
 * Hàm tương tự có hỗ trợ tiếng việt
 * 
 * Cú pháp: mb_strlen($str, $encoding)
 */
$str = 'Trung tâm đào tạo lập trình Unicode';
$length = mb_strlen($str, 'UTF-8'); // Ouput: 35
echo $length . '<hr>';

/**
 * 7. Lấy ra số từ trong chuỗi
 * 
 * Cú pháp: str_word_count($str, $format, $characters)
 *    $str: Đây là chuỗi mà bạn muốn xử lý.
 *    $format (tùy chọn): Đây là một biến kiểu số nguyên xác định cách kết quả sẽ được trả về. 
 *        Giá trị mặc định là 0. Và các giá trị biến $format có thể là:
 *            0 (Mặc định): Hàm sẽ trả về số từ trong chuỗi.
 *            1: Hàm sẽ trả về một mảng chứa các từ trong chuỗi.
 *            2: Hàm sẽ trả về một mảng với khóa mảng là vị trí của từng từ trong chuỗi.
 *    $characters (tùy chọn): Đây là một chuỗi tùy chọn chứa các ký tự đặc biệt cũng sẽ được coi là “từ” trong chuỗi. 
 *        Mặc định là null.
 */
$str = 'Trung tam dao tao lap trinh Unicode';
$count = str_word_count($str); // Output: 7
echo $count . '<br>';

// lưu ý: hàm này không hỗ trợ tiếng việt, độ dài chuỗi không chính xác
$str = 'Trung tâm đào tạo lập trình Unicode';
$count = str_word_count($str); // Output: 11
echo $count . '<br>';

// Sử dụng tham số thứ 3 để loại bỏ các từ tiếng việt
$str = 'Trung tâm đào tạo lập trình Unicode';
$count = str_word_count($str, 0, 'àáãâạêéíîóõôúÀÁÃÂÇÊÉÍÎÓÕÔÚ'); // Output: 8
echo $count . '<hr>';
// Nhưng vẫn không chưa chính xác lắm

/**
 * 8. Lặp lại chuỗi với số lần chỉ định
 * 
 * Cú pháp: str_repeat($str, $time)
 */
$str = 'Unicode';
$result = str_repeat($str, 1);
echo $result . '<br>'; // Output: Unicode

$result = str_repeat($str, 2);
echo $result . '<br>'; // Output: UnicodeUnicode

$result = str_repeat($str, 10);
echo $result . '<br>'; // Output: UnicodeUnicodeUnicodeUnicodeUnicodeUnicodeUnicodeUnicodeUnicodeUnicode
