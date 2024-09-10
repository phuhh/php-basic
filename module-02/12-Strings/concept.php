<?php

/**
 * Khái Niệm
 * String (chuỗi) là mảng bao gồm các ký tự.
 * - Hiểu đơn giản chuỗi là danh sách các ký tự nằm trong dấu ngoặc kép hoặc dấu ngoặc đơn.
 * 
 */
$str = 'Lorem ipsum';
var_dump($str);
/**
 * Output: string(11) "Lorem ipsum"
 * index
 * 0 -> L
 * 1 -> o
 * 2 -> r
 * 3 -> e
 * 4 -> m
 * 5 -> (khoảng trắng)
 * 6 -> i
 * 7 -> p
 * 8 -> s
 * 9 -> u
 * 10 -> m
 */
echo '<br>';
//viết chuỗi đặt trong dấu ngoặc kép
$str = "Lorem ipsum";
var_dump($str);
echo '<br>';

// viết chuỗi HTML
$html = '<a href="#">Click Here</a>';
echo $html;
echo '<br>';

// Gán chuỗi vào 1 hằng số
define('BASE_URL', 'localhost');
echo BASE_URL;
echo '<hr>';


/**
 * Nguyên tắc làm việc trong chuỗi
 * 
 * Chú thích: Dấu gách gạch chéo ngược Tiếng Anh Tin Học gọi là: Backslash hoặc Escape
 * 
 * 1. Chuỗi trong dấu ngoặc kép có dấu ngoặc kép bên trong đặt dấu escape \ phía trước
 */
$str = "Lorem ipsum \"dolor sit amet\" consectetur adipisicing elit.";
echo $str;
echo '<br>';

/**
 * 2. Chuỗi trong dấu ngoặc đơn có dấu ngoặc đơn bên trong dấu esacape \ phía trước
 */
$str = 'Lorem ipsum \'dolor sit amet\' consectetur adipisicing elit.';
echo $str;
echo '<br>';

/**
 * 3. KHÔNG sử dụng dấu ngoặc escape \
 * - Chuỗi trong dấu ngoặc kép thì bên trong sử dụng dấu ngoặc đơn
 */
$str = 'Lorem ipsum "dolor sit amet" consectetur adipisicing elit.';
echo $str;
echo '<br>';
// - Ngược lại, Chuỗi trong dấu đơn thì bên trong sử dụng dấu ngoặc kép
$str = "Lorem ipsum 'dolor sit amet' consectetur adipisicing elit.";
echo $str;
echo '<br>';

/**
 * Kinh nghiệm
 * - Thường dùng dấu ngoặc đơn cho chuỗi. Trong đó có chuỗi HTML
 */
$html = '<a href="#">Click Here 2</a>';
echo $html;
echo '<br>';

// - Thường dùng dấu ngoặc kép cho việc truyền Biến vào trong chuỗi hoặc trong chuỗi có ký tự dấu không cần sử dụng escape
$age = 3;
$str = "Phần $age tuổi đời hoang phế sao lưng";
echo $str;
echo '<hr>';


/**
 * Nối Chuỗi (dùng dấu chấm .)
 */
echo '<label for="birthYear">Năm Sinh: </label>';
$html = '<select id="birthYear">';
for ($i = 1900; $i <= 2006; $i++) {
    if ($i === 1991) {
        $html .= '<option value="' . $i . '" selected>' . $i . '</option>';
    } else {
        $html .= '<option value="' . $i . '">' . $i . '</option>';
    }
}
$html .= '</select>';
echo $html;
