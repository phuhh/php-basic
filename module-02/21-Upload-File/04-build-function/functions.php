<?php

if (!function_exists('build_multiple_file')) {
    function build_multiple_file($inputName)
    {
        $files = [];
        if (!empty($inputName)) {
            foreach ($inputName['name'] as $index =>  $fileName) {
                $files[] = [
                    'name' =>  $fileName,
                    'type' => $inputName['type'][$index],
                    'tmp_name' => $inputName['tmp_name'][$index],
                    'error' => $inputName['error'][$index],
                    'size' => $inputName['size'][$index],
                ];
            }
        }
        return $files;
    }
}

if (!function_exists('build_upload_file')) {
    function build_upload_file($config, $inputName, $file = [])
    {
        if (!empty($file)) {
            $inputName =  $file;
        }

        if (!empty($inputName)) {
            $errors = [];

            $fileOriginalName = $inputName['name'];
            $fileNameArr = explode('.', $fileOriginalName);
            $fileExtension = end($fileNameArr);
            if (!empty($config['file_name'])) {
                $fileName = $config['file_name'] . '.' . $fileExtension;
            } else {
                $errors['file_name'] = 'Chưa cấu hình.';
            }

            if ($inputName['error'] === 4) {
                $errors['required'] = 'Chọn tập tin.';
            } else {
                if (!empty($config['allow_ext'])) {
                    $allowExt = explode(',', $config['allow_ext']);
                    $allowExt = array_filter($allowExt);
                    for ($i = 0; $i < count($allowExt); $i++) {
                        $allowExt[$i] = trim($allowExt[$i]);
                    }

                    if (empty($allowExt) || !in_array($fileExtension, $allowExt)) {
                        $errors['code'] = 0;
                        $errors['fileOriginalName'] = $fileOriginalName;
                        $errors['allow_ext'] = 'Định dạng không hợp lệ. Định dạng cho phép: ' . $config['allow_ext'];
                    }
                } else {
                    $errors['allow_ext'] = 'Chưa cấu hình.';
                }

                if (!empty($config['max_size'])) {
                    if ($inputName['size'] > $config['max_size']) {
                        $errors['code'] = 0;
                        $errors['fileOriginalName'] = $fileOriginalName;
                        $errors['max_size'] = 'Kích thước tập tin tối đa ' . number_format($config['max_size']) . ' byte';
                    }
                } else {
                    $errors['max_size'] = 'Chưa cấu hình.';
                }
            }
        }

        if (empty($errors)) {
            if (!empty($config['upload_dir'])) {
                $upload = move_uploaded_file($inputName['tmp_name'], $config['upload_dir'] . $fileName);
                if ($upload) {
                    return [
                        'code' => 1,
                        'fileOriginalName' => $fileOriginalName,
                        'fileName' => $fileName,
                        'fileSize' => $inputName['size'],
                        'path' => $config['upload_dir'] . $fileName
                    ];
                } else {
                    return [
                        'code' => 0,
                        'uploaded_file' => 'Tải tập tin thất bại'
                    ];
                }
            }
            return [
                'upload_dir' => 'Chưa cấu hình.'
            ];
        }
        return $errors;
    }
    return false;
}
