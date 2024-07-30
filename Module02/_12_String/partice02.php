<?php

/**
 * Bài 5: Nhập vào tên đầy đủ 1 người, viết chương trình in ra:
 * - Họ và tên lót
 * - Tên
 */

// Input:
$fullName = 'Nguyễn Văn Tuấn';

// Handle:
// Lấy Tên
$positionSpaceEnd = mb_strripos($fullName, ' ', 0, 'UTF-8');
$strLength = mb_strlen($fullName, 'UTF-8');
$firstName = mb_substr($fullName, $positionSpaceEnd + 1, $strLength - $positionSpaceEnd, 'UTF-8');
// Lấy Họ và tên lót
$lastName = mb_substr($fullName, 0, $positionSpaceEnd, 'UTF-8');

$output = "First Name: {$firstName} \n Last Name: {$lastName}";
$output = nl2br($output);
echo $output;
echo '<hr>';

/**
 * Bài 6: Viết chương trình in ra 50 chữ đầu tiên trong chuỗi
 */

// Input
$content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem voluptas harum ab, quod vel maxime eum praesentium ipsa officiis, repellendus consequatur, perspiciatis optio voluptates. Distinctio aperiam harum ea ullam ex? ';
$content .= 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, asperiores commodi debitis voluptate ratione dolorum necessitatibus fugit dolore aspernatur, veritatis voluptatem deleniti aperiam temporibus laboriosam laudantium optio sequi ipsam accusantium? ';
$content .= 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quidem iure delectus tempora consequuntur dolor minus voluptatem distinctio id et maiores a cupiditate officiis similique? Doloribus voluptates aut vel adipisci.';

// Handle
$description = null;
$limitWords = 20;

$countContent = strlen($content);
$countSpaces = 0;
for ($i = 0; $i < $countContent; $i++) {
    $char = substr($content, $i, 1);
    $description .= $char;
    //Đếm từ -> từ khoảng cách
    if ($char === ' ') {
        $countSpaces++;
    }
    // Điều kiện giới hạn bao nhiêu từ
    if ($countSpaces >= $limitWords) {
        break;
    }
}

// Output
echo $description;
echo '<br>';

$countCharacters = strlen($description);
$output = "Count Characters: {$countCharacters} \n Count Words: {$countSpaces}";
$output = nl2br($output);
echo $output;
echo '<hr>';

/**
 * Bài 7: Viết chương trình kiểm tra độ mạnh của mật khẩu
 * - Có độ dài tối thiểu là 6 ký tự
 * - Chứa ít nhất 1 chữ số (1234567890)
 * - Chứa ít nhất 1 kí tự chữ cái in thường (a-z)
 * - Chứa ít nhất 1 kí tự chữ cái in HOA (A-Z)
 * - Chứa ít nhất 1 ký tự đặt biệt: !@#$%^&*()-+
 */

$password = 'Hieuphu@123';

$numbers = '1234567890';
$symbols = '!@#$%^&*()-+';

$checkLength = false;
$checkNumber = false;
$checkLower = false;
$checkUpper = false;
$checkSymbol = false;

$countCharacters = mb_strlen($password, 'UTF-8');
if ($countCharacters >= 6) {
    $checkLength = true;
}

for ($i = 0; $i < $countCharacters; $i++) {
    $chart = mb_substr($password, $i, 1, 'UTF-8');
    if (mb_strpos($numbers, $chart, 0, 'utf-8') !== false) {
        $checkNumber = true;
    }

    if ($chart >= 'a' && $chart <= 'z') {
        $checkLower = true;
    }

    if ($chart >= 'A' && $chart <= 'Z') {
        $checkUpper = true;
    }

    if (mb_strpos($symbols, $chart, 0, 'utf-8') !== false) {
        $checkSymbol = true;
    }
}

if ($checkLength && $checkNumber && $checkLower && $checkUpper && $checkSymbol) {
    echo 'Mật khẩu mạnh';
} else {
    echo 'Mật khẩu yếu';
}
