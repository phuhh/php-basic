<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng quên mật khẩu
// Hệ thống sẽ gửi mail đến địa chỉ người dùng để reset password
$msg = null;
$msgType = null;
$validationErrors = null;

if (isLogin()) {
    redirect('/admin');
}

$data = [
    'pageTitle' => 'Quên Mật Khẩu'
];

loadLayout('header_login', $data, true);

if (isPost()) {
    $body = getBody();
    // validation
    if (empty(trim($body['email']))) {
        $validationErrors['email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail(trim($body['email']))) {
        $validationErrors['email']['isEmail'] = 'Định dạng không đúng.';
    }

    if (empty($validationErrors)) {
        $inputEmail = $body['email'];
        // check email exists
        $user = first('radix_users', "user_email = '{$inputEmail}'", 'user_id');
        if (!empty($user)) {
            $userID = $user['user_id'];
            // Tạo ra forgot token
            $forgotToken = sha1(uniqid() . time());
            $data = [
                'user_forgot_token' => $forgotToken,
                'user_update_at' => date('Y-m-d h:i:s')
            ];
            // update forgot token
            $update_status = update('radix_users', $data, "user_id = {$userID}");
            if ($update_status) {
                $resetLink = _ADMIN_HOST_ROOT . '?module=auth&action=reset&token=' . $forgotToken;
                $subject = 'Khôi phục mật khẩu';
                $content = 'Chào bạn, <b>' . $inputEmail . '</b><br>';
                $content .= 'Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn. Vui lòng nhấn vào đường dẫn sau để khôi phục: ';
                $content .= $resetLink;

                // Gửi mail tạo ra đường dẫn đặt lại mật khẩu
                $sendMail = sendMail($inputEmail, $subject, $content);
                if ($sendMail) {
                    setFlashData('msg', 'Vui lòng kiểm tra hộp thư, xem hướng dẫn đặt lại mật khẩu.');
                    setFlashData('msg_type', 'success');
                } else {
                    setFlashData('msg', 'Lỗi hệ thống. Vui lòng liên hệ quản trị để hỗ trợ.');
                    setFlashData('msg_type', 'danger');
                }
            } else {
                setFlashData('msg', 'Lỗi hệ thống. Vui lòng liên hệ quản trị để hỗ trợ.');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Email không tìm thấy. Vui lòng kiểm tra lại.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('validation_errors', $validationErrors);
        setFlashData('old', $old);
    }
    redirect('/admin/?module=auth&action=forgot');
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$validationErrors = getFlashData('validation_errors');
$old = getFlashData('old');
?>

<div class="container">
    <div class="row">
        <div class="col-6" style="margin: 20px auto;">
            <h3 class="text-center text-uppercase">Quên Mật Khẩu</h3>
            <?= showMessage($msg, $msgType) ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập email..." value="<?= old('email') ?>">
                    <?= formError('email'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Gửi Yêu Cầu</button>
                <hr>
                <p class="text-center"><a href="<?= getLinkAdmin('auth', 'login') ?>">Đăng Nhập</a></p>
            </form>
        </div>
    </div>
</div>

<?php loadLayout('footer_login', null, true); ?>