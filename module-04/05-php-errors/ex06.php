<?php
// Ẩn hoặc Hiển thị lỗi trong PHP
// Lưu ý: viết ở đâu file php

// Show error php
ini_set('display_errors', 1);

// Report simple running errors
// error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings...)
// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
//error_reporting(E_ALL & ~E_NOTICE);

// Report all PHP errors (see changelog)
//error_reporting(E_ALL);

// Report all PHP errors
//error_reporting(-1);

// Hide error php
// ini_set('display_errors', 0);
// error_reporting(0);
// Lưu ý: Ẩn tất cả lỗi, mà phát hiện ra lỗi sẽ hiển thị thông báo 500.

include './ex02.php';
include './ex03.php';
include './ex04.php';
include './ex05.php';
