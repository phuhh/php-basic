<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Export Database

mysqldump -u USERNAME -p PASSWORD > PATH/DB_EXPORT.sql

Lưu ý: có ký tự mũi tên lớn hơn



Import Database

mysql -u USERNAME -p PASSWORD < PATH/DB_EXPORT.sql

    Lưu ý: có ký tự mũi tên nhỏ hơn