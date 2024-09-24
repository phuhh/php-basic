<?php

/**
 * Attribute action chỉ định nơi gửi dữ liệu khi form được gửi
 * 
 * Lưu ý: không cho phép thực thi, khi gõ đường dẫn URL.
 */
?>

<!DOCTYPE html>
<html>

<head>
    <title>action Attribute</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>action Attribute</h1>
    <form action="./do-post.php" method="post">
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