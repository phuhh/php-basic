
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

        //Cách 1: dùng hàm COUNT trong Query SQL

        // $sql = "SELECT COUNT(UserID) AS 'CountUser' FROM BlogUsers";
        // $stmt = $conn->prepare($sql);

        // if ($stmt->execute()) {
        //     $data = $stmt->fetch(PDO::FETCH_ASSOC);
        //     $rowCount = $data['CountUser'];
        //     echo 'Row count: ' . $rowCount;
        // }

        // Cách 2: dùng hàm count() trong PHP

        // $sql = "SELECT * FROM BlogUsers";
        // $stmt = $conn->prepare($sql);

        // if ($stmt->execute()) {
        //     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     $rowCount = count($data);
        //     echo 'Row count: ' . $rowCount;
        // }

        // Khuyên không nên sử dùng 2 cách trên
        // Cách 3: dùng hàm rowCount()

        $sql = "SELECT * FROM BlogUsers";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            $rowCount = $stmt->rowCount();
            echo 'Row count: ' . $rowCount;
        }
    } else {
        throw new Exception('PDO class does not exist');
    }
} catch (Exception $e) {
    echo 'Error on <b> line ' . $e->getLine() . '</b> in ' . $e->getFile()  . ':<b> ' . $e->getMessage() . '</b><br />';
    die();
}
