<?php
header('Content-Type: text/plain; charset=utf-8');
?>

DEFAULT - Giá trị mặc định

Cột có ràng buộc DEFAULT sẽ có dữ liệu mặc định sẵn, với điều kiện gán giá trị NULL hoặc bỏ qua cột đó.



Tạo DEFAULT khi tạo Table

CREATE TABLE table_name(
column_name1 datatype DEFAULT value_default,
column_name2 datatype,
column_name3 datatype,
);



Tạo DEFAULT sau khi tạo Table

ALTER TABLE table_name
ALTER column_name SET DEFAULT value_default;



Xoá DEFAULT

ALTER TABLE table_name
ALTER column_name DROP DEFAULT;