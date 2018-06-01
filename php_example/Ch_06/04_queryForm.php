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

$colname_Recordset1 = "-1";
if (isset($_POST['studno'])) {
  $colname_Recordset1 = $_POST['studno'];
}
mysql_select_db($database_sql1, $sql1);
$query_Recordset1 = sprintf("SELECT * FROM score1 WHERE studno = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $sql1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料查詢表單</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="04_queryForm.php">
  <label for="studno">請輸入學號：</label>
  <input name="studno" type="text" id="studno" value="<?php echo $row_Recordset1['studno']; ?>" />
  <label for="button"></label>
  <input type="submit" name="button" id="button" value="送出" />
[<a href="01_dataSet.php">回主畫面</a>]
</form>
<p>學號：<?php echo $row_Recordset1['studno']; ?><br />
  月考代號：<?php echo $row_Recordset1['examno']; ?><br />
  國文：<?php echo $row_Recordset1['chi']; ?><br />
  英文：<?php echo $row_Recordset1['eng']; ?><br />
數學：<?php echo $row_Recordset1['math']; ?></p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
