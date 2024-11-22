<?php
header('Content-Type: text/plain; charset=utf-8');
?>
mysql access command line - TRUY CẬP MYSQL bằng command line


mysql -u USERNAME -p PASSWORD -h HOSTNAMEORIP DATABASENAME


-u: username
-p: password (**no space between -p and the password text**)
-h: host
last one is name of the database that you wanted to connect.


Ví dụ:

mysql -u root -p;