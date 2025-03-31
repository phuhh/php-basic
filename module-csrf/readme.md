Mục đích chống tấn công CSRF

1. Trước khi gửi yêu cầu qua biểu mẫu
   1.1. Tạo ra token
   1.2. Gán token vào trong session và thẻ input trong form (gửi input chứa token)
   1.3. Tạo ra biến session chứa thời gian tồn tài token

2. Kiểm tra Token
   2.1. Kiểm tra biến session và biến input có chứa token có giá trị không ?
   2.2. Kiểm tra biến session và biến input có chứa token có giống nhau không ?
   2.3. Kiểm tra biến thời gian tồn tại trong session có tồn tại không và hết hạn sử dụng chưa?

3. Xử lý logic trong form.

4. Xóa bỏ 2 biến session liên quan token.
