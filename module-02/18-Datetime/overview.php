<?php

/**
 * Những khái niệm cần biết DATETIME
 * 1. Timestamp
 *     - Số giây (Tính từ 01-0-1970 00:00)
 * 
 * 2. Định dạng thời gian
 *     - Định dạng hợp lệ: năm-tháng-ngày hoăc tháng-ngày-năm
 *     - https://www.php.net/manual/en/datetime.format.php
 * 
 * 3. Múi giờ (Timezone)
 *     - Thông thường sẽ lấy theo múi giờ trong SERVER
 *     - Nếu website hoạt động ở Việt Nam mà Server ở Mỹ cần làm lại để đúng thời gian Viết Nam (nếu cần).
 *     - https://www.php.net/manual/en/timezones.php
 * 
 * 4. Đối tượng Datetime (Datetime Object)
 *     - Thông thường chỉ là chuỗi thời gian. Đối với đối tượng thời gian dùng để xử lý tính toán là chính xác hơn
 */

// Thiết lập timezone từ ban đầu
// Lưu ý: luôn luôn viết đoạn mã trên cùng.
date_default_timezone_set('Asia/Bangkok');

// Lấy ra thời gian hiện tại
$d = date('Y-m-d H:i:s');
echo $d;
echo '<br>';

$d = date('m-d-Y h:i:s A');
echo $d;
echo '<br>';

// Lấy ra timezone hiện tại
$timezone = date_default_timezone_get();
echo $timezone;
