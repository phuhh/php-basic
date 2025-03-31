<?php
session_start();

// Check Token
if (empty($_POST['csrf_token']) || empty($_SESSION['token'])) {
    die('Token not found');
} else if ($_POST['csrf_token'] !== $_SESSION['token']) {
    die('Invalid Token');
} else if (empty($_SESSION['token_expire']) || $_SESSION['token_expire'] < time()) {
    die('Token Expire');
}

// Handling Business Logic
echo 'OK';

// clear session token
unset($_SESSION['token']);
unset($_SESSION['token_expire']);
