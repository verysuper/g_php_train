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

$maxRows_rs = 5;
$pageNum_rs = 0;
if (isset($_GET['pageNum_rs'])) {
  $pageNum_rs = $_GET['pageNum_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;

mysql_select_db($database_studentdb, $studentdb);
$query_rs = "SELECT * FROM student ORDER BY studno ASC";
$query_limit_rs = sprintf("%s LIMIT %d, %d", $query_rs, $startRow_rs, $maxRows_rs);
$rs = mysql_query($query_limit_rs, $studentdb) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);

if (isset($_GET['totalRows_rs'])) {
  $totalRows_rs = $_GET['totalRows_rs'];
} else {
  $all_rs = mysql_query($query_rs);
  $totalRows_rs = mysql_num_rows($all_rs);
}
$totalPages_rs = ceil($totalRows_rs/$maxRows_rs)-1;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
<table border="1" style='margin:auto;'>
  <tr>
	<td>學號</td>
        <td>姓名</td>
        <td>電話</td>
    <td>地址</td>
	</tr>
  <?php do { ?>
  <tr>
    <td><a href="update.php?studno=<?php echo $row_rs['studno']; ?>"><?php echo $row_rs['studno']; ?></a></td>
    <td><?php echo $row_rs['name']; ?></td>
    <td><?php echo $row_rs['phone']; ?></td>
    <td><?php echo $row_rs['address']; ?></td>
  </tr>
  <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
  <tr>
  	<td colspan="2">[<a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, 0, $queryString_rs); ?>">第一頁</a>]
[<a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, max(0, $pageNum_rs - 1), $queryString_rs); ?>">上一頁</a>]
[<a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, min($totalPages_rs, $pageNum_rs + 1), $queryString_rs); ?>">下一頁</a>]
[<a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, $totalPages_rs, $queryString_rs); ?>">最後一頁</a>]</td>
  	<td colspan="2">第 <?php echo ($startRow_rs + 1) ?> 筆至第 <?php echo min($startRow_rs + $maxRows_rs, $totalRows_rs) ?> 筆/共 <?php echo $totalRows_rs ?>  筆</td>
  </tr>
  <tr>
  	<td colspan="4">
    [<a href="insert.php">新增</a>]
    [<a href="delete.php">刪除</a>]
    <form action="update.php" method="get">
    [請輸入要修改資料的學號： <input type="text" name="studno" id=""> <input type="submit" value="查詢">
	]</form>
    </td>
  </tr>
</table>
<h1 align="center"><?php echo $_GET['mag'];?></h1>
</body>
</html>
<?php
mysql_free_result($rs);
?>
