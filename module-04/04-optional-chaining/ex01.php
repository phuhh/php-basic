<?php

/**
 * Toán tử Optional Chaining (?->) có từ phiên bản 8.x trở về sau
 *  
 * Áp dụng trong Object
 * Trả về giá trị khi con trỏ hoặc null nếu không tìm thấy.
 */

class Customer
{
    public $name = 'Tony';

    public function methodA()
    {
        echo 'method A';
        // return $this;
    }

    public function methodB()
    {
        echo 'method B';
    }
}

$customer = new Customer;
echo $customer->name;
echo '<br>';

$customer2 = null;
var_dump($customer2?->name);
echo '<br>';


$result = $customer->methodA()?->methodB();
var_dump($result);
