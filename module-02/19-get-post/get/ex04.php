<?php

/**
 * Vấn đề trong URL: Một số trình duyệt sẽ mã hoá giá trị trong query string
 * 
 * - Lấy giá trị ra sẽ không chính xác.
 * 
 * Trường hợp: ?module=Tin%20Tức
 * 
 * Giải pháp mã hoá url: ?module=Tin+Tức
 *
 */


$data = ['Tin Tức', 'Sản Phẩm'];

echo '<ul>';
foreach ($data as $item) {
    // Hàm urlencode($queryString): Mã hoá chuỗi url
    $urlEncode = urlencode($item);
    echo '<li><a href="?module=' . $urlEncode . '">' . $item . '</a></li>';
}
echo '</ul>';

if (isset($_GET['module'])) {
    // Hàm urldecode($queryString): Giải mã chuỗi url
    $urlDecode = urldecode($_GET['module']);
    echo 'Kết quả: <b>' . $urlDecode . '</b>';
}

/**
 * Giúp ít trong tìm kiếm tiếng viêt có dấu, lấy ra giá trị chính xác
 */
