<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng đăng ký hệ thống
$data = [
    'pageTitle' => 'Đăng Ký Tài Khoản'
];

loadLayout('header_login', $data);
// Kiểm tra phương thức POST không
if (isPost()) {
    // Validation Form
    $body = getBody(); // Lấy ra dữ liệu từ trong from
    $validation_errors = []; // Lưu trữ các lỗi
    // Validation Họ Tên: bắt buộc nhập, ít nhất 6 tự ký
    if (empty(trim($body['fullname']))) {
        $validation_errors['fullname']['required'] = 'Bắt buộc phải nhập.';
    } else if (mb_strlen($body['fullname']) < 6) {
        $validation_errors['fullname']['min'] = 'Độ dài tối thiểu 6 ký tự.';
    }
    // Validation SĐT: bắt buộc nhập, đúng định dạng SĐT 10 số (bắt đầu bằng số 0)
    if (empty(trim($body['phone']))) {
        $validation_errors['phone']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isPhone(trim($body['phone']))) {
        $validation_errors['phone']['isPhone'] = 'Định dạng không đúng.';
    }
    // Validation Email: bắt buộc nhập, đúng định dạng email, email tuyệt đốis
    if (empty(trim($body['email']))) {
        $validation_errors['email']['required'] = 'Bắt buộc phải nhập.';
    } else if (!isEmail(trim($body['email']))) {
        $validation_errors['email']['isEmail'] = 'Định dạng không đúng.';
    } else {
        $email = trim($body['email']);
        $sql = "SELECT * FROM Users WHERE Email = '{$email}'";
        if (getRowCount($sql) > 0) {
            $validation_errors['email']['unique'] = 'Email đã tồn tại.';
        }
    }
    // Validation Password: bắt buộc nhập, ít nhất 8 ký tự
    if (empty(trim($body['pass']))) {
        $validation_errors['pass']['required'] = 'Bắt buộc phải nhập.';
    } else if (strlen(trim($body['pass'])) < 8) {
        $validation_errors['pass']['min'] = 'Độ dài tối thiểu 8 ký tự.';
    }
    // Validation RePassword: bắt buộc nhập, trùng khớp password
    if (empty(trim($body['repass']))) {
        $validation_errors['repass']['required'] = 'Bắt buộc phải nhập.';
    } else if (trim($body['pass']) !== trim($body['repass'])) {
        $validation_errors['repass']['match'] = 'Password không trùng khớp.';
    }

    if (empty($validation_errors)) {
        // Tạo active token
        $active_token = sha1(uniqid() . time());
        $data = [
            'Email' => $body['email'],
            'Password' => password_hash($body['pass'], PASSWORD_DEFAULT),
            'FullName' => mb_strtoupper($body['fullname']),
            'Phone' => trim($body['phone']),
            'ActiveToken' => $active_token,
            'CreateAt' => date('Y-m-d H:i:s')
        ];
        // Thêm tài khoản
        $insert_status = create('Users', $data);

        if ($insert_status) {
            setFlashData('msg', 'Đăng ký thành công.');
            setFlashData('msg_type', 'success');

            // Gửi mail khi thành công đăng ký
            $active_path = _WEB_HOST_ROOT . '?module=auth&action=active&token=' . $active_token;
            $subject = 'Kích hoạt tài khoản [Project: Manager User]';
            $content = 'Chào bạn: ' . $body['FullName'] . '<br>';
            $content .= 'Vui lòng nhấp vào đường dẫn dưới đây để kích hoạt tài khoản: <br>';
            $content .= $active_path . '<br>';
            $content .= 'Trân Trọng.';
            $send_status = sendMail($body['email'], $subject, $content);

            if ($send_status) {
                setFlashData('msg', 'Đăng ký thành công. Vui lòng kiểm tra email để kích hoạt tài khoản.');
                setFlashData('msg_type', 'success');
            }

            redirect('?module=auth&action=login');
        } else {
            setFlashData('msg', 'Lỗi hệ thống. Vui lòng liên hệ quản trị viên.');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Vui lòng kiểm tra dữ liệu nhập.');
        setFlashData('msg_type', 'danger');
        setFlashData('validation_errors', $validation_errors);
        setFlashData('old', $body);
    }
    redirect('?module=auth&action=register');
}
// lưu ý: khi dùng flash data cần lưu vào 1 biến 
$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
$validation_errors = getFlashData('validation_errors');
$old = getFlashData('old');

?>

<div class="container">
    <div class="row">
        <div class="col-6" style="margin: 20px auto;">
            <h3 class="text-center text-uppercase">Đăng Ký Tài Khoản</h3>
            <?= showMessage($msg, $msg_type) ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="fullname">Họ Tên:</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Nhập họ tên..." value="<?= old('fullname') ?>">
                    <?= formError('fullname'); ?>
                </div>
                <div class="form-group">
                    <label for="phone">SĐT:</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập sđt..." value="<?= old('phone') ?>">
                    <?= formError('phone'); ?>
                </div>
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
                <div class="form-group">
                    <label for="repass">Nhập Lại MK:</label>
                    <input type="password" name="repass" class="form-control" placeholder="Nhập lại mật khẩu...">
                    <?= formError('repass'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
                <hr>
                <p class="text-center"><a href="?module=auth&action=login">Đăng Nhập</a></p>
            </form>
        </div>
    </div>
</div>

<?php loadLayout('footer_login'); ?>