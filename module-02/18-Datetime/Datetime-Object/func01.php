<?php

/**
 * Thiết lập lại timezone cho object: date_timezone_set($datetimeObj, $timezoneObj)
 */

$datetimeObj = date_create('2024-09-10 21:16');
$timezoneObj = timezone_open('Asia/Ho_Chi_Minh');

date_timezone_set($datetimeObj, $timezoneObj);

echo "<pre>";
print_r($datetimeObj);
echo "</pre>";

echo '<hr>';
/**
 * Lấy ra timezone của object: date_timezone_get($datetimeObj);
 */
$timezone = date_timezone_get($timezoneObj);
echo $timezone;
