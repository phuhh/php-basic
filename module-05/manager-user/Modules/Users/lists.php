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



// 1.Thiết lập số dòng trên 1 page
$limit = 3;

// 2. Lấy tổng số dòng
$total_records = getRowCount('SELECT ID FROM Users');

// 3. Lấy ra tổng số trang
$items_per_page = ceil($total_records / $limit);

echo "<pre>";
print_r($items_per_page);
echo "</pre>";

// 4. Xác định trang hiện tại
$page = 1;
if (!empty(getBody()['page']) && getBody()['page'] > 1) {
    $page = getBody()['page'];
    if ($page > $items_per_page) {
        $page = $items_per_page;
    }
}

// 5. Xác định vị trí kế tiếp
$offset = ($page - 1) * $limit;

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
                    <?php $count = 0;
                    foreach ($users as $key => $user):
                        $count++; ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $user['FullName'] ?></td>
                            <td><?= $user['Email'] ?></td>
                            <td><?= $user['Phone'] ?></td>
                            <td>
                                <?= $user['Status'] === 1 ? '<a href="" class="btn btn-success btn-sm">Kích Hoạt</a>' : '<a href="" class="btn btn-secondary btn-sm">Chưa Kích Hoạt</a>' ?>
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
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <?php
            if (!empty($items_per_page)) {
                for ($item = 1; $item <= $items_per_page; $item++) {
                    echo '<li class="page-item"><a class="page-link" href="?module=users&page=' . $item . '">' . $item . '</a></li>';
                }
            }
            ?>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>

<?php loadLayout('footer', $data); ?>