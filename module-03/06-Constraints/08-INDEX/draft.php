<?php
header('Content-Type: text/plain; charset=utf-8');
?>

1 Trường hợp nên đánh INDEX

Bảng Cha liên kết bảng Con

- Bảng con KHÔNG tạo khoá ngoại bảng cha
- Khi truy vấn Nối 2 bảng lại với nhau hiệu suất tìm kiếm sẽ không hiệu quả cao.
- Thay vào đó chỉ cần đánh index vào cột id cha trong bảng con là được.