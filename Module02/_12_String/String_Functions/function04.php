<?php

/**
 * 9.Tìm kiếm và thay thế chuỗi
 * 
 * Cú pháp: str_replace($search, $replace, $subject)
 * 
 */
$str = 'Trung tâm đào tạo lập trình "Unicode"';
$str = str_replace('Unicode', 'PHP', $str); // Output: Trung tâm đào tạo lập trình "PHP"
echo $str . '<br>';

// Xoá ký tự tìm thấy
$str = 'Trung tâm đào tạo lập trình "Unicode"';
$str = str_replace('Unicode', '', $str); // Output: Trung tâm đào tạo lập trình "PHP"
echo $str . '<br>';

$str = 'Trung tâm đào tạo lập trình "Unicode"';
$str = str_replace('"Unicode"', '', $str); // Output: Trung tâm đào tạo lập trình
echo $str . '<br>';

// Ví dụ khác:
$path = 'C:\xampp\htdocs\projectName';
$path = str_replace('\\', '/', $path); // Output: C:/xampp/htdocs/projectName
echo $path;
