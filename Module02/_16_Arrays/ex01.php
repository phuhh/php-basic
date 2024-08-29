<?php

/**
 * Kiểu dữ liệu Array
 * - là kiểu dữ liệu phức hợp
 * - Các kiểu dữ liệu đơn như string, number, boolean, null.
 * 
 * Mảng là chứa nhiều giá trị, nhiều kiểu dữ liệu khác nhau
 * Mảng là có 2 dạng:
 *     + Mảng 1 chiều
 *     + Mảng đa chiều
 * 
 * Cú pháp khai báo mảng:
 * 
 * Cách 1: $ten_bien = array(phan_tu_1, phan_tu_2,... , phan_tu_n);
 */
$arr = array('apple', 'samsung', 'xiaomi', 'Vivo');

// Xem cấu trúc mảng 
echo "<pre>";
print_r($arr);
echo "</pre>";

// Cách 2: $ten_bien = [phan_tu_1, phan_tu_2,... , phan_tu_n];
$arr = [];

// Ví dụ: Mảng có các phần tử có tên hãng xe (các phần tử có cùng kiểu dữ liệu)
$arr = ['Honda', 'Hyundai', 'Ford', 'BMW', 'Lexus'];

echo "<pre>";
print_r($arr);
echo "</pre>";

// Ví dụ: Mảng có các phẩn tử khác kiểu dữ liệu
$arr = ['Tony', 30, true, null];

echo "<pre>";
print_r($arr);
echo "</pre>";

/**
 * Mảng tuần từ bắt đầu 0 và tăng lên theo từng phần tử
 * 
 * $arr = ['Honda', 'Hyundai', 'Ford', 'BMW', 'Lexus'];
 * 
 * index:     0         1         2      3       4
 * value:   Honda    Hyundai    Ford    BMW    Lexus 
 */

/**
 * Khai báo mảng bất tuần tự là mảng trong key có thể dạng kiểu số hoặc chuỗi 
 * - Thông thường sẽ dạng kiểu chuỗi
 * - Nếu kiểu số cần lưu ý thự tự tăng trong index
 * 
 * Cú pháp:
 * $ten_bien = [khoa_1 => gia_tri_1, khoa_2 => gia_tri_3,... ,khoa_n => gia_tri_n];
 * 
 * - Luôn luôn phải có cặp key(khoá) và value(giá trị)
 */
$arr = ['HTML', 'name' => 'Tony', 'age' => 30, 10 => 'CSS', 'isMale' => true, 'address' => null, 'Javascript'];

echo "<pre>";
print_r($arr);
echo "</pre>";

/**
 * Lấy từng phần tử trong mảng
 * 
 * Cú pháp: $ten_bien[chi_so|khoa];
 */

$html = $arr[0];
echo $html . '<br>';

$age = $arr['age'];
echo $age . '<hr>';

/**
 * Thêm phần tử vào mảng
 * 
 * Cách 1: Thêm lúc khai báo mảng
 */
$arr = ['Acer', 'Hp', 'Dell'];

echo "<pre>";
print_r($arr);
echo "</pre>";

// Cách 2: Thêm sau khi khai báo
$arr = []; // mảng rỗng

/**
 * Thêm tùng phần tử
 * 
 * Cú pháp: $ten_bien[rong|chi_so|khoa] = gia_tri;
 */
$arr[] = 'HTML';                  // key = rỗng => index sẽ tự động tăng, nếu trước đó không phần tử nào bắt đầu bằng 0
$arr[] = 'Cascading Style Class'; // key = rỗng => index sẽ tự động tăng
$arr[10] = 'JS';                  // key = 10 => index sẽ bắt đầu tự tăng từ 10
$arr[] = 'jquery';                // key = rỗng => index sẽ tự động tăng
$arr['language'] = 'PHP';         // key 'language' => key kiểu chuỗi
$arr['database'] = 'MySQL';       // key 'database' => key kiểu chuỗi

echo "<pre>";
print_r($arr);
echo "</pre>";

/**
 * Sửa giá trị phẩn tử: Xác định tên mảng và key (khoá)
 * 
 * Cú pháp tương tự như thêm
 */
$arr[1] = 'CSS';
$arr[10] = 'Javascript';
$arr['database'] = 'SQL Server';

echo "<pre>";
print_r($arr);
echo "</pre>";

/**
 * Xoá phẩn tử mảng
 * 
 * Hàm unset dùng để xoá biến hoặc là phẩn tử trong mảng
 * 
 * Cú pháp: 
 * unset($ten_bien[chi_so|khoa]); // Xoá phẩn tử chỉ định trong mảng
 * unset($ten_bien); // Xoá luôn biến
 */
unset($arr[11]);
echo "<pre>";
print_r($arr);
echo "</pre>";

/**
 * Lưu ý: Khi xoá phẩn tử trong mảng tuần tự, 
 * dùng hàm unset() sẽ không reset (làm mới) lại index trong mảng,
 * các chỉ số vẫn nguyên
 */
$arr = ['Toyota', 'Kia', 'Suzuki', 'Chevrolet', 'Isuzu', 'Mazda'];
unset($arr[0]);
unset($arr[3]);

echo "<pre>";
print_r($arr);
echo "</pre>";

// Xoá cả mảng
unset($arr);

if (isset($arr)) {
    echo 'Biến tồn tại';
} else {
    echo 'Biến không tồn tại';
}
echo '<hr>';

/**
 * Duyệt mảng (đọc mảng)
 */
$arr = ['Toyota', 'Kia', 'Suzuki', 'Chevrolet', 'Isuzu', 'Mazda'];

// Duyệt mảng tuần tự với vòng lặp for
$countArr = count($arr);
for ($i = 0; $i < $countArr; $i++) {
    echo $arr[$i] . '<br>';
}
echo '<hr>';

// Duyệt mảng bất tuần tự bằng vòng foreach
$arr = ['HTML', 'name' => 'Tony', 'age' => 30, 10 => 'CSS', 'isMale' => true, 'address' => null, 'Javascript'];
// lấy chỉ value
foreach ($arr as $item) {
    echo "item: {$item} <br>";
}
echo '<hr>';

// lấy key và value
foreach ($arr as $key => $item) {
    echo "key: {$key} - value: {$item} <br>";
}
