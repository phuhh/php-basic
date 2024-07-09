<?php

/**
 * Định dạng chuỗi
 * 
 * 19. Chuyển các ký tự sang thành viết thường
 * 
 * Cú pháp: strtolower($str)
 * Lưu ý: sẽ có 1 số ký tự tiếng việt không chuyển đổi được
 */
$str = 'Trung Tâm Đào Tạo Lập Trình Unicode';
$str = strtolower($str); // Output: trung tâm Đào tạo lập trình unicode
echo $str . '<br>';

/**
 * Hàm tương tự có hỗ trợ tiếng việt
 * 
 * Cú pháp: mb_strtolower($str, $encoding)
 */
$str = 'Trung Tâm Đào Tạo Lập Trình Unicode';
$str = mb_strtolower($str, 'UTF-8'); // Output: trung tâm đào tạo lập trình unicode
echo $str . '<hr>';

/**
 * 20. Chuyển các ký tự sang thành viết HOA
 * 
 * Cú pháp: strtoupper($str)
 * Lưu ý: sẽ có 1 số ký tự tiếng việt không chuyển đổi được
 */
$str = 'Trung Tâm Đào Tạo Lập Trình Unicode';
$str = strtoupper($str); // Output: TRUNG TâM ĐàO TạO LậP TRìNH UNICODE
echo $str . '<br>';

/**
 * Hàm tương tự có hỗ trợ tiếng việt
 * 
 * Cú pháp: mb_strtolower($str, $encoding)
 */
$str = 'Trung Tâm Đào Tạo Lập Trình Unicode';
$str = mb_strtoupper($str, 'UTF-8'); // Output: TRUNG TÂM ĐÀO TẠO LẬP TRÌNH UNICODE
echo $str . '<hr>';

/**
 * 21. Chuyển chữ cái đầu tiên thành viết HOA
 * 
 * Cú pháp: ucfirst($str)
 * Lưu ý: sẽ có 1 số ký tự tiếng việt không chuyển đổi được
 */
$str = 'trung tâm đào tạo lập trình unicode';
$str = ucfirst($str); // Output: Trung tâm đào tạo lập trình unicode
echo $str . '<br>';

/**
 * 22. Chuyển chữ cái đầu tiên thành viết thường
 * 
 * Cú pháp: ucfirst($str)
 * Lưu ý: sẽ có 1 số ký tự tiếng việt không chuyển đổi được
 */
$str = 'Trung Tâm Đào Tạo Lập Trình Unicode';
$str = lcfirst($str); // Output: trung Tâm Đào Tạo Lập Trình Unicode
echo $str . '<hr>';

/**
 * 23. Chuyển các chữ cái đầu tiên thành viết HOA
 * 
 * cú pháp: ucwords($str)
 * Lưu ý: sẽ có 1 số ký tự tiếng việt không chuyển đổi được
 */
$str = 'trung tâm đào tạo lập trình unicode';
$str = ucwords($str); // Output: Trung Tâm đào Tạo Lập Trình Unicode
echo $str . '<br>';
