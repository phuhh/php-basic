<?php
header('Content-Type: text/plain; charset=utf-8');
?>

INDEX - Đánh chỉ mục

Lợi ích: giúp việc tìm kiếm nhanh hơn.


NÊN DÙNG:
- Cho các cột thường xuyên truy vấn mệnh đề: WHERE, JOIN và ORDER BY


KHÔNG NÊN
- KHÔNG nên sử dụng trong các bảng nhỏ, ít record
- KHÔNG nên dùng index cho các bảng thường xuyên có INSERT hoặc UPDATE
- KHÔNG nên sử dụng cho các cột mà chứa 1 số lượng lớn giá trị NULL


Tiêu chí đánh index:
- Kiểu dữ liệu (datatype) phải có độ dài mới đánh được
vd: VARCHAR(255) => ĐƯỢC, TEXT => KHÔNG ĐƯỢC



Tạo INDEX

CREATE INDEX index_name ON table_name(column_name);



Tạo INDEX kết hợp UNIQUE

CREATE UNIQUE INDEX index_name ON table_name(column_name_1, column_name_2,...)

Lưu ý: giá trị không được phép lặp lại.



Xoá INDEX

DROP INDEX index_name ON table_name;