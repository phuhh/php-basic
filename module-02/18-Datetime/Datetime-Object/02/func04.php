<?php

/**
 * Lùi lại ngày giờ cho datetime object
 * 
 * date_sub($dateTimeObject, $interval)
 */

$dateTimeObject = date_create();
$dateIntervalObj = date_interval_create_from_date_string('3 day');

date_sub($dateTimeObject, $dateIntervalObj);

echo "<pre>";
print_r($dateTimeObject);
echo "</pre>";
