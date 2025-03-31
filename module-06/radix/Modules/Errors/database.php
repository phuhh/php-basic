<?php defined('_ACCESS_DENIED') or die('Access Denied !!!'); ?>

<div style="width: 800px; text-align:center; margin: 20px auto;">
    <h2>Database Error</h3>
        <hr>
        <p><b>Messages:</b> <?= $e->getMessage() ?></p>
        <p><b>File:</b> <?= $e->getFile() ?></p>
        <p><b>Line:</b> <?= $e->getLine() ?></p>
</div>