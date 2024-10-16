DROP TABLE IF EXISTS users;
CREATE TABLE users(user_id INT, user_name VARCHAR(100), user_email VARCHAR(250), user_first_name VARCHAR(100), user_last_name VARCHAR(120), user_gender TINYINT);

INSERT INTO users(user_id, user_name, user_email, user_first_name, user_last_name, user_gender)
VALUES (1, 'user01', 'user01@mail.com', 'first 01', 'last 01', 1),
(2, 'user02', 'user02@mail.com', 'first 02', 'last 02', 0);


-- ERROR CONSTRAINT
INSERT INTO users(user_id, user_name, user_email, user_first_name, user_last_name, user_gender)
VALUES (3, 'test03', 'test03@mail.com', 'test first 03', 'test last 01', 3);