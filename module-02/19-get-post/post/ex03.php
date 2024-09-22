<?php

/**
 * Dùng biến toàn cục $_SERVER để gửi kiểm tra phương thức gửi là POST hay là GET
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    <title>$_SERVER['REQUEST_METHOD']</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>$_SERVER['REQUEST_METHOD']</h1>
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