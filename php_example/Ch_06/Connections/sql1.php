<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sql1 = "localhost";
$database_sql1 = "studentdb";
$username_sql1 = "root";
$password_sql1 = "0000";
$sql1 = mysql_pconnect($hostname_sql1, $username_sql1, $password_sql1) or trigger_error(mysql_error(),E_USER_ERROR); 
?>