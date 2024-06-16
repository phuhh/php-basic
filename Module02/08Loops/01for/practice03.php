<?php

/**
 * 5. Vẽ Bàn Cờ Vua
 * 
 * - Vẽ hàng dọc trước, tiếp vẽ hàng ngang sau
 */

?>

<table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr>
        <td></td>
        <?php for ($alpha = 'a'; $alpha <= 'h'; $alpha++) : ?>
            <td style="text-align: center;"><?= $alpha ?></td>
        <?php endfor; ?>
    </tr>

    <?php $num = 8; ?>
    <? for ($col = 1; $col <= 8; $col++) : ?>
        <tr>
            <td><?= $num ?></td>
            <? for ($row = 1; $row <= 8; $row++) : ?>

                <?php if ($row % 2 != 0) : ?>
                    <?php if ($col % 2 != 0) : ?>
                        <td style="background-color: #fff; width: 12.5%; height: 100px;"></td>
                    <?php else : ?>
                        <td style="background-color: #000; width: 12.5%; height: 100px;"></td>
                    <?php endif; ?>

                <?php else : ?>

                    <?php if ($col % 2 == 0) : ?>
                        <td style="background-color: #fff; width: 12.5%; height: 100px;"></td>
                    <?php else : ?>
                        <td style="background-color: #000; width: 12.5%; height: 100px;"></td>
                    <?php endif; ?>

                <?php endif; ?>

            <?php endfor; ?>
        </tr>
        <?php $num--; ?>
    <?php endfor; ?>

</table>