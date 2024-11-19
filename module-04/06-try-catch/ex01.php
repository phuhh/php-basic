<?php

/**
 * Try..catch (xử lý ngoại lệ là quá trình xử lý các lỗi giúp chương trình vẫn hoạt động bình thường)
 * 
 * Cách 1: sử dụng class Error (Xử lý các lỗi PHP)
 */

try {
    demo();
} catch (Error $e) {
    echo 'Error on line ' . $e->getLine() . ' in ' . $e->getFile()  . ': <b>' . $e->getMessage() . '</b><br />';
}

// Cách 2: sử dụng class Exception (xử lý lỗi theo điều kiện thoả mã)
$age = 17;
try {
    if ($age < 18) {
        throw new Exception('Tuổi không hơp lệ');
    }
} catch (Exception $e) {
    echo  $e->getMessage();
}
