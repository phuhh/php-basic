<?php

/**
 * 28. Ký tự \n thành Thẻ xuống dòng HTML
 * 
 * Cú pháp: nl2br($str)
 * 
 * Lưu ý: phải đặt trong dấu ngoặc kép \n mới hiểu
 */

$str = nl2br("Trung Tâm Đào Tạo \n Lập Trình Unicode");
echo $str;
/**
 * View Source: 
 * Trung Tâm Đào Tạo <br />
 * Lập Trình Unicode
 */
