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

mysql_select_db($database_studentdb, $studentdb);
$query_Recordset1 = "SELECT * FROM score";
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
<table border="1">
  <tr>
	<th>學號</th>
	<th>月考代號</th>
	<th>國文</th>
	<th>英文</th>
	<th>數學</th>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_Recordset1['studno']; ?></td>
    <td><?php echo $row_Recordset1['examno']; ?></td>
    <td><?php echo $row_Recordset1['chi']; ?></td>
    <td><?php echo $row_Recordset1['eng']; ?></td>
    <td><?php echo $row_Recordset1['math']; ?></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
