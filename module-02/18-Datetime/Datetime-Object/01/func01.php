<?php

/**
 * Timezone object
 * 
 * 1. Tạo date object từ timezone object
 * 
 * date_timezone_set($dateObj, $timezoneObj)
 */

$timezoneObj = timezone_open('Asia/Ho_Chi_Minh');
$dateObj = date_create();
date_timezone_set($dateObj, $timezoneObj);

echo "<pre>";
print_r($dateObj);
echo "</pre>";

/**
 * 2. Lấy ra timezone từ date object
 * 
 * date_timezone_get($dateObj);
 */
$timezoneObj2 = date_timezone_get($dateObj);

echo "<pre>";
print_r($timezoneObj2);
echo "</pre>";
