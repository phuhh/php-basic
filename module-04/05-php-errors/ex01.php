<?php
header('Content-Type: text/plain; charset=utf-8')
?>
PHP Errors - Các lỗi trong PHP khi viết code sẽ thường gặp:

Parse error: Lỗi cú pháp, chương trình sẽ dừng khi gặp lỗi này.
Fatal error: Lỗi do không biên dịch được, chương trình sẽ dừng khi gặp lỗi này.
Warning: Lỗi cảnh báo nghiêm trọng, chương trình vẫn chạy.
Notice: Lỗi không nghiêm trọng (giống WARNING).


Ẩn các lỗi trong PHP

- Cách 1: Thiết lập tập tin php.ini trong Server

- Cách 2: Sử dụng các hàm của PHP có sẵn

// Show error php (Hiển thị lỗi)
ini_set('display_errors', 1);

// Thiết lập hiện thị những thông báo lỗi nào ???
// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Report all PHP errors (see changelog)
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Hide error php
ini_set('display_errors', 0);
error_reporting(0);
// Lưu ý: Ẩn tất cả lỗi, mà phát hiện ra lỗi sẽ hiển thị thông báo 500.