<?php

/**
 * Thiết lập và lấy Timezone cho toàn bộ chương trình
 */

date_default_timezone_set('Asia/Ho_Chi_Minh');

$timezone =  date_default_timezone_get();
echo $timezone;

echo '<hr>';
$dateObj = date_create();
echo $dateObj->format('Y-m-d H:i:s');
