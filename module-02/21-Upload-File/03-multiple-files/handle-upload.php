<?php
defined('ONE_MB') || define('ONE_MB', 1048576); // 1024 * 1024S

// 1. Kiểm tra phương thức POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo "<pre>";
    // var_dump($_FILES['filesUpload']);
    // die();

    // 2. Kiểm tra tập tin có tồn tại không
    if (!empty($_FILES['filesUpload'])) {

        $allowedExtensions = ['jpeg', 'jpg', 'png'];
        $maxFileSize = ONE_MB;
        $pathStorage = '../uploads/';

        // 3.Cách đọc từng tập tin trong danh sách
        foreach ($_FILES['filesUpload']['name'] as $index => $fileName) {
            $oldFileName = $fileName;
            // lấy ra tên file
            // echo $fileName . '<br>';

            // lấy ra đường dẫn tạm
            //echo $_FILES['filesUpload']['tmp_name'][$index] . '<br>';

            // 4. Đổi tên file
            $fileNameArr = explode('.', $fileName);
            $fileExtension = end($fileNameArr);
            $fileName = sha1(uniqid()) . '.' . $fileExtension;

            // 5. Kiểm tra định dạng file
            if (in_array($fileExtension, $allowedExtensions)) {
                // 6. Kiểm tra kích thước file
                if ($_FILES['filesUpload']['size'][$index] <= $maxFileSize) {
                    // 7. Di chuyển tập tin tạm sang nơi lưu
                    $check = move_uploaded_file($_FILES['filesUpload']['tmp_name'][$index], $pathStorage . $fileName);
                    if ($check) {
                        echo 'Tập tin <b>' . $oldFileName .  '</b> tải thành công. Links: <a href="' . $pathStorage . $fileName .  '">' . $oldFileName .  '</a> <br/>';
                    } else {
                        echo 'Tập tin <b>' . $oldFileName . '</b> tải thất bại. <br/>';
                    }
                } else {
                    echo 'Tập tin <b>' . $oldFileName . '</b> không vượt quá 1MB. <br/>';
                }
            } else {
                echo 'Tập tin <b>' . $oldFileName . '</b> không đúng định dạng. <br/>';
            }
        }
    }
}
