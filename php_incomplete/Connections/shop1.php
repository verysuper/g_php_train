<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_shop = "sql202.byethost.com";
$database_shop = "b32_21963639_shop";
$username_shop = "b32_21963639";
$password_shop = "1Qaz2Wsx";
$shop = mysql_pconnect($hostname_shop, $username_shop, $password_shop) or trigger_error(mysql_error(),E_USER_ERROR); 
?>