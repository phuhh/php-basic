<?php

/**
 * Tăng lên hoặc lùi lại ngày giờ cho datetime object
 * 
 * Tăng lên ngày giờ
 */

$dateTimeObject = date_create();

date_modify($dateTimeObject, '+ 10 day');

echo "<pre>";
print_r($dateTimeObject);
echo "</pre>";

// Lùi lại ngày giờ
$dateTimeObject = date_create();

date_modify($dateTimeObject, '-1 week');

echo "<pre>";
print_r($dateTimeObject);
echo "</pre>";
