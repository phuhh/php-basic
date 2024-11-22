<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Toán tử IN - lọc dữ liệu trong danh sách

SELECT column_name1, column_name2
FROM table_name
WHERE column_name IN (value1, value2, value3,...);



Toán tử NOT IN - phủ định ngược lại IN

SELECT column_name1, column_name2
FROM table_name
WHERE column_name NOT IN (value1, value2, value3,...);