<?php

/**
 * Mảng đa chiều
 * - là mảng có phần tử là 1 mảng khác (cách gọi khác "mảng lồng mảng")
 */
$item1 = [
    'name' => 'Nguyen Van A',
    'age' => 30,
    'address' => 'TP.HCM'
];

$item2 = [
    'name' => 'Tran Van B',
    'age' => 31,
    'address' => 'Long An'
];

$customers = [
    $item1,
    $item2
];

echo "<pre>";
print_r($customers);
echo "</pre>";

echo '<hr>';

// Trường hợp khác: Mảng đa chiều ngoài mảng lồng mảng có thể có mảng tuần tự hoặc mảng bất tuần tự trong mảng đa chiều
$customers = [
    [
        'name' => 'Nguyen Van A',
        'age' => 30,
        'address' => 'TP.HCM'
    ],
    [
        'name' => 'Tran Van B',
        'age' => 31,
        'address' => 'Long An'
    ],
    [
        'name' => 'Ly Thi C',
        'age' => 30,
        'address' => 'Tay Ninh'
    ],
    'status' => 'Success',
    202
];

echo "<pre>";
print_r($customers);
echo "</pre>";

echo '<hr>';
/**
 * Thêm phần tử vào mảng đa chiều
 */
$customers = [];

// Thêm phần tử là mảng con
$customers[] = [
    'name' => 'Nguyen Van A',
    'age' => 30,
    'address' => 'TP.HCM'
];

$customers[] = [
    'name' => 'Tran Van B',
    'age' => 31,
    'address' => 'Long An'
];

// Thêm phẩn tử là mảng bất tuần tự
$customers['status'] = 'Success';

// Thêm phần tử là mảng tuần tự
$customers[] = 202;

// Trường hợp khác: Thêm mảng con có key
$customers['vip'] = [
    'name' => 'Le Van D',
    'age' => 30,
    'address' => 'Binh Duong'
];

// Trường hợp khác: Thêm từng phẩn tử vào trong mảng con
$customers[][] = 'Nguyen Van E';
$customers[3][] = 30;
$customers[3][] = 'Vung Tau';

// Trường hợp khác: Thêm từng phần tử có key vào trong mảng con
$customers[]['name'] = 'Ly Thi C';
$customers[4]['age'] = 31;
$customers[4]['address'] = 'Tay Ninh';

// Cập nhật giá trị phần tử trong mảng đa chiều
$customers['vip']['email'] = [
    'dlevan@mail.com',
    'dlevan02@mail.com',
    'dlevan03@mail.com',
    'dlevan04@mail.com',
];
echo "<pre>";
print_r($customers);
echo "</pre>";

// Xoá phẩn tử trong mảng con (mảng đa chiều) (dùng hàm unset(ten_bien))
// unset($customers['vip']['email'][2]);

// Xoá phẩn tử cuối cùng trong mảng con
$lastElement = count($customers['vip']['email']) - 1;
unset($customers['vip']['email'][$lastElement]);

echo "<pre>";
print_r($customers);
echo "</pre>";

echo '<hr>';
