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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE score1 SET examno=%s, chi=%s, eng=%s, math=%s WHERE studno=%s",
                       GetSQLValueString($_POST['examno'], "int"),
                       GetSQLValueString($_POST['chi'], "int"),
                       GetSQLValueString($_POST['eng'], "int"),
                       GetSQLValueString($_POST['math'], "int"),
                       GetSQLValueString($_POST['studno'], "int"));

  mysql_select_db($database_sql1, $sql1);
  $Result1 = mysql_query($updateSQL, $sql1) or die(mysql_error());

  $updateGoTo = "01_dataSet.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_sql1, $sql1);
$query_Recordset1 = "SELECT * FROM score1 ORDER BY studno ASC";
$Recordset1 = mysql_query($query_Recordset1, $sql1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料更新表單</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">學號：</td>
      <td><?php echo $row_Recordset1['studno']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">月考代號：</td>
      <td><input type="text" name="examno" value="<?php echo htmlentities($row_Recordset1['examno'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">國文：</td>
      <td><input type="text" name="chi" value="<?php echo htmlentities($row_Recordset1['chi'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">英文：</td>
      <td><input type="text" name="eng" value="<?php echo htmlentities($row_Recordset1['eng'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">數學：</td>
      <td><input type="text" name="math" value="<?php echo htmlentities($row_Recordset1['math'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="更新記錄" />
      [<a href="01_dataSet.php">回主畫面</a>]</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="studno" value="<?php echo $row_Recordset1['studno']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
