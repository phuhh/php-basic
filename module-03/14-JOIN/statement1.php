<?php
header('Content-Type: text/plain; charset=utf-8');
?>

INNER JOIN - Trả về các dòng => có giá trị trùng khớp

SELECT column_name(s)
FROM table_1
INNER JOIN table_2 AS ON table_1.column_name = table_2.column_name
WHERE condition;



AS - ALIAS cho bảng

SELECT column_name(s)
FROM table_1 AS t1
INNER JOIN table_2 as t2 AS ON t1.column_name = t2.column_name
WHERE condition;



JOIN - nhiều bảng

SELECT column_name(s)
FROM ((table_1
INNER JOIN table_2 AS ON table_1.column_name = table_2.column_name)
INNER JOIN table_2 AS ON table_1.column_name = table_2.column_name)
WHERE condition;



LEFT JOIN - Trả về tất cả dòng bảng bên TRÁI, và các dòng trùng khớp với bảng bên TRÁI
(các dòng không trùng khớp sẽ NULL)

SELECT column_name(s)
FROM table_1
LEFT JOIN table_2 AS ON table_1.column_name = table_2.column_name
WHERE condition;



RIGHT JOIN - Trả về tất cả dòng bảng bên PHẢI, và các dòng trùng khớp với bảng bên PHẢI
(các dòng không trùng khớp sẽ NULL)

SELECT column_name(s)
FROM table_1
RIGHT JOIN table_2 AS ON table_1.column_name = table_2.column_name
WHERE condition;



CROSS JOIN - Trả về tất cả dòng bảng bên TRÁI và bảng bên phải PHẢI
(bao gồm các dòng trùng khớp và không trùng khớp)

SELECT column_name(s)
FROM table_1
CROSS JOIN table_2
WHERE condition;