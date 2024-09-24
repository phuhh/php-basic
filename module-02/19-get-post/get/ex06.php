<?php

/**
 * Gửi dữ liệu qua HTML Forms
 * 
 * - Không cần dùng urlencode vì form đã mã hoá sẵn
 */

// Kiểm tra nhấn nút Send chưa?
if (isset($_GET['btnSend'])) {
    if (isset($_GET['fullName'])) {
        $fullName = $_GET['fullName'];
        echo 'Full Name: ' . $fullName . '<br>';
    }

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        echo 'Email: ' . $email . '<br>';
        echo '<hr>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Method GET</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Method GET</h1>
    <form action="" method="get">
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