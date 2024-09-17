<?php

/**
 * So sánh ngày giờ dành cho datetime object: date_diff($startDateObj, $endDateObj)
 */

$startDateObj = date_create();
$endDateObj = date_create('2025-01-01');

$interval = date_diff($startDateObj, $endDateObj);

echo "<pre>";
print_r($interval);
echo "</pre>";

$result = $interval->format('%y năm %m Tháng %d ngày  %h giờ %m phút %s giây');
echo $result;
