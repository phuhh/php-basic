<?php

/**
 * keyword: return
 * 
 * Hàm không có từ khoá return là hàm không trả về giá trị dữ liệu
 *  - Xử lý 1 bài toán nào đó
 *  - Hoặc thay đổi giá trị của biến toàn cục
 */

function printTotal($a, $b)
{
    $total = $a + $b;
    echo $total;
}

printTotal(5, 10);
echo '<br>';

/**
 * Hàm có từ khoá return là hàm trả về giá trị dữ liệu.
 * - Trả về bất kỳ kiểu dữ liệu trong PHP
 * - Khi câu lệnh gặp return sẽ bao gồm: 
 *     + Lưu lại giá trị (sẽ trả lại giá trị khi hàm được gọi)
 *     + bên dưới return sẽ không thực thi các câu lệnh được
 *     + Thoát ra khỏi hàm
 */
function makeTotal($a, $b)
{
    $total = $a + $b;
    return $total;
}

// Gán kết quả trả về vào 1 biến
$result = makeTotal(5, 10);
echo $result; // Output: 15
echo '<br>';
$result++;
echo $result; // Output: 16
echo '<br>';

/**
 * Lưu ý: các câu lệnh nằm dưới return sẽ không chạy được và thoát ra khỏi hàm.
 */

function getMessages($content = null)
{
    if ($content === null) {
        return; // tương đương: return null;
        echo 'đoạn code không hoạt động và thoát ra';
    }
    return $content;
    echo 'đoạn code không hoạt động và thoát ra';
}

$msg = getMessages();
var_dump($msg); // Output: NULL
echo '<br>';
$msg2 = getMessages('Lorem Ipsum');
echo $msg2; // Output: Lorem Ipsum
