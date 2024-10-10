<?php

/**
 * Cú pháp:
 * 
 * setcookie($name, $path, $expire, $path, $domain, $security, $httpOnly)
 * 
 * $name : Tên cookie
 * $value : Giá trị của cookie
 * $expire :  Thời gian tồn tại (timestamp)
 * $path : hoạt động cookie trong đường dẫn web
 * $domain : hoạt động cookie trên tên miền
 * $security : chỉ hoạt động trên HTTPS
 * $httpOnly :  chỉ cho phép gửi qua HTTP
 * 
 */

// Tạo cookie
// setcookie('key_cookie', 'value_cookie');


// Thiết lập thời gian
// setcookie('user_name', 'phuhh', time() + 86400); // tồn tại 1 ngày


// Thiết lập đường dẫn (dir, routing)
// tham số Path không truyền gì. Mặc định: sẽ lấy đường dẫn thư mục set cookie. 
// Vd: /php-basic/module-02/22-Cookie-Session/cookie

// setcookie('email', 'phuhh@gmail.com', time() + 86400, '/'); // Giá trị "/" -> cookie được phép hoạt động toàn bộ dự án


// Thiết lập tiền miền (hoặc sub-domain)
// tham số Domain không truyền gì. Mặc định: tên miền hiện tại. 

// setcookie('email', 'phuhh@gmail.com', time() + 86400, '/', '');

// nếu có tên miền phụ thì set cookie như sau: 
// setcookie('email', 'phuhh@gmail.com', time() + 86400, '/', 'sub-domain.domain');

// Hoặc cho phép cookie toàn bộ sub-domain
// setcookie('email', 'phuhh@gmail.com', time() + 86400, '/', '.domain');


// Cập nhật cookie
// setcookie('user_name', 'lanltx', time() + 86400, '/', '', false, true);


// Xoá cookie (Huỷ cookie)
// setcookie('email', '', time() - 86400, '/', '', false, true);
// setcookie('user_name', '', time() - 86400, '/php-basic/module-02/22-Cookie-Session/cookie', '', false, true);
// setcookie('key_cookie', '');

// Lấy cookie
if (isset($_COOKIE['user_name'])) {
    echo $_COOKIE['user_name'];
    echo '<br>';
}
