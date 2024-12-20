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
+ ForgotToken VARCHAR(50) -- Dùng để tạo lại mật khẩu
+ ActiveToken VARCHAR(50) -- Dùng để kích hoạt tài khoản
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
---+ Đối với folders: tạo index.html (không code gì)
---+ Đối với files: đặt 1 hằng số, từng file kiểm tra hằng số đó có tồn tại không ???

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
- Xây dựng các hàm query chung
---+ Hàm lấy ra tổng dòng
---+ Hàm lấy ra id

Step 06 - Viết hàm xử lý Session
- Viết các hàm session và session flash

Step 07 - Kết nối Mail
- Nhúng thư viện PHP Mailer
- Thiết lập tài khoản Gmail
---+ Fix: Lỗi gửi bằng SSL

Step 08 - Viết các hàm Validate (bằng hàm filter)
- Viết các hàm xử lý request POST, GET
---+ Hàm filter_input() - xử lý dữ liệu để chống tấn công XSS
- Viết các hàm xử lý email, integer, float

Step 09 - Hàm xử lý password
- Hàm password_hash()
- Hàm password_verify()

Step 10 - Xây dựng chức năng đăng ký người dùng
- Xử lý dữ liệu nhập từ form Đăng Ký (valdation)
---+ Input: Họ và tên
-------+ Bắt buộc nhập
-------+ Tối thiểu 6 ký tự
---+ Input: SĐT
-------+ Bắt buộc nhập
-------+ Đúng định dạng SĐT
---+ Input: Email
-------+ Bắt buộc nhập
-------+ Đúng định dạng Email
-------+ Email không được trùng (trong DB)
---+ Input: Password
-------+ Bắt buộc nhập
-------+ Tối thiểu 8 ký tự
---+ Input: Repassword
-------+ Bắt buộc nhập
-------+ Trùng với input Password

---+ Hiển thị thông báo chung (hoặc cảnh báo)
-------+ Tạo hàm điều hướng trang

---+ Hiển thị thông báo riêng từng input
-------+ Lưu ý: khi cập nhật css cần xoá cache
---+ Giữ lại dữ liệu cũ trong form khi hiển thị lỗi
-------+ hàm reset() - dùng để lấy giá trị đầu tiên trong mảng
---+ Tối ưu hàm hiển thị thông báo riêng từng input
---+ Tối ưu hàm giữ lại dữ liệu cũ trong form

---+ Thêm dữ liệu vào csdl
-------+ Fix: hiển thị lỗi khi query
-------+ Tạo token = sha1(unquid() . time())

- Gửi mail kích hoạt tải khoản
---+ Sau khi thêm mới thành công gọi hàm gửi mail.
---+ Fix: lỗi tiếng viết khi gửi PHPMailer
---+ Nâng cao: Xử lý khi mail không gửi tới dùng cần có (chức năng gửi lại mail)

- Người dùng bấm vào link để kích hoạt tài khoản (hoặc dùng OTP để kích hoạt tk).

Step 10 - Xây dựng chức năng kích hoạt tài khoản
---+ Kiểm tra token tồn tại không
---+ Kích hoạt tài khoản và gửi mail thông báo

step 11 - Xây dựng chức năng đăng nhập
---+ Kiểm tra Validation
---+ Kiểm tra email tồn tại hay không ?
---+ Xác thực password có hợp lệ hay không ?
---+ Thêm logintoken và gán token session
---+ Điều hướng khi đăng nhập thành công
---+ Xây dựng hàm check login hay chưa ?