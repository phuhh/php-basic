<?php

/**
 * -Để truyền nhiều dữ liệu của checkbox 
 *     + Trong thuộc tính name (html) sau giá trị có thêm [] cặp dấu ngoặc vuông
 *     + Ví dụ: name="languages[]"
 * 
 * - Lấy dữ liệu checkbox gửi lên qua phương thức POST
 * - Đánh dấu checked qua phương thức POST
 * 
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $languages = [];

    if (!empty($_POST['languages'])) {
        $languages = $_POST['languages'];
    }

    // Duyệt dữ liệu mảng
    if (!empty($languages) && is_array($languages)) {
        foreach ($languages as $language) {
            echo $language . '<br>';
        }
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <title>Validation Checkbox</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Validation Checkbox</h1>
    <form action="" method="post">
        <div>
            <b>Ngôn ngữ lập trình:</b>
            <div>
                <input type="checkbox" id="checkJavascript" name="languages[]" value="1"
                    <?php echo (!empty($_POST['languages']) && in_array(1, $_POST['languages'])) ? 'checked' : false ?>>
                <label for="checkJavascript">Javascript</label>
            </div>
            <div>
                <input type="checkbox" id="checkPython" name="languages[]" value="2"
                    <?php echo (!empty($_POST['languages']) && in_array(2, $_POST['languages'])) ? 'checked' : false ?>>
                <label for="checkPython">Python</label>
            </div>
            <div>
                <input type="checkbox" id="checkJava" name="languages[]" value="3"
                    <?php echo (!empty($_POST['languages']) && in_array(3, $_POST['languages'])) ? 'checked' : false ?>>
                <label for="checkJava">Java</label>
            </div>
        </div>
        <button type="submit">Send</button>
    </form>
</body>

</html>