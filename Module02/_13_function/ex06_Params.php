<?php

/**
 * Hàm không giới hạn tham số
 * 
 * - Làm sao để lấy ra các tham số đó ???
 * 
 * Cách 1: Định nghĩa hàm không có tham số
 * 
 * Hàm func_get_args() lấy ra tất cả tham số truyền vào
 */

function test()
{
    $params = func_get_args();
    echo "<pre>";
    print_r($params);
    echo "</pre>";
}
// Gọi hàm và truyền giá trị vào hàm
test('foo', 'bar', 'baz');
echo '<hr>';

// Hàm func_get_args(chi_so) lấy tham số truyền vào theo chỉ số trong danh sách
function test2()
{
    $param = func_get_arg(1);
    var_dump($param);
}
// Gọi hàm và truyền giá trị vào hàm
test2('foo', 'bar', 'baz');
echo '<hr>';

/**
 * Cách 2: Định nghĩa hàm có tham số 3 chấm 
 * 
 * Cú pháp: function ten_ham(...$tham_so)
 */
function test3(...$params)
{
    echo "<pre>";
    print_r($params);
    echo "</pre>";

    // lấy ra 1 giá trị dữ liệu từ các tham số không giới hạn
    var_dump($params[1]);
}
test3('foo', 'bar', 'baz');
echo '<hr>';

/**
 * Định nghĩa hàm có tham số bình thường và tham số không giới hạn
 * 
 * Lưu ý: Các tham số không giới hạn nên đặt phía cuối
 */
function makeTotal($a, $b, ...$params)
{
    $total = $a + $b;

    // xử lý các tham số không giới hạn
    if (!empty($params)) {
        $countParams = count($params);
        for ($i = 0; $i < $countParams; $i++) {
            $total += $params[$i];
        }
    }

    return $total;
}
$result = makeTotal(5, 10);
echo $result;
echo '<br>';

$result = makeTotal(5, 10, 1, 2, 3);
echo $result;
