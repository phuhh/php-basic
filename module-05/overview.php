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

Step 11 - Xây dựng chức năng đăng nhập
---+ Kiểm tra Validation
---+ Kiểm tra email tồn tại hay không ?
---+ Xác thực password có hợp lệ hay không ?
---+ Thêm logintoken và gán token session
---+ Điều hướng khi đăng nhập thành công
---+ Xây dựng hàm check login

Step 12 - Xây dựng chức năng quên mật khẩu
Tạo đường dẫn tạo mật khẩu mới
---+ Kiểm tra validation
---+ Kiểm tra email có tồn tại không ?
---+ Tạo forgot token và thêm vào DB
---+ Gửi mail đường dẫn tạo mật khẩu mới
Tạo mật khẩu mới
---+ Kiểm tra token có tồn tại không
---+ Kiểm tra 2 trường nhập mk trùng nhau không ?
---+ Cập nhật mk trong DB và xoá đi forgot token
---+ Gửi mail thông báo mới mk

Step 13 - Xây dựng chức năng đăng xuất
---+ Xoá dữ liệu trong DB và session token.

Step 14 - Xây dựng chức năng danh sách người dùng
---+ Xây dựng ui
---+ Lấy ra dữ liệu người dùng

Step 15 - Thuật toán phân trang và xây dựng chức năng phân trang
---+ 1. Xác định được số lượng bản ghi trên 1 trang
---+ 2. Tính số trang
---+ 2.1 Lấy ra tổng bản ghi trong csdl
---+ 2.2 Số trang = tổng bản ghi / số lượng bản ghi trên 1 trang
---+ 3. Xử lý số trang dựa vào phương thức GET
---+ 4. Xử lý $offset trong $limit dựa trên biến $page
---+ 5. Xây dựng sô trang và active trang hiện tại
---+ 6. Xây dựng nút trước và sau
---+ 7. Ẩn bớt số trang trước và sau

Step 16 - Xây dựng chức năng lọc và tìm Kiếm
---+ 1. Chức năng lọc
-------+ Lấy dữ liệu từ phương thức GET
-------+ Xử lý dữ liệu truyền vào Query
-------+ Giữ lại giá trị trong Control
---+ 2. Chức năng tìm kiếm
-------+ Lấy dữ liệu từ phương thức GET
-------+ Kết hợp với chức năng lọc
-------+ Xử lý dữ liệu truyền vào Query
-------+ Giữ lại giá trị trong Control

Step 17 - Xây dựng chức năng thêm người dùng
---+ Dựng form thêm mới người dùng.
---+ Validation form (ngoại trừ trạng thái).
---+ Hiển thị validation.
---+ Giữ lại giá trị (ngoại trừ password).
---+ Thêm dữ liệu vào csdl.

Step 18 - Xây dựng chức năng cập nhật người dùng
---+ Dựng form cập nhật người dùng.
---+ Lấy dữ liệu dựa trên ID.
---+ Hiển thị dữ liệu ID lấy được.
-------+ gán vào biến old
---+ Validation form
-------+ Email ngoại trừ ID hiện tại (khác ID).
-------+ Pass không bắt buộc (Nếu có Pass mới check validation Repass).
---+ Cập nhật dữ liệu vào csdl.

Step 19 - Xây dựng chức năng xoá người dùng
---+ Lấy dữ liệu dựa trên ID.
---+ Xoá dữ liệu trong csdl.
-------+ Xoá khoá ngoại bảng LoginToken
-------+ Xoá dữ liệu bảng Users