<?php

/**
 * Bài 1: Viết 1 chương trình lấy username của 1 email
 * 
 * Input: phuhh2019@gmail.com
 * Output: phuhh2019
 */

// Input:
$emailInput = 'phuhh2019@gmail.com';

// handle
// Cách 1:
$endEmail = strstr($emailInput, '@');
// echo $endEmail;

// Output
$output = str_replace($endEmail, '', $emailInput);
echo $output . '<br>';

// Cách 2: Sử dụng hàm có sẵn
$output = strstr($emailInput, '@', true);
echo $output . '<hr>';

/**
 * Bài 2: Viết chương trình lấy 5 ký tự cuối chuỗi
 * 
 * Input: Chia se tu trai tim
 * Ouput: trai tim
 */

// Input:
$str = 'Chia se tu trai tim';
// Output:
$output = substr($str, -8);
echo $output . '<br>';

// Hàm có hỗ trợ UTF-8 (tiếng việt)
$str = 'Chia se từ trái tim';
$output = mb_substr($str, -8, null, 'UTF-8');
echo $output . '<hr>';

/**
 * Bài 3: Viết chương trình xoá chữ đầu tiên trong chuỗi
 * 
 * Input:  foobar foo bar baz
 * Output:  foo bar baz
 */
$strInput = 'foobar foo bar baz';

// Handle
$posSpace = strpos($strInput, ' ', 0);
$posSpace = $posSpace + 1;
// var_dump($posSpace);
$firstWord = substr($strInput, 0, $posSpace);
// var_dump($firstWord);
$output = str_replace($firstWord, '', $strInput);

// Output
var_dump($output);
echo '<br>';

// Phát sinh vấn đề trùng lập với chữ đầu tiên vẫn bị xoá.
$strInput = 'foobar foo bar foobar baz';
$posSpace = strpos($strInput, ' ', 0) + 1;
$leftLength = strlen($strInput) - $posSpace;
$output = substr($strInput, $posSpace, $leftLength);
var_dump($output);
echo '<br>';

// Trường hợp: xử lý chuỗi uft-8 tiếng việt
$strInput = 'Học học mãi học nữa';
$posSpace = mb_strpos($strInput, ' ', 0, 'UTF-8') + 1;
$leftLength = mb_strlen($strInput, 'UTF-8') - $posSpace;
$output = mb_substr($strInput, $posSpace, $leftLength, 'UTF-8');
var_dump($output);
echo '<hr>';

/**
 * Bài 4: viết chương trình đảo ngược chữ đầu và chữ cuối
 * 
 * Input: foobar foo bar baz qux quux
 * Output: quux foo bar baz qux foobar
 */

$strInput = 'foobar foo bar baz qux quux';
// Handle
// 1. Lấy ra chữ đầu tiên
$posSpaceFirst = strpos($strInput, ' ');
$firstWord = substr($strInput, 0, $posSpaceFirst);
// 2. Lấy ra chữ cuối cùng
$posSpaceEnd = strripos($strInput, ' ');
$leftLength = strlen($strInput) - $posSpaceEnd;
$endWord = substr($strInput, $posSpaceEnd + 1, $leftLength);
// 3. lấy nội dung giữa chuỗi
$middleWord = substr($strInput, $posSpaceFirst, $posSpaceEnd - $posSpaceFirst + 1);
// 4. Chèn và thay thế
$output = $endWord . $middleWord . $firstWord;

// Output
echo $output;
