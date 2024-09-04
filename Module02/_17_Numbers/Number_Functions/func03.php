<?php

/**
 * Lấy số nguyên ngẫu nhiên: rand() hoặc rand(min, max)
 */

$num = rand();
var_dump($num);
echo '<br>';

$num = rand(1, 10);
var_dump($num);
echo '<br>';

$num = rand(1, 100);
var_dump($num);
echo '<br>';
