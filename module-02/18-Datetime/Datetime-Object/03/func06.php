<?php

/**
 * Hàm date_modify() cho phép tăng lên hoặc lùi lại thời gian cho date object
 * 
 * Tăng lên ngày giờ
 */

$dateObj = date_create();

date_modify($dateObj, '+ 10 day');

echo "<pre>";
print_r($dateObj);
echo "</pre>";

// Lùi lại ngày giờ
$dateObj = date_create();

date_modify($dateObj, '-1 week');

echo "<pre>";
print_r($dateObj);
echo "</pre>";
