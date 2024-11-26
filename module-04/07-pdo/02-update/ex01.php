
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

        $sql = "UPDATE BlogPosts SET Title = :title, Content = :content WHERE PostID = :postID";
        $stmt = $conn->prepare($sql);

        $title = 'Donec rhoncus';
        $content = 'Donec rhoncus, augue eget porttitor rhoncus, lectus ligula pretium erat, elementum pellentesque massa quam non mi. Nulla vitae lorem a dolor sollicitudin pharetra. Ut commodo neque diam, non placerat leo luctus in.';
        $postID = 4;

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':postID', $postID);

        if ($stmt->execute()) {
            echo 'Updated successfully';
        }
    } else {
        throw new Exception('PDO class does not exist');
    }
} catch (Exception $e) {
    echo 'Error on <b> line ' . $e->getLine() . '</b> in ' . $e->getFile()  . ':<b> ' . $e->getMessage() . '</b><br />';
    die();
}
