<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/**
 * Xử lý tăng hoặc giảm chuỗi ngày giờ
 * 
 *    1. dùng hàm date_modify($dateTimeObject, $modifier)
 *    2. dùng hàm strtotime($modifier, $dateTime)
 */


$currentDate = date('Y-m-d H:s:i');
echo $currentDate . '<br>';

$currentTimestamp = strtotime($currentDate);
$endTimestamp = strtotime('1 Year', $currentTimestamp);
$endDate = date('Y-m-d H:s:i', $endTimestamp);
echo $endDate;
echo '<hr>';

/**
 * So sánh 2 chuỗi ngày giờ
 */
$endTimestamp = strtotime('2024-09-13 22:10:00');

if ($currentTimestamp >= $endTimestamp) {
    echo 'Khoá tài khoản';
} else {
    echo 'Đang hoạt động';
}
