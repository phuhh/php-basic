<?php

/**
 * Từ khoá die và exit đều dùng để dừng chương trình và các đoạn mã nằm phía sau sẽ không chạy được
 * 
 * - Cú pháp: dùng từ khoá hoặc dùng hàm đều được (hàm có lựa chọn truyền thông báo)
 *    die = die() = die(message);
 *    exit = exit() = exit(message);
 * 
 * - Bản chất 2 cái đều giống nhau.
 * - Khác nhau Nguồn gốc ngôn ngữ lập trình
 * 
 *    exit từ ngôn ngữ lập trình C++
 *    die từ ngôn ngữ lập trình Peal
 * 
 * - Thường dùng để debug code (kiểm tra các đoạn mã) khi gặp lỗi hoặc kiểm tra luồng chạy.
 */

echo 'đoạn mã 1 thực thi <br>';
echo 'đoạn mã 2 thực thi <br>';
echo 'đoạn mã 3 thực thi <br>';
// die;
// die();
// die('Thông báo dừng chương trình');

// exit;
// exit();
exit('Thông báo dừng chương trình');
echo 'đoạn mã 4 thực thi <br>';
?>

<h1>Đoạn HTML</h1>