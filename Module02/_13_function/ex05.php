<?php

/**
 * - Tham số (Parameter)
 * - Tham trị (Còn gọi là Đối số - Argument)
 * - Tham biến  
 * - Tham chiếu
 */

/**
 * - Tham số là các tham số khi định nghĩa hàm.
 * - Tham trị là các biến và giá trị dữ liệu truyền vào hàm (gọi hàm).
 */
echo '<b>Tham số, Tham trị</b><br/>';
function makeTotal($a, $b) // $a và $b là gọi là Tham số
{
    return $a + $b;
}

$x = 5;
$y = 10;
// Gọi hàm
$result = makeTotal($x, $y); // $x và $y được đặt trong hàm gọi là Tham trị
echo $result;
echo '<hr>';
/**
 * Lưu ý: Tham trị sẽ KHÔNG làm thay đổi giá trị khi truyền vào hàm. Ngược lại thì Tham biến thì có.
 */

/**
 * Tham biến sẽ tương tự khi tham trị nhưng nó sẽ làm thay đổi giá trị truyền vào.
 */
echo '<b>Tham Số</b>: function ten_ham($content) <br/>';
function sayHi($content = null)
{
    $content .= ' World';
    return $content;
}

$text = 'Hello';
echo '<i>Before value: </i>' . $text . '<br>'; // Output: Hello

echo sayHi($text); // Output: Hello World
echo '<br>';

echo '<i>After value: </i>' . $text; // Output: Hello
echo '<hr>';

echo '<b>Tham biến</b>: function ten_ham(<span style="color:red">&</span>$content) <br/>';
// Định nghĩa tham số $content là Tham biến
function sayHi2(&$content = null)
{
    $content .= ' World';
    return $content;
}

$text = 'Hello';
echo '<i>Before value: </i>' . $text; // Output: Hello
echo '<br>';

echo sayHi2($text); // Output: Hello World
echo '<br>';

echo '<i>After value: </i>' . $text; // Output: Hello World
echo '<hr>';

/**
 * Lưu ý: Giá trị chỉ thay đổi khi tham biến được xử lý trong hàm.
 */

/**
 * NÂNG CAO: Tham chiếu là trả về 1 tham chiếu đến, thay vì giá trị của nó
 * 
 * 1. Biến
 *     + Biến tham chiếu là biến $a
 *     + Biến gán biến tham chiếu là biến $b
 *     => Khi biến $b có sự thay đổi về giá trị thì Biến tham chiếu $a sẽ thay đổi giá trị giống như biến $b
 */

echo '<b>Biến</b><br>';
$a = 1;  // $a = 1
$b = $a;
echo '<i>$a: </i>' . $a . '<br>'; // OUTPUT: 1
$b = 10; // $b = 10
echo '<i>$b: </i>' . $b . '<br>'; // OUTPUT: 10

echo '<b>Biến tham chiếu: </b> $b = <span style="color:red">&</span>$a; <br>';
$a = 1;   // $a = 10
$b = &$a; // Định nghĩa biến tham chiếu
echo '<i>$a: </i>' . $a . '<br>'; // OUTPUT: 10
$b = 10;  // $b = 10
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

echo '<b>Hàm tham chiếu: </b> function <span style="color:red">&</span>ten_ham() - Gọi hàm: <span style="color:red">&</span>ten_ham() <br>';
// Định nghĩa hàm tham chiếu
function &hello2()
{
    static $content = 'Hello';
    return $content;
}

$message = &hello2(); // Gọi hàm tham chiếu
echo '<i>Before: </i>' . $message . '<br>'; // Ouput: Hello

$message = 'Ni Hao';

$message2 = hello2();
echo '<i>After: </i>:' . $message2 . '<br>'; // Ouput: Ni Hao

// Tham khảo:
// https://www.geeksforgeeks.org/what-does-it-mean-to-start-a-php-function-with-an-ampersand/