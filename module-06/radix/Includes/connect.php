<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Dùng để kết nối kết nối csdl

try {
    if (class_exists('PDO')) {
        $dns = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_SCHEMA;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // set character set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // set the PDO error mode to exception
        ];

        $conn = new PDO($dns, DB_USERNAME, DB_PASSWORD, $options);
        // echo 'Connected successfully <br>';
    } else {
        throw new Exception('PDO class does not exist');
    }
} catch (Exception $e) {
    // echo 'Error on <b> line ' . $e->getLine() . '</b> in ' . $e->getFile()  . ': <b>' . $e->getMessage() . '</b><br />';
    require _WEB_PATH_ROOT . '/Modules/Errors/database.php';
    die();
}
