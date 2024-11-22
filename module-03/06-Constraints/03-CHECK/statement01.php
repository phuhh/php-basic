<?php
header('Content-Type: text/plain; charset=utf-8');
?>

CHECK - Kiểm tra điều kiện

Cột có ràng buộc CHECK phải thoả mản điều kiện, nếu không sẽ bị LỖI.



Tạo CHECK khi tạo Table

CREATE TABLE table_name(
column_name1 datatype,
column_name2 datatype,
column_name3 datatype,
...
CHECK(condition)
);



Hoặc Tạo CONSTRAINT CHECK khi tạo Table

CREATE TABLE table_name(
column_name1 datatype,
column_name2 datatype,
column_name3 datatype,
...
CONSTRAINT CHK_constraint_name CHECK(condition)
);



Tạo CHECK sau khi tạo Table

ALTER TABLE table_name ADD CHECK(condition);



Hoặc Tạo CONSTRAINT CHECK sau khi tạo Table

ALTER TABLE table_name
ADD CONSTRAINT CHK_constraint_name CHECK(condition);



Xoá CHECK

ALTER TABLE table_name
DROP CHECK CHK_constraint_name;