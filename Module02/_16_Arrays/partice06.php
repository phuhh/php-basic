<?php

/**
 * Bài 06: Tìm kiếm 1 giá trị bất kỳ trong mảng
 */
$customers = [
    [
        'name' => 'Nguyễn Văn An',
        'age' => 30
    ],
    [
        'name' => 'Lý Bình',
        'age' => 26
    ],
    [
        'name' => 'Trần Minh Châu',
        'age' => 32
    ],
    [
        'name' => 'Lê Thị Diệu',
        'age' => 24
    ],
    [
        'name' => 'Trần Thanh Văn',
        'age' => 27
    ],
];

$keywords = 'danh'; // Từ khoá cần tìm
$result = [];
if (!empty($customers) && is_array($customers)) {
    foreach ($customers as $customer) {
        $customerName = mb_strtolower($customer['name'], 'UTF-8');
        // Kiểm tra tên khách hàng có trùng với từ khoá không ???
        $check = mb_strpos($customerName, $keywords, 0, 'UTF-8');
        if ($check) {
            $result = $customer;
            break;
            // $result[] = $customer;
        }
    }
}

echo "<pre>";
print_r($result);
echo "</pre>";
