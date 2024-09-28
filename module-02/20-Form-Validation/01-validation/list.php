<?php
require_once './../functions.php';
if (!empty($_GET['message'])) {
    echo get_message(trim($_GET['message']));
}
?>
<h1>Danh Sách Nhân Viên</h1>