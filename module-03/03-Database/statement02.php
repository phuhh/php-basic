<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Thao tác với Database


Tạo Database

CREATE DATABASE database_name;

* database_name: Tên CSDL, thường đặt theo tên dự án.
Quy tắc đặt tên tương tự như tên biến.

Lưu ý:
- Các STATEMENT (mệnh đệ) SQL nên được viết HOA để dễ phân biệt.
- Kết thúc 1 câu lệnh nên có dấu phẩy ;



Hiển thị danh sách các Database

SHOW DATABASES;



Xoá Database

DROP DATABASE database_name;



Truy cập Database

USE database_name;