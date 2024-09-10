<!-- Cú pháp thông thường while  -->
<h3>Cú pháp thông thường while</h3>

<ul>
    <?php
    $i = 1;
    while ($i <= 10) {
        echo '<li>' . $i . '</li>';
        $i++;
    }
    ?>
</ul>

<!-- Cú pháp thay thế while  -->
<h3>Cú pháp thay thế while</h3>

<ul>
    <?php $i = 1;
    while ($i <= 10) : ?>

        <li><?php echo $i; ?></li>

    <?php $i++;
    endwhile; ?>
</ul>