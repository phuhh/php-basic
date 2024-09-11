<?php

/**
 * Lùi lại ngày giờ
 * 
 * date_sub($datetimeObject, $interval)
 */

$datetimeObject = date_create();
$dateIntervalObj = date_interval_create_from_date_string('3 day');

date_sub($datetimeObject, $dateIntervalObj);

echo "<pre>";
print_r($datetimeObject);
echo "</pre>";
