<?php

/**
 * Bên HTML cần lưu ý những điều sau:
 * 1. Thẻ form thêm thuộc tính enctype="multipart/form-data"
 * 2. Thẻ input (upload file) phải là thuộc tính type="file"
 */
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload File</title>
    <meta charset="UTF-8">
</head>

<body>
    <div>
        <h1>Upload File</h1>
        <form action="./handle-upload.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="fileUpload" id="file-upload">
                <button type="submit">Upload</button>
            </div>
        </form>
    </div>
</body>

</html>