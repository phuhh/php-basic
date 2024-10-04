<?php

/**
 * - $_FILES lấy ra dữ liệu của tập tin được gửi lên.
 */

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

// 1. Kiểm tra phương thức POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 2. Kiểm tra có tải tập tin không
    if (!empty($_FILES['fileUpload'])) {
        $allowedExtensions = ['jpeg', 'jpg', 'png'];
        // Lấy ra tên tập tin
        $fileName = $_FILES['fileUpload']['name'];

        /**
         * Upload file nên đổi tên tập tin vì:
         * - Tránh về liên quan bảo mật
         * - Tránh bị trùng tên tập tin
         */
        $filenameArr = explode('.', $fileName);
        // Hàm end($arr) lấy ra giá trị cuối cùng
        $fileExtension = end($filenameArr);

        // Cách 1:
        // Hàm uniqid() tạo ra 1 id duy nhất dựa trên microtime (thời gian hiện tại tính bằng mirco giây)
        // Kết hợp với Hàm sha1($str) hoặc md5()
        $fileNameBefore = sha1(uniqid()); // vd: 488a75c847b47dcefa629ea81b2dc336e6b9c218

        // // Cách 2:
        // // Lấy ra tên
        // $fileNameBefore = str_replace('.' . $fileExtension, '', $fileName);
        // // Nối hậu tố là tên miền hoặc tên cty chung với 1 chuỗi tự động nào đó
        // $fileNameBefore = $fileNameBefore . '_ten_mien_' . uniqid();
        // // vd: img_chania_ten_mien_66feb6c702145.jpg

        $fileName = $fileNameBefore . '.' . $fileExtension;

        // 3.Kiểm tra đuổi mở rộng được cho phép không
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo 'Không hợp lệ.';
            exit();
        }

        // 4.Kiểm tra kích thước tập tin
        if ($_FILES['fileUpload']['size'] > (1024 * 1024 * 3)) {
            echo 'Tối đa kích thước 3 mb';
            exit();
        }

        // 5. Di chuyển tập tin tạm vào nơi lưu trữ chính
        // Lưu ý: nơi lưu trữ có quyền ghi
        $checkUpload = move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../uploads/' . $fileName);
        if ($checkUpload) {
            echo 'Tải tập tin thành công';
        } else {
            echo 'Tập tin tải thất bại';
        }
    }
}
