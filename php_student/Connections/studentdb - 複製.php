<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_studentdb = "sql202.byethost.com";
$database_studentdb = "b32_21963639_studentdb";
$username_studentdb = "b32_21963639";
$password_studentdb = "1Qaz2Wsx";
$studentdb = mysql_pconnect($hostname_studentdb, $username_studentdb, $password_studentdb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>