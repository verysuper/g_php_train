<?php require_once('Connections/sql1.php'); ?>
<?php
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

if ((isset($_POST['studno'])) && ($_POST['studno'] != "")) {
  $deleteSQL = sprintf("DELETE FROM score1 WHERE studno=%s",
                       GetSQLValueString($_POST['studno'], "int"));

  mysql_select_db($database_sql1, $sql1);
  $Result1 = mysql_query($deleteSQL, $sql1) or die(mysql_error());

  $deleteGoTo = "01_dataSet.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料刪除表單</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="05_deleteForm.php">
  <label for="studno">請輸入欲刪除學號：</label>
  <input type="text" name="studno" id="studno" />
  <label for="button"></label>
  <input type="submit" name="button" id="button" value="送出" />
[<a href="01_dataSet.php">回主畫面</a>]
</form>
</body>
</html>