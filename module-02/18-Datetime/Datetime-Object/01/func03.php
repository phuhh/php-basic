<?php

/**
 * Thiết lập giờ phút giây cho datetime object: 
 * 
 * date_time_set($dateTimeObject, $hour, $minute, $second);
 */

$dateTimeObject = date_create();
$hour = 23;
$minute = 45;
$second = 30;

date_time_set($dateTimeObject, $hour, $minute, $second);

echo "<pre>";
print_r($dateTimeObject);
echo "</pre>";
