<?php

/**
 * Duyệt mảng đa chiều
 */
$customers = [
    [
        'name' => 'Nguyen Van A',
        'age' => 30,
        'address' => 'TP.HCM'
    ],
    [
        'name' => 'Tran Van B',
        'age' => 31,
        'address' => 'Long An',
        'phone' => [
            '0931234567',
            '0931234568',
            '9312345679'
        ]
    ],
    [
        'name' => 'Ly Thi C',
        'age' => 30,
        'address' => 'Tay Ninh'
    ],
    'status' => 'Success',
    202
];


if (!empty($customers) && is_array($customers)) {
    foreach ($customers as $customer) {
        if (!empty($customer)  && is_array($customer)) {
            echo 'Thong tin khach hang <br>';
            foreach ($customer as $k_item => $item) {
                if (is_array($item)) {
                    echo '-- Lien lac: <br>';
                    if (!empty($item)) {
                        foreach ($item as $value) {
                            echo $value . '<br>';
                        }
                    }
                } else {
                    echo $k_item . ': ' . $item . '<br>';
                }
            }
            echo '<hr>';
        } else {
            echo $customer . '<br>';
        }
    }
}
