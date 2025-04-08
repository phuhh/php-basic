<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng quên mật khẩu
// Hệ thống sẽ gửi mail đến địa chỉ người dùng để reset password
$msg = null;
$msg_type = null;
$validation_errors = null;

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
        $validation_errors['email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail(trim($body['email']))) {
        $validation_errors['email']['isEmail'] = 'Định dạng không đúng.';
    }

    if (empty($validation_errors)) {
        $input_email = $body['email'];
        // check email exists
        $user = first('radix_users', "user_email = '{$input_email}'", 'user_id');
        if (!empty($user)) {
            $user_id = $user['user_id'];
            // Tạo ra forgot token
            $forgot_token = sha1(uniqid() . time());
            $data = [
                'user_forgot_token' => $forgot_token,
                'user_update_at' => date('Y-m-d h:i:s')
            ];
            // update forgot token
            $update_status = update('radix_users', $data, "user_id = {$user_id}");
            if ($update_status) {
                $reset_link = _ADMIN_HOST_ROOT . '?module=auth&action=reset&token=' . $forgot_token;
                $subject = 'Khôi phục mật khẩu';
                $content = 'Chào bạn, <b>' . $input_email . '</b><br>';
                $content .= 'Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn. Vui lòng nhấn vào đường dẫn sau để khôi phục: ';
                $content .= $reset_link;

                // Gửi mail tạo ra đường dẫn đặt lại mật khẩu
                $send_mail = sendMail($input_email, $subject, $content);
                if ($send_mail) {
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
        setFlashData('validation_errors', $validation_errors);
        setFlashData('old', $old);
    }
    redirect('/admin/?module=auth&action=forgot');
}

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
$validation_errors = getFlashData('validation_errors');
$old = getFlashData('old');
?>

<div class="container">
    <div class="row">
        <div class="col-6" style="margin: 20px auto;">
            <h3 class="text-center text-uppercase">Quên Mật Khẩu</h3>
            <?= showMessage($msg, $msg_type) ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập email..." value="<?= old('email') ?>">
                    <?= formError('email'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Gửi Yêu Cầu</button>
                <hr>
                <p class="text-center"><a href="<?= _ADMIN_HOST_ROOT ?>?module=auth&action=login">Đăng Nhập</a></p>
            </form>
        </div>
    </div>
</div>

<?php loadLayout('footer_login', null, true); ?>