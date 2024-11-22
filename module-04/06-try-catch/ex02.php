<?php
$age = 17;

try {
    //demo();

    if ($age < 18) {
        throw new Exception('Tuổi không hơp lệ');
    }
} catch (Error $e) {
    echo 'Error on line ' . $e->getLine() . ' in ' . $e->getFile()  . ': <b>' . $e->getMessage() . '</b><br />';
} catch (Exception $e) {
    echo 'Error on line ' . $e->getLine() . ' in ' . $e->getFile()  . ': <b>' . $e->getMessage() . '</b><br />';
}
