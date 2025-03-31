<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Xoá người dùng
$body = getBody();
// Lấy ID từ phương thức GET
if (!empty($body['id'])) {
    $user = first('Users', "ID = {$body['id']}");
    if (!empty($user)) {
        $delete_login_token = delete('LoginToken', "UserID = {$user['ID']}");
        $delete_user = delete('Users', "ID = {$user['ID']}");
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
    setFlashData('msg', 'Liên kết không tồn tại.');
    setFlashData('msg_type', 'danger');
}
redirect('?module=users');
