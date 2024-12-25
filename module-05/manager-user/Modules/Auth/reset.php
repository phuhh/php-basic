<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đặt lại mật khẩu
// Nhận được mail reset password người nhấn vô link để nhập mật khẩu mới.

$msg = null;
$msg_type = null;
$render_form = false;
$validation_errors = null;

if (isLogin()) {
    redirect('?module=users&action=lists');
}

$data = [
    'pageTitle' => 'Tạo mật khẩu mới'
];
// Load Template Login
loadLayout('header_login', $data);

$body = getBody();
$forgot_token = isGet() ? $body['token'] : null;
// Kiểm tra token tồn tại hay không ???
if (!empty($forgot_token)) {
    // Lấy ra người dùng từ activeToken
    $user = getRowCount("SELECT ID FROM Users WHERE ForgotToken='{$forgot_token}'");
    if (!empty($user)) {
        $render_form = true;
    } else {
        setFlashData('msg', 'Liên kết không tôn tại hoặc đã hết hạn');
        setFlashData('msg_type', 'danger');
    }
} else {
    setFlashData('msg', 'Liên kết không tôn tại hoặc đã hết hạn');
    setFlashData('msg_type', 'danger');
}

if (isPost()) {
    $body = getBody();
    $input_token = $body['forgot_token'];

    if (empty(trim($body['pass']))) {
        $validation_errors['pass']['required'] = 'Bắt buộc phải nhập.';
    } else if (strlen(trim($body['pass'])) < 8) {
        $validation_errors['pass']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    }
    if (empty(trim($body['repass']))) {
        $validation_errors['repass']['required'] = 'Bắt buộc phải nhập.';
    } else if (trim($body['pass']) !== trim($body['repass'])) {
        $validation_errors['repass']['match'] = 'Password không trùng khớp.';
    }

    if (empty($validation_errors)) {
        $user = first('Users', 'ID, Email', "ForgotToken='{$input_token}'");
        if (!empty($user)) {
            $user_id = $user['ID'];
            $user_email = $user['Email'];
            $password_hash = password_hash($body['pass'], PASSWORD_DEFAULT);

            $data = [
                'Password' => $password_hash,
                'ForgotToken' => null,
                'UpdateAt' => date('Y-m-d H:i:s')
            ];
            // Cập nhật mật khẩu mới
            $update_status = update('Users', $data, "ID = {$user_id}");
            if (!empty($update_status)) {
                setFlashData('msg', 'Thay đổi mật khẩu thành công.');
                setFlashData('msg_type', 'success');

                // Gửi thư thông báo thay đổi mật khẩu thành công
                $subject = 'Thông báo: Bạn đã thay đổi mật khẩu';
                $content = 'Chúc mừng bạn đã đổi mới mật khẩu thành công!';
                sendMail($user_email, $subject, $content);

                redirect('?module=auth&action=login');
            } else {
                setFlashData('msg', 'Lỗi hệ thống. Vui lòng liên hệ quản trị viên để hỗ trợ.');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Liên kết không tôn tại hoặc đã hết hạn.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng kiểm tra dữ liệu nhập.');
        setFlashData('msg_type', 'danger');
        setFlashData('validation_errors', $validation_errors);
    }

    redirect('?module=auth&action=reset&token=' . $input_token);
}

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
$validation_errors = getFlashData('validation_errors');
?>

<?php if ($render_form): ?>
    <div class="container">
        <div class="row">
            <div class="col-6" style="margin: 20px auto;">
                <h3 class="text-center text-uppercase"><?= $data['pageTitle'] ?></h3>
                <?= showMessage($msg, $msg_type) ?>
                <form action="" method="post">
                    <input type="hidden" name="forgot_token" value="<?= $forgot_token ?>">
                    <div class="form-group">
                        <label for="pass">Mật khẩu:</label>
                        <input type="password" name="pass" class="form-control" placeholder="Nhập mật khẩu mới...">
                        <?= formError('pass'); ?>
                    </div>
                    <div class="form-group">
                        <label for="repass">Nhập lại mật khẩu:</label>
                        <input type="password" name="repass" class="form-control" placeholder="Nhập lại mật khẩu mới...">
                        <?= formError('repass'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Tạo mới</button>
                    <hr>
                    <p class="text-center"><a href="?module=auth&action=login">Đăng Nhập</a></p>
                </form>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container text-center">
        <br>
        <?= showMessage($msg, $msg_type) ?>
    </div>
<?php endif; ?>

<?php loadLayout('footer_login'); ?>