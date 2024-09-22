<?php

/**
 * Phương thức POST
 * 
 * Có 2 cách để gửi dữ liệu thông qua phương thức POST
 * - HTML Forms
 *     + Trong input phải đặt attribute name mới gửi liệu được
 *     + Sau khi nhấn gửi Request --> mở F12 --> chọn tab Network --> tìm tên tập tin gửi (php)
 *       --> Xem thông tin trong tab Headers, Payload
 *     + Các thẻ form không được lồng nhau, nếu lồng nhau sẽ không hoạt động
 * 
 * - Javascript HTTP Request
 */

// Kiểm tra xem phương thức POST có dữ liệu không và có nhấn nút gửi chưa
if (!empty($_POST) && isset($_POST['btnSend'])) {
    if (!empty($_POST['fullName'])) {
        $fullName = $_POST['fullName'];
        echo 'Full Name: ' . $fullName . '<br>';
    }

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        echo 'Email: ' . $email . '<br>';
        echo '<hr>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Method POST</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Method POST</h1>
    <form action="" method="post">
        <div>
            <span for="fullName">Full Name: </span>
            <input type="text" name="fullName">
        </div>
        <div>
            <span for="email">Email: </span>
            <input type="text" name="email">
        </div>
        <button type="submit" name="btnSend">Send</button>
    </form>
</body>

</html>