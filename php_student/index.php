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
$query_rs = "SELECT * FROM student ORDER BY studno DESC";
$rs = mysql_query($query_rs, $studentdb) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<table>
  <tr>
	<td>學號</td>
        <td>姓名</td>
        <td>電話</td>
    <td>地址</td>
	</tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_rs['studno']; ?></td>
    <td><?php echo $row_rs['name']; ?></td>
    <td><?php echo $row_rs['phone']; ?></td>
    <td><?php echo $row_rs['address']; ?></td>
  </tr>
  <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($rs);
?>
