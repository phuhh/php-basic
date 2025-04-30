<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

$body = getBody();
// Lấy ID từ phương thức GET
if (!empty($body['id'])) {
    $oldData = first('radix_groups', "group_id = {$body['id']}");
    if (!empty($oldData)) {
        $deleteStatus = delete('radix_groups', "group_id = {$body['id']}");
        if ($deleteStatus) {
            setFlashData('msg', 'Xoá nhóm người dùng thành công.');
            setFlashData('msg_type', 'warning');
        } else {
            setFlashData('msg', 'Lỗi hệ thống.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Nhóm người dùng không tồn tại.');
        setFlashData('msg_type', 'danger');
    }
} else {
    setFlashData('msg', 'Liên kết không tồn tại.');
    setFlashData('msg_type', 'danger');
}
redirect('/admin?module=group');
