<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

$data = [
    'pageTitle' => 'Danh Sách Người Dùng'
];

loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);

$status = -1;
$keywords = '';
$condition = '';

if (isGet()) {
    $body = getBody();

    if (!empty($body['group'])) {
        $group_id = trim($body['group']);

        $operator = 'WHERE ';
        if (!empty($condition) && strpos('WHERE', $condition) >= 0) {
            $operator = ' AND ';
        }

        $condition .= $operator . 'ru.group_id = ' . $group_id;
    }

    if (isset($body['status']) && ($body['status'] == 1 || $body['status'] == 0)) {
        $status = trim($body['status']);

        $operator = 'WHERE ';
        if (!empty($condition) && strpos('WHERE', $condition) >= 0) {
            $operator = ' AND ';
        }

        $condition .= $operator . 'ru.user_status = ' . $status;
    }

    if (!empty($body['keywords'])) {
        $keywords = trim($body['keywords']);

        $operator = 'WHERE ';
        if (!empty($condition) && strpos('WHERE', $condition) >= 0) {
            $operator = ' AND ';
        }

        $condition .= $operator . "ru.user_fullname LIKE '%{$keywords}%' OR ru.user_email LIKE '%{$keywords}%'";
    }
}

$limit = _PAGE_PER;
$total_records = getRowCount('SELECT ru.user_id FROM radix_users AS ru ' . $condition);
$items_per_page = ceil($total_records / $limit);
$page = 1;
if (!empty(getBody()['page']) && is_numeric(getBody()['page']) && getBody()['page'] > 1) {
    $page = getBody()['page'];
    if ($page > $items_per_page) {
        $page = $items_per_page;
    }
}
$offset = ($page - 1) * $limit;

$sql = 'SELECT ru.user_id, ru.user_email, ru.user_fullname, ru.user_status, rg.group_name, ru.user_create_at
FROM radix_users AS ru 
INNER JOIN radix_groups AS rg ON rg.group_id = ru.group_id
 ' . $condition . ' ORDER BY ru.user_create_at DESC';
$sql .= ' LIMIT ' . $offset . ',' . $limit;
$users = getRaw($sql);

$sqlGroups = 'SELECT group_id, group_name FROM radix_groups';
$groups = getRaw($sqlGroups);

$queryString = null;
if (!empty($_SERVER['QUERY_STRING'])) {
    $queryString = $_SERVER['QUERY_STRING'];
    $queryString = str_replace('page=' . $page, '', $queryString);
    $queryString = trim($queryString, '&');
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');

?>

<div class="container">
    <?= showMessage($msg, $msgType) ?>
    <a href="<?= getLinkAdmin('users', 'create') ?>" class="btn btn-success btn-sm">Thêm mới người dùng</a>
    <hr>
    <form action="" method="get">
        <input type="hidden" name="module" value="users">
        <div class="row mb-3">
            <div class="col-md-3">
                <select name="group" class="form-control">
                    <option value="">Chọn nhóm</option>
                    <?php
                    if (!empty($groups)):
                        foreach ($groups as $group):
                            $selected = $group['group_id'] == $group_id ? 'selected' : '';
                    ?>
                            <option value="<?= $group['group_id'] ?>" <?= $selected ?>><?= $group['group_name'] ?></option>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-control">
                    <option value="-1" <?= $status == -1 ? ' selected' : false ?>>Chọn trạng thái</option>
                    <option value="0" <?= $status == 0 ? ' selected' : false ?>>Chưa kích hoạt</option>
                    <option value="1" <?= $status == 1 ? ' selected' : false ?>>Đã kích hoạt</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="keywords" class="form-control" placeholder="Từ khóa..." value="<?= $keywords ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">Tìm Kiếm</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th>Họ Tên</th>
                    <th width="20   %">Email</th>
                    <th width="12%">Nhóm</th>
                    <th width="15%">Ngày Tạo</th>
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
                            <td><?= $user['user_fullname'] ?></td>
                            <td><?= $user['user_email'] ?></td>
                            <td><?= $user['group_name'] ?></td>
                            <td><?= formatDate($user['user_create_at']) ?></td>
                            <td>
                                <?= $user['user_status'] == 1 ? '<a href="" class="btn btn-success btn-sm">Kích Hoạt</a>' : '<a href="" class="btn btn-secondary btn-sm">Chưa Kích Hoạt</a>' ?>
                            </td>
                            <td>
                                <a href="<?= getLinkAdmin('users', 'edit', ['id' => $user['user_id']]) ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <?php if ($user['user_id'] !== isLogin()): ?>
                                    <a href="<?= getLinkAdmin('users', 'delete', ['id' => $user['user_id']]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example" class="float-right">
        <ul class="pagination">
            <?php

            if ($page > 1) {
                $pagePrevious = $page - 1;
                echo '<li class="page-item"><a class="page-link" href="?' . $queryString . '&page=' .  $pagePrevious . '">Trước</a></li>';
            }

            if (!empty($items_per_page)) {
                $begin = $page - _PAGINATION_BUTTONS;
                $begin = $begin > 0 ? $begin : 1;
                $end = $page + _PAGINATION_BUTTONS;
                $end = $end > $items_per_page ? $items_per_page : $end;
                for ($item = $begin; $item <= $end; $item++) {
                    $active = $item == $page ? ' active' : false;
                    echo '<li class="page-item' . $active . '"><a class="page-link" href="?' . $queryString . '&page=' . $item . '">' . $item . '</a></li>';
                }
            }

            if ($page < $items_per_page) {
                $pageNext = $page + 1;
                echo '<li class="page-item"><a class="page-link" href="?' . $queryString . '&page=' . $pageNext . '">Sau</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

<?php loadLayout('footer', $data); ?>