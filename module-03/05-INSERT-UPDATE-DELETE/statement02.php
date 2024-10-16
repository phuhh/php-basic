<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Lưu ý: khi cập nhật hoặc xoá luôn chắc chắn phải có điều kiện WHERE để tránh trường hợp xấu.
Ảnh hưởng đến toàn bộ dữ liệu trong bảng.



Cập nhật record

UPDATE table_name
SET column_name = new_value
WHERE condition;



Cập nhật nhiều column

UPDATE table_name
SET column_name1 = new_value1, column_name2 = new_value2
WHERE condition;