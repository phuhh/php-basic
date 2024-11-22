<?php
// setcookie('accept_value', 1, time() + 84600, '/', '', false, true);
// setcookie('accept_value', 'string', time() + 84600, '/', '', false, true);
// setcookie('accept_value', true, time() + 84600, '/', '', false, true);

// Các trường hợp không được:
// setcookie('accept_value', false, time() + 84600, '/', '', false, true); // cookie sẽ bị xoá
// setcookie('accept_value', null, time() + 84600, '/', '', false, true); // lỗi

// Xử lý lưu giá trị mảng trong cookie --> chuyển mảng thành chuỗi

// $arr = ['samsung', 'apple', 'xiaomi', 'nokia'];
// $str = serialize($arr);
// setcookie('list_value', $str, time() + 84600, '/', '', false, true);

// if (isset($_COOKIE['list_value'])) {
//     $newArr = unserialize($_COOKIE['list_value']);
//     echo "<pre>";
//     print_r($newArr);
//     echo "</pre>";
// }

// Hoặc 
// $arr = ['samsung', 'apple', 'xiaomi'];
// $jsonStr = json_encode($arr);
// setcookie('list_value', $jsonStr, time() + 84600, '/', '', false, true);

// if (isset($_COOKIE['list_value'])) {
//     $newArr = json_decode($_COOKIE['list_value'], true);
//     echo "<pre>";
//     print_r($newArr);
//     echo "</pre>";
// }
