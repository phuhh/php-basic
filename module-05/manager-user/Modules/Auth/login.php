<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đăng nhập hệ thống
$msg = null;
$msg_type = null;

if (isLogin()) {
    redirect('?module=users&action=lists');
}

$data = [
    'pageTitle' => 'Đăng Nhập Hệ Thống'
];
loadLayout('header_login', $data);

if (isPost()) {
    $body = getBody();
    $validation_errors = [];
    // Check Validation
    if (empty(trim($body['email']))) {
        $validation_errors['email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail(trim($body['email']))) {
        $validation_errors['email']['isEmail'] = 'Định dạng không đúng.';
    }

    if (empty(trim($body['pass']))) {
        $validation_errors['pass']['required'] = 'Bắt buộc phải nhập.';
    } else if (strlen(trim($body['pass'])) < 8) {
        $validation_errors['pass']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    }

    if (empty($validation_errors)) {
        // Check login
        $user = first('Users', 'ID, Password', "Email = '{$body['email']}'");
        // Check Email
        if (!empty($user)) {
            $user_id = $user['ID'];
            $user_password = $user['Password'];
            // Check Password
            if (password_verify($body['pass'], $user_password)) {
                $login_token = sha1(uniqid() . time());
                $data = [
                    'UserID' => $user_id,
                    'Token' => $login_token,
                    'CreateAt' => date('Y-m-d h:i:s')
                ];
                // Insert Login Token and Set Session Token
                $insert_status = create('LoginToken', $data);
                if ($insert_status) {
                    //Set token session
                    setSession('login_token', $login_token);

                    redirect('?module=users');
                } else {
                    setFlashData('msg', 'Lỗi hệ thống. Bạn không thể đăng nhập lúc này.');
                    setFlashData('msg_type', 'danger');
                }
            } else {
                setFlashData('msg', 'Tài khoản hoặc mật khẩu không hợp lệ.');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Tài khoản hoặc mật khẩu không hợp lệ.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('validation_errors', $validation_errors);
        setFlashData('old', $body);
    }
    redirect('?module=auth&action=login');
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
                <p class="text-center"><a href="?module=auth&action=forgot">Quên Mật Khẩu</a></p>
                <p class="text-center"><a href="?module=auth&action=register">Đăng Ký Tài Khoản</a></p>
            </form>
        </div>
    </div>
</div>


<?php loadLayout('footer_login'); ?>