<?php

/**
 * Giải thuật ĐỆ QUY
 * - Khi định nghĩa hàm trong hàm gọi lại chính nó.
 * 
 * - Ứng dụng hàm đệ quy chỉ phù hợp các dữ liệu nhỏ, đối với dữ liệu lớn thì hiệu suất chậm.
 * - Áp dụng các bài toán kiểu đa cấp: Danh mục, Menu
 * - Phân cấp URL, Breadcrumbs,...
 * 
 * - Phân tầng 3 hoặc 4 cấp thì đệ quy hiệu suất nhanh
 * - Còn tư 10 hoặc 20 cấp trở lên thì không nên dùng mà cần kiếm Thuật toán khác tốt hơn
 * 
 * Lưu ý: Phải có điều kiện dừng lại, nếu không nó cứ chạy đến khi nào đầy bộ nhớ (TREO MÁY)
 * 
 * Bài toán: Hiển thị dãy số Fibonacci (0,1,1,2,3,5,8,13,21,..)
 * - Bước 1: Tính số fibonacci thứ N
 * - Bước 2: Hiển thị dãy số theo N
 */

// $n = 4;

function fibonacci($n)
{
    if ($n < 0) {
        return false;
    }

    if ($n == 0 || $n == 1) {
        return $n;
    }
    return ($n - 1) + ($n - 2);
}

// $rs = fibonacci($n);
// var_dump($rs);

$num = 10;
for ($i = 0; $i < $num; $i++) {
    if ($i != ($num - 1)) {
        echo fibonacci($i) . ', ';
    } else {
        echo fibonacci($i);
    }
}
