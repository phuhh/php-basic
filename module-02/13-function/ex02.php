<?php

/**
 * Chú ý: Để tối ưu và dễ quản lý hàm tự định nghĩa thì ta nên viết 1 tập tin riêng để chỉ định nghĩa
 */

require_once './myFunction.php'; // import file myFunction.php
require_once './myFunction2.php'; // import file myFunction2.php
/**
 * function_exists(ten_ham) kiểm tra hàm có tôn tại không ?
 *     1. (Phủ định) Kiểm tra hàm chưa tồn tại thì mới định nghĩa hàm
 *     2. Kiểm tra chắc chắn hàm có định nghĩa mới được gọi hàm
 */

// Gọi hàm
if (function_exists('printTotal')) {
    printTotal(5, 10);
}
echo '<br>';

$x = 10;
$y = 20;
if (function_exists('printTotal')) {
    printTotal($x, $y);
}
echo '<br>';

if (function_exists('printMessages')) {
    printMessages();
}
echo '<hr>';

if (function_exists('printMessages2')) {
    printMessages2(); // Hàm chưa tồn tại
}

/**
 * Tham số trong Hàm
 *     a. Hàm không có tham số thì không cần truyền tham số.
 *     b. Hàm có tham số thì bắt buộc hoặc không bắt buộc truyền tham số.
 *         1. Tham số bắt buộc là tham số không có giá trị mặc định, khi gọi hàm 
 *         bắt buộc phải truyền vào, nếu không truyền sẽ bị lỗi
 *         2. Tham số không bắt buộc là tham số có giá trị mặc định sẵn khi định nghĩa hàm,
 *         khi sử dụng hàm tuỳ vào bài toán mà truyền hoặc không truyền hàm vẫn hoạt động. 
 *         Mặc định không truyền hàm sẽ lấy giá trị mặc định xử lý.
 */

// Gọi hàm
printNumber(12);
echo '<br>';

printNumber(12, 'Kết quả');
echo '<br>';
/**
 * Lưu ý: Thứ tự truyền dữ liệu vào hàm, có tham số bắt buộc mà không truyền hoặc bỏ qua truyền tiếp sẽ gây Lỗi.
 */

// gọi hàm
printMenu(false, 'Danh sách menu');
echo '<hr>';

// printMenu('Danh sách menu'); // Hàm này sẽ bị lỗi vì truyền thiếu tham số

/**
 * Gọi Hàm
 *     - Hàm được gọi phải được định nghĩa trước mới sử dụng hàm được.
 * Gọi hàm khác vào trong hàm
 *     - Không phân biệt thứ tự hàm định nghĩa (trước hoặc sau)
 */
callFunction();
