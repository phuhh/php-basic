<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attack CSRF</title>
</head>

<body>
    <h1>Attack CSRF</h1>
    <form action="http://localhost/php-basic/module-csrf/handle-form.php" method="post">
        <input type="hidden" name="csrf_token" value="<?= bin2hex(random_bytes(32)) ?>">
        <button type="submit">Click Here</button>
    </form>
</body>

</html>