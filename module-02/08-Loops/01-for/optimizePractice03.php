<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <?php
    $alphaLoop = null;
    for ($col = 'a'; $col <= 'h'; $col++) {
        $alphaLoop .= '<td style="text-align: center; height: 30px;">' . $col . '</td>';
    }
    echo '<tr><td></td>' . $alphaLoop . '</tr>';

    $numLoop = 8;
    for ($row = 1; $row <= 8; $row++) {
        echo '<tr><td>' . $numLoop . '</td>';
        for ($col = 1; $col <= 8; $col++) {
            $total = $row + $col; // Quy luật: ô lẻ = màu trắng, ô chẵn = màu đen
            if ($total % 2 != 0) {
                echo '<td style="background-color: #000; width: 12.33%; height: 100px"></td>';
            } else {
                echo '<td style="background-color: #fff; width: 12.33%; height: 100px"></td>';
            }
        }
        echo '</tr>';
        $numLoop--;
    }
    ?>

</table>