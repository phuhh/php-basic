<?php
$data = [
    'pageTitle' => 'Thông tin hồ sơ'
];
loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);

if (!isLogin()) {
    redirect('/admin/?module=auth&action=login');
}

$userID = isLogin();
$oldUser = getUserInfo();

if (isPost()) {
    // Validation Form
    $body = getBody(); // Lấy ra dữ liệu từ trong from
    $validationErrors = []; // Lưu trữ các lỗi
    // Validation Họ Tên: bắt buộc nhập, ít nhất 6 tự ký
    if (empty(trim($body['user_fullname']))) {
        $validationErrors['user_fullname']['required'] = 'Bắt buộc phải nhập.';
    } else if (mb_strlen($body['user_fullname']) < 6) {
        $validationErrors['user_fullname']['min'] = 'Độ dài tối thiểu 6 ký tự.';
    }
    // Validation Email: bắt buộc nhập, đúng định dạng email, email tuyệt đối
    if (empty(trim($body['user_email']))) {
        $validationErrors['user_email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail(trim($body['user_email']))) {
        $validationErrors['user_email']['isEmail'] = 'Định dạng không đúng.';
    } else {
        $email = trim($body['user_email']);
        $sql = "SELECT * FROM radix_users WHERE user_email = '{$email}' AND user_id <> {$userID}";
        if (getRowCount($sql) > 0) {
            $validationErrors['user_email']['unique'] = 'Email đã tồn tại.';
        }
    }

    if (empty($validationErrors)) {
        $data = [
            'user_fullname' => mb_strtoupper(trim($body['user_fullname'])),
            'user_email' => strtolower(trim($body['user_email'])),
            'user_about' => trim($body['user_about']),
            'user_contact_facebook' => strtolower(trim($body['user_contact_facebook'])),
            'user_contact_twitter' => strtolower(trim($body['user_contact_twitter'])),
            'user_contact_linkedin' => strtolower(trim($body['user_contact_linkedin'])),
            'user_contact_pinterest' => strtolower(trim($body['user_contact_pinterest'])),
            'user_update_at' => date('Y-m-d H:i:s')
        ];

        // Thêm tài khoản
        $update_status = update('radix_users', $data, "user_id = {$userID}");

        if ($update_status) {
            setFlashData('msg', 'Cập nhật hồ sơ thành công.');
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

    redirect('/admin/?module=user&action=profile');
}

// lưu ý: khi dùng flash data cần lưu vào 1 biến 
$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$validationErrors = getFlashData('validation_errors');
$old = getFlashData('old');

if (!empty($oldUser) && empty($old))
    $old = $oldUser;
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <form action="" method="post">
            <?php echo showMessage($msg, $msgType) ?>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="user_fullname">Họ Tên:</label>
                        <input type="text" name="user_fullname" class="form-control" placeholder="Nhập họ và tên..." value="<?= old('user_fullname') ?>">
                        <?= formError('user_fullname'); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="user_email">Email:</label>
                        <input type="text" name="user_email" class="form-control" placeholder="Nhập email..." value="<?= old('user_email') ?>">
                        <?= formError('user_email'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="user_contact_facebook">Facebook:</label>
                        <input type="text" name="user_contact_facebook" class="form-control" placeholder="Nhập Facebook..." value="<?= old('user_contact_facebook') ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="user_contact_twitter">Twitter:</label>
                        <input type="text" name="user_contact_twitter" class="form-control" placeholder="Nhập Twitter..." value="<?= old('user_contact_twitter') ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="user_contact_linkedin">LinkedIn:</label>
                        <input type="text" name="user_contact_linkedin" class="form-control" placeholder="Nhập LinkedIn..." value="<?= old('user_contact_linkedin') ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="user_contact_pinterest">Pinterest:</label>
                        <input type="text" name="user_contact_pinterest" class="form-control" placeholder="Nhập Pinterest..." value="<?= old('user_contact_pinterest') ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="from-group">
                        <label for="user_about">Giới thiệu cá nhân:</label>
                        <textarea name="user_about" class="form-control" rows="3" placeholder="Nhập giới thiệu cá nhân..."><?= old('user_about') ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-right">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </form>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php
loadLayout('footer', $data, true);
