<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Cú pháp IS NULL - lọc record có giá trị rỗng

SELECT column_name1, column_name2
FROM table_name
WHERE column_name IS NULL;



Cú pháp IS NOT NULL - lọc record không có giá trị rỗng

SELECT column_name1, column_name2
FROM table_name
WHERE column_name IS NOT NULL;