<?php
// Kiểu Resource
// Kiểu dữ liệu đặc biệt, nó lưu trữ tham chiếu đến các hàm - 
// tài nguyên ngoài PHP: file, curl, database,...

// Kiểm tra có phải kiểu resource hay không ?
$curl = curl_init();
var_dump($curl);
echo '<br>';

$check = is_resource($curl);
var_dump($check); // OUTPUT: true
echo '<br>';

// Tham khảo: https://www.php.net/manual/en/resource.php

// Kiểm tra kiểu resource là gì ?
$type = get_resource_type($curl);
var_dump($type); // OUTPUT: string(4) "curl"
echo '<br>';
