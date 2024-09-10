<?php

/**
 * Chuyển đổi mảng sang chuỗi
 * 
 * 1. Serialize($ten_mang): Hàm có tác dụng chuyển đổi chuỗi, số, boolean, mảng, object thành 1 chuỗi được mã hoá 
 */
$customer = [
    'id' => '00001',
    'name' => 'Nguyễn Văn An',
    'age' => 30,
    'address' => 'TP.HCM',
    'phone' => '0123456789',
    'email' => 'annv@gmail.com',
    'isMarried' => true
];
echo "<pre>";
print_r($customer);
echo "</pre>";

$encodeData = serialize($customer);
echo $encodeData;

/**
 * unserialize($ten_chuoi): Hàm có tác dụng giải mã chuỗi đã mã hoá bằng serialize
 */

$decodeData = unserialize($encodeData);
echo "<pre>";
print_r($decodeData);
echo "</pre>";

echo '<hr>';
/**
 * 2. json_encode($ten_mang): Chuyển mảng thành chuỗi json
 */

$strJson = json_encode($customer, JSON_UNESCAPED_UNICODE);
echo $strJson;

/**
 * json_decode($ten_chuoi, true): chuyển chuỗi json thành mảng
 */

$dataArr = json_decode($strJson, true);
echo "<pre>";
print_r($dataArr);
echo "</pre>";

echo '<hr>';
/**
 * 3. implode($chuoi_noi, $mang): Nối các phần tử của mảng thành chuỗi, các phần tử nới với nhau bởi $chuoi_noi
 */
$separator = "|";
$str = implode($separator, $customer);
echo $str;

/**
 * explode($chuoi_phan_cach, $ten_chuoi): Chuyển chuỗi thành mảng dựa vào $chuoi_phan_cach
 */
$dataArr = explode($separator, $str);
echo "<pre>";
print_r($dataArr);
echo "</pre>";
