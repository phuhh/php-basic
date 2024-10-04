<?php

/**
 * Tối ưu code.
 * 
 * - Danh sách lỗi upload file
 * https://www.php.net/manual/en/features.file-upload.errors.php
 * 
 * Value: 0; There is no error, the file uploaded with success.
 * value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.
 * Value: 4; No file was uploaded.
 */
defined('ONE_MB') || define('ONE_MB', 1048576); // 1024 * 1024S

// 1. Kiểm tra phương thức POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    // 2. Kiểm tra có tải tập tin không
    if (!empty($_FILES['fileUpload'])) {

        // Kiểm tra xem tập tin đã được chọn chưa 
        if ($_FILES['fileUpload']['error'] === 4) {
            $errors['fileUpload'] = 'Vui lòng chọn tập tin.';
        } else {
            $allowedExtensions = ['jpeg', 'jpg', 'png'];
            $maxFileSize = ONE_MB * 3;
            $pathStorage = '../uploads/';

            $fileName = $_FILES['fileUpload']['name'];

            $filenameArr = explode('.', $fileName);
            $fileExtension = end($filenameArr);

            $fileNameBefore = str_replace('.' . $fileExtension, '', $fileName);
            $fileNameBefore = $fileNameBefore . '_ABC_' . uniqid();

            $fileName = $fileNameBefore . '.' . $fileExtension;

            // 3.Kiểm tra đuổi mở rộng được cho phép không
            if (!in_array($fileExtension, $allowedExtensions)) {
                $str = implode(', ', $allowedExtensions);
                $errors['fileUpload'] = 'Định dạng không hợp lệ. Các định dạng cho phép: ' . $str;
            } else {
                // 4.Kiểm tra kích thước tập tin
                if (empty($_FILES['fileUpload']['size'])) {
                    $errors['fileUpload'] = 'Kích thước không hợp lệ.';
                } elseif ($_FILES['fileUpload']['size'] > $maxFileSize) {
                    $errors['fileUpload'] = 'Kích thước tập tin tối đa ' . number_format($maxFileSize) . ' byte';
                }
            }
        }

        if (!empty($errors)) {
            echo $errors['fileUpload'];
        } else {
            // 5. Di chuyển tập tin tạm vào nơi lưu trữ chính
            $checkUpload = move_uploaded_file($_FILES['fileUpload']['tmp_name'], $pathStorage . $fileName);
            if ($checkUpload) {
                echo 'Tải tập tin thành công';
            } else {
                echo 'Tải tập tin thất bại.';
                /**
                 * Upload không thành công bởi 1 số lý do:
                 * 1. sever
                 * 2. folder lưu trữ không có quyền ghi
                 * 3. folder lưu trữ không tồn tại
                 */
            }
        }
    }
}
