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

$colname_Recordset1 = "-1";
if (isset($_POST['studno'])) {
  $colname_Recordset1 = $_POST['studno'];
}

mysql_select_db($database_studentdb, $studentdb);
$query_Recordset1 = sprintf("SELECT * FROM student WHERE studno = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $studentdb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>查詢資料 | 學生資料表</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <p>
    <label for="studno">請輸入學號:</label>
    <input name="studno" type="text" id="studno" value="<?php echo $row_Recordset1['studno']; ?>">
    <input type="submit" name="submit" id="submit" value="查詢" onClick="check()">
    <input type="button" value="回上頁" onClick="history.go(-1)">
  </p>
  <p>學號：<?php echo $row_Recordset1['studno']; ?></p>
  <p>姓名：<?php echo $row_Recordset1['name']; ?></p>
  <p>電話：<?php echo $row_Recordset1['phone']; ?></p>
  <p>地址；<?php echo $row_Recordset1['address']; ?></p>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
<script>
function check(){
	<?
	if (!isset($_POST['studno'])){
	?>
		alert("查無此人.....");
	<?
	}
	?>
}
</script>
