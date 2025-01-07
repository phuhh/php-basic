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


// Xử lý phân trang
// 1. Xác định được số lượng bản ghi trên 1 trang
$limit = _PAGE_PER;
// 2. Tính số trang
// 2.1 Lấy ra tổng số dòng
$total_records = getRowCount('SELECT ID FROM Users');
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
$sql = 'SELECT ID, Email, FullName, Phone, `Status` FROM Users ORDER BY ID DESC LIMIT ' . $offset . ',' . $limit;

$users = getRaw($sql);
?>

<div class="container">
    <h3><?= $data['pageTitle'] ?? null ?></h3>
    <p><a href="#" class="btn btn-success btn-sm">Thêm mới người dùng</a></p>
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
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <nav aria-label="Page navigation example">
        <ul class="pagination float-right">
            <?php
            // 7. Xử lý nút lùi và tới
            // 7.1 Xử lý nút lùi
            if ($page > 1) {
                $pagePrevious = $page - 1;
                echo '<li class="page-item"><a class="page-link" href="?module=users&action=pagination&page=' .  $pagePrevious . '">Trước</a></li>';
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
                    echo '<li class="page-item' . $active . '"><a class="page-link" href="?module=users&action=pagination&page=' . $item . '">' . $item . '</a></li>';
                }
            }

            // 7.2 Xử lý nút tới
            if ($page < $items_per_page) {
                $pageNext = $page + 1;
                echo '<li class="page-item"><a class="page-link" href="?module=users&action=pagination&page=' . $pageNext . '">Sau</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

<?php loadLayout('footer', $data); ?>