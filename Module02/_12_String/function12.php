<?php

/**
 * Chuyển thành chuỗi JSON hoặc ngược lại 
 * 
 * 29. Chuyển thành chuỗi JSON
 * 
 * Cú pháp: json_decode($str, $associative)
 */

$strJSON = '{"empID":1,"empName":"philip","empAge":33,"empEmail":"philip@mail.com"}';
$obj = json_decode($strJSON);
echo '<pre>';
var_dump($obj);
echo '</pre>';
/**
 * Output:
 * 
 * object(stdClass)#1 (4) {
 *   ["empID"]=>
 *   int(1)
 *   ["empName"]=>
 *   string(6) "philip"
 *   ["empAge"]=>
 *   int(33)
 *   ["empEmail"]=>
 *   string(15) "philip@mail.com"
 * }
 */
echo '<hr>';

$arr = json_decode($strJSON, true);
echo '<pre>';
var_dump($arr);
echo '</pre>';
/**
 * Output:
 * 
 * array(4) {
 *   ["empID"]=>
 *   int(1)
 *   ["empName"]=>
 *   string(6) "philip"
 *   ["empAge"]=>
 *   int(33)
 *   ["empEmail"]=>
 *   string(15) "philip@mail.com"   
 * }
 */
echo '<hr>';

/**
 * 30. Chuyển mảng thành chuỗi JSON
 * 
 * Cú pháp:json_encode($arr)
 */
$strJson = json_encode($arr);
echo $strJSON;
