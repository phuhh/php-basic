<?php

/**
 * Thiết lập và lấy ra timestamp
 * 
 * 1.Thiết lập lại timestamp cho object datetime: 
 * 
 * date_timestamp_set($datetimeObject, $timestamp);
 */

$datetimeObject = date_create();
$timestamp = strtotime('2024-09-10 21:16');
echo $timestamp;

date_timestamp_set($datetimeObject, $timestamp);

echo "<pre>";
print_r($datetimeObject);
echo "</pre>";

/**
 * 2. Lấy ra timestamp cho object datetime: 
 * 
 * date_timestamp_get($datetimeObject);
 */

$timestamp2 = date_timestamp_get($datetimeObject);
echo $timestamp2;
