<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

$data['pageTitle'] = 'Thêm mới người dùng';

loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);

if (isPost()) {
    $body = getBody();
    $validationErrors = [];

    if (empty(trim($body['user_fullname']))) {
        $validationErrors['user_fullname']['required'] = 'Bắt buộc phải nhập.';
    } else if (mb_strlen($body['user_fullname']) < 6) {
        $validationErrors['user_fullname']['min'] = 'Độ dài tối thiểu 6 ký tự.';
    }

    if (empty(trim($body['group_id']))) {
        $validationErrors['group_id']['required'] = 'Bắt buộc phải chọn.';
    }

    if (empty(trim($body['user_email']))) {
        $validationErrors['user_email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail(trim($body['user_email']))) {
        $validationErrors['user_email']['isEmail'] = 'Định dạng không đúng.';
    } else {
        $user_email = trim($body['user_email']);
        $sql = "SELECT user_id FROM radix_users WHERE user_email = '$user_email'";
        if (getRowCount($sql) > 0) {
            $validationErrors['user_email']['unique'] = 'Email đã tồn tại.';
        }
    }

    if (empty(trim($body['user_password']))) {
        $validationErrors['user_password']['required'] = 'Bắt buộc phải nhập.';
    } else if (strlen(trim($body['user_password'])) < 8) {
        $validationErrors['user_password']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    }

    if (empty(trim($body['user_confirm_password']))) {
        $validationErrors['user_confirm_password']['required'] = 'Bắt buộc phải nhập.';
    } else if (trim($body['user_password']) !== trim($body['user_confirm_password'])) {
        $validationErrors['user_confirm_password']['match'] = 'Password không trùng khớp.';
    }

    if (empty($validationErrors)) {
        $data = [
            'user_email' => trim($body['user_email']),
            'user_password' => password_hash(trim($body['user_password']), PASSWORD_DEFAULT),
            'user_fullname' => mb_strtoupper(trim($body['user_fullname'])),
            'group_id' => trim($body['group_id']),
            'user_status' => trim($body['user_status']),
            'user_create_at' => date('Y-m-d H:i:s')
        ];

        $insertStatus = create('radix_users', $data);

        if ($insertStatus) {
            setFlashData('msg', 'Thêm mới người dùng thành công.');
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
    redirect('/admin?module=users&action=create');
}

$sql = 'SELECT group_id, group_name FROM radix_groups';
$groups = getRaw($sql);

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$validationErrors = getFlashData('validation_errors');
$old = getFlashData('old');

?>

<div class="container mt-3">
    <form action="" method="post">
        <?= showMessage($msg, $msgType) ?>
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
                    <label for="user_password">Mật Khẩu:</label>
                    <input type="password" name="user_password" class="form-control" placeholder="Nhập mật khẩu..." tabindex='4'>
                    <?= formError('user_password'); ?>
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
                    <label for="user_confirm_password">Nhập Lại Mật Khẩu:</label>
                    <input type="password" name="user_confirm_password" class="form-control" placeholder="Nhập lại mật khẩu..." tabindex='5'>
                    <?= formError('user_confirm_password'); ?>
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
        <button type="submit" class="btn btn-primary" tabindex='7'>Tạo Mới</button>
        <a href="<?= getLinkAdmin('users') ?>" class="btn btn-outline-secondary" tabindex='8'>Quay Lại</a>
    </form>
</div>

<?php loadLayout('footer'); ?>