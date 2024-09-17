<?php

/**
 * Thiết lập và lấy ra timestamp từ datetime object
 * 
 * 1.Thiết lập lại timestamp cho datetime object: 
 * 
 * date_timestamp_set($dateTimeObject, $timestamp);
 */

$dateTimeObject = date_create();
$timestamp = strtotime('2024-09-10 21:16');
echo $timestamp;

date_timestamp_set($dateTimeObject, $timestamp);

echo "<pre>";
print_r($dateTimeObject);
echo "</pre>";

/**
 * 2. Lấy ra timestamp cho datetime object: 
 * 
 * date_timestamp_get($dateTimeObject);
 */

$timestamp2 = date_timestamp_get($dateTimeObject);
echo $timestamp2;
