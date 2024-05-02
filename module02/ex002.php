<?php
// Nối Biến trong PHP

// Nối các Biến bằng dấu chấm .

$str1 = 'Học Lập Trình';
$str2 = 'Cơ Bản';

// Nối và Hiển thị
echo $str1 . $str2;
echo '<br/>';

echo $str1 . ' ' . $str2;
echo '<br/>';

echo $str1 . ' PHP ' . $str2 . '<br/>';

// Nối và Gán (Code đọc từ phải sang trái)
$result = $str1 . ' PHP ' . $str2;
echo $result;
echo '<br/>';

// Lưu ý: khi dùng dấu ngoặc đơn và dấu ngoặc kép
$result = $str1 . ' Nâng Cao';
echo $result;
echo '<br/>';

$result = $str1 . " Nâng Cao";
echo $result;
echo '<br/>';

// Sự khác nhau khi dùng dấu ngoặc đơn và dấu ngoặc kép
// Đặt Biến trong dấu ngoặc kép (code vẫn hiểu giá trị của biến)
$result = "$str1 Nâng Cao";
echo $result;
echo '<br/>';

// Còn khi đặt biến dấu ngoặc đơn (code không hiểu)
$result = '$str1 Nâng Cao';
echo $result;
echo '<br/>';

// Lưu ý: khi đặt biến vào trong dấu ngoặc kép cần phải có dấu ngoặc nhọn bao quanh biến
$result = "Tự học $str1Nâng Cao"; // BÁO LỖI
echo $result;
echo '<br/>';

$result = "Tự học {$str1}Nâng Cao";
echo $result;
echo '<br/>';


// Gán Biến vào trong 1 chuỗi HTML
$url = 'https://www.w3schools.com/';
$imgUrl = 'https://www.w3schools.com/html/smiley.gif';
$imgAlt = 'HTML tutorial';
$imgStyle = 'width:42px;height:42px;';

$htmlOutput = '<a href="' . $url . '"><img src="' . $imgUrl . '" alt="' . $imgAlt . '" style="' . $imgStyle . '"></a>';
echo $htmlOutput;
echo '<br>';

// Lưu ý: Biến số nối với biến chuỗi
$num = 10;
$str = ' năm chưa gặp.';

$result = $num . $str;
var_dump($result);
echo '<br>';

$str = 'Điểm ';
$result = $str . $num;
var_dump($result);

// 1 số nối 1 chuỗi vẫn là 1 chuỗi