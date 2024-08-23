<?php

/**
 * 
 * So sánh giá trị các mảng: array_diff($array1, $array2,... $arrayN)
 * 
 * Hàm có tác dụng trả về mảng chứa các phần tử có trong mảng $array1 nhưng không có trong mảng $array2,... $arrayN
 * 
 * Mảng đầu tiên sẽ đem đi so sánh từng mảng khác nếu không có giá trị trùng thì sẽ lấy
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
    'address' => 'Sài Gòn',
    'email' => 'nguyenvanb@gmail.com'
];

$arraySecond = [
    'name' => 'Nguyễn Văn C',
    'age' => 30,
    'address' => 'Bến Tre',
    'email' => 'nguyenvanc@gmail.com'
];

$resultArr = array_diff($arrayRoot, $arrayFirst);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
echo '<hr>';

$resultArr = array_diff($arrayRoot, $arrayFirst, $arraySecond);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
