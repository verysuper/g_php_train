<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_studentdb = "localhost";
$database_studentdb = "studentdb";
$username_studentdb = "root";
$password_studentdb = "0000";
$studentdb = mysql_pconnect($hostname_studentdb, $username_studentdb, $password_studentdb) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");
?>