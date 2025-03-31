DROP DATABASE IF EXISTS PHP_basic_radix
CREATE DATABASE PHP_basic_radix CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci

DROP TABLE IF EXISTS radix_users
CREATE TABLE radix_users (
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,user_fullname VARCHAR(100) -- Họ tên người quản trị
    ,user_email VARCHAR(100) -- Địa chỉ email người quản trị
    ,user_password VARCHAR(100) -- Mật khẩu người quản trị
    ,user_about TEXT -- Giới thiệu người quản trị (Hiển thị khi xem chi tiết bài viết blog)
    ,user_contact_facebook VARCHAR(100) -- Đường dẫn facebook
    ,user_contact_twitter VARCHAR(100) -- Đường dẫn twitter
    ,user_contact_linkedin VARCHAR(100) -- Đường dẫn linkedin
    ,user_contact_pinterest VARCHAR(100) -- Đường dẫn pinterest
    ,user_forget_token VARCHAR(100) -- Token khi quên mật khẩu
    ,group_id INT DEFAULT 0 -- Khoá ngoại dành Group
    ,user_status TINYINT DEFAULT 0 -- Trạng thái: 0 - Chưa kích hoạt, 1 - kích hoạt
    ,user_last_activity DATETIME -- Thời gian quản trị hoạt động cuối cùng
    ,user_create_at DATETIME -- Thời gian tạo người quản trị
    ,user_update_at DATETIME -- Thời gian cập nhật người quản trị
)

DROP TABLE IF EXISTS radix_groups
CREATE TABLE radix_groups (
    group_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,group_name VARCHAR(100) -- Tên nhóm phân quyền
    ,group_permission TEXT -- Phân quyền (chuỗi JSON)
    ,group_create_at DATETIME -- Thời gian tạo người quản trị
    ,group_update_at DATETIME -- Thời gian cập nhật người quản trị
    ,user_id INT DEFAULT 0
)

ALTER TABLE radix_users ADD FOREIGN KEY(group_id) REFERENCES radix_groups(group_id)
ALTER TABLE radix_groups ADD FOREIGN KEY(user_id) REFERENCES radix_users(user_id)

DROP TABLE IF EXISTS radix_login_token
CREATE TABLE radix_login_token(
    token_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT
    ,token_string VARCHAR(100)
    ,user_id INT DEFAULT 0
	,token_create_at DATETIME
	,FOREIGN KEY user_id REFERENCES radix_users(user_id)
)

DROP TABLE IF EXISTS radix_options
CREATE TABLE radix_options (
   option_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
   ,option_key VARCHAR(100) -- Từ khoá nhận biết giữa các Options
   ,option_value TEXT -- Giá trị của từ khoá option
   ,option_name VARCHAR(200) -- Tên hiển thị ngoài giao diện
   ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
   ,option_create_at DATETIME -- Thời gian tạo tuỳ chọn
   ,option_Update_at DATETIME -- Thời gian cập nhật tuỳ chọn 
   ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)


DROP TABLE IF EXISTS radix_pages
CREATE TABLE radix_pages (
   page_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
   ,page_title VARCHAR(200) -- Tiêu đề trang
   ,page_slug VARCHAR(200) -- Đường dẫn tĩnh của trang
   ,page_content TEXT -- Nội dung của trang
   ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
   ,page_create_at DATETIME -- Thời gian tạo trang
   ,page_Update_at DATETIME -- Thời gian cập nhật trang
   ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)

DROP TABLE IF EXISTS radix_contract_type
CREATE TABLE IF NOT EXISTS radix_contract_type (
   type_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng
   ,type_name VARCHAR(100) -- Tên người gửi liên hệ
   ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
   ,type_create_at DATETIME -- Thời gian tạo kiểu liên hệ
   ,type_update_at DATETIME -- Thời gian cập nhật kiểu liên hệ
   ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)

DROP TABLE IF EXISTS radix_contracts
CREATE TABLE radix_contracts (
   contract_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
   ,contract_fullname VARCHAR(100) -- Tên người gửi liên hệ
   ,contract_email VARCHAR(200) -- Địa chỉ email	 của người gửi liên hệ
   ,type_id INT DEFAULT 0 -- foregin key tới id của bảng radix_type
   ,contract_messages TEXT -- Nội dung tin nhắn liên hệ
   ,contract_status TINYINT DEFAULT 0 -- Trạng thái: 0 - Chưa xử lý, 1 - Đang xử lý, 2 - Đã xử lý
   ,contract_note TEXT -- Ghi chú của liên hệ (dành cho quản trị viên)
   ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
   ,contract_create_at DATETIME -- Thời gian tạo liên hệ
   ,contract_update_at DATETIME -- Thời gian cập nhật liên hệ
   ,FOREIGN KEY (type_id) REFERENCES radix_contract_type(type_id)
   ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)

DROP TABLE IF EXISTS radix_services
CREATE TABLE radix_services (
    service_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,service_name VARCHAR(200) -- Tên dịch vụ
    ,service_slug VARCHAR(200) -- Đường dẫn tĩnh của trang
    ,service_icon VARCHAR(100) -- Icon hoặc ảnh của dịch vụ
    ,service_description TEXT -- Mô tả ngắn về dịch vụ
    ,service_content TEXT -- Nội dung chi tiết về dịch vụ
    ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
    ,service_create_at DATETIME -- Thời gian tạo dịch vụ
    ,service_update_at DATETIME -- Thời gian cập nhật dịch vụ
    ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)

