<?php

/**
 * Biến toàn cục $_SERVER hiển thị thông tin headers, paths và script locations.
 * 
 * https://www.w3schools.com/php/php_superglobals_server.asp
 * 
 * Một số thường dùng:
 * 
 * $_SERVER['REQUEST_URI'] : lấy ra query string
 * 
 * $_SERVER['HTTP_HOST'] : lấy ra tên miền
 * 
 * $_SERVER['DOCUMENT_ROOT'] : lấy đường dẫn gốc (chứa thư mục)
 * 
 * $_SERVER['REQUEST_METHOD'] : lấy phương thức gửi
 * 
 */

echo "<pre>";
print_r($_SERVER);
echo "</pre>";


echo 'Query String: ' . $_SERVER['REQUEST_URI'] . '<br>';
echo 'Domain: ' . $_SERVER['HTTP_HOST'] . '<br>';
echo 'Root path: ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
echo 'Method: ' . $_SERVER['REQUEST_METHOD'] . '<br>';
