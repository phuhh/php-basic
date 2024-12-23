<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Chức năng kích hoạt tài khoản
// Sau khi đăng ký --> hệ thống sẽ gửi vào mail đường dẫn xác nhận
// Nhấn vào đường dẫn sẽ kiểm tra token có hợp lệ không --> hợp lệ --> kích hoạt thành công
$msg = null;
$msg_type = null;

if (isLogin()) {
    redirect('?module=users&action=lists');
}

$data = [
    'pageTitle' => 'Kích Hoạt Tài khoản'
];
// Load Template Login
loadLayout('header_login', $data);

$body = getBody();
$active_token = $body['token'];
// Kiểm tra token tồn tại hay không ???
if (!empty($active_token)) {
    // Lấy ra người dùng từ activeToken
    $user = first('Users', 'ID, Email', "ActiveToken='{$active_token}'");
    if (!empty($user)) {
        // Kích hoạt tài khoản - Cập nhật dữ liệu người dùng
        $user_id = $user['ID'];
        $user_email = $user['Email'];

        $data = [
            'ActiveToken' => null,
            'Status' => 1,
            'UpdateAt' => date('Y-m-d H:i:s')
        ];
        $update_status = update('Users', $data, "ID = {$user_id}");

        if ($update_status) {
            // Gửi mail thông báo đăng ký thành công
            $login_link = _WEB_HOST_ROOT . '?module=auth&action=login';
            $subject = 'Kích hoạt tài khoản thành công';
            $content = 'Chúc mừng bạn. Tài khoản <b>' . $user_email . '</b> đã kích hoạt thành công.<br>';
            $content .= 'Bạn có thể đăng nhập tại đường dẫn sau: ' . $login_link . '<br>';
            $content .= 'Trân trọng.';
            sendMail($user_email, $subject, $content);

            setFlashData('msg', 'Kích hoạt tài khoản thành công. Bạn có thể đăng nhập hệ thống');
            setFlashData('msg_type', 'success');
            redirect('?module=auth&action=login');
        } else {
            setFlashData('msg', 'Lỗi hệ thống. Vui lòng liên hệ quản trị viên');
            setFlashData('msg_type', 'danger');
        }
    } else {
        setFlashData('msg', 'Liên kết không tôn tại hoặc đã hết hạn');
        setFlashData('msg_type', 'danger');
    }
} else {
    setFlashData('msg', 'Liên kết không tôn tại hoặc đã hết hạn');
    setFlashData('msg_type', 'danger');
}

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
?>

<div class="container text-center">
    <br>
    <?= showMessage($msg, $msg_type) ?>
</div>

<?php loadLayout('footer_login'); ?>