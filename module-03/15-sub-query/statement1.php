<?php
header('Content-Type: text/plain; charset=utf-8');
?>

SubQuery - Truy vấn lồng
- Thường lồng trong SELECT, ít khi lồng trong INSERT, DELETE, UPDATE



Lồng tại WHERE

SELECT *
FROM posts
WHERE user_id IN (SELECT user_id FROM users WHERE user_active = 1);

SELECT *
FROM posts
WHERE user_id = (SELECT MAX(user_age) FROM users WHERE user_active = 1);

=> Truy vấn lồng tại WHERE coi như là Value.



Lồng tại FROM

SELECT *
FROM (SELECT p.post_id, p.post_title, i.image_path AS post_image, p.post_description
FROM posts AS p
LEFT JOIN images AS i ON i.image_id = p.image_id
)

=> Truy vấn lồng tại FROM coi như là Table.



Lồng tại SELECT

SELECT post_id, post_title, (SELECT category_name FROM Categories AS c WHERE c.category_id = p.category_id) AS post_category
FROM posts AS p
WHERE post_active = 1;

=> Truy vấn lồng tại SELECT coi như là Column.
=> Nhượng điểm truy vấn lồng SELECT: mỗi lần chạy đều phải chạy 1 lại truy vấn lồng. Nên thay thế bằng lệnh JOIN.