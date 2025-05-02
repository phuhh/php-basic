<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Dùng để viết các hàm chung
// Hàm tải các thành phần trong Template 
function loadLayout($layoutName = 'header', $data = [], $isAdmin = false)
{
    $dir = '/';
    if ($isAdmin) {
        $dir = '/' . 'admin/';
    }
    if (file_exists(_WEB_PATH_TEMPLATES . $dir . 'layouts/' . $layoutName . '.php'))
        require_once _WEB_PATH_TEMPLATES . $dir . 'layouts/' . $layoutName . '.php';
}

// Hàm gửi mail
function sendMail($to, $subject, $body)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                         //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'phuhh2019@gmail.com';                  //SMTP username
        $mail->Password   = 'jewbntutbggovcxn';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->smtpConnect([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ]);
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('phuhh2019@gmail.com', 'Project Radix - PHP Basic');
        $mail->addAddress($to);     //Add a recipient
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


// Hàm xử lý Request
// Kiểm tra phức thức GET không
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        return true;
    }
    return false;
}
// Kiểm tra phức thức POST không
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return true;
    }
    return false;
}
// Lấy dữ liệu bằng GET hoặc POST
function getBody()
{
    $body = [];
    if (isGet()) {
        // Xử lý dữ liệu trước khi trả về
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                $key = strip_tags($key);
                // Cách 1
                // $body[$key] = htmlentities($value);

                // Cách 2
                if (is_array($value)) {
                    $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }

    if (isPost()) {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }

    return $body;
}
// Validation: Hàm kiểm tra định dạng Email
function isEmail($input)
{
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}
// Validation: Hàm kiểm tra số nguyên
function isNumberInt($input, $range = [])
{
    /**
     * $range = ['min_range' => 0, 'max_range' => 10]
     */
    if (!empty($range) && is_array($range)) {
        return filter_var($input, FILTER_VALIDATE_INT, [
            'options' => $range
        ]);
    }

    return filter_var($input, FILTER_VALIDATE_INT);
}
// Validation: Hàm kiểm tra số thực
function isNumberFloat($input, $range = [])
{
    if (!empty($range) && is_array($range)) {
        return filter_var($input, FILTER_VALIDATE_FLOAT, [
            'options' => $range
        ]);
    }

    return filter_var($input, FILTER_VALIDATE_FLOAT);
}
// Validation: Hàm kiểm tra số SĐT (bắt đầu = số 0, tổng 10 con số)
function isPhone($input)
{
    if (!empty($input)) {
        $checkFirstNumber = false;
        $checkLastNumbers = false;
        if ($input[0] === '0') {
            $checkFirstNumber = true;
            $lastNumbers = substr($input, 1);
        }

        if (isNumberInt($lastNumbers) && strlen($lastNumbers) === 9) {
            $checkLastNumbers = true;
        }

        if ($checkFirstNumber && $checkLastNumbers) {
            return true;
        }
    }
    return false;
}
// Điều hướng trang
function redirect($path = '/')
{
    header('Location: ' . _WEB_HOST_ROOT . $path);
    exit();
}
// Hiển thị thông báo chung
function showMessage($content, $type = 'danger')
{
    if (!empty($content)) {
        return '<div class="alert alert-' . $type . '">' . $content . '</div>';
    }
    return false;
}
// Hiển thị thông báo lỗi từng input
function formError($field_name)
{
    global $validationErrors;
    if (!empty($validationErrors[$field_name])) {
        return '<span class="error">' . reset($validationErrors[$field_name]) . '</span>';
    }
    return false;
}
// Hiển thị dữ liệu cũ
function old($field_name)
{
    global $old;
    return !empty($old[$field_name]) ? trim($old[$field_name]) : false;
}
// Kiểm tra đăng nhập
function isLogin()
{
    if (getSession('login_token')) {
        $token_string = getSession('login_token');
        // $count_record = getRowCount("SELECT user_id FROM radix_login_token WHERE token_string = '{$token_string}' ");

        $loginToken = first('radix_login_token', "token_string = '{$token_string}'", 'user_id');
        if ($loginToken['user_id'] > 0) {
            return $loginToken['user_id'];
        } else {
            removeSession('login_token');
        }
    }
    return false;
}

function getUserInfo()
{
    if (isLogin()) {
        $user = first('radix_users', 'user_id = ' . isLogin(), 'user_fullname, user_email, user_about, user_contact_facebook, user_contact_twitter, user_contact_linkedin, user_contact_pinterest, user_password');
        if (!empty($user)) {
            return $user;
        }
    }
    return false;
}

function getFullname()
{
    if (isLogin()) {
        $user = first('radix_users', 'user_id = ' . isLogin(), 'user_fullname');
        if (!empty($user)) {
            return $user['user_fullname'];
        }
    }
    return false;
}
// Cập nhật thời gian hoạt động cuối cùng 
function updateLastActivity()
{
    if (isLogin()) {
        $data = ['user_last_activity' => date('Y-m-d h:i:s')];
        $update_status = update('radix_users', $data, 'user_id = ' . isLogin());
        if (!empty($update_status)) {
            return true;
        }
    }
    return false;
}
// Tự động xóa Login Token khi không hoạt động
function autoRemoveLoginToken()
{
    if (isLogin()) {
        // Lấy ra tất cả có trong login token ngoài trừ ID đang đăng nhập
        $all_login_token = get('radix_login_token', 'user_id <> ' . isLogin());
        if (!empty($all_login_token)) {
            $now = date('Y-m-d h:i:s');
            foreach ($all_login_token as $loginToken) {
                // Lấy ra thời gian hoạt động cuối cùng dựa trên UserID
                $user = first('radix_users', 'user_id = ' . $loginToken['user_id'], 'user_last_activity');
                $last_activity = isset($user) ? $user['user_last_activity'] : false;
                // Lấy ra số phút chưa hoạt động
                $diff = (strtotime($now) - strtotime($last_activity)) / _MINUTE;
                $diff = floor($diff);
                // Nếu tài khoản dừng hoạt động cách đây 15 phút
                if ($diff > 15) {
                    delete('radix_login_token', 'user_id = ' . $loginToken['user_id']);
                }
            }
        }
    }
    return false;
}

function isActiveMenuSidebar($module)
{
    if (isset(getBody()['module']) && strtolower(getBody()['module']) === strtolower(trim($module))) {
        return true;
    }
    return false;
}

function getLinkAdmin($module, $action = null, $params = [])
{
    if (empty($module)) return false;
    $url = '?module=' . $module;

    if (!empty($action)) $url .= '&action=' . $action;

    /**
     * $params = [keywords => 'item a', 'page' => 3]
     * 
     * - Hàm http_build_query() tạo ra query string từ mảng.
     * result = keywords=item-a&page=3
     */
    if (!empty($params) && is_array($params)) $url .= '&' . http_build_query($params);

    return _ADMIN_HOST_ROOT . $url;
}

function formatDate($date, $format = 'd/m/Y H:i:s')
{
    if (empty($date)) return false;
    $dateObj = date_create($date);
    return $dateObj->format($format);
}

function isFontIcon($str)
{
    if (strpos($str, '<i class="') !== false) {
        return true;
    }
    return false;
}


function updateQueryString($queryString, $keyFind, $value = null)
{
    if (empty($queryString) || empty($keyFind)) return false;

    $paramArr = explode('&', $queryString);
    $paramArr = array_filter($paramArr);

    if (empty($paramArr)) return false;

    $indexFind = -1;

    foreach ($paramArr as $i => $param) {
        if (strpos($param, $keyFind) !== false) {
            $indexFind = $i;
            break;
        }
    }

    if ($indexFind === -1) return false;

    $itemArr = explode('=', $paramArr[$indexFind]);
    $itemArr[1] = $value;
    $itemStr = implode('=', $itemArr);
    $paramArr[$indexFind] = $itemStr;
    return implode('&', $paramArr);
}
