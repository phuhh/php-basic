<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Thêm mới người dùng

$data['pageTitle'] = 'Thêm mới nhóm người dùng';

loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);

if (isPost()) {
    // Validation Form
    $body = getBody();
    $validationErrors = [];

    if (empty(trim($body['group_name']))) {
        $validationErrors['group_name']['required'] = 'Bắt buộc phải nhập.';
    } else {
        $groupName = trim($body['group_name']);
        $sql = "SELECT * FROM radix_groups WHERE group_name = '$groupName'";
        if (getRowCount($sql) > 0) {
            $validationErrors['group_name']['unique'] = 'Tên nhóm đã tồn tại.';
        }
    }

    // Processing
    if (empty($validationErrors)) {
        $data = [
            'group_name' => trim($body['group_name']),
            'group_create_at' => date('Y-m-d H:i:s')
        ];

        $insertStatus = create('radix_groups', $data);

        if ($insertStatus) {
            setFlashData('msg', 'Thêm mới nhóm người dùng thành công.');
            setFlashData('msg_type', 'success');
        } else {
            setFlashData('msg', 'Lỗi hệ thống. Vui lòng liên hệ quản trị viên.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng kiểm tra dữ liệu nhập.');
        setFlashData('msg_type', 'danger');
        setFlashData('validation_errors', $validationErrors);
        setFlashData('old', $body);
    }
    //Result
    redirect('/admin/?module=group&action=create');
}


$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$validationErrors = getFlashData('validation_errors');
$old = getFlashData('old');

?>

<div class="container mt-3">
    <?= showMessage($msg, $msgType) ?>
    <form action="" method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="group_name">Tên Nhóm:</label>
                    <input type="text" name="group_name" class="form-control" placeholder="Nhập tên nhóm..." value="<?= old('group_name') ?>" tabindex='1'>
                    <?= formError('group_name'); ?>
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary" tabindex='2'>Tạo Mới</button>
        <a href="<?= getLinkAdmin('group') ?>" class="btn btn-outline-secondary" tabindex='3'>Quay Lại</a>
    </form>
</div>

<?php loadLayout('footer'); ?>