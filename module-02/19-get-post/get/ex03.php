<?php

/**
 * Lưu ý: Query String trong file index.php
 * 
 * domain.com/path/username=phuhh2019&email=phuhh2019@gmail.com&age=33
 * 
 * như nhau:
 * 
 * domain.com/path/index.php?username=phuhh2019&email=phuhh2019@gmail.com&age=33
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

<div>
    <a href="?username=philip&email=philip@gmail.com&age=34">click me</a>
</div>

<div>
    <a href="index.php?username=phuhh2019&email=phuhh2019@gmail.com&age=33">click me 2</a>
</div>