Các bước xây dựng website

1. Phân tích qua giao diện

- Mục tiêu:
  1.1. Xác định danh sách các chức năng
  1.2. Xác định các đối tượng cần quản lý

2. Phân tích, thiết kế database
   2.1. Thiết kế database qua mô hình database diagram
   2.2. Xây dựng database (qua phpmyadmin, navicat, dbeaver,...)

3. Xây dựng cấu trúc thư mục, cấu hình
   3.1. Clone từ module-05
   3.2. Chỉnh lại cấu hình config.php
   3.3. Xây dựng cấu trúc thư mục Admin
   3.3.a. Copy thư mục Modules vào trong Admin
   3.3.b. Tạo 1 file config.php
   3.3.c. Cấu hình tập tin config.php (để truy cập vào đường dẫn domain/radix/admin)

4. Xây dựng trang quản trị
   4.1. Ghép template vào trong admin
   4.1.1. Tạo ra layouts (header, sidebar, breadcrumb, footer)
   4.1.2. Liên kết css, js, images
   4.2. Xử lý menu sidebar
   4.3. Xây dựng module auth (login, forgot, reset, logout)
   4.4. Xây dựng module user (changePassword, updateProfile)
   4.5. Xây dựng module group (lists, create, update, delete)
   4.6. Xây dựng module users (lists, create, update, delete)
   4.6.1. Thêm cột hiển thị và lọc nhóm trong danh sách người dùng
   4.6.2. Thêm và cập nhật nhóm cho người dùng
   4.6.3. Xóa người dùng - lưu ý
   4.6.3.1. Đang đăng nhập ẩn nút xóa và không được xóa chính bản thân mình.
   4.6.3.2. Đối với tài khoản khác khi xóa tài khoản, xóa luôn login token người đó --> để tự động logout hệ thống
   4.6.3.3. Các bài viết liên quan người dùng xóa
   4.6.3.3.1. Cách 1: Xóa các bài viết liên quan người dùng đó
   4.6.3.3.2. Cách 2: Chuyển các bài viết đó sang người khác.

5. Xây dựng trang người dùng
6. Kiểm tra và xử lý lỗi
7. Deloys website
