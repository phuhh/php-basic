<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Self join - Nối bảng chính nó (hoặc bảng khác - phải thoả mãn điều kiện)

SELECT column_name(s)
FROM table_1 AS t1, table_1 AS t2
WHERE condition