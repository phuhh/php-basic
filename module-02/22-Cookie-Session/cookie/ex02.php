<?php

// Set thời gian tồn tại bằng 0. Tồn tại đến khi đóng cửa sổ
// Lưu ý: Trình duyệt phải đảm bảo trong thiết lập không có ghi nhớ trang đã đóng, để mở lại trang đã đóng.

// setcookie('keywords', 'php', 0, '/', '', false, true);

if (isset($_COOKIE['keywords'])) {
    echo $_COOKIE['keywords'];
    echo '<br>';
}
