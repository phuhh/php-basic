<?php

/**
 * Định dạng đối tượng dateInterval theo 1 dạng định nhất định.
 */

$dateIntervalObj = date_interval_create_from_date_string('10 day');

$result = date_interval_format($dateIntervalObj, '%d Ngày');
echo $result; // Output: 10 Ngày
