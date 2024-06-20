<?php

/**
 * Câu lệnh rẽ nhánh
 * 
 * Câu lệnh switch
 * 
 * switch(bieu-thuc-hoac-bien) {
 *     case gia-tri-1:
 *             // Thực thi câu lệnh nếu bằng với giá trị 1
 *         break;
 *     case gia-tri-2:
 *             // Thực thi câu lệnh nếu bằng với giá trị 2
 *         break;
 *     case gia-tri-3:
 *             // Thực thi câu lệnh nếu bằng với giá trị 3
 *         break;
 *     case gia-tri-n:
 *             // Thực thi câu lệnh nếu bằng với giá trị n
 *         break;
 *     default:
 *            // Thực thi câu lệnh nếu các giá trị trên đều sai
 *         break;
 * }
 *    Lưu ý:
 *        - Giá trị case chỉ chấp nhận: int, string, boolean, null, float
 *        - Quan hệ so sánh trong câu lệnh switch...case luôn là so sanh 2 dấu bằng (==)
 * 
 *    Từ khoá break dùng để thoát ra khỏi câu lệnh switch sau khi thực hiện đoạn code bên trong case hoặc default.
 * 
 */
$number = 1;
switch ($number) {
    case 1:
        // Code case 1
        break;
    case 2:
        // Code case 2
        break;
    case 3:
        // Code case 3
        break;
    default:
        // Code default
        break;
}

/**
 * Trường hợp: nhiều case cùng thực thi câu lệnh
 * 
 * switch(bieu-thuc-hoac-bien) {
 *     case gia-tri-1:
 *     case gia-tri-2:
 *             // Thực thi câu lệnh nếu bằng với giá trị 1 HOẶC giá trị 2
 *         break;
 *     case gia-tri-3:
 *     case gia-tri-4:
 *             // Thực thi câu lệnh nếu bằng với giá trị 3 HOẶC giá trị 4
 *         break;
 *     case gia-tri-5:
 *             // Thực thi câu lệnh nếu bằng với giá trị 5
 *         break;
 *     default:
 *            // Thực thi câu lệnh nếu các giá trị trên đều sai
 *         break;
 * }
 * 
 * BÀI TẬP: Kiểm tra thứ trong tuần
 */
$number = 6;
switch ($number) {
    case 1:
        echo 'Chủ Nhật';
        break;
    case 2:
        echo 'Thứ Hai';
        break;
    case 3:
        echo 'Thứ Ba';
        break;
    case 4:
        echo 'Thứ Tư';
        break;
    case 5:
        echo 'Thứ Năm';
        break;
    case 6:
        echo 'Thứ Sáu';
        break;
    case 7:
        echo 'Thứ Bảy';
        break;
    default:
        echo 'Không Hợp Lệ';
        break;
}
echo '<br>';

/**
 * - switch...case được dùng khi câu điều kiện có nhiều nhành. Tuy nhiên kém linh hoạt hơn if..else
 * - switch...case có thể kết hợp if...else để tăng sự linh hoạt
 * - switch...case có thể lồng với switch...case con (nhưng rất rối ren)
 * 
 * BÀI TẬP: Kiểm tra số ngày trong tháng
 * INPUT: nhập tháng và năm
 * OUTPUT: Đưa ra số ngày trong tháng
 */

$year = 2024; // năm 1800 không năm nhuận / năm 2000 năm nhuận
$month = 2;
$days = 0;

switch ($month) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        $days = 31;
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        $days = 30;
        break;
    case 2:
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                $days = 29;
            } else {
                $days = 28;
            }
        } elseif ($year % 4 == 0) {
            $days = 29;
        } else {
            $days = 28;
        }
        break;
}

echo "Tháng {$month} Năm {$year} có {$days} ngày";
