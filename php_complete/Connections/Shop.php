<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Shop = "localhost";
$database_Shop = "shop";
$username_Shop = "root";
$password_Shop = "root";
$Shop = mysql_pconnect($hostname_Shop, $username_Shop, $password_Shop) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db("Shop",$Shop);
mysql_query("set names 'utf8'");
?>