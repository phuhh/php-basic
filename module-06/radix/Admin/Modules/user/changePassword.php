<?php
$data = [
    'pageTitle' => 'Thay đổi mật khẩu'
];
loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);

$userID = isLogin();
$userInfo = getUserInfo();

if (isPost()) {
    // Validation Form
    $body = getBody();
    $validationErrors = [];

    if (empty(trim($body['old_password']))) {
        $validationErrors['old_password']['required'] = 'Bắt buộc phải nhập.';
    } else if (strlen(trim($body['old_password'])) < 8) {
        $validationErrors['old_password']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    } else if (!password_verify($body['old_password'], $userInfo['user_password'])) {
        $validationErrors['old_password']['match'] = 'Mật khẩu không chính xác.';
    }

    if (empty(trim($body['new_password']))) {
        $validationErrors['new_password']['required'] = 'Bắt buộc phải nhập.';
    } else if (strlen(trim($body['new_password'])) < 8) {
        $validationErrors['new_password']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    }

    if (empty(trim($body['renew_password']))) {
        $validationErrors['renew_password']['required'] = 'Bắt buộc phải nhập.';
    } else if (trim($body['new_password']) !== trim($body['renew_password'])) {
        $validationErrors['renew_password']['match'] = 'Mật khẩu không trùng khớp.';
    }

    if (empty($validationErrors)) {
        $data = [
            'user_password' => password_hash(trim($body['new_password']), PASSWORD_DEFAULT),
            'user_update_at' => date('Y-m-d H:i:s')
        ];

        // Cập nhật dữ liệu vào csdl
        $update_status = update('radix_users', $data, "user_id = {$userID}");

        if ($update_status) {
            setFlashData('msg', 'Chúc mừng bạn đã thay đổi mật khẩu thành công.');
            setFlashData('msg_type', 'success');

            // Gửi thư thông báo thay đổi mật khẩu thành công
            $subject = $userInfo['user_fullname'] . ' đã thay đổi mật khẩu thành công';
            $content = '<p>Chào bạn: <b>' . $userInfo['user_fullname'] . '</b></p>';
            $content .= '<p>Chúc mừng bạn đã đổi mới mật khẩu thành công. Hiện tại bạn có thể đăng nhập với mật khẩu mới </p>';
            $content .= '<p>Nếu không phải bạn thay đổi, vui lòng liên hệ ngay với chúng tôi </p>';
            $content .= '<p>Trân trọng !</p>';

            sendMail($userInfo['user_email'], $subject, $content);

            // Chuyển hướng về đăng nhập lại
            delete('radix_login_token', 'user_id = ' . $userID);
            removeSession('login_token');
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

    redirect('/admin/?module=user&action=changePassword');
}

// lưu ý: khi dùng flash data cần lưu vào 1 biến 
$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$validationErrors = getFlashData('validation_errors');
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <form action="" method="post">
            <?php echo showMessage($msg, $msgType) ?>
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="old_password">Mật khẩu cũ:</label>
                        <input type="password" name="old_password" class="form-control" placeholder="Nhập mật khẩu cũ...">
                        <?= formError('old_password'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="new_password">Mật khẩu mới:</label>
                        <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới...">
                        <?= formError('new_password'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="form-group">
                        <label for="renew_password">Nhập lại mật khẩu mới:</label>
                        <input type="password" name="renew_password" class="form-control" placeholder="Nhập lại mật khẩu mới...">
                        <?= formError('renew_password'); ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 offset-3 text-center">
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
