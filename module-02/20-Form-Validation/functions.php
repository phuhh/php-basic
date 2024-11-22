<?php

if (!function_exists('redirect')) {
    function redirect($path = null)
    {
        if (!empty($path)) {
            header('Location: ' . $path);
            exit(); // Dùng exit() để ngăn các dòng code bên dưới không cho chạy (tránh xảy ra lỗi không mong muốn)
        }
        return false;
    }
}

$messages = [
    1 => 'Thêm thành công.',
    2 => 'Sửa thành công.',
    3 => 'Xoá thành công.',
];

if (!function_exists('get_message')) {
    function get_message($code)
    {
        global $messages;
        if (array_key_exists($code, $messages)) {
            return $messages[$code];
        }
        return false;
    }
}

if (!function_exists('make_tick')) {
    function make_tick($value = null)
    {
        $GETLanguages = null;

        if (empty($value)) return false;

        if (!empty($_GET['languages'])) {
            $GETLanguages = $_GET['languages'];
        }

        if (!empty($_POST['languages']) && in_array($value, $_POST['languages'])) {
            return 'checked';
        }

        if (!empty($GETLanguages) && in_array($value, $GETLanguages)) {
            return 'checked';
        }

        return false;
    }
}
