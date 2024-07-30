<?php

/**
 * - Biến cục bộ 
 * - Biến toàn cục
 * - Biến tĩnh
 */

/**
 * Biến cục bộ 
 *  - Là biến chỉ được sử dụng trong phạm vi hàm
 *  - KHÔNG được sử dụng bên ngoài hàm
 *  - KHÔNG dược sử dụng trong hàm khác
 */

function makeTotal($a, $b)
{
    // biến total là biến cục bộ
    // biến a và b là tham số
    $total = $a + $b;
    return $total;
}
/**
 * Tham số cũng giống như biến cục bộ chỉ hoạt động trong hàm
 */

/**
 * Biến toàn cục
 * - Là biến được sử dụng bất kỳ đâu
 * - Là biến được khai báo ở ngoài hàm
 * - Để sử dụng được biến toàn cục trong hàm dùng từ khoá global
 */

// biến data này là biến toàn cục
$data = 'Hello';

function getMessage1()
{
    // biến data này không liên quan biến data trên.
    $data = 'hi'; // biến data này là biến cục bộ
}

echo $data; // Output: Hello
echo '<hr>';

/**
 * Câu hỏi: Làm thế nào để sử dụng biến toàn cục vào trong hàm ?
 * từ khoá: Global 
 * 
 * Cú pháp: Global ten_bien
 */

$content = 'Xin Chao';

function getMessage2()
{
    // Khai báo biến cục bộ thành biến toàn cục, từ khoá: global
    global $content;
    $content = 'Ni Hao';
}

echo $content; // Output: Ni Hao
echo '<hr>';

/**
 * Biến tĩnh (giữ lại giá trị)
 * - Ngược với các biến được khai báo như là các tham số hàm, mà sẽ bị hủy khi thoát khỏi hàm, 
 *   một biến tĩnh sẽ không mất giá trị của nó khi hàm thoát ra 
 *   và sẽ vẫn giữ giá trị đó nếu hàm đó được gọi lại lần nữa.
 */
function handleCount()
{
    $number = 0;
    $number++;
    return $number;
}

echo handleCount(); // Output: 1
echo '<br>';
echo handleCount(); // Output: 1
echo '<br>';
echo handleCount(); // Output: 1
echo '<hr>';

function handleCount2()
{
    // Khai báo từ biến cục bộ thành biến tĩnh, từ khoá static
    static $number = 0; // Giá trị vẫn giữ lại cho lần chạy tiếp theo
    $number++;
    return $number;
}

echo handleCount2(); // Output: 1
echo '<br>';
echo handleCount2(); // Output: 2
echo '<br>';
echo handleCount2(); // Output: 3