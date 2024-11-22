<?php

/**
 * Tổng quát về Object (đối tượng)
 * - Object là 1 tập hợp các thuộc tính cụ thể nào đó cho 1 đối tượng cụ thể
 * - Object bao gồm:
 *    + Hằng số (const)
 *    + Thuộc tính (variable)
 *    + Phương thức (function)
 * - Để có object, ta cần phải định nghĩa lớp (class)
 */

/**
 * Phần 1: Sử dụng Object có sẵn trong PHP
 * 
 * Cú pháp tạo object
 * 
 * 1. $objName = new className($value(s));
 * 2. $objName = new className();
 * 3. $objName = new className;
 */

$dateObj = new DateTime();
// var_dump($dateObj);

/**
 * Cách truy cập thuộc tính
 * 
 * $objectName->propertyName;
 * 
 * Cách truy cập Hằng số 
 * 
 * $objName::CONSTNAME;
 * 
 * Cách truy cập phương thức
 * 
 * $objectName->methodName(value(s));
 * 
 * Ví dụ: Truy cập hằng số
 */

echo $dateObj::RSS . '<br>';
echo $dateObj::COOKIE . '<br>';

// Truy cập phương thức
echo $dateObj->format('d/m/Y H:i:s');