DROP TABLE IF EXISTS radix_portfolio_categories
CREATE TABLE radix_portfolio_categories (
    category_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,category_name VARCHAR(100) -- Tên thể loại của dự án
    ,category_slug VARCHAR(200) -- Đường dẫn tĩnh của trang
    ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
    ,category_create_at DATETIME -- Thời gian tạo dự án
    ,category_update_at DATETIME -- Thời gian cập nhật dự án
    ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)

DROP TABLE IF EXISTS radix_portfilios
CREATE TABLE radix_portfilios (
    portfolio_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,portfolio_name VARCHAR(200) -- Tên dự án
    ,portfolio_slug VARCHAR(200) -- Đường dẫn tĩnh của trang
    ,portfolio_thumbnail VARCHAR(100) -- Ảnh đại diện khi xem danh sách dự án
    ,portfolio_desciption TEXT -- Mô tả ngắn của dự án
    ,portfolio_video VARCHAR(100) -- Đường dẫn phim youtube
    ,portfolio_content TEXT -- Nội dung chi tiết của dự án
    ,category_id INT DEFAULT 0 -- foregin key tới id của bảng radix_portfolio_categories
    ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
    ,portfolio_create_at DATETIME -- Thời gian tạo dự án
    ,portfolio_update_at DATETIME -- Thời gian cập nhật dự án
    ,FOREIGN KEY (category_id) REFERENCES radix_portfolio_categories(category_id) 
    ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)

DROP TABLE IF EXISTS radix_portfilio_images
CREATE TABLE radix_portfilio_images(
    image_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,image_path VARCHAR(100) -- Đường dẫn ảnh của dự án
    ,portfolio_id INT DEFAULT 0 -- Khoá ngoại của bảng radix_portfilios
    ,image_create_at DATETIME -- Thời gian tạo hình ảnh
    ,image_update_at DATETIME -- Thời gian cập nhật hình ảnh
    ,FOREIGN KEY (portfolio_id) REFERENCES radix_portfilios(portfolio_id) 
)

DROP TABLE IF EXISTS radix_blog_categories
CREATE TABLE radix_blog_categories (
    category_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,category_name VARCHAR(100) -- Tên thể loại của bài viết
    ,category_slug VARCHAR(200) -- Đường dẫn tĩnh của trang
    ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
    ,category_create_at DATETIME -- Thời gian tạo thể loại
    ,category_update_at DATETIME -- Thời gian cập thể loại
    ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)

DROP TABLE IF EXISTS radix_blogs
CREATE TABLE radix_blogs (
    blog_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,blog_title VARCHAR(200) -- Tiêu đề bài viết
    ,blog_slug VARCHAR(200) -- Đường dẫn tĩnh của trang
    ,category_id INT DEFAULT 0 -- foregin key tới id của bảng radix_blog_categories
    ,blog_thumbnail VARCHAR(100) -- Ảnh đại diện khi xem danh sách bài viết
    ,blog_desciption TEXT -- Mô tả ngắn của bài viết 
    ,blog_content VARCHAR(100) -- Ảnh đại diện khi xem danh sách dự án
    ,blog_view_count INT DEFAULT 0 -- Lượt xem bài viết
    ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
    ,blog_create_at DATETIME -- Thời gian tạo bài viết
    ,blog_update_at DATETIME -- Thời gian cập nhật bài viết
    ,FOREIGN KEY (category_id) REFERENCES radix_blog_categories(category_id) 
    ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)


DROP TABLE IF EXISTS radix_subscribers
CREATE TABLE radix_subscribers (
    subcriber_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT -- ID tự động tăng, khoá chính
    ,subcriber_fullname VARCHAR(100) -- Họ Tên đăng ký theo dõi
    ,subcriber_email VARCHAR(100) -- Địa chỉ điện tử theo dõi
    ,subcriber_status TINYINT DEFAULT 0 -- Trạng thái: 0 - Chưa xử lý, 1 - Đang xử lý, 2 - Đã xử lý
    ,user_id INT DEFAULT 0 -- ID của quản trị viên, foregin key tới id của bảng radix_users
    ,subcriber_create_at DATETIME  -- Thời gian tạo theo dõi
    ,subcriber_update_at DATETIME  -- Thời gian cập nhật theo dõi
    ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)


DROP TABLE IF EXISTS radix_comments
CREATE TABLE radix_comments (
    comment_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT
    ,comment_name VARCHAR(100) -- Tên người bình luận
    ,comment_email VARCHAR(100) -- Địa chỉ email người bình luận
    ,comment_website VARCHAR(100) -- Địa chỉ web người bình luận
    ,comment_content TEXT -- Nội dung bình luận
    ,parend_id INT DEFAULT 0 -- ID thuộc về cha comment_id (khi trả lời vào bình luận)
    ,blog_id INT DEFAULT 0 -- Khoá ngoại của bài viết
    ,comment_status TINYINT -- Trạng thái: 0 - Chưa duyệt, 1 - Đã duyệt
    ,user_id INT DEFAULT 0 -- user_id của quản trị viên (Dùng để trả lời comment)
    ,comment_create_at DATETIME  -- Thời gian tạo bình luận
    ,comment_update_at DATETIME  -- Thời gian cập nhật bình luận
    ,FOREIGN KEY (blog_id) REFERENCES radix_blogs(blog_id)
    ,FOREIGN KEY (user_id) REFERENCES radix_users(user_id)
)


