<?php

/**
 * Phương thức get 
 * 
 * https://www.w3schools.com/php/php_superglobals_get.asp
 * 
 * Có 2 cách để gửi dữ liệu thông qua phương thức GET
 * 
 * - Query String trong URL
 * - HTML Forms
 * 
 * Query String: username=phuhh2019&email=phuhh2019@gmail.com  
 *
 * Dùng biến toàn cục $_GET để lấy ra dữ liệu từ query string
 * 
 */

echo "<pre>";
var_dump($_GET);
echo "</pre>";

$userName = $email = $age = null;

// lấy ra dữ liệu từ phương thức GET
if (isset($_GET['username'])) {
    $userName = $_GET['username'];
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

if (isset($_GET['age']) && is_numeric($_GET['age'])) {
    $age = $_GET['age'];
}

echo 'Username: ' . $userName . '<br>';
echo 'Email: ' . $email . '<br>';
echo 'Age: ' . $age . '<hr>';

?>

<a href="?username=phuhh2019&email=phuhh2019@gmail.com&age=33">click me</a>