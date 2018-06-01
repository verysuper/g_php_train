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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 6;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_studentdb, $studentdb);
$query_Recordset1 = "SELECT * FROM student ORDER BY studno DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $studentdb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>學生資料表</title>
<style type="text/css">
.ttt {
	margin:0 auto;
	border:1px solid #868484;
	border-collapse:collapse;
}
.ttt caption{font-size:2em; letter-spacing:5px; font-family:Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", serif;}
.ttt td{padding:3px;}
.ttt th{background:#999999; color:white;}
.ttt tr:nth-of-type(odd){background:#aaa; color:white;}
.ttt tr:nth-of-type(even){background:#fff; color:#5E5858;}
.ttt a{color:#5E5858; text-decoration:none; font-size:0.8em;}
</style>
</head>

<body>

<table summary="學生資料表摘要" class="ttt">
    <caption>
      學生資料表
    </caption>
    <tbody>
      <tr>
        <th>學號</th>
        <th>姓名</th>
        <th>電話</th>
        <th>地址</th>
      </tr>
      <?php do { ?>
      <tr>
        <td><a href="dataUpdate.php?studno=<?php echo $row_Recordset1['studno']; ?>"><?php echo $row_Recordset1['studno']; ?></a></td>
        <td><?php echo $row_Recordset1['name']; ?></td>
        <td><?php echo $row_Recordset1['phone']; ?></td>
        <td><?php echo $row_Recordset1['address']; ?></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      <tr>
      	<td colspan="2" align="center">
        [<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">第一頁</a>]
        [<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">上一頁</a>]
        [<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一頁</a>]
        [<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">最後一頁</a>]               
        </td>
        
        <td colspan="2" align="center">第&nbsp;<?php echo ($startRow_Recordset1 + 1) ?>&nbsp;筆至第&nbsp;<?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?>&nbsp;筆/共&nbsp;<?php echo $totalRows_Recordset1 ?>&nbsp;筆</td>
      </tr>
      <tr>
        <td colspan="4" align="center">[<a href="dataInsert.php">新增資料</a>][<a href="dataQuery.php">查詢資料</a>][<a href="dataDelete.php">刪除資料</a>]</td></tr>
    </tbody>
  </table>
  
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
