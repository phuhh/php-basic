<?php

/**
 * Multiple file upload
 * 
 * Bên HTML cần lưu ý những điều sau:
 * 1. Thẻ form thêm thuộc tính enctype="multipart/form-data"
 * 2. Thẻ input (upload file) phải là thuộc tính type="file"
 * 3. Trong thẻ input file
 *     - Thêm thuộc tính multiple
 *     - Giá trị thuộc tính name thêm mảng rỗng. ví dụ: name="filesUpload[]"
 */
?>

<!DOCTYPE html>
<html>

<head>
    <title>Multiple File Upload</title>
    <meta charset="UTF-8">
</head>

<body>
    <div>
        <h1>Multiple File Upload</h1>
        <form action="./handle-upload.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="filesUpload[]" id="files-upload" multiple>
                <button type="submit">Upload</button>
            </div>
        </form>
    </div>
</body>

</html>