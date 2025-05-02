<?php
defined('_ACCESS_DENIED') or die('Access Denied !!!');

$data = [
    'pageTitle' => 'Danh Sách Dịch Vụ'
];

loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);

$status = -1;
$keywords = '';
$condition = '';

if (isGet()) {
    $body = getBody();

    if (!empty($body['user'])) {
        $user_id = trim($body['user']);

        $operator = 'WHERE ';
        if (!empty($condition) && strpos('WHERE', $condition) >= 0) {
            $operator = ' AND ';
        }

        $condition .= $operator . 'rs.user_id = ' . $user_id;
    }

    if (!empty($body['keywords'])) {
        $keywords = trim($body['keywords']);

        $operator = 'WHERE ';
        if (!empty($condition) && strpos('WHERE', $condition) >= 0) {
            $operator = ' AND ';
        }

        $condition .= $operator . "rs.service_name LIKE '%{$keywords}%'";
    }
}

$limit = _PAGE_PER;
$totalRecords = getRowCount('SELECT rs.service_id FROM radix_services AS rs ' . $condition);
$itemsPerPage = ceil($totalRecords / $limit);
$page = 1;
if (!empty(getBody()['page']) && is_numeric(getBody()['page']) && getBody()['page'] > 1) {
    $page = getBody()['page'];
    if ($page > $itemsPerPage) {
        $page = $itemsPerPage;
    }
}
$offset = ($page - 1) * $limit;

$sql = 'SELECT rs.service_id, rs.service_icon, rs.service_name, rs.service_description, ru.user_id, ru.user_fullname, rs.service_create_at
FROM radix_services AS rs 
INNER JOIN radix_users AS ru ON ru.user_id = rs.user_id
 ' . $condition . ' ORDER BY rs.service_create_at DESC';

$sql .= ' LIMIT ' . $offset . ',' . $limit;
$services = getRaw($sql);

$sqlSltUsers = 'SELECT DISTINCT rs.user_id, ru.user_fullname 
FROM radix_services AS rs 
INNER JOIN radix_users AS ru ON rs.user_id = ru.user_id';
$sltUsers = getRaw($sqlSltUsers);

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
    <a href="<?= getLinkAdmin('services', 'create') ?>" class="btn btn-success btn-sm">Thêm mới dịch vụ</a>
    <hr>
    <form action="" method="get">
        <input type="hidden" name="module" value="services">
        <div class="row mb-3">
            <div class="col-md-3">
                <select name="user" class="form-control">
                    <option value="">Chọn người tạo</option>
                    <?php
                    if (!empty($sltUsers)):
                        foreach ($sltUsers as $user):
                            $selected = $user['user_id'] == $user_id ? 'selected' : '';
                    ?>
                            <option value="<?= $user['user_id'] ?>" <?= $selected ?>><?= $user['user_fullname'] ?></option>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="col-md-7">
                <input type="text" name="keywords" class="form-control" placeholder="Từ khóa..." value="<?= $keywords ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">Tìm Kiếm</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered" style="width: 1200px;">
            <thead>
                <tr>
                    <th style="width:60px">STT</th>
                    <th style="width:100px">Đại diện</th>
                    <th>Dịch vụ</th>
                    <th style="width:500px">Mô tả</th>
                    <th style="width:150px">Người Tạo</th>
                    <th style="width:100px">Ngày tạo</th>
                    <th style="width:60px">Sửa</th>
                    <th style="width:60px">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($services)): ?>
                    <?php $count = $offset;
                    foreach ($services as $key => $service):
                        $count++; ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= isFontIcon(trim($service['service_icon'])) ? trim($service['service_icon']) : '<img src="' . trim($service['service_icon']) . '" width="100px">' ?></td>
                            <td><?= $service['service_name'] ?></td>
                            <td><?= $service['service_description'] ?></td>
                            <td><a href="?<?= updateQueryString($queryString, 'user', $service['user_id']) ?>"><?= $service['user_fullname'] ?></a></td>
                            <td><?= formatDate($service['service_create_at']) ?></td>
                            <td>
                                <a href="<?= getLinkAdmin('services', 'edit', ['id' => $service['service_id']]) ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href="<?= getLinkAdmin('services', 'delete', ['id' => $service['service_id']]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash" aria-hidden="true"></i></a>
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

            if (!empty($itemsPerPage)) {
                $begin = $page - _PAGINATION_BUTTONS;
                $begin = $begin > 0 ? $begin : 1;
                $end = $page + _PAGINATION_BUTTONS;
                $end = $end > $itemsPerPage ? $itemsPerPage : $end;
                for ($item = $begin; $item <= $end; $item++) {
                    $active = $item == $page ? ' active' : false;
                    echo '<li class="page-item' . $active . '"><a class="page-link" href="?' . $queryString . '&page=' . $item . '">' . $item . '</a></li>';
                }
            }

            if ($page < $itemsPerPage) {
                $pageNext = $page + 1;
                echo '<li class="page-item"><a class="page-link" href="?' . $queryString . '&page=' . $pageNext . '">Sau</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

<?php loadLayout('footer', $data); ?>