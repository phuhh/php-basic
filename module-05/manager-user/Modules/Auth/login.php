<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đăng nhập hệ thống
$msg = null;
$msgType = null;

if (isLogin()) {
    redirect('?module=users&action=lists');
}

$data = [
    'pageTitle' => 'Đăng Nhập Hệ Thống'
];
loadLayout('header_login', $data);

if (isPost()) {
    $body = getBody();
    $validationErrors = [];

    $inputEmail = isset($body['email']) ? trim($body['email']) : false;
    $inputPassword = isset($body['pass']) ? trim($body['pass']) : false;
    // Check Validation
    if (empty($inputEmail)) {
        $validationErrors['email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail($inputEmail)) {
        $validationErrors['email']['isEmail'] = 'Định dạng không đúng.';
    }

    if (empty($inputPassword)) {
        $validationErrors['pass']['required'] = 'Bắt buộc phải nhập.';
    } else if (strlen($inputPassword) < 8) {
        $validationErrors['pass']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    }

    if (empty($validationErrors)) {
        // Check login
        $user = first('Users', "Email = '{$inputEmail}' AND Status = 1", 'ID, Password');
        // Check Email
        if (!empty($user)) {
            $userID = $user['ID'];
            $userPassword = $user['Password'];
            // Check Password
            if (password_verify($inputPassword, $userPassword)) {
                $loginToken = sha1(uniqid() . time());
                $data = [
                    'UserID' => $userID,
                    'Token' => $loginToken,
                    'CreateAt' => date('Y-m-d h:i:s')
                ];
                // Insert Login Token and Set Session Token
                $insertStatus = create('LoginToken', $data);
                if ($insertStatus) {
                    //Set token session
                    setSession('login_token', $loginToken);

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
            setFlashData('msg', 'Tài khoản chưa kích hoạt hoặc không tồn tại.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('validation_errors', $validationErrors);
        setFlashData('old', $body);
    }
    redirect('?module=auth&action=login');
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
$validationErrors = getFlashData('validation_errors');
?>

<div class="container">
    <div class="row">
        <div class="col-6" style="margin: 20px auto;">
            <h3 class="text-center text-uppercase">Đăng Nhập</h3>
            <?= showMessage($msg, $msgType) ?>
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