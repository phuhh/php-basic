<!-- Cú pháp thông thường switch  -->
<h3>Cú pháp thông thường switch</h3>

<?php switch (2) {
    case 1:
        echo '<h1>Hạng 1</h1>';
        break;
    case 2:
        echo '<h2>Hạng 2</h2>';
        break;
    default:
        echo '<h3>Hạng 3</h3>';
        break;
} ?>

<!-- Cú pháp thay thế switch  -->
<h3>Cú pháp thay thế switch </h3>

<?php switch (2):
    case 1: ?>

        <h1>Hạng 1</h1>

    <?php break;
    case 2: ?>

        <h2>Hạng 2</h2>

    <?php break;
    default: ?>

        <h3>Hạng 3</h3>

<?php break;
endswitch; ?>