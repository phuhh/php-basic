<?php

/**
 * Tăng lên ngày giờ cho datetime object
 * 
 * date_add($dateTimeObject, $interval)
 */

$dateTimeObject = date_create();
$dateIntervalObj = date_interval_create_from_date_string('3 day');

date_add($dateTimeObject, $dateIntervalObj);

echo "<pre>";
print_r($dateTimeObject);
echo "</pre>";
