<?php

/**
 * Chuỗi HTML
 * 
 * 12. Chuyển chuỗi HTML thành dạng thực thể
 * 
 * Cú pháp: htmlentities($html)
 */
$html = '<a href="/">Click Here</a>';
$str = htmlentities($html); // Output: <a href="/">Click Here</a>
// View Page Source: &lt;a href=&quot;/&quot;&gt;Click Here&lt;/a&gt;
echo $str . '<br>';

/**
 * htmlspecialchars() Tương tự hàm htmlentities()
 * 
 * Cú pháp: htmlspecialchars($html)
 */
$html = '<a href="/">Click Here</a>';
$str = htmlspecialchars($html); // Output: <a href="/">Click Here</a>
// View Page Source: &lt;a href=&quot;/&quot;&gt;Click Here&lt;/a&gt;
echo $str . '<br>';

/**
 * VẤN ĐỀ: htmlentities destroys uft-8 strings
 * 
 * GIẢI PHÁP:
 */
$script = '<script>alert("Xin Chào Chúc Một Ngày Tốt Lành.")</script>';
echo $script;
$input = htmlspecialchars($script, ENT_QUOTES, "UTF-8");
echo $input . '<br>';
// This is also better at preventing xss than just htmlentities()

/**
 * 13. Chuyển dạng thực thể sang chuỗi HTML
 * 
 * Cú pháp: html_entity_decode($str)
 */
$str = '&lt;a href=&quot;/&quot;&gt;Click Here&lt;/a&gt;';
$html = html_entity_decode($str); // Display: Click Here
echo $html . '<br>';

/**
 * htmlspecialchars_decode() Tương tự hàm html_entity_decode()
 * 
 * Cú pháp: htmlspecialchars_decode($str)
 */
$str = '&lt;a href=&quot;/&quot;&gt;Click Here&lt;/a&gt;';
$html = htmlspecialchars_decode($str); // Display: Click Here
echo $html . '<hr>';

/**
 * 14. Xoá thẻ html
 * 
 * Cú pháp: strip_tags($html)
 */
$html = '<p>Vui lòng nhấn: <a href="/">Click <b>Here<b></a></p>';
$html = strip_tags($html);
echo $html . '<br>';

// Tham số 2 cho phép các thẻ html không bị xoá
$html = '<p>Vui lòng nhấn: <a href="/">Click <b>Here<b></a></p>';
$html = strip_tags($html, '<a><b>');
echo $html . '<br>';
