<?php

/**
 * Thiết lập và lấy ra timezone
 * 
 * 1. Thiết lập lại timezone cho object datetime: 
 * 
 * date_timezone_set($datetimeObj, $timezoneObj)
 */
$datetimeObj = date_create();
$timezoneObj = timezone_open('Asia/Ho_Chi_Minh');

date_timezone_set($datetimeObj, $timezoneObj);

echo "<pre>";
print_r($datetimeObj);
echo "</pre>";

/**
 * 2. Lấy ra timezone cho object datetime: 
 * 
 * date_timezone_get($datetimeObj);
 */
$timezoneObj2 = date_timezone_get($datetimeObj);

echo "<pre>";
print_r($timezoneObj2);
echo "</pre>";
