<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Thực hành làm module quản lý người dùng (users) bao gồm các chức năng:

Module 1: Xác thực truy cập

- Đăng nhập
- Đăng ký
- Kích hoạt tài khoản
- Quên mật khẩu
- Kích hoạt mật khẩu
- Đăng xuất

Module 2: Quản lý người dùng

- Xác nhận người dụng đăng nhập
- Thêm người dùng
- Sửa người dùng
- Xoá người dùng
- Hiển thị danh sách người dùng
- Phân trang
- Tìm kiếm

Step 01 - Thiết kế Database

- Bảng Users
+ ID INT PK
+ Email VARCHAR(100)
+ Password VARCHAR(50)
+ Fullname VARCHAR(50)
+ Phone VARCHAR(20)
+ ForgotToken VARCHAR(50)
+ ActiveToken VARCHAR(50)
+ Status TINYINT
+ CreateAt DATETIME
+ UpdateAt DATETIME

- Bảng LoginToken
+ ID INT PK
+ UserID INT FK --> Users(ID)
+ Token VARCHAR(50)
+ Expire DATETIME
+ CreateAt DATETIME



Cách cũ: Đăng nhập --> Lưu Session --> Lần sau: Kiểm tra Session
Hạn chế: đăng nhập trên nhiều thiết bị

Cách hiện tại: Đăng nhập --> Lưu Session --> Lần sau: Kiểm tra Session và Tồn tại Token trong Database
Ưu điểm: đăng nhập trên nhiều thiết bị


Trường hợp: Thay đổi mật khẩu
- Cập nhật mật khẩu
- Xoá Token --> Các thiết bị tự động thoát ra hết

Step 02 - Xây dựng cấu trúc thư mục, tập tin

Step 03 - Code điều hướng (routes)
- Ngăn chặn người dùng truy cập trực tiếp vào folder hoặc file
+ Đối với folders: tạo index.html (không code gì)
+ Đối với files: đặt 1 hằng số, từng file kiểm tra hằng số đó có tồn tại không ???

Step 04 - Nhúng Boostrap
- Nhúng Boostrap 4.x
- Nhúng fontawesome 4.7
- Tạo Layout Master
- Tạo ra đường dẫn host, templates
- Tạo ra đường dẫn thư mục host, templates
- Tạo UI Login
- Tạo Layout (Login/Register)
- Tạo ra hàm Load Layout
- Tạo UI Register
- Truyền biến vào Layout

Step 05 - Kết nối CSDL
- Kết nối database
- Xây dựng các hàm query

Step 06 - Viết hàm xử lý Session