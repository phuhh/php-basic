<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');
// Hiển thi danh sách users (bao gồm phân trang, tìm kiếm)
if (!isLogin()) {
    redirect('?module=auth&action=login');
}

$data = [
    'pageTitle' => 'Danh sách người dùng'
];
// Load Template Login
loadLayout('header', $data);

$status = -1;
$keywords = '';
$condition = null;
// Xử lý lọc và tìm kiếm
if (isGet()) {
    $body = getBody();
    // Xử lý lọc
    if (isset($body['status'])) {
        $status = $body['status'] == 1 || $body['status'] == 0 ? trim($body['status']) : -1;
        $condition = $status == 1 || $status == 0  ? 'WHERE Status=' . $status : '';
    }

    // Xử lý tìm kiếm
    if (!empty($body['keywords'])) {
        $keywords = trim($body['keywords']);

        // Xử lý nếu kết hợp lọc và tìm kiếm
        $operator = 'WHERE ';
        if (!empty($condition) && strpos('WHERE', $condition) >= 0) {
            $operator = ' AND ';
        }

        $condition .= $operator . "FullName LIKE '%{$keywords}%' OR Email LIKE '%{$keywords}%'";
    }
}
// echo $condition . '<br>';
// Nối chuỗi với SQL phân trang.

// Xử lý phân trang
// 1. Xác định được số lượng bản ghi trên 1 trang
$limit = _PAGE_PER;
// 2. Tính số trang
// 2.1 Lấy ra tổng số dòng
$total_records = getRowCount('SELECT ID FROM Users ' . $condition);
// 2.2 Lấy ra số trang
$items_per_page = ceil($total_records / $limit);
// 3. Xác định trang hiện tại
$page = 1;
if (!empty(getBody()['page']) && is_numeric(getBody()['page']) && getBody()['page'] > 1) {
    $page = getBody()['page'];
    if ($page > $items_per_page) {
        $page = $items_per_page;
    }
}

// 4. Xác định vị trí tiếp theo trong bản ghi
// $page = 1 => $offset = 0 ==> (1 - 1) * 3 = 0 => LIMIT 0,3
// $page = 2 => $offset = 3 ==> (2 - 1) * 3 = 3 => LIMIT 3,3
// $page = 3 => $offset = 6 ==> (3 - 1) * 3 = 6 => LIMIT 6,3
// $page = 4 => $offset = 9 ==> (4 - 1) * 3 = 9 => LIMIT 9,3

// Giới hạn 3 dòng trên 1 trang
// Công thức: (Số Trang - 1) * SL bản ghi trên 1 trang
$offset = ($page - 1) * $limit;
// Chú ý: Vị trí offset bắt đầu đếm bằng 0 (tương tự mảng tuần tự trong php)

// 5. Lấy dữ liệu từ csdl với mệnh đề LIMIT
$sql = 'SELECT ID, Email, FullName, Phone, `Status` 
FROM Users ' . $condition . ' ORDER BY CreateAt DESC LIMIT ' . $offset . ',' . $limit;
$users = getRaw($sql);

// Xử lý lọc và tìm kiếm với phân trang
$queryString = null;
if (!empty($_SERVER['QUERY_STRING'])) {
    $queryString = $_SERVER['QUERY_STRING'];
    // $queryString = str_replace('module', '', $queryString);
    $queryString = str_replace('page=' . $page, '', $queryString);
    $queryString = trim($queryString, '&');
}
// echo $queryString . '<br>';

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
?>

<div class="container">
    <?= showMessage($msg, $msgType) ?>
    <h3><?= $data['pageTitle'] ?? null ?></h3>
    <p><a href="?module=users&action=add" class="btn btn-success btn-sm">Thêm mới người dùng</a></p>
    <form action="" method="get">
        <input type="hidden" name="module" value="users">
        <div class="row mb-3">
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <?php // đánh dấu selected 
                    ?>
                    <option value="-1" <?= $status == -1 ? ' selected' : false ?>>Vui lòng chọn</option>
                    <option value="0" <?= $status == 0 ? ' selected' : false ?>>Chưa kích hoạt</option>
                    <option value="1" <?= $status == 1 ? ' selected' : false ?>>Đã kích hoạt</option>
                </select>
            </div>
            <div class="col-md-4 offset-md-3">
                <input type="text" name="keywords" class="form-control" placeholder="Từ khóa..." value="<?= $keywords ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th>Họ Tên</th>
                    <th width="23%">Email</th>
                    <th width="12%">SĐT</th>
                    <th width="15%">Trạng Thái</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php $count = $offset;
                    foreach ($users as $key => $user):
                        $count++; ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $user['FullName'] ?></td>
                            <td><?= $user['Email'] ?></td>
                            <td><?= $user['Phone'] ?></td>
                            <td>
                                <?= $user['Status'] == 1 ? '<a href="" class="btn btn-success btn-sm">Kích Hoạt</a>' : '<a href="" class="btn btn-secondary btn-sm">Chưa Kích Hoạt</a>' ?>
                            </td>
                            <td>
                                <a href="?module=users&action=edit&id=<?= $user['ID'] ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href="?module=users&action=delete&id=<?= $user['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No Data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example" class="float-right">
        <ul class="pagination">
            <?php
            // 7. Xử lý nút lùi và tới
            // 7.1 Xử lý nút lùi
            if ($page > 1) {
                $pagePrevious = $page - 1;
                echo '<li class="page-item"><a class="page-link" href="?' . $queryString . '&page=' .  $pagePrevious . '">Trước</a></li>';
            }

            // 6. Xử lý nút số trang
            if (!empty($items_per_page)) {
                // 8. Xử lý ẩn bớt số trang trước hoặc sau khi tới vượt mức.
                $begin = $page - _PAGINATION_BUTTONS;
                $begin = $begin > 0 ? $begin : 1;
                $end = $page + _PAGINATION_BUTTONS;
                $end = $end > $items_per_page ? $items_per_page : $end;
                for ($item = $begin; $item <= $end; $item++) {
                    // 6.1 Xử lý active
                    $active = $item == $page ? ' active' : false;
                    echo '<li class="page-item' . $active . '"><a class="page-link" href="?' . $queryString . '&page=' . $item . '">' . $item . '</a></li>';
                }
            }

            // 7.2 Xử lý nút tới
            if ($page < $items_per_page) {
                $pageNext = $page + 1;
                echo '<li class="page-item"><a class="page-link" href="?' . $queryString . '&page=' . $pageNext . '">Sau</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

<?php loadLayout('footer', $data); ?>