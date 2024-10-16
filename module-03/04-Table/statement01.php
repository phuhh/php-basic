<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Thao tác với Table


Hiển thị danh sách các Table trong Database

SHOW TABLES;



Tạo Table

CREATE TABLE table_name (
column_name1 datatype,
column_name2 datatype,
column_name3 datatype,
...
);

* table_name : tên bảng
* column_name : tên trường (cột)
* datatype : kiểu dữ liệu của trường đó



Xem mô tả Table

DESCRIBE/DESC table_name;



hoặc:

SHOW CREATE TABLE table_name;



Xoá Table

DROP TABLE table_name;