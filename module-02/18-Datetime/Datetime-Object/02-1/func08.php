<?php

/**
 * Tạo ra dateInterval object từ 1 chuỗi khoảng thời gian
 */

$dateIntervalObj = date_interval_create_from_date_string('10 day');

echo "<pre>";
print_r($dateIntervalObj);
echo "</pre>";

$dateIntervalObj = date_interval_create_from_date_string('2 week');

echo "<pre>";
print_r($dateIntervalObj);
echo "</pre>";

$dateIntervalObj = date_interval_create_from_date_string('1 year');

echo "<pre>";
print_r($dateIntervalObj);
echo "</pre>";
