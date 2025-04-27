<?php

/**
 * Tăng lên ngày giờ cho date object
 * 
 * date_add($dateObj, $interval)
 */

$dateObj = date_create();
$dateIntervalObj = date_interval_create_from_date_string('3 day');

date_add($dateObj, $dateIntervalObj);

echo "<pre>";
print_r($dateObj);
echo "</pre>";
