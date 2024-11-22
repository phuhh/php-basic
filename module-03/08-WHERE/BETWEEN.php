<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Toán tử BETWEEN - lọc dữ liệu trong phạm vi (khoảng cách nhất định)

SELECT column_name1, column_name2
FROM table_name
WHERE column_name BETWEEN value1 AND value2;



Toán tử NOT BETWEEN - phủ định ngược lại BETWEEN

SELECT column_name1, column_name2
FROM table_name
WHERE column_name NOT BETWEEN value1 AND value2;