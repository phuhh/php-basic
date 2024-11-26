
<?php

defined('DB_DRIVER ') || define('DB_DRIVER', 'mysql');
defined('DB_HOST ') || define('DB_HOST', 'localhost');
defined('DB_SCHEMA ') || define('DB_SCHEMA', 'PHPBasic');
defined('DB_USERNAME ') || define('DB_USERNAME', 'root');
defined('DB_PASSWORD ') || define('DB_PASSWORD', '');

try {
    if (class_exists('PDO')) {
        $dns = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_SCHEMA;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // set character set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // set the PDO error mode to exception
        ];

        $conn = new PDO($dns, DB_USERNAME, DB_PASSWORD, $options);

        $sql = "INSERT INTO BlogUsers(Username, Email, Password, CreatedAt) 
        VALUES(:username, :email, :password, :createdAt);";
        $stmt = $conn->prepare($sql);

        $username = 'test01';
        $email = 'test01@gmail.com';
        $password = '123456';
        $createdAt = date('Y-m-d H:i:s');

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':createdAt', $createdAt);

        if ($stmt->execute()) {
            // Lưu ý: dùng biến khởi tạo PDO --> gọi phương thức lastInsertId()
            $lastID = $conn->lastInsertId();
            echo 'Last ID: ' . $lastID;
        }
    } else {
        throw new Exception('PDO class does not exist');
    }
} catch (Exception $e) {
    echo 'Error on <b> line ' . $e->getLine() . '</b> in ' . $e->getFile()  . ': <b>' . $e->getMessage() . '</b><br />';
    die();
}
