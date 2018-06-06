<?php require_once('Connections/studentdb.php'); ?>
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
  $deleteSQL = sprintf("DELETE FROM student WHERE studno=%s",
                       GetSQLValueString($_POST['studno'], "text"));

  mysql_select_db($database_studentdb, $studentdb);
  $Result1 = mysql_query($deleteSQL, $studentdb) or die(mysql_error());

  $deleteGoTo = "index.php?mag=成功刪除";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<form id="form1" name="form1" method="post">
<label for="studno">請輸入欲刪除學生之學號:</label>
<input type="text" name="studno" id="studno">
<input type="submit" name="submit" id="submit" value="確認刪除">
<input type="button" value="回上頁" onClick="history.go(-1)">
</form>
</body>
</html>