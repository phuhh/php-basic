<?php
date_default_timezone_set('Asia/Bangkok');

/**
 * Các hàm xử lý liên quan timestamp và chuỗi ngày giờ
 * 
 * 1. Lấy ra số giấy của ngày giờ hiện tại: time()
 */

$t = time();
var_dump($t);
echo '<hr>';

/**
 * 2. Chuyển đổi chuỗi ngày giờ thành timestamp: strtotime($chuoi_ngay_gio)
 */

$str = '2024-09-08 21:18';
echo $str . "<br>";
$t = strtotime($str);
echo $t . "<br>"; // Output: 1725823080

$str = '2024-Sep-08 21:18';
echo $str . "<br>";
$t = strtotime($str);
echo $t . "<br>"; // Output: 1725823080

$str = '09/08/2024 09:18 PM';
echo $str . "<br>";
$t = strtotime($str);
echo $t . "<br>"; // Output: 1725823080

// Lưu ý: ngày tháng năm được hiểu là tháng ngày năm
$str = '08/09/2024 09:18 PM';
echo $str . "<br>";
$t = strtotime($str);
echo $t . "<hr>"; // Output: 1723231080

/**
 *  3. Lấy ra ngày giờ theo định dạng hàm: strftime($timestamp)
 *  https://www.w3schools.com/php/func_date_strftime.asp
 * 
 *  (Khuyên không dùng, độ chính xác cần thêm yếu tố khác.)
 */
$timestamp = 1723231080;
echo 'Timestamp: ' . $timestamp . '<br>';

$dt = strftime('%D', $timestamp);
echo $dt . '<br>'; // Output: 08/09/24

$dt = strftime('%d-%m-%Y %H:%m:%S', $timestamp);
echo $dt . '<hr>'; // Output: 09-08-2024 21:08:00

/**
 * 4. Lấy ra timestamp từ ngày giờ cho trước: mktime($gio, $phut, $giay, $month, $day, $year)
 */
$t = mktime(22, 5, 15, 9, 8, 2024);
echo $t . '<br>'; // Output: 1725807942

/**
 * 5. Lấy ra số giây micro của ngày giờ hiện tại: microtime(true)
 * 
 * time() trả về số giây
 * microtime() trả về số giây micro
 */
$t = microtime();
var_dump($t); // Ouput: string(21) "0.10734900 1725808633"
echo '<br>';

// Truyền giá trị TRUE trả về số thực
$t = microtime(true);
var_dump($t); // Ouput: float(1725808633.1073760986328125)
echo '<hr>';

/**
 * 6. Lấy ra thông tin ngày giờ: localtime($timestamp, true)
 */

$dtInfo = localtime(time(), true);
echo "<pre>";
print_r($dtInfo);
echo "</pre>";

/**
 * Lưu ý:
 *     tm_mon : tháng thứ mấy trong năm. Từ 0-11
 *     tm_year: năm bao nhiêu. Tính từ 1900
 *     tm_wday: Thứ mấy trong tuần. Từ 0-6
 *     tm_yday: Ngày thứ bao nhiêu trong năm.
 */
$month = $dtInfo['tm_mon'] + 1;
echo $month . '<br>';

$year = $dtInfo['tm_year'] + 1900;
echo $year . '<hr>';

/**
 * 7. Lấy ra 1 giá trị theo định dạng ngày giờ: idate($format, $timestamp)
 * Tham số $timestamp: không truyền mặc định lấy ngày giờ hiện tại
 */

$year = idate('Y');
echo $year . '<br>';

$month = idate('m');
echo $month . '<br>';

$day = idate('d');
echo $day . '<hr>';

/**
 * 8. Lấy ra số giây của ngày giờ đã cho trước: gmmktime($gio, $phut, $giay, $month, $day, $year)
 * (múi giờ 0 của GMT)
 */
$t = gmmktime(22, 5, 15, 9, 8, 2024);
echo $t . '<br>'; // Output: 1725833115

/**
 * 9. Lấy ra ngày giờ theo định dạng: gmdate($format, $timestamp);
 * (múi giờ 0 của GMT)
 */
$t = strtotime('2024-09-08 23:07');
echo $t . '<br>'; // Output: 1725811620
$dt = gmdate('m/d/Y H:i:s', $t);
echo $dt . '<hr>'; // Output: 09/08/2024 16:07:00

/**
 * 10. Lấy ra thông tin ngày giờ: getdate($timestamp)
 * Tham số $timestamp: không truyền mặc định lấy ngày giờ hiện tại
 * 
 * - Tương tư hàm localtime() nhưng sẽ rõ ràng hơn
 */
$dtInfo = getdate();
echo "<pre>";
print_r($dtInfo);
echo "</pre>";
echo '<hr>';

/**
 * 11. Chuỗi đổi timestamp thành ngày giờ: date($format, $timestamp);
 */
$t = strtotime('2024-09-08 23:07');
echo $t . '<br>'; // Output: 1725811620
$dt = date('m/d/Y H:i:s', $t);
echo $dt . '<hr>'; // Output: 09/08/2024 23:07:00
