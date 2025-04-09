<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

// cập nhật người dùng
$data['pageTitle'] = 'Cập nhật người dùng';

loadLayout('header', $data);

if (isGet()) {
    $body = getBody();
    // Lấy ID từ phương thức GET
    if (!empty($body['id'])) {
        $user = first('Users', "ID = {$body['id']}");
        if (!empty($user)) {
            setFlashData('oldUser', $user);
        } else {
            setFlashData('msg', 'Người dùng không tồn tại.');
            setFlashData('msg_type', 'danger');
            redirect('?module=users');
        }
    } else {
        setFlashData('msg', 'Liên kết không tồn tại.');
        setFlashData('msg_type', 'danger');
        redirect('?module=users');
    }
}

if (isPost()) {
    // Validation Form
    $body = getBody(); // Lấy ra dữ liệu từ trong from
    $validationErrors = []; // Lưu trữ các lỗi
    // Validation Họ Tên: bắt buộc nhập, ít nhất 6 tự ký
    if (empty(trim($body['FullName']))) {
        $validationErrors['FullName']['required'] = 'Bắt buộc phải nhập.';
    } else if (mb_strlen($body['FullName']) < 6) {
        $validationErrors['FullName']['min'] = 'Độ dài tối thiểu 6 ký tự.';
    }
    // Validation SĐT: bắt buộc nhập, đúng định dạng SĐT 10 số (bắt đầu bằng số 0)
    if (empty(trim($body['Phone']))) {
        $validationErrors['Phone']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isPhone(trim($body['Phone']))) {
        $validationErrors['Phone']['isPhone'] = 'Định dạng không đúng.';
    }
    // Validation Email: bắt buộc nhập, đúng định dạng email, email tuyệt đối
    if (empty(trim($body['Email']))) {
        $validationErrors['Email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail(trim($body['Email']))) {
        $validationErrors['Email']['isEmail'] = 'Định dạng không đúng.';
    } else {
        $email = trim($body['Email']);
        $sql = "SELECT * FROM Users WHERE Email = '{$email}' AND ID <> {$body['ID']}";
        if (getRowCount($sql) > 0) {
            $validationErrors['Email']['unique'] = 'Email đã tồn tại.';
        }
    }
    // Validation Password: bắt buộc nhập, ít nhất 8 ký tự
    // if (empty(trim($body['Password']))) {
    //     $validationErrors['Password']['required'] = 'Bắt buộc phải nhập.';
    // } else if (strlen(trim($body['Password'])) < 8) {
    //     $validationErrors['Password']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    // }

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
            'Email' => trim($body['Email']),
            'FullName' => mb_strtoupper(trim($body['FullName'])),
            'Phone' => trim($body['Phone']),
            'Status' => trim($body['Status']),
            'UpdateAt' => date('Y-m-d H:i:s')
        ];

        if (!empty($body['Password'])) {
            $data['Password'] = password_hash(trim($body['Password']), PASSWORD_DEFAULT);
        }

        // Thêm tài khoản
        $update_status = update('Users', $data, "ID = {$body['ID']}");

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
    redirect('?module=users&action=edit&id=' . $body['ID'],);
}

// lưu ý: khi dùng flash data cần lưu vào 1 biến 
$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$validationErrors = getFlashData('validation_errors');
$old = getFlashData('old');
$oldUser = getFlashData('oldUser');

if (!empty($oldUser))
    $old = $oldUser;

?>

<div class="container mt-3">
    <?= showMessage($msg, $msgType) ?>
    <hr>
    <form action="" method="post">
        <h3><?= $data['pageTitle'] ?></h3>
        <input type="hidden" name="ID" value="<?= old('ID') ?>">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" class="form-control" placeholder="Nhập email..." value="<?= old('Email') ?>" tabindex='1'>
                    <?= formError('Email'); ?>
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
                    <label for="FullName">Họ Tên:</label>
                    <input type="text" name="FullName" class="form-control" placeholder="Nhập họ tên..." value="<?= old('FullName') ?>" tabindex='2'>
                    <?= formError('FullName'); ?>
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
                    <label for="Phone">SĐT:</label>
                    <input type="text" name="Phone" class="form-control" placeholder="Nhập sđt..." value="<?= old('Phone') ?>" tabindex='3'>
                    <?= formError('Phone'); ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="Status">Trạng Thái:</label>
                    <select name="Status" class="form-control" tabindex='6'>
                        <option value="0" <?= old('Status') == 0 ? 'selected' : false ?>>Chưa kích hoạt</option>
                        <option value="1" <?= old('Status') == 1 ? 'selected' : false ?>>Kích hoạt</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary" tabindex='7'>Cập Nhật</button>
        <a href="?module=users" class="btn btn-outline-secondary" tabindex='8'>Quay Lại</a>
    </form>
</div>

<?php loadLayout('footer'); ?>