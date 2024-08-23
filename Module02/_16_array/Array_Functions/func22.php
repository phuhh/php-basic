<?php

/**
 * Tìm giống nhau: array_intersect_assoc($array1, $array2,... $arrayN)
 * 
 * Hàm này có tác dụng trả về mảng các phần tử giống nhau cả key và value trong mảng $array
 * 
 * Mảng đầu tiên sẽ đem đi so sánh từng mảng có key và value trùng thì sẽ lấy
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

$resultArr = array_intersect_assoc($arrayRoot, $arrayFirst);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
