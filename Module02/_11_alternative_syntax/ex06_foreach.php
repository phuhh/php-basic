<?php
$menu = [
    'Apple',
    'Samsung',
    'Nokia',
    'Xiaomi',
    'Sony'
];
?>
<!-- Cú pháp thông thường foreach -->
<h1>Cú pháp thông thường foreach</h1>
<ul>
    <?php
    foreach ($menu as $item) {
        echo '<li>' . $item . '</li>';
    } ?>
</ul>

<!-- Cú pháp thay thế foreach -->
<h1>Cú pháp thay thế foreach</h1>
<ul>
    <?php foreach ($menu as $item) : ?>
        <li><?php echo $item; ?></li>
    <?php endforeach; ?>
</ul>