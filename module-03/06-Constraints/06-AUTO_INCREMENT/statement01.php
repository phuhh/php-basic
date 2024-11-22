<?php
header('Content-Type: text/plain; charset=utf-8');
?>

AUTO_INCREMENT - Tự động tăng

- Thường dùng kết hợp với field có PRIMARY KEY.
- Kiểu dữ liệu phải là INT HOẶC BIGINT.



Tạo AUTO_INCREMENT khi tạo bảng

CREATE TABLE table_name(
column_name1 datatype AUTO_INCREMENT,
column_name2 datatype,
column_name3 datatype,
...
PRIMARY KEY(column_name1)
);



Thiết lập tự động tăng BẮT ĐẦU từ N

ALTER TABLE table_name AUTO_INCREMENT = start_number;



Xoá AUTO_INCREMENT

ALTER TABLE table_name
CHANGE old_field new_field datatype;


Ví dụ:

ALTER TABLE users
CHANGE user_id user_id INT NOT NULL;