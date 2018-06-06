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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1") && ($_POST["name"] != "")) {
  $updateSQL = sprintf("UPDATE student SET name=%s, phone=%s, address=%s WHERE studno=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['studno'], "text"));

  mysql_select_db($database_studentdb, $studentdb);
  $Result1 = mysql_query($updateSQL, $studentdb) or die(mysql_error());

  $updateGoTo = "index.php?mag=資料已更新";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}else{echo 'name do not empty';}//____________________________________________

$colname_Recordset1 = "-1";
if (isset($_GET['studno'])) {
  $colname_Recordset1 = $_GET['studno'];
}
mysql_select_db($database_studentdb, $studentdb);
$query_Recordset1 = sprintf("SELECT * FROM student WHERE studno = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $studentdb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>

<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
<p>
<label for="studno">學號:</label><?php echo $row_Recordset1['studno']; ?>
<input name="studno" type="hidden" id="studno" value="<?php echo $row_Recordset1['studno']; ?>">
</p>
<p>
<label for="name">姓名:</label>
<input name="name" type="text" id="name" value="<?php echo $row_Recordset1['name']; ?>">
</p>
<p>
<label for="phone">電話:</label>
<input name="phone" type="text" id="phone" value="<?php echo $row_Recordset1['phone']; ?>">
</p>
<p>
<label for="address">地址:</label>
<input name="address" type="text" id="address" value="<?php echo $row_Recordset1['address']; ?>">
</p>
<input type="submit" value="修改紀錄">

<input type="button" value="回上頁" onClick="history.go(-1)">
<input type="hidden" name="MM_update" value="form1">
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
