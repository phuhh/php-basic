<?php

/**
 * Lùi lại thời gian cho date object
 * 
 * date_sub($dateObj, $interval)
 */

$dateObj = date_create();
$dateIntervalObj = date_interval_create_from_date_string('3 day');

date_sub($dateObj, $dateIntervalObj);

echo "<pre>";
print_r($dateObj);
echo "</pre>";
