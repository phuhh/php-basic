<?php

/**
 * Bài tập 3: Kiểm tra 1 số có phải là số nguyên tố không và hiển thị kết quả
 *
 * Xác định INPUT OUTPUT là gì ????
 * INPUT: Số Nguyên N
 * OUTPUT: Thông báo số N có phải là số nguyên tố không ???
 *
 * Công Thức là gì ???
 * Điều kiện số nguyên tố:
 * - Phải lớn hơn 1
 * - Chỉ chia hết cho 1 và chính nó
 *
 * Giải pháp là gì ???
 * Giải thuật
 * - Kiểm tra số n có lớn hơn 1 hay không ?
 * - Nếu số N lớn hơn 1
 * + Dùng vòng lặp chạy từ 2 đến N - 1
 * + Kiểm tra trong phạm vi từ 2 đến N - 1 có chia hết cho hết nào không?
 * -- Nếu có chia hết => kết quả không phải số nguyên tố
 * -- Nếu KHÔNG chia hết => kết quả là số nguyên tố
 * - Nếu số N nhỏ hơn 1 hoặc bằng 1 thì => thông báo không phải số nguyên tố
 */

$n = 5; // số cần kiểm tra
if ($n > 1) {
    $check = true; // Gắn cờ - Kiểm tra có phải số nguyên tố không (Giải định n là số nguyên)
    for ($index = 2; $index < $n; $index++) {
        if ($n % $index === 0) {
            $check = false;
        }
    }

    if ($check) { // if($check == true)
        echo $n . ' là số nguyên tố';
    } else {
        echo $n . ' không phải số nguyên tố';
    }
} else {
    echo $n . ' Không phải là số nguyên số';
}

/**
 * Bài 4: In bảng cửu chương
 * 
 * Kinh nghiệm: Vẽ HTML CSS trước rồi mới xử lý logic sau
 * 
 */
?>

<table border="1" width="100%" style="background-color:gray">
    <tr>
        <?php
        // lặp hàng toán hạng thứ 1
        for ($i = 1; $i <= 5; $i++) {
            echo '<td>';
            // lặp hàng toán hạng thứ 2
            for ($j = 1; $j <= 10; $j++) {
                echo $i . ' x ' . $j . ' = ' . $i * $j . ' <br>';
            }
            echo '</td>';
        }
        ?>
    </tr>

    <tr>
        <?php
        for ($i = 6; $i <= 10; $i++) {
            echo '<td>';
            for ($j = 1; $j <= 10; $j++) {
                echo $i . ' x ' . $j . ' = ' . $i * $j . ' <br>';
            }
            echo '</td>';
        }
        ?>
    </tr>
</table>
<hr>

<?php
/**
 * Tối ưu code
 */
?>
<table border="1" width="100%" style="background-color: yellow;">
    <?php
    for ($i = 1; $i <= 10; $i++) {
        // Xử lý khi mở thẻ tr
        if ($i == 1 || $i == 6) {
            echo '<tr>';
        }
        echo '<td>';
        for ($j = 1; $j <= 10; $j++) {
            echo $i . ' x ' . $j . ' = ' . $i * $j . ' <br>';
        }
        echo '</td>';
        if ($i == 5 || $i == 10) {
            echo '</tr>';
        }
    }
    ?>
</table>

<?php
/**
 * For lồng nhau chạy như thế nào ?
 * 
 * For (bên ngoài) sẽ chạy đầu tiên, tiếp đến chạy hết vòng lặp For (bên trong).
 * Quay lại: For (bên ngoài) sẽ chạy tiếp vòng lặp thứ 2, và tiếp tục chạy hết dòng lặp For (bên trong).
 * Tiếp tục quay lại: For (bên ngoài) sẽ chạy tiếp vòng lặp thứ 3, và tiếp tục chạy hết dòng lặp For (bên trong).
 * ...
 * Vòng sẽ lặp đến khi KHÔNG thoả mãn điều kiện For (bên ngoài) thì dừng.
 * 
 */
?>