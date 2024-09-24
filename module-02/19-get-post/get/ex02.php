<?php

echo "<pre>";
var_dump($_GET);
echo "</pre>";

$userName = $email = $age = null;

// gán lại giá trị mới trong Phương thức GET
$_GET['username'] = 'philip';
$_GET['email'] = 'philip@mail.com';
$_GET['age'] = 34;

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