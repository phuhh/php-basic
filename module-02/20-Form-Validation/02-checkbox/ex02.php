<?php

/**
 * Trường hợp: dùng phương thức gửi GET
 * 
 * - Lấy dữ liệu từ checkbox qua phương thức gửi GET
 * - Đánh dấu checked bằng phương thức gửi GET
 */

if (isset($_GET['languages'])) {

    // In giá trị lấy được
    echo "<pre>";
    print_r($_GET['languages']);
    echo "</pre>";
}

?>

<!DOCTYPE html>

<html>

<head>
    <title>Validation Checkbox (GET)</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Validation Checkbox (GET)</h1>
    <a href="?languages[]=2&languages[]=3">Click me</a>
    <form action="" method="post">
        <div>
            <b>Ngôn ngữ lập trình:</b>
            <div>
                <input type="checkbox" id="checkJavascript" name="languages[]" value="1"
                    <?php echo (!empty($_GET['languages']) && in_array(1, $_GET['languages'])) ? 'checked' : false ?>>
                <label for="checkJavascript">Javascript</label>
            </div>
            <div>
                <input type="checkbox" id="checkPython" name="languages[]" value="2"
                    <?php echo (!empty($_GET['languages']) && in_array(2, $_GET['languages'])) ? 'checked' : false ?>>
                <label for="checkPython">Python</label>
            </div>
            <div>
                <input type="checkbox" id="checkJava" name="languages[]" value="3"
                    <?php echo (!empty($_GET['languages']) && in_array(3, $_GET['languages'])) ? 'checked' : false ?>>
                <label for="checkJava">Java</label>
            </div>
        </div>
        <button type="submit">Send</button>
    </form>
</body>

</html>