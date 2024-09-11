<?php

/**
 * Thiết lập lại giờ phút giây cho object datetime: 
 * 
 * date_time_set($datetimeObject, $hour, $minute, $second);
 */

$datetimeObject = date_create('2024-09-10 10:36');
$hour = 23;
$minute = 45;
$second = 30;

date_time_set($datetimeObject, $hour, $minute, $second);

echo "<pre>";
print_r($datetimeObject);
echo "</pre>";
