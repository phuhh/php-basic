<?php

/**
 * Thêm, xoá dấu Escape \
 * 
 * 1. Thêm dấu escape vào phía trước các ký tự mong muốn
 * 
 * Cú pháp: addcslashes($str, $characters)
 */

$str = 'Trung tâm đào tạo lập trình Unicode';
$str = addcslashes($str, 'U'); // Output: Trung tâm đào tạo lập trình \Unicode
echo $str . '<br>';

// chỉ định nhiều ký tự thêm dấu escape
$str = 'Trung tâm đào tạo lập trình Unicode';
$str = addcslashes($str, 'Ut'); // Output: Trung \tâm đào \tạo lập \trình \Unicode
echo $str . '<br>';

// chỉ định các ký tự khác
$str = 'Trung tâm đào tạo lập trình "Unicode"';
$str = addcslashes($str, '"'); // Output: Trung tâm đào tạo lập trình \"Unicode\"
echo $str . '<br>';

// Lưu ý: các ký tự tiếng việt (UTF-8)
$str = 'Trung tâm đào tạo lập trình Unicode';
$str = addcslashes($str, 'đ'); // Output: Trung tâm \304\221ào tạo lập trình Unicode
echo $str . '<hr>';

/**
 * 2. Thêm dấu escape vào phía trước vào các ký tự sau:
 *     - Dấu ngoặc đơn (')
 *     - Dấu ngoặc kép (")
 *     - Dấu gạch chéo ngược (\)
 * 
 * Cú pháp: addslashes($str)
 */
$str = 'Trung tâm đào tạo lập trình "Unicode"';
$str = addslashes($str); // Output: Trung tâm đào tạo lập trình \"Unicode\"
echo $str . '<br>';

$str = "Trung tâm \ đào tạo lập trình 'Unicode'";
$str = addslashes($str); // Output: Trung tâm \\ đào tạo lập trình \'Unicode\'
echo $str . '<hr>';

/**
 * 3. Xoá tất cả các ký tự escape có trong chuỗi
 * 
 * Cú pháp: stripslashes($str)
 */
$str = "Trung tâm \\ đào tạo lập trình \'Unicode\'";
$str = stripslashes($str); // Output: Trung tâm đào tạo lập trình 'Unicode'
echo $str . '<br>';
