<?php
header('Content-Type: text/plain; charset=utf-8');
?>

UNIQUE - Từ duy nhất

Cột có ràng buộc UNIQUE không được phép có giá trị lặp lại hoặc trùng, nếu không sẽ bị LỖI.



Tạo UNIQUE khi tạo Table

CREATE TABLE table_name(
column_name1 datatype,
column_name2 datatype,
column_name3 datatype,
...
UNIQUE(column_name1)
);



Hoặc dùng CONSTRAINT để UNIQUE nhiều cột

CREATE TABLE table_name(
column_name1 datatype,
column_name2 datatype,
column_name3 datatype,
...
CONSTRAINT UK_constraint_name UNIQUE(column_name1, column_name2, ...)
);



Tạo UNIQUE sau khi tạo Table

ALTER TABLE table_name ADD UNIQUE(column_name);



Hoặc dùng CONSTRAINT để UNIQUE nhiều cột

ALTER TABLE table_name
ADD CONSTRAINT UK_constraint_name UNIQUE(column_name1, column_name2, ...);



Xoá UNIQUE

ALTER TABLE table_name
DROP INDEX UK_constraint_name;