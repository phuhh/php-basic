<?php

/**
 * Timestamp
 * 
 * 1. Tạo date object từ timestamp
 * 
 * date_timestamp_set($dateObj, $timestamp);
 */

$timestamp = strtotime('2024-09-10 21:16');
$dateObj = date_create();

date_timestamp_set($dateObj, $timestamp);

echo "<pre>";
print_r($dateObj);
echo "</pre>";

/**
 * 2. Lấy ra timestamp từ date object
 * 
 * date_timestamp_get($dateObj);
 */

$timestamp2 = date_timestamp_get($dateObj);
echo $timestamp2;
