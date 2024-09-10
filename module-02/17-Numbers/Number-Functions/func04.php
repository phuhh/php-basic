<?php

/**
 * Định dạng số: number_format($ten_bien, $so_thap_phan, $ky_tu_so_thap_phan, $ky_tu_hang_ngan);
 */

$num = '1000000.5';
var_dump($num); // OUTPUT: string(7) "1000000.5"
echo '<br>';

// làm tròn và định dạng thành chuỗi
$format = number_format($num);
var_dump($format); // OUTPUT: string(7) "1,000,001"
echo '<br>';

// định dạng và hiển thị số thập phân
$format = number_format($num, 2);
var_dump($format); // OUTPUT: string(7) "1,000,000.50"
echo '<br>';

// định dạng, hiển thị số thập phân, thay thế ký tự thập phân và thay thế ký tự hàng ngàn
$format = number_format($num, 2, '#', '*');
var_dump($format); // OUTPUT: string(7) "1*000*000#50"
echo '<br>';
