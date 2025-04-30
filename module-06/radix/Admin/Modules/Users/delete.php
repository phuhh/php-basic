<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Xoá người dùng
// Lưu ý:
// 1. Tài khoản đang đăng nhập không hiển thị nút xóa chính mình
// 2. Các bài viết liên quan người dùng bị xóa
// 2.1. Xóa các bài viết liên quan
// 2.2. Chuyển các bài viết sang 1 tài khoản khác
$body = getBody();

if (!empty($body['id'])) {
    if ($body['id'] != isLogin()) {
        $user = first('radix_users', "user_id = {$body['id']}");
        if (!empty($user)) {
            $delete_login_token = delete('radix_login_token', "user_id = {$user['user_id']}");
            $delete_user = delete('radix_users', "user_id = {$user['user_id']}");
            if ($delete_login_token && $delete_user) {
                setFlashData('msg', 'Xoá người dùng thành công.');
                setFlashData('msg_type', 'warning');
            } else {
                setFlashData('msg', 'Lỗi hệ thống.');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Người dùng không tồn tại.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Xóa chính mình không được.');
        setFlashData('msg_type', 'danger');
    }
} else {
    setFlashData('msg', 'Liên kết không tồn tại.');
    setFlashData('msg_type', 'danger');
}
redirect('/admin?module=users');
