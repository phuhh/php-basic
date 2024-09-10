<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dem chu cai</title>
</head>

<body>
    <?php
    /**
     * Cho trước 1 đoạn văn bản, yêu cầu đếm số lần xuất hiện các ký tự trong chuỗi
     * và hiển thị kết quả dưới dạng bảng. Bao gồm:
     * - STT
     * - Ký tự
     * - Số lần xuất hiện
     */

    $output = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo quos illum asperiores voluptate saepe. Nulla illo aspernatur ratione itaque facilis optio fugit. Qui rerum laudantium asperiores sapiente, voluptatem perferendis culpa?';
    $characters = [];
    if (!empty($output)) {
        $strLen = strlen($output);
        for ($i = 0; $i < $strLen; $i++) {
            // Nếu xuất hiện thì tăng lên 1 đơn vị, ngược lại thì là 1.
            if (isset($characters[$output[$i]])) {
                $characters[$output[$i]]++; // Tương đương: $characters[$output[$i]] = $characters[$output[$i]] + 1
            } else {
                $characters[$output[$i]] = 1;
            }
        }
    }
    // echo "<pre>";
    // print_r($characters);
    // echo "</pre>";
    ?>
    <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Ký tự</th>
                <th width="10%">Số lần xuất hiện</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($characters) && is_array($characters)):
                $numberOrder = 0;
                foreach ($characters as $key => $character):
                    $numberOrder++;
            ?>
                    <tr>
                        <td><?= $numberOrder ?></td>
                        <td><?= $key === ' ' ? 'Space' : $key ?></td>
                        <td><?= $character ?></td>
                    </tr>
                <?php endforeach;
            else: ?>
                <tr>
                    <td colspan="3" style="text-align: center;">Không có dữ liệu</td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>
</body>

</html>