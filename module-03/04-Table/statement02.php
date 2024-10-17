<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Sửa Table - Columns


Thêm column

ALTER TABLE table_name ADD column_name datetype;



Xoá column

ALTER TABLE table_name DROP COLUMN column_name datetype;



Đổi tên column

ALTER TABLE table_name RENAME COLUMN old_name TO new_name;



Sửa column

ALTER TABLE table_name MODIFY COLUMN column_name datetype;



NÂNG CAO: Sửa column

ALTER TABLE table_name CHANGE old_column new_column datetype;

* old_column: chỉ định cột sửa
* new_column: đặt tên mới cho cột sẽ sữa (có thể gõ lại tên cũ)