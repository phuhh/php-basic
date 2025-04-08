<?php
$data = [
    'pageTitle' => 'Thêm - Danh Mục Bài Viết'
];

loadLayout('header', $data, true);
loadLayout('sidebar', $data, true);
loadLayout('breadcrumb', $data, true);
?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <p>Tạo Bài Viết Mới</p>


        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php
loadLayout('footer', $data, true);
