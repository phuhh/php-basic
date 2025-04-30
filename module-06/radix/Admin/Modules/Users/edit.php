<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

$data['pageTitle'] = 'Chỉnh sửa người dùng';

loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);

if (isGet()) {
    $body = getBody();

    if (!empty($body['id'])) {
        $user = first('radix_users', "user_id = {$body['id']}");
        if (!empty($user)) {
            setFlashData('oldData', $user);
        } else {
            setFlashData('msg', 'Người dùng không tồn tại.');
            setFlashData('msg_type', 'danger');
            redirect('/admin?module=users');
        }
    } else {
        setFlashData('msg', 'Liên kết không tồn tại.');
        setFlashData('msg_type', 'danger');
        redirect('/admin?module=users');
    }
}

if (isPost()) {

    $body = getBody();
    $validationErrors = [];

    if (empty(trim($body['user_fullname']))) {
        $validationErrors['user_fullname']['required'] = 'Bắt buộc phải nhập.';
    } else if (mb_strlen($body['user_fullname']) < 6) {
        $validationErrors['user_fullname']['min'] = 'Độ dài tối thiểu 6 ký tự.';
    }

    if (empty(trim($body['group_id']))) {
        $validationErrors['group_id']['required'] = 'Bắt buộc phải nhập.';
    }

    if (empty(trim($body['user_email']))) {
        $validationErrors['user_email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail(trim($body['user_email']))) {
        $validationErrors['user_email']['isEmail'] = 'Định dạng không đúng.';
    } else {
        $user_email = trim($body['user_email']);
        $sql = "SELECT * FROM radix_users WHERE user_email = '$user_email' AND user_id <> {$body['user_id']}";
        if (getRowCount($sql) > 0) {
            $validationErrors['user_email']['unique'] = 'user_email đã tồn tại.';
        }
    }

    // Trường password không phải bắt buộc,
    // Validation RePassword: bắt buộc nhập, trùng khớp password
    if (!empty(trim($body['Password']))) {
        if (empty(trim($body['ConfirmPassword']))) {
            $validationErrors['ConfirmPassword']['required'] = 'Bắt buộc phải nhập.';
        } else if (trim($body['Password']) !== trim($body['ConfirmPassword'])) {
            $validationErrors['ConfirmPassword']['match'] = 'Password không trùng khớp.';
        }
    }

    if (empty($validationErrors)) {
        $data = [
            'user_email' => trim($body['user_email']),
            'user_fullname' => mb_strtoupper(trim($body['user_fullname'])),
            'group_id' => trim($body['group_id']),
            'user_status' => trim($body['user_status']),
            'user_update_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($body['Password'])) {
            $data['Password'] = password_hash(trim($body['Password']), PASSWORD_DEFAULT);
        }

        // Thêm tài khoản
        $update_status = update('radix_users', $data, "user_id = {$body['user_id']}");

        if ($update_status) {
            setFlashData('msg', 'Cập nhật người dùng thành công.');
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
    redirect('/admin?module=users&action=edit&id=' . $body['user_id'],);
}

$sql = 'SELECT group_id, group_name FROM radix_groups';
$groups = getRaw($sql);

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$validationErrors = getFlashData('validation_errors');
$old = getFlashData('old');
$oldData = getFlashData('oldData');

if (!empty($oldData))
    $old = $oldData;

?>

<div class="container mt-3">
    <?= showMessage($msg, $msgType) ?>
    <hr>
    <form action="" method="post">
        <input type="hidden" name="user_id" value="<?= old('user_id') ?>">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="user_email">Email:</label>
                    <input type="text" name="user_email" class="form-control" placeholder="Nhập email..." value="<?= old('user_email') ?>" tabindex='1'>
                    <?= formError('user_email'); ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="Password">Mật Khẩu:</label>
                    <input type="password" name="Password" class="form-control" placeholder="Nhập mật khẩu..." tabindex='4'>
                    <?= formError('Password'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="user_fullname">Họ Tên:</label>
                    <input type="text" name="user_fullname" class="form-control" placeholder="Nhập họ tên..." value="<?= old('user_fullname') ?>" tabindex='2'>
                    <?= formError('user_fullname'); ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="ConfirmPassword">Nhập Lại Mật Khẩu:</label>
                    <input type="password" name="ConfirmPassword" class="form-control" placeholder="Nhập lại mật khẩu..." tabindex='5'>
                    <?= formError('ConfirmPassword'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="group_id">Trạng Thái:</label>
                    <select name="group_id" class="form-control" tabindex='3'>
                        <option value="">Chọn Nhóm</option>
                        <?php
                        if (!empty($groups)):
                            foreach ($groups as $group):
                                $selected = $group['group_id'] == old('group_id') ? 'selected' : '';
                        ?>
                                <option value="<?= $group['group_id'] ?>" <?= $selected ?>><?= $group['group_name'] ?></option>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                    <?= formError('group_id'); ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="user_status">Trạng Thái:</label>
                    <select name="user_status" class="form-control" tabindex='6'>
                        <option value="0" <?= old('user_status') == 0 ? 'selected' : false ?>>Chưa kích hoạt</option>
                        <option value="1" <?= old('user_status') == 1 ? 'selected' : false ?>>Kích hoạt</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary" tabindex='7'>Cập Nhật</button>
        <a href="<?= getLinkAdmin('users') ?>" class="btn btn-outline-secondary" tabindex='8'>Quay Lại</a>
    </form>
</div>

<?php loadLayout('footer'); ?>