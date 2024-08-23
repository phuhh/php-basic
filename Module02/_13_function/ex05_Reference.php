<?php

/**
 * - Tham số (Parameter)
 * - Tham trị (Còn gọi là Đối số - Argument)
 * - Tham biến  
 * - Tham chiếu
 */

/**
 * - Tham số là các tham số khi định nghĩa hàm.
 * - Tham trị (Đối số) là biến hoặc giá trị truyền lúc gọi hàm.
 */
echo '<b>Tham số, Tham trị</b><br/>';
// Định nghĩa hàm
function makeTotal($a, $b) // $a và $b gọi là Tham số
{
    return $a + $b;
}

$x = 5;
$y = 10;
// Gọi hàm
$result = makeTotal($x, $y); // $x và $y gọi là Tham trị (Đối số)
echo $result;
echo '<hr>';

/**
 * Tham biến
 * 
 * pass arguments by value - Truyền đối số là giá trị
 */
echo '<b>Tham Trị</b>: function ten_ham($content) <br/>';
function sayHi($content = null)
{
    $content .= ' World';
    return $content;
}

$text = 'Hello';
echo '<i>Before $text = </i>' . $text . '<br>'; // Output: Hello

echo sayHi($text); // Output: Hello World
echo '<br>';

echo '<i>After $text = </i>' . $text; // Output: Hello
echo '<hr>';

echo '<b>Tham biến</b>: function ten_ham(<span style="color:red">&</span>$content) <br/>';
/**
 * Tham biến tương như tham trị nhưng khác 1 chỗ sẽ thay đổi giá trị khi truyền vào hàm
 * 
 * Passing arguments by reference - Truyền đối số là tham chiếu
 * 
 * https://www.php.net/manual/en/functions.arguments.php#functions.arguments.by-reference
 */
function sayHi2(&$content = null)
{
    $content .= ' World';
    return $content;
}

$text = 'Hello';
echo '<i>Before $text = </i>' . $text; // Output: Hello
echo '<br>';

echo sayHi2($text); // Output: Hello World
echo '<br>';

echo '<i>After $text = </i>' . $text; // Output: Hello World
echo '<hr>';

/**
 * NÂNG CAO: Tham chiếu
 * 
 * 1. Biến
 */

echo '<b>Biến</b><br>';
$a = 1;  // $a = 1
$b = $a; // $b = 1
echo '<i>$a: </i>' . $a . '<br>'; // OUTPUT: 1
echo '<i>$b: </i>' . $b . '<br>'; // OUTPUT: 1
$b = 10; // $b = 10
echo '<i>$a: </i>' . $a . '<br>'; // OUTPUT: 1
echo '<i>$b: </i>' . $b . '<hr>'; // OUTPUT: 10

echo 'b = <span style="color:red">&</span>$a; <br>';
$a = 1;
$b = &$a;
echo '<i>$a: </i>' . $a . '<br>'; // OUTPUT: 1
echo '<i>$b: </i>' . $b . '<br>'; // OUTPUT: 1
$b = 10;
echo '<i>$a: </i>' . $a . '<br>'; // OUTPUT: 10
echo '<i>$b: </i>' . $b . '<hr>'; // OUTPUT: 10

/**
 * 2. Hàm
 */
echo '<b>Hàm</b><br>';
function hello()
{
    static $content = 'Hello';
    return $content;
}

$message = hello(); // gọi hàm
echo '<i>Before: </i>' . $message . '<br>'; // Ouput: Hello

$message = 'Ni Hao';

$message2 = hello();
echo '<i>After: </i>:' . $message2 . '<hr>'; // Ouput: Hello

/**
 * https://www.php.net/language.references.return
 * 
 *  Pass by reference có nghĩa truyền địa chỉ của biến thay vì giá trị.
 * Cơ bản bạn đang tạo 1 con trỏ tới biến.
 */
echo 'function <span style="color:red">&</span>ten_ham() - Gọi hàm: <span style="color:red">&</span>ten_ham() <br>';
function &hello2()
{
    static $content = 'Hello';
    return $content;
}

$message = &hello2();
echo '<i>Before: </i>' . $message . '<br>'; // Ouput: Hello

$message = 'Ni Hao';

$message2 = hello2();
echo '<i>After: </i>:' . $message2 . '<br>'; // Ouput: Ni Hao

// Tham khảo:
// https://www.geeksforgeeks.org/what-does-it-mean-to-start-a-php-function-with-an-ampersand/