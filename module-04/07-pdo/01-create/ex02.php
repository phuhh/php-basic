
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

        $sql = "INSERT INTO BlogPosts(Title, Content, UserID, CreatedAt) 
        VALUES(:title, :content, :userID, :createdAt);";
        $stmt = $conn->prepare($sql);

        $title = 'Title ' . time();
        $content = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel magni voluptas cupiditate qui culpa, minus modi repellat deserunt ea sit perferendis, quam explicabo. Voluptatem esse in dolore reiciendis temporibus numquam!';
        $userID = 1;
        $createdAt = date('Y-m-d H:i:s');

        $data = [
            'title' => $title,
            'content' => $content,
            'userID' => $userID,
            'createdAt' => $createdAt,
        ];

        if ($stmt->execute($data)) {
            echo 'Inserted successfully';
        }
    } else {
        throw new Exception('PDO class does not exist');
    }
} catch (Exception $e) {
    echo 'Error on <b> line ' . $e->getLine() . '</b> in ' . $e->getFile()  . ': <b>' . $e->getMessage() . '</b><br />';
    die();
}
