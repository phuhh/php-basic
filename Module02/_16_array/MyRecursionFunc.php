<?php

if (!function_exists('buildMenuBasic')) {
    function buildMenuBasic($menu)
    {
        if (!empty($menu) && is_array($menu)) {
            echo '<ul class="menu">';

            foreach ($menu as $item) {
                echo '<li><a href="' . $item['link'] . '">' . $item['title'] . '</a>';
                if (!empty($item['sub'])) {
                    echo '<ul class="sub-menu">';
                    foreach ($item['sub'] as $sub) {
                        echo '<li><a href="' . $sub['link'] . '">' . $sub['title'] . '</a></li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            echo '</ul>';
        }
    }
}
/**
 * Xây dụng menu dưới dạng dữ liệu cây
 */
if (!function_exists('buildMenu')) {
    function buildMenu($dataArr, $isChildren = false)
    {
        if (!empty($dataArr) && is_array($dataArr)) {
            $cssClass = $isChildren ? 'class="sub-menu"' : 'class="menu"';
            echo '<ul ' . $cssClass . '>';

            foreach ($dataArr as $item) {
                echo '<li><a href="' . $item['link'] . '">' . $item['title'] . '</a>';
                // Kiểm tra nếu có tồn con
                if (!empty($item['sub'])) {
                    // gọi lại chính nó
                    buildMenu($item['sub'], true);
                }
                echo '</li>';
            }

            echo '</ul>';
        }
    }
}
/**
 * Xây dựng menu dưới dạng dữ liệu cha con (parentID)
 */
if (!function_exists('makeMenu')) {
    function makeMenu($dataArr, $parentID = 0, $isSub = false)
    {
        $childrenArr = [];
        if (!empty($dataArr) && is_array($dataArr)) {
            foreach ($dataArr as $key => $item) {
                if ($item['parent_id'] == $parentID) {
                    $childrenArr[] = $item;
                    unset($dataArr[$key]);
                }
            }
        }

        if (!empty($childrenArr) && is_array($childrenArr)) {
            $cssClass = $isSub ? 'class="sub-menu"' : 'class="menu"';

            echo '<ul ' . $cssClass . '>';
            foreach ($childrenArr as $key => $child) {
                echo '<li><a href="' . $child['link'] . '">' . $child['title'] . '</a>';
                makeMenu($dataArr, $child['id'], true);
                echo '</li>';
            }
            echo '</ul>';
        }
    }
}
/**
 * Xây dựng danh mục
 */
if (!function_exists('makeSelect')) {
    function makeSelect($dataArr, $parentID = 0, $char = '')
    {
        if (!empty($dataArr) && is_array($dataArr)) {
            foreach ($dataArr as $key => $item) {
                if ($item['parent_id'] == $parentID) {
                    echo '<option value="' . $item['id'] . '">' . $char . $item['title'] . '</option>';
                    unset($dataArr[$key]);
                    makeSelect($dataArr, $item['id'], $char . '--');
                }
            }
        }
    }
}

/**
 * Xây dựng dữ liệu dạng cây (sub)
 */
if (!function_exists('buildTree')) {
    function buildTree($dataArr, $parentID = 0, &$resultArr = [])
    {
        if (!empty($dataArr) && is_array($dataArr)) {
            foreach ($dataArr as $key => $item) {
                if ($item['parent_id'] == $parentID) {
                    $resultArr[$key] = $item;
                    buildTree($dataArr, $item['id'], $resultArr[$key]['sub']);
                    if (empty($resultArr[$key]['sub'])) {
                        unset($resultArr[$key]['sub']);
                    }
                    unset($dataArr[$key]);
                }
            }
        }
        return $resultArr;
    }
}
/**
 * Đệ quy xuôi từ Cha tìm Con
 */
if (!function_exists('getChildrenByParentID')) {
    function getChildrenByParentID($dataArr, $parentID = 0, &$resultArr = [])
    {
        if (!empty($dataArr) && is_array($dataArr)) {
            if ($parentID) {
                foreach ($dataArr as $item) {
                    if ($item['parent_id'] == $parentID) {
                        $resultArr[] = $item;
                        getChildrenByParentID($dataArr, $item['id'], $resultArr);
                    }
                }
            }
        }
        return $resultArr;
    }
}
