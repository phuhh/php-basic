<?php
header('Content-Type: text/plain; charset=utf-8');
?>

FOREIGN KEY - Khoá Ngoại

- Khoá ngoại là con trỏ tham chiếu tới khoá chính của bảng khác
- Khoá ngoại hỗ trợ truy vấn nhiều bảng, bảo toàn vẹn dữ liệu - không phá vỡ tính thống nhất của bảng.



Tạo FOREIGN KEY khi tạo bảng

CREATE TABLE posts(
post_id INT NOT NULL,
post_title VARCHAR(250) NOT NULL,
post_content TEXT,
category_id INT,
PRIMARY KEY(post_id),
FOREIGN KEY(category_id) REFERENCE categories(category_id)
);



Tạo FOREIGN KEY khi tạo bảng (với CONSTRAINT)

CREATE TABLE posts(
post_id INT NOT NULL,
post_title VARCHAR(250) NOT NULL,
post_content TEXT,
category_id INT,
PRIMARY KEY(post_id),
CONSTRAINT FK_category_post FOREIGN KEY (category_id) REFERENCE categories(category_id)
);



Tạo FOREIGN KEY sau khi tạo bảng

ALTER TABLE posts
ADD FOREIGN KEY(category_id) REFERENCE categories(category_id);



Tạo FOREIGN KEY sau khi tạo bảng (với CONSTRAINT)

ALTER TABLE posts
ADD CONSTRAINT FK_category_post
FOREIGN KEY (category_id) REFERENCE categories(category_id);



Xoá FOREIGN KEY

ALTER TABLE parent_id
DROP FOREIGN KEY FK_category_post;