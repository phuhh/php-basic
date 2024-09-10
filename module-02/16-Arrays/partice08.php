<?php

require_once './MyRecursionFunc.php';
/**
 * Tiếp tục: Hiển thị menu qua đệ quy
 * 
 * Lưu ý: dữ liệu cha - con
 */

$data = [
    ['id' => 1, 'title' => 'Trang Chủ', 'link' => '#trang-chu', 'parent_id' => 0],
    ['id' => 2, 'title' => 'Tin Tức', 'link' => '#tin-tuc', 'parent_id' => 0],
    ['id' => 3, 'title' => 'Sản Phẩm', 'link' => '#san-pham', 'parent_id' => 0],
    ['id' => 4, 'title' => 'Liên Hệ', 'link' => '#lien-he', 'parent_id' => 0],
    ['id' => 5, 'title' => 'Điện Thoại', 'link' => '#dien-thoai', 'parent_id' => 3],
    ['id' => 6, 'title' => 'Máy Tính', 'link' => '#may-tinh', 'parent_id' => 3],
    ['id' => 7, 'title' => 'Linh Kiện', 'link' => '#linh-kien', 'parent_id' => 3],
    ['id' => 8, 'title' => 'Apple', 'link' => '#apple', 'parent_id' => 5],
    ['id' => 9, 'title' => 'Samsung', 'link' => '#samsung', 'parent_id' => 5],
    ['id' => 10, 'title' => 'Iphone 13', 'link' => '#iphone-13', 'parent_id' => 8],
    ['id' => 11, 'title' => 'Iphone 14', 'link' => '#iphone-14', 'parent_id' => 8],
    ['id' => 12, 'title' => 'Iphone 15', 'link' => '#iphone-15', 'parent_id' => 8],
    ['id' => 13, 'title' => 'Acer', 'link' => '#acer', 'parent_id' => 6],
    ['id' => 14, 'title' => 'Dell', 'link' => '#dell', 'parent_id' => 6],
    ['id' => 15, 'title' => 'HP', 'link' => '#hp', 'parent_id' => 6],
    ['id' => 16, 'title' => 'Túi Xách', 'link' => '#tui-xach', 'parent_id' => 7],
];

// echo "<pre>";
// print_r($menu);
// echo "</pre>";

makeMenu($data);
echo '<hr>';

echo '<select name="categories" id="categories">';
makeSelect($data);
echo '</select>';
echo '<hr>';

$tree = buildTree($data);
echo "<pre>";
print_r($tree);
echo "</pre>";
echo '<hr>';

$children = getChildrenByParentID($data, 5);
echo "<pre>";
print_r($children);
echo "</pre>";
