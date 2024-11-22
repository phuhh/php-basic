<?php

// stdClass là class có sẵn trong PHP thường dùng để thêm và truy cập thuộc tính khi cần.

$car = new stdClass;

// Định nghĩa thuộc tính
$car->brand = 'Toyota';
$car->name = 'Innova';
$car->color = 'White';
var_dump($car);
