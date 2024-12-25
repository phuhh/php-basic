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

$users = getRaw('SELECT ID, Email, FullName, Phone, `Status` FROM Users ORDER BY CreateAt DESC');
?>

<div class="container">
    <h3><?= $data['pageTitle'] ?? null ?></h3>
    <p><a href="#" class="btn btn-success btn-sm">Thêm mới người dùng</a></p>
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
                        <td><?= $user['Status'] === 1 ? '<a href="" class="btn btn-success btn-sm">Kích Hoạt</a>' : '<a href="" class="btn btn-secondary btn-sm">Chưa Kích Hoạt</a>' ?></td>
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

<?php loadLayout('footer', $data); ?>