<?php
require_once './../functions.php';
/**
 * 1. Xác định rules
 *     - FullName: bắt buộc nhập, độ dài lớn 5 ký tự
 *     - Email: bắt buộc nhập, định dạng email hợp lệ
 *     - Age: bắt buộc nhập, định dạng số nguyên dương
 * 
 * 2. Hiển thị thông báo lỗi
 * 3. Giữ lại các giá trị đã hợp lệ (khi vẫn còn giá trị lỗi khác)
 * 
 * 4. Điều hướng trang khi thành công
 * 
 * 5. Gửi thông báo thành công qua trang khác
 * 
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Khai báo mảng rỗng chứa lỗi
    $errors = [];

    if (empty(trim($_POST['FullName']))) {
        $errors['FullName']['required'] = 'Họ và Tên không để trống.';
    } elseif (mb_strlen(trim($_POST['FullName'])) < 5) {
        $errors['FullName']['min'] = 'Họ và Tên ít nhất 5 ký tự.';
    }

    if (empty(trim($_POST['Email']))) {
        $errors['Email']['required'] = 'Địa chỉ mail không để trống.';
    } elseif (!filter_var(trim($_POST['Email']), FILTER_VALIDATE_EMAIL)) {
        $errors['Email']['invalid'] = 'Địa chỉ mail không hợp lệ.';
    }

    if (empty(trim($_POST['Age']))) {
        $errors['Age']['required'] = 'Tuổi không để trống.';
    } elseif (!filter_var(trim($_POST['Age']), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
        $errors['Age']['invalid'] = 'Tuổi không hợp lệ.';
    }

    // echo "<pre>";
    // print_r($errors);
    // echo "</pre>";

    if (empty($errors)) {
        // Điều hướng trang khi thành công
        // Gửi thông báo qua Thành công qua trang khác
        redirect('list.php?message=1');
    }

    echo '<h3 style="color:white;background-color:red;">THÔNG BÁO: Validated Thất Bại</h3>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Validation</title>
    <meta charset="UTF-8">
</head>

<body>
    <div>
        <h1>Form Validation</h1>
        <form action="" method="post">
            <div>
                <div>
                    <label for="FullName">Họ và Tên:</label>
                </div>
                <div>
                    <!-- Giữ lại giá trị hợp lệ -->
                    <input type="text"
                        name="FullName"
                        placeholder="Nhập Họ và Tên..."
                        value="<?php echo !empty($_POST['FullName']) ? trim($_POST['FullName']) : false ?>">
                </div>
                <?php
                // Hiển thị thông báo lỗi Validation
                echo !empty($errors['FullName']['required']) ? '<span style="color:red">' . $errors['FullName']['required'] . '</span>' : false;
                echo !empty($errors['FullName']['min']) ? '<span style="color:red">' . $errors['FullName']['min'] . '</span>' : false;
                ?>
            </div>
            <div>
                <div>
                    <label for="Email">Email:</label>
                </div>
                <div>
                    <!-- Giữ lại giá trị hợp lệ -->
                    <input type="text"
                        name="Email"
                        placeholder="Nhập Email..."
                        value="<?php echo !empty($_POST['Email']) ? trim($_POST['Email']) : false ?>">
                </div>
                <?php
                // Hiển thị thông báo lỗi Validation
                echo !empty($errors['Email']['required']) ? '<span style="color:red">' . $errors['Email']['required'] . '</span>' : false;
                echo !empty($errors['Email']['invalid']) ? '<span style="color:red">' . $errors['Email']['invalid'] . '</span>' : false;
                ?>
            </div>
            <div>
                <div>
                    <label for="Age">Age</label>
                </div>
                <div>
                    <!-- Giữ lại giá trị hợp lệ -->
                    <input type="text"
                        name="Age"
                        placeholder="Nhập Tuổi..."
                        value="<?php echo !empty($_POST['Age']) ? trim($_POST['Age']) : false ?>">
                </div>
                <?php
                // Hiển thị thông báo lỗi Validation
                echo !empty($errors['Age']['required']) ? '<span style="color:red">' . $errors['Age']['required'] . '</span>' : false;
                echo !empty($errors['Age']['invalid']) ? '<span style="color:red">' . $errors['Age']['invalid'] . '</span>' : false;
                ?>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>
</body>

</html>