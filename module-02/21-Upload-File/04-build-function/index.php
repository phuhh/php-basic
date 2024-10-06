<?php
require_once './functions.php';
/**
 * Xây dựng function cho upload file
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = [
        'upload_dir' => '../uploads/',
        'max_size' => 1048576,
        'allow_ext' => 'jpeg, jpg',
        'file_name' => sha1(uniqid())
    ];

    if (isset($_POST['btnUploadFile'])) {
        $upload = build_upload_file($config, $_FILES['fileUpload']);
        echo "<pre>";
        print_r($upload);
        echo "</pre>";
    }

    if (isset($_POST['btnUploadFiles'])) {
        $files = build_multiple_file($_FILES['filesUpload']);
        if (!empty($files)) {
            $upload = [];
            foreach ($files as $key => $file) {
                $upload[] = build_upload_file($config, $_FILES['filesUpload'], $file);
            }

            echo "<pre>";
            print_r($upload);
            echo "</pre>";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Build Function for File Upload</title>
    <meta charset="UTF-8">
</head>

<body>
    <div>
        <h1>Build Function for File Upload</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="fileUpload" id="file-upload">
                <button type="submit" name="btnUploadFile">Upload</button>
            </div>
        </form>
    </div>

    <div>
        <h1>Multiple File Upload</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" name="filesUpload[]" id="files-upload" multiple>
                <button type="submit" name="btnUploadFiles">Upload</button>
            </div>
        </form>
    </div>
</body>

</html>