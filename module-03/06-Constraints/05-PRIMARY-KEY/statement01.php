<?php
header('Content-Type: text/plain; charset=utf-8');
?>

PRIMARY KEY - Khoá Chính

- Dùng định danh duy nhất cho mỗi record
- Dùng để thiết lập 1-n (để tham chiếu)
- Dữ liệu field có khoá chính phải duy nhất
- 1 Table nên có 1 khoá chính.
- 1 Table có thể thiết lập khoá chính cho 2 hoặc nhiều field


Tạo PRIMARY KEY khi tạo Table

CREATE TABLE table_name(
column_name1 datatype,
column_name2 datatype,
column_name3 datatype,
...
PRIMARY KEY(column_name1)
);



Tạo PRIMARY KEY khi tạo Table (bằng CONSTRAINT)

CREATE TABLE table_name(
column_name1 datatype,
column_name2 datatype,
column_name3 datatype,
...
CONSTRAINT PK_constraint_name PRIMARY KEY(column_name1, column_name2, ...)
);



Tạo PRIMARY KEY sau khi tạo Table

ALTER TABLE table_name ADD PRIMARY KEY(column_name);



Tạo PRIMARY KEY sau khi tạo Table (bằng CONSTRAINT)

ALTER TABLE table_name ADD CONSTRAINT PK_constraint_name PRIMARY KEY(column_name1, column_name2, ...);



Xoá PRIMARY KEY

ALTER TABLE table_name DROP PRIMARY KEY;