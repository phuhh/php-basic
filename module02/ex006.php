<?php
// Câu lệnh điều kiện (câu lệnh rẽ nhánh)

/* Cấu trúc if 
if (dieu-kien) {
    // thuc-hien-code-neu-dieu-kien-dung
}
*/

$number = 1;
if ($number > 0) {
    echo $number . ' Là số nguyên dương';
}
echo '<br>';

$check = $number > 0;
if ($check) { // Tương đượng $check == true
    echo $number . ' Là số nguyên dương';
}
echo '<br>';

// Lưu ý: nếu chỉ 1 câu lệnh thì không cần dấu ngoặc nhọn
if ($check) echo $number . ' Là số nguyên dương';

echo '<br>';

/* Cấu trúc if...else...
if (dieu-kien) {
    // thuc-hien-code-neu-dieu-kien-dung
} else {
    // nguoc-lai-thuc-hien-code-neu-dieu-kien-sai
}
 */

$number = -1;
$check = $number > 0;

if ($check) {
    echo $number . ' Là số nguyên dương';
} else {
    echo $number . ' Không phải là số nguyên dương';
}
echo '<br>';

/** Viết tắt if...else **/
// Cách 1
if ($check)
    echo $number . ' Là số nguyên dương';
else
    echo $number . ' Không phải là số nguyên dương';

echo '<br>';

// Cách 2: dieu-kien ? tra-gia-tri-dung : tra-gia-tri-sai;
echo $check ? $number . ' Là số nguyên dương' : $number . ' Không phải là số nguyên dương';

echo '<br>';

/* Cấu trúc if...elseif...else

if (dien-kien-1) {
    // thuc-hien-code-neu-dieu-kien-1-dung
} elseif (dien-kien-2) {
    // nguoc-lai-thuc-hien-code-neu-dieu-kien-2-dung
} else {
    // nguoc-lai-thuc-hien-code-neu-tat-ca-dieu-kien-tren-sai   
}

// Có thể có nhiều elseif() trong câu lệnh điều kiện
 */

$point = -1;

if ($point == 10) {
    echo 'Học sinh Giỏi';
} elseif ($point == 9 || $point == 8) {
    echo 'Học sinh Khá';
} elseif ($point <= 7 && $point >= 5) {
    echo 'Học sinh Trung Bình';
} elseif ($point >= 0 && $point <= 4) {
    echo 'Học sinh Chưa Đạt';
} else {
    echo 'Không hợp lệ';
}

/* Cấu trúc if...else lồng nhau 

if(dieu-kien-1) {
    if(dieu-kien-1-a) {
        if(dieu-kien-1-1-a) {

        } else{
            
        }
    } else{
        
    }
}else{
    if(dieu-kien-1-b) {

    } else{
        
    }
}

*/