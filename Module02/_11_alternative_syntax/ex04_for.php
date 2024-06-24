<!-- Cú pháp thông thường for  -->
<h3>Cú pháp thông thường for</h3>

<ul>
    <?php for ($i = 1; $i <= 10; $i++) {
        echo '<li>' . $i . '</li>';
    } ?>
</ul>

<!-- Cú pháp thay thế for  -->
<h3>Cú pháp thay thế for</h3>

<ul>
    <?php for ($i = 1; $i <= 10; $i++) : ?>
        <li><?php echo $i; ?></li>
    <?php endfor; ?>
</ul>