<?php

/**
 * Định nghĩa Hàm, cú pháp:
 * 
 *     function ten_ham(ham_so_1, ham_so_2, ..., ham_so_n) {
 *         // noi_dung_ham
 *     }
 * 
 *     - ten_ham: do chúng ta tự đặt (bắt đầu từ Động từ: do, make, create, build,...) 
 *         + đặt tên hàm theo quy tắc camelCase
 *         + ten_ham không được trùng nhau, nếu không sẽ bị lỗi
 * 
 *     - ham_so_1, ham_so_2, ham_so_n: Danh sách các tham số(biến) cách bởi dấu phẩy (,)
 * 
 *     - Bên trong cặp ngoặc {} là nội dung hàm
 * 
 * Gọi Hàm, cú pháp:
 *     
 *      ten_ham(ham_tri_1, ham_tri_2, ..., ham_tri_n);
 *
 *      - ham_tri_1, ham_tri_2, ham_tri_n: là các biến hoặc dữ liệu bên ngoài truyền vào trong hàm.
 */

// Định nghĩa hàm (có tham số)
function printTotal($a, $b)
{
    $total = $a + $b;
    echo "Total {$a} + {$b} = $total";
}

// Gọi hàm (truyền dữ liệu trực tiếp)
printTotal(5, 10);
echo '<br>';

// Gọi hàm (truyền thông qua biến)
$x = 10;
$y = 20;
printTotal($x, $y);
echo '<br>';

// Định nghĩa hàm (KHÔNG có tham số)
function printMessages()
{
    echo 'In thông báo !!!';
}

// Gọi hàm
printMessages();

/**
 * Chú ý: Để tối ưu và dễ quản lý hàm tự định nghĩa thì ta nên viết 1 tập tin riêng để chỉ định nghĩa
 */
