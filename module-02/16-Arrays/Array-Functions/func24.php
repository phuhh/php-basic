<?php

// Hàm end($arr) lấy ra phần tử cuối cùng
$people = array("Peter", "Joe", "Glenn", "Cleveland");
echo end($people); // "Cleveland"
echo '<hr>';

// Hàm array_filter($arr) lọc phần tử
$entry = [
    0 => 'foo',
    1 => false,
    2 => -1,
    3 => null,
    4 => '',
    5 => '0',
    6 => 0,
];

print_r(array_filter($entry));

echo '<br>';

function odd($var)
{
    // returns whether the input integer is odd
    return $var & 1;
}

function even($var)
{
    // returns whether the input integer is even
    return !($var & 1);
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Odd : ";
print_r(array_filter($array1, "odd"));
echo '<br>';

echo "Even: ";
print_r(array_filter($array2, "even"));
echo '<br>';
