<?php

/**
 * Khởi tạo session - hiểu đơn giản hàm này tạo 1 session nếu chưa tồn tại (tạo ra SESSION_ID)
 * 
 * Lưu ý: 
 *     1. Đặt hàm session_start() trên cùng (đầu file)
 *     2. Các đoạn code php sẽ dưới hàm session_start()
 *     3. Các cấu hình liên quan session như đổi vị trị lưu tạm session, tên tập tin session,... 
 *     thì đặt phía trên sesssion_start()
 * 
 * Nếu không muốn cấu hình session trên php thì thay đổi cấu hình trên tập tin php.ini
 */

session_save_path('./logs'); // Thiết lập đường dẫn lưu session
session_name('php_session'); // Thiết lập tên cookie khi tạo session

session_start();

echo session_id(); // Lấy ra session id được tạo
echo '<br>';

/**
 * Tạo ra session
 */

$_SESSION['user_name'] = 'phuhh';
$_SESSION['role'] = 'Admin';

/**
 * In session
 */
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


// Cập nhật lại session
// $_SESSION['role'] = 'Manager';


/**
 * Lấy session
 */
if (isset($_SESSION['user_name'])) {
    echo 'Tài khoản: ' . $_SESSION['user_name'];
    echo '<br>';
}

if (isset($_SESSION['role'])) {
    echo 'Vai trò: ' . $_SESSION['role'];
}

/**
 * Xoá session 
 * 
 * Lưu ý: việc xoá cookie phía client thì session nó sẽ tự sinh ra cookie khác.
 */

/**
 * Xoá session chỉ định
 * 
 * - Vẫn giữ lại tập tin session trên server
 */
// unset($_SESSION['user_name']);
// unset($_SESSION['role']);

/**
 * Xoá tất cả session
 * 
 * - Xoá luôn tập tin session trên server
 */
// session_destroy();
