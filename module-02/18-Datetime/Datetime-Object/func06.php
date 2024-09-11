<?php

/**
 * Thay đổi ngày giờ (thêm hoăc giảm)
 * 
 * Tăng lên ngày giờ
 */

$datetimeObject = date_create();

date_modify($datetimeObject, '+ 10 day');

echo "<pre>";
print_r($datetimeObject);
echo "</pre>";

// Lùi lại ngày giờ
$datetimeObject = date_create();

date_modify($datetimeObject, '-1 week');

echo "<pre>";
print_r($datetimeObject);
echo "</pre>";
