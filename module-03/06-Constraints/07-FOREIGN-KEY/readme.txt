authors
- author_id PRIMARY KEY
- author_name

categories
- category_id PRIMARY KEY
- category_name

posts
- post_id PRIMARY KEY
- post_title
- post_content
- category_id FOREIGN KEY
- author_id FOREIGN KEY

comments
- comment_id PRIMARY KEY
- comment_content
- post_id FOREIGN KEY
- user_id FOREIGN KEY

users
- user_id PRIMARY KEY
- user_name