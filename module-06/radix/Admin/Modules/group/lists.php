<?php
$data = [
    'pageTitle' => 'Danh Sách Nhóm Người Dùng'
];
loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);

$condition = '';
$keywords = '';

if (isGet()) {
    $body = getBody();

    if (!empty($body['keywords'])) {
        $keywords = trim($body['keywords']);

        $operator = 'WHERE ';
        if (!empty($condition) && strpos('WHERE', $condition) >= 0) {
            $operator = ' AND ';
        }

        $condition .= $operator . "group_name LIKE '%$keywords%'";
    }
}

// pagination
$page = 1;
$limit = 3;
$total_records = getRowCount("SELECT group_id FROM radix_groups $condition");
$items_per_page = ceil($total_records / $limit);

if (!empty(getBody()['page']) && is_numeric(getBody()['page']) && getBody()['page'] > 1) {
    $page = getBody()['page'];
    if ($page > $items_per_page) {
        $page = $items_per_page;
    }
}

$offset = ($page - 1) * $limit;

$sql = "SELECT group_id, group_name, group_create_at 
FROM radix_groups 
$condition
ORDER BY group_create_at DESC
LIMIT $offset, $limit";

$groups = getRaw($sql);


$queryString = '';
if (!empty($_SERVER['QUERY_STRING'])) {
    $queryString = str_replace('page=' . $page, '', $_SERVER['QUERY_STRING']);
    $queryString = trim($queryString, '&');
}


$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <?= showMessage($msg, $msgType) ?>
        <p>
            <a href="<?= getLinkAdmin('group', 'create') ?>" class="btn btn-success">Thêm mới nhóm</a>
        </p>
        <form action="" method="get">
            <input type="hidden" name="module" value="group">
            <div class="row mb-3">
                <div class="col-md-10">
                    <input type="text" name="keywords" class="form-control " placeholder="Từ khóa..." value="<?= $keywords ?>">
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
                        <th>Tên Nhóm</th>
                        <th width="20%">Ngày Tạo</th>
                        <th width="12%">Phân Quyền</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($groups)):
                        $count = $offset;
                    ?>
                        <?php foreach ($groups as $group):
                            $count++; ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $group['group_name'] ?></td>
                                <td><?= formatDate($group['group_create_at']) ?></td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-success"><i class="fas fa-tasks"></i></a>
                                </td>
                                <td>
                                    <a href="<?= getLinkAdmin('group', 'edit', ['id' => $group['group_id']]) ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                                <td>
                                    <a href="<?= getLinkAdmin('group', 'delete', ['id' => $group['group_id']]) ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa ?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No data</td>
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
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php
loadLayout('footer', $data, true);
