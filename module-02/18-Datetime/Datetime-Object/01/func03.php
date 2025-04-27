<?php

/**
 * Cập nhật lại giờ phút giây của date object
 * 
 * date_time_set($dateObj, $hour, $minute, $second);
 */

$hour = 23;
$minute = 45;
$second = 30;
$dateObj = date_create();

date_time_set($dateObj, $hour, $minute, $second);

echo "<pre>";
print_r($dateObj);
echo "</pre>";
