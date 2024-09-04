<?php

/**
 * Bài 05: Tìm thông tin khách hàng có tuổi nhỏ nhất (Mảng đa chiều)
 */

$customers = [
    [
        'name' => 'Nguyen Van A',
        'age' => 30
    ],
    [
        'name' => 'Ly Vo B',
        'age' => 26
    ],
    [
        'name' => 'Tran Van C',
        'age' => 32
    ],
    [
        'name' => 'Le Thi D',
        'age' => 24
    ],
];

$minAge = null;
if (!empty($customers) && is_array($customers)) {
    $minAge = $customers[0]; // Giả định khách hàng nhỏ tuổi nhất
    $countCustomers = count($customers);
    for ($i = 0; $i < $countCustomers; $i++) {
        if ($minAge['age'] >= $customers[$i]['age']) {
            $minAge = $customers[$i];
        }
    }
}

echo '<i>Tuổi nhỏ nhất:</i> ' . $minAge['age'] . ' - <i>Khách hàng:</i> ' . $minAge['name'];
