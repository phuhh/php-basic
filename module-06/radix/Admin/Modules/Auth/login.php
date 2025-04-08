<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đăng nhập hệ thống
$msg = null;
$msg_type = null;

if (isLogin()) {
    redirect('/admin');
}

$data = [
    'pageTitle' => 'Đăng Nhập Hệ Thống'
];
loadLayout('header_login', $data, true);

if (isPost()) {
    $body = getBody();
    $validation_errors = [];

    $input_email = isset($body['email']) ? trim($body['email']) : false;
    $input_password = isset($body['pass']) ? trim($body['pass']) : false;
    // Check Validation
    if (empty($input_email)) {
        $validation_errors['email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail($input_email)) {
        $validation_errors['email']['isEmail'] = 'Định dạng không đúng.';
    }

    if (empty($input_password)) {
        $validation_errors['pass']['required'] = 'Bắt buộc phải nhập.';
    } else if (strlen($input_password) < 8) {
        $validation_errors['pass']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    }

    if (empty($validation_errors)) {
        // Check login
        $user = first('radix_users', "user_email = '{$input_email}' AND user_status = 1", 'user_id, user_password');
        // Check Email
        if (!empty($user)) {
            $user_id = $user['user_id'];
            $user_password = $user['user_password'];
            // Check Password
            if (password_verify($input_password, $user_password)) {
                $login_token = sha1(uniqid() . time());
                $data = [
                    'user_id' => $user_id,
                    'token_string' => $login_token,
                    'token_create_at' => date('Y-m-d h:i:s')
                ];
                // Insert Login Token and Set Session Token
                $insert_status = create('radix_login_token', $data);
                if ($insert_status) {
                    //Set token session
                    setSession('login_token', $login_token);
                    // Sau khi đăng nhập thành công điều hướng về ???
                    redirect('/admin');
                } else {
                    setFlashData('msg', 'Lỗi hệ thống. Bạn không thể đăng nhập lúc này.');
                    setFlashData('msg_type', 'danger');
                }
            } else {
                setFlashData('msg', 'Tài khoản hoặc mật khẩu không hợp lệ.');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Tài khoản chưa kích hoạt hoặc không tồn tại.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('validation_errors', $validation_errors);
        setFlashData('old', $body);
    }
    redirect('admin/?module=auth&action=login');
}

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
$validation_errors = getFlashData('validation_errors');
?>

<div class="container">
    <div class="row">
        <div class="col-6" style="margin: 20px auto;">
            <h3 class="text-center text-uppercase">Đăng Nhập</h3>
            <?= showMessage($msg, $msg_type) ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập email..." value="<?= old('email') ?>">
                    <?= formError('email'); ?>
                </div>
                <div class="form-group">
                    <label for="pass">Mật Khẩu:</label>
                    <input type="password" name="pass" class="form-control" placeholder="Nhập mật khẩu...">
                    <?= formError('pass'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                <hr>
                <p class="text-center"><a href="<?= _ADMIN_HOST_ROOT ?>?module=auth&action=forgot">Quên Mật Khẩu</a></p>
                <p class="text-center"><a href="<?= _ADMIN_HOST_ROOT ?>?module=auth&action=register">Đăng Ký Tài Khoản</a></p>
            </form>
        </div>
    </div>
</div>


<?php loadLayout('footer_login', null, true); ?>