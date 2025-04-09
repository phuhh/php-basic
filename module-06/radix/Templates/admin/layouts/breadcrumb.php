<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $data['pageTitle'] ?? '' ?></h1>
            </div><!-- /.col -->
            <?php if ($data['pageTitle'] !== 'Tổng Quát'): ?>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= getLinkAdmin('dashboard') ?>">Tổng Quát</a></li>
                        <li class="breadcrumb-item active"><?= $data['pageTitle'] ?? '' ?></li>
                    </ol>
                </div><!-- /.col -->
            <?php endif; ?>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->