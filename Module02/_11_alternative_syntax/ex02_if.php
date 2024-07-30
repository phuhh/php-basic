<!-- Cú pháp thông thường if, if...else, elseif  -->
<?php if (true) { ?>
    <h3>Cú pháp thông thường if, if...else, elseif</h3>
    <ul>
        <li>Home</li>
        <li>About</li>
        <li>Contact</li>
    </ul>
<?php } else { ?>
    <ul>
        <li>Home</li>
    </ul>
<?php } ?>

<!-- Cú pháp thay thế if, if...else, elseif -->
<?php if (true) : ?>
    <h3>Cú pháp thay thế if, if...else, elseif </h3>
    <ul>
        <li>Home</li>
        <li>About</li>
        <li>Contact</li>
    </ul>
<?php else :  ?>
    <ul>
        <li>Home</li>
    </ul>
<?php endif; ?>