<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['fullName'])) {
        $fullName = $_POST['fullName'];
        echo 'Full Name: ' . $fullName . '<br>';
    }

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        echo 'Email: ' . $email . '<br>';
    }
} else {
    // Không cho phép thực thi khi gõ đường URL
    echo 'Not allow method';
}
