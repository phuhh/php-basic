<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Toán tử LIKE - lọc dữ liệu theo ký tự

SELECT column_name1, column_name2
FROM table_name
WHERE column_name LIKE pattern;

Dùng % tìm từ 0,1 -> n ký tự
Dùng _ tìm chỉ 1 ký tự