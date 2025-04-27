<?php

/**
 * Timezone Object
 * 
 * 1. Lấy timezone object chỉ định
 */

$timezoneObject = timezone_open('Asia/Ho_Chi_Minh');

echo "<pre>";
print_r($timezoneObject);
echo "</pre>";

/**
 * 2. Truy cập tên từ timezone object
 */
$timezoneName = timezone_name_get($timezoneObject);
echo $timezoneName;

/**
 * 3. Lấy ra thông tin khu vực timezone object
 */

$timezoneInfo = timezone_location_get($timezoneObject);
echo "<pre>";
print_r($timezoneInfo);
echo "</pre>";
