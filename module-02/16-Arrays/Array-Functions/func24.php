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

print_r(array_filter($entry)); // OUTPUT: Array ( [0] => foo [2] => -1 )

echo '<br>';

// callback function
function odd($var)
{
    // returns whether the input integer is odd --> trả về số nguyên là số lẻ
    return $var & 1;
}

// callback function
function even($var)
{
    // returns whether the input integer is even --> trả về số nguyên là số chẵn
    return !($var & 1);
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Odd : ";
print_r(array_filter($array1, "odd")); // OUTPUT: Array ( [a] => 1 [c] => 3 [e] => 5 )
echo '<br>';

echo "Even: ";
print_r(array_filter($array2, "even")); // OUTPUT: Array ( [0] => 6 [2] => 8 [4] => 10 [6] => 12 )
echo '<br>';
