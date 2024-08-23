<?php

/**
 * 
 * So sánh key và value của các mảng: array_diff_assoc($array1, $array2,... $arrayN)
 * 
 * Hàm có tác dụng trả về 1 mảng có các key và value trong mảng $array1 nhưng không có trong mảng $array2,... $arrayN
 * 
 * Mảng đầu tiên sẽ đem đi so sánh từng mảng khác nếu tất cả đều không trùng key và value trùng thì sẽ lấy
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

$resultArr = array_diff_assoc($arrayRoot, $arrayFirst);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
echo '<hr>';

$resultArr = array_diff_assoc($arrayRoot, $arrayFirst, $arraySecond);

echo "<pre>";
print_r($resultArr);
echo "</pre>";
