<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Các cách kết nối PHP với MYSQL - Từ PHP 5.x trở lên dùng

Lưu ý: PHP cần phải cần cài đặt extensions.

1. MySQLi extension (ít dùng rồi)

2. PDO (PHP Data Objects)
https://www.php.net/manual/en/pdo.installation.php

- PDO là 1 database abstraction layer
- Có thể dùng extension khác nhau để giao tiếp các CSDL khác nhau (Server SQL, PostgreSQL, Oracle,...)
- PDO có thể dùng để lập trình theo hướng thủ tục và theo hướng đối tượng.
- Ứng với mỗi CSDL khác nhau PDO sẽ sử dụng các loại driver khác nhau để thao tác với CSDL.


Sau khi đã cài đặt, Bật extensions trong php.ini

extension=php_pdo_mysql.dll