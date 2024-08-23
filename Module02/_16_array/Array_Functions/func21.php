<?php

/**
 * Tìm giống nhau: array_intersect($array1, $array2,... $arrayN)
 * 
 * Hàm này có tác dụng trả về mảng các phần tử giống nhau về $value giữa các mảng $array
 * 
 * Mảng đầu tiên sẽ đem đi so sánh từng mảng giá trị trùng thì sẽ lấy
 */
$arrayRoot = [
    'name' => 'Nguyễn Văn A',
    'age' => 30,
    'address' => 'Bến Tre',
    'email' => 'nguyenvana@gmail.com'
];

$arrayFirst = [
    'name' => 'Nguyễn Văn B',
    'age' => 30,
    'address2' => 'Bến Tre',
    'email' => 'nguyenvanb@gmail.com'
];

$arraySecond = [
    'name' => 'Nguyễn Văn C',
    'age' => 30,
    'address' => 'Sài Gòn',
    'email2' => 'nguyenvanc@gmail.com'
];

$resultArr = array_intersect($arrayRoot, $arrayFirst);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
