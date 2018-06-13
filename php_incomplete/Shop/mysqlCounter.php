<?php
session_start();	//加入啟動session
require_once('../Connections/shop.php'); //連結資料庫
?>
<?php
function sqlCounter($id){
global $database_shop;
global $shop;
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$query_Recordset1 = "SELECT * FROM `count` WHERE id = $id";
$Recordset1 = mysql_query($query_Recordset1, $shop) or die(mysql_error());
if(mysql_num_rows($Recordset1)<1){
	$query_Recordset1 = "INSERT INTO `count` VALUES($id,1)";
	mysql_query($query_Recordset1, $shop) or die(mysql_error());
	return sprintf("%06d",1);
}elseif(!$_SESSION['counter']){
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	$query_Recordset1 = "UPDATE `count` SET counter=".($row_Recordset1['counter']+1)." WHERE id = $id";
	mysql_query($query_Recordset1, $shop) or die(mysql_error());
	mysql_free_result($Recordset1);
	$_SESSION['counter']=TRUE;
	return sprintf("%06d",$row_Recordset1['counter']+1);
}else{
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	mysql_free_result($Recordset1);
	return sprintf("%06d",$row_Recordset1['counter']);
}
mysql_free_result($Recordset1);
}
?>
