<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach khach hang</title>
</head>

<body>
    <?php
    /**
     * Kỹ thuật: dùng phần tử so sánh lần lượt qua các phần tử khác.
     * 
     * Ví dụ: A,B,C,D,E
     * 
     * A - B   B - C   C - D   D - E
     * A - C   B - D   C - E
     * A - D   B - E
     * A - E
     * 
     * Bài 02: Hiển thị danh sách khách hàng dưới dạng bảng, bao gồm:
     * - STT
     * - Họ và tên
     * - Email
     * - SĐT
     * - Địa chỉ
     * Lưu ý: Nếu địa chỉ email bị trùng, chỉ giữ lại 1
     */

    $customers = [
        ['name' => 'Nguyen Van A', 'email' => 'nguyenvana@gmail.com', 'phone' => '012345679', 'address' => 'TP.HCM'],
        ['name' => 'Tran Van B', 'email' => 'tranvanb@gmail.com', 'phone' => '012345680', 'address' => 'Long An'],
        ['name' => 'Ly Thi C', 'email' => 'lythic@gmail.com', 'phone' => '012345779', 'address' => 'Binh Duong'],
        ['name' => 'Tran Van B (Duplicate)', 'email' => 'tranvanb@gmail.com', 'phone' => '012345680', 'address' => 'Long An'],
        ['name' => 'Nguyen Van D', 'email' => 'nguyenvand@gmail.com', 'phone' => '012345681', 'address' => 'Tay Ninh'],
        ['name' => 'Nguyen Van A (Duplicate)', 'email' => 'nguyenvana@gmail.com', 'phone' => '012345679', 'address' => 'TP.HCM'],
        ['name' => 'Le Van E', 'email' => 'levane@gmail.com', 'phone' => '012345800', 'address' => 'Can Tho'],
        ['name' => 'Ly Thi C (Duplicate)', 'email' => 'lythic@gmail.com', 'phone' => '012345779', 'address' => 'Binh Duong'],
    ];
    // $customers = null;

    /**
     * Xử lý dữ liệu trùng email (trước khi render)
     */
    $indexDuplicate = [];
    // 1. lấy ra index trùng emial
    if (!empty($customers) && is_array($customers)) {
        $countCustomers = count($customers);
        // so sánh 2 phần tử với nhau
        for ($indexA = 0; $indexA < $countCustomers - 1; $indexA++) {
            for ($indexB = $indexA + 1; $indexB < $countCustomers; $indexB++) {
                if ($customers[$indexA]['email'] === $customers[$indexB]['email']) {
                    $indexDuplicate[] = $indexB;
                }
            }
        }
    }
    // echo "<pre>";
    // print_r($indexDuplicate);
    // echo "</pre>";

    // 2. Xoá các phần tử trùng
    if (!empty($indexDuplicate)) {
        $count = count($indexDuplicate);
        for ($i = 0; $i < $count; $i++) {
            if (isset($customers[$indexDuplicate[$i]])) {
                unset($customers[$indexDuplicate[$i]]);
            }
        }
    }
    // echo "<pre>";
    // print_r($customers);
    // echo "</pre>";
    ?>

    <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers) && is_array($customers)):
                $numberOrder = 0;
                foreach ($customers as $customer):
                    $numberOrder++;
            ?>

                    <tr>
                        <td width="5%"><?= $numberOrder ?></td>
                        <td><?= $customer['name'] ?></td>
                        <td><?= $customer['email'] ?></td>
                        <td><?= $customer['phone'] ?></td>
                        <td><?= $customer['address'] ?></td>
                    </tr>

                <?php endforeach;
            // Xử lý nếu không có dữ liệu khách hàng hiển thị thế nào ???
            else: ?>

                <tr>
                    <td colspan="5" style="text-align: center;">Không có dữ liệu</td>
                </tr>

            <?php endif; ?>

        </tbody>
    </table>
</body>

</html>