<?php

/**
 * 1. Chuyển chuỗi thời gian thành mảng (ĐÚNG ĐỊNH DẠNG Y-m-d H:i:s)
 * 
 * $infoArr = date_parse($dateStr);
 */
$dateStr = '2024-09-11 21:42';
$dateArr = date_parse($dateStr);

echo "<pre>";
print_r($dateArr);
echo "</pre>";

// Lỗi nếu: Định dạng ngày tháng năm và dấu gạch chéo
$dateStr = '13/09/2024 21:42';
$error = date_parse($dateStr);

echo "<pre>";
print_r($error);
echo "</pre>";
