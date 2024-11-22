<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Truy vấn dữ liệu mệnh đề SELECT

SELECT column_name1, column_name2,...
FROM table_name;



Lấy tất cả cột trong bảng

SELECT *
FROM table_name;



ALIAS định dạng lại tên cột

SELECT column_name1 AS alias_name1, column_name2 AS alias_name2
FROM table_name;