<?php
header('Content-Type: text/plain; charset=utf-8');
?>

NOT NULL - không được phép NULL

Cột có ràng buộc NOT NULL không phép để NULL hoặc bỏ qua cột đó nếu không sẽ bị LỖI.
Lưu ý: Truyền giá trị rỗng '' cho phép vì nó hiểu là chuỗi rỗng vẫn có giá trị.



Tạo NOT NULL lúc tạo Table

CREATE TABLE table_name(
...
column_name datatype NOT NULL,
...
)



Tạo NOT NULL sau khi tạo Table

ALTER TABLE table_name
MODIFY column_name datatype NOT NULL;



Xoá NOT NULL

ALTER TABLE table_name
MODIFY column_name datatype;