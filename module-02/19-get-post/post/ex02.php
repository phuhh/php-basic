<?php

/**
 * Xử lý 2 forms
 * 
 * Xử lý form đăng nhập
 */

if (!empty($_POST) && isset($_POST['btnSignIn'])) {
    $usernamePass = $passwordPass = false;
    if (isset($_POST['username']) && $_POST['username'] === 'phuhh') {
        $usernamePass = true;
    }

    if (isset($_POST['password']) && $_POST['password'] === '123456') {
        $passwordPass = true;
    }

    if ($usernamePass && $passwordPass) {
        echo 'Đăng nhập thành công.';
    } else {
        echo 'Đăng nhập thất bại.';
    }
}

if (!empty($_POST) && isset($_POST['btnSave'])) {
    $firstName = $lastName = $email = null;

    if (isset($_POST['firstName'])) {
        $firstName = $_POST['firstName'];
    }

    if (isset($_POST['lastName'])) {
        $lastName = $_POST['lastName'];
    }

    echo 'First name:' . $firstName . '<br>';
    echo 'Last name:' . $lastName;
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Method POST</title>
    <meta charset="UTF-8">
</head>

<body>
    <div>
        <h1>From 1</h1>
        <form action="" method="post">
            <div>
                <span for="username">Username: </span>
                <input type="text" name="username">
            </div>
            <div>
                <span for="email">Password: </span>
                <input type="text" name="password">
            </div>
            <button type="submit" name="btnSignIn">Sign In</button>
        </form>
    </div>

    <div>
        <h1>From 2</h1>
        <form action="" method="post">
            <div>
                <span for="firstName">First Name: </span>
                <input type="text" name="firstName">
            </div>
            <div>
                <span for="lastName">Last Name: </span>
                <input type="text" name="lastName">
            </div>
            <button type="submit" name="btnSave">Save</button>
        </form>
    </div>

</body>

</html>