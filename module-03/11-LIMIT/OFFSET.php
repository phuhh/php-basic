<?php
header('Content-Type: text/plain; charset=utf-8');
?>

OFFSET - Kết hợp với LIMIT, tính từ vị trí chỉ định.

SELECT column_name(s)
FROM table_name
WHERE condition
LIMIT number OFFSET index_start;