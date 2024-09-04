<?php

/**
 * Named Argument (PHP 8.x)
 * - Chỉ dùng được từ phiên bản 8.x trở lên
 * - Truyền đối số theo tên tham số 
 * - Cho phép thay đổi thứ tự đối số khi truyền vào
 * 
 * - Lưu ý:
 *      + khi đã sử dụng named argument thì tất cả đối số đều phải sử dụng.
 *      + các tham số không có giá trị mặc định nên đặt phía trước, 
 *        còn tham số có giá trị mặc định đặt ở phía sau để tránh gặp lỗi.
 */
function demo($nameArgs, $params = 'default parameter')
{
    echo "params= {$params} <br>";
    echo "nameArgs= {$nameArgs}";
}
// Truyền đối số theo tên tham số
demo(nameArgs: 'named argument php 8');
/**
 * Giải thích:
 *     nameArgs:              => trùng với tên tham số trong hàm
 *     'named argument php 8' => giá trị truyền 
 */
echo '<hr>';

function makeTotal($a, $b, $c, $isEcho = false, $content = 'Result: ')
{
    $total = $a + $b + $c;

    if ($isEcho) {
        return $content . $total;
    }

    return $total;
}

// Truyền đối số thông thường
$result = makeTotal(1, 2, 3, true);
echo $result; // Output: Result: 6
echo '<br>';

// Truyền đối số theo tên tham số
$result = makeTotal(a: 1, b: 2, c: 3, isEcho: true);
echo $result; // Output: Result: 6
echo '<br>';

// Truyền đối số theo tên tham số (không theo thứ tự)
$result = makeTotal(isEcho: true, a: 1, b: 2, c: 3);
echo $result; // Output: Result: 6
echo '<br>';
