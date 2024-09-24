<?php

/**
 * Timezone Object
 * 
 * 1. Tạo đối tượng timezone
 */

$timezoneObject = timezone_open('Asia/Ho_Chi_Minh');

echo "<pre>";
print_r($timezoneObject);
echo "</pre>";

/**
 * 2. Lấy tên của timezone
 */
$timezoneName = timezone_name_get($timezoneObject);
echo $timezoneName;

/**
 * 3. Lấy ra thông tin khu vực timezone
 */

$timezoneInfo = timezone_location_get($timezoneObject);
echo "<pre>";
print_r($timezoneInfo);
echo "</pre>";
