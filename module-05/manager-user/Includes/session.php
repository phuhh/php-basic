<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Viết các hàm liên quan session
// Tạo Session
function setSession($key, $value)
{
    if (!empty(session_id())) {
        $_SESSION[$key] = $value;
        return true;
    }
    return false;
}
// Lấy Session
function getSession($key = '')
{
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    }

    if (empty($key)) {
        return $_SESSION;
    }

    return false;
}
// Xoá Session
function removeSession($key = '')
{
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
        return true;
    }

    if (empty($key)) {
        session_destroy();
        return true;
    }

    return false;
}
// Trong Session có 1 khái niệm là flash Data. Mục đích dùng session chỉ 1 lần xong rồi xoá.
// Trường hợp dùng: Hiển thị thông báo lỗi, thành công, dữ liệu cũ,...
// Tạo Flash Data
function setFlashData($key, $value)
{
    $keyFlash = 'flash_' . $key;
    return setSession($keyFlash, $value);
}
// Lấy Flash Data
function getFlashData($key)
{
    $keyFlash = 'flash_' . $key;
    $data = getSession($keyFlash);
    removeSession($keyFlash);
    return $data;
}
// lưu ý: khi dùng flash data cần lưu vào 1 biến 
