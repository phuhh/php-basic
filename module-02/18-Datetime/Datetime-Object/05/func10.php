<?php

/**
 * So sánh thời gian từ date object: date_diff($startDateObj, $endDateObj)
 */

$startDateObj = date_create();
$endDateObj = date_create('2025-01-01');

$dateIntervalObj = date_diff($startDateObj, $endDateObj);

echo "<pre>";
print_r($dateIntervalObj);
echo "</pre>";

$result = $dateIntervalObj->format('%y năm %m Tháng %d ngày  %h giờ %m phút %s giây');
echo $result;
