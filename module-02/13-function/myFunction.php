<?php

if (!function_exists('printTotal')) {
    function printTotal($a, $b)
    {
        $total = $a + $b;
        echo "Total {$a} + {$b} = $total";
    }
}

if (!function_exists('callFunction')) {
    function callFunction()
    {
        echo 'Đang gọi hàm khác vào trong hàm: ';
        echo '<br>';
        printMenu(true, 'Đây là danh sách menu');
        echo '<br>';
        printMessages3();
    }
}

if (!function_exists('printMessages')) {
    function printMessages()
    {
        echo 'In thông báo !!!';
        echo '<br>';
        printMenu(true, 'Đây là danh sách menu');
    }
}

if (!function_exists('printNumber')) {
    function printNumber($number, $text = null)
    {
        if ($text != null) {
            echo $text . ':' . $number;
        } else {
            echo $number;
        }
    }
}

if (!function_exists('printMenu')) {
    function printMenu($subMenu = false, $data)
    {
        if ($subMenu) {
            echo $data . ' có menu con';
        } else {
            echo $data . ' không có menu con';
        }
    }
}
