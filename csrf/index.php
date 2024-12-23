<?php
session_start();

// Generate Token
$csrf_token = bin2hex(random_bytes(32));
// Set session token
$_SESSION['token'] = $csrf_token;
$_SESSION['token_expire'] = time() + 3600; // Tokens last 1 hour
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF Token</title>
</head>

<body>
    <h1>CSRF Token</h1>
    <form action="./handle-form.php" method="post">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <div>
            Email: <input type="text" name="email"> <button type="submit">Send</button>
        </div>
    </form>
</body>

</html>