<?php
require_once './../functions.php';
/**
 * Trường hợp: dùng cả 2 phương thức gửi GET và POST để đánh dấu checked
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
    <title>Validation Checkbox (GET and POST)</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Validation Checkbox (GET and POST)</h1>
    <a href="?languages[]=3&languages[]=4">Click me</a>
    <form action="" method="post">
        <div>
            <b>Ngôn ngữ lập trình:</b>
            <div>
                <input type="checkbox" id="checkJavascript" name="languages[]" value="1" <?= make_tick(1) ?> />
                <label for="checkJavascript">Javascript</label>
            </div>
            <div>
                <input type="checkbox" id="checkPython" name="languages[]" value="2" <?= make_tick(2) ?> />
                <label for="checkPython">Python</label>
            </div>
            <div>
                <input type="checkbox" id="checkJava" name="languages[]" value="3" <?= make_tick(3) ?> />
                <label for="checkJava">Java</label>
            </div>
            <div>
                <input type="checkbox" id="checkPHP" name="languages[]" value="4" <?= make_tick(4) ?> />
                <label for="checkPHP">PHP</label>
            </div>
            <div>
                <input type="checkbox" id="checkTypescript" name="languages[]" value="5" <?= make_tick(5) ?> />
                <label for="checkTypescript">Typescript</label>
            </div>
        </div>
        <button type="submit">Send</button>
    </form>
</body>

</html>