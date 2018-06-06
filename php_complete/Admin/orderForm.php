<?php require_once('../Connections/Shop.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "Y";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

$maxRows_ordersList = 6;
$pageNum_ordersList = 0;
if (isset($_GET['pageNum_ordersList'])) {
  $pageNum_ordersList = $_GET['pageNum_ordersList'];
}
$startRow_ordersList = $pageNum_ordersList * $maxRows_ordersList;

mysql_select_db($database_Shop, $Shop);
$query_ordersList = "SELECT * FROM orders ORDER BY orderDate DESC";
$query_limit_ordersList = sprintf("%s LIMIT %d, %d", $query_ordersList, $startRow_ordersList, $maxRows_ordersList);
$ordersList = mysql_query($query_limit_ordersList, $Shop) or die(mysql_error());
$row_ordersList = mysql_fetch_assoc($ordersList);

if (isset($_GET['totalRows_ordersList'])) {
  $totalRows_ordersList = $_GET['totalRows_ordersList'];
} else {
  $all_ordersList = mysql_query($query_ordersList);
  $totalRows_ordersList = mysql_num_rows($all_ordersList);
}
$totalPages_ordersList = ceil($totalRows_ordersList/$maxRows_ordersList)-1;

$queryString_ordersList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ordersList") == false && 
        stristr($param, "totalRows_ordersList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ordersList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ordersList = sprintf("&totalRows_ordersList=%d%s", $totalRows_ordersList, $queryString_ordersList);
 session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/ShopAdmin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<script language="javascript" src="../Scripts/menu.js"/></script>
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>伴手網後台</title>
<!-- InstanceEndEditable -->

<!-- Meta Tags -->
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
<meta name="robots"      content="index, follow" />
<meta name="description" content="" />
<meta name="keywords"    content="" />
<meta name="author"      content="" />

<!-- Favicon -->
<link rel="shortcut icon" href="" />

<!-- CSS -->
<link rel="stylesheet" href="../css/styles.css" media="all" type="text/css" />

<!-- RSS -->
<link rel="alternate" href="" title="RSS Feed" type="application/rss+xml" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<?php
function LastOrders(){
	$sql = 'SELECT `O_id` FROM `orders` WHERE `shipment` = \'N\' ORDER BY `O_id` DESC';
	$resource = mysql_query($sql);	
	if(mysql_num_rows($resource)>0){
		$result = "";	
		while($record=mysql_fetch_row($resource)){	
			$title = "訂單編號:".$record[0];
			$result=$result.'<li><a href="orderProcess.php?oid='.$record[0].'">'.$title."</a></li>\n";
		}
		return $result;
	}else{
		return "<li>尚無未處理訂單</li>";
	}
}
?>
<body>
  <div id="header">
      <div class="subContainer">
            <div id="logo">
            <div id="box">H2H</div>
            <p>咱的好伴手後台</p>
            </div><!-- /logo -->
    </div><!-- /subContainer -->
</div><!-- header -->
    
<div id="navigation">   
	<ul id="sddm">
        <li><a href="index.php">首頁</a></li>
        <li><a href="productBrowser.php">商品瀏覽</a></li>        
	    <li><a href="#" 
        onmouseover="mopen('m1')" 
        onmouseout="mclosetime()">商品管理</a>
        <div id="m1" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="productState.php">商品上下架</a>
        <a href="productAdd.php">商品新增</a>
        </div>
    	</li>        
        <li><a href="orderForm.php">訂單處理</a></li>   
	    <li><a href="#" 
        onmouseover="mopen('m2')" 
        onmouseout="mclosetime()">公佈欄管理</a>
        <div id="m2" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="publishBrowser.php">訊息瀏覽、維護</a>
        <a href="publishAdd.php">訊息新增</a>
        </div>
    	</li>        
		</ul> 
<div style="clear:both"></div>    
</div><!-- /navigation -->
<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="780" height="120">
    <param name="movie" value="../Scripts/pic.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="8.0.35.0" />

    <param name="expressinstall" value="../Scripts/expressInstall.swf" />
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="../Scripts/pic.swf" width="780" height="120">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="8.0.35.0" />
      <param name="expressinstall" value="../Scripts/expressInstall.swf" />
      <div>
        <h4>這個頁面上的內容需要較新版本的 Adobe Flash Player。</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="取得 Adobe Flash Player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
<div id="container"><!-- InstanceBeginEditable name="EditRegion1" -->
  <div id="primaryContent">
    <h2>會員訂單瀏覽</h2>
    <h3>依訂單日期遞減排序，出貨處理或查看訂單細目請按下「出貨」按鈕。</h3>
&nbsp;
    <table border="0">
      <tr>
        <td><?php if ($pageNum_ordersList > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_ordersList=%d%s", $currentPage, 0, $queryString_ordersList); ?>">第一頁</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_ordersList > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_ordersList=%d%s", $currentPage, max(0, $pageNum_ordersList - 1), $queryString_ordersList); ?>">上一頁</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_ordersList < $totalPages_ordersList) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_ordersList=%d%s", $currentPage, min($totalPages_ordersList, $pageNum_ordersList + 1), $queryString_ordersList); ?>">下一頁</a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_ordersList < $totalPages_ordersList) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_ordersList=%d%s", $currentPage, $totalPages_ordersList, $queryString_ordersList); ?>">最後一頁</a>
            <?php } // Show if not last page ?></td>
      </tr>
    </table>
記錄 <?php echo ($startRow_ordersList + 1) ?> 到 <?php echo min($startRow_ordersList + $maxRows_ordersList, $totalRows_ordersList) ?> 共 <?php echo $totalRows_ordersList ?>
</p>
  <?php if ($totalRows_ordersList > 0) { // Show if recordset not empty ?>
    <table width="100%" border="0">
      <tr>
        <th scope="col"><p>訂單編號</p></th>
        <th scope="col"><p>會員ID</p></th>
        <th scope="col"><p>訂購日期</p></th>
        <th scope="col"><p>出貨否</p></th>
        <th scope="col"><p>出貨/詳細</p></th>
      </tr>
      <?php do { ?>
  <form id="form1" method="POST" action="orderProcess.php">    
        <tr>
          <th scope="row"><p><?php echo $row_ordersList['O_id']; ?>
            <input name="oid" type="hidden" id="oid" value="<?php echo $row_ordersList['O_id']; ?>" />
          </p></th>
          <td><p><?php echo $row_ordersList['userid']; ?></p></td>
          <td><h4><?php echo $row_ordersList['orderDate']; ?></h4></td>
          <td><h5><?php echo $row_ordersList['shipment']; ?></h5></td>
          <td><button type="submit">出貨/詳細</button></td>
        </tr>
        </form>
        <?php } while ($row_ordersList = mysql_fetch_assoc($ordersList)); ?>
    </table>
    <?php } // Show if recordset not empty ?>
    <p>&nbsp;</p>
    <table width="90%" border="0">
      <?php if ($totalRows_ordersList == 0) { // Show if recordset empty ?>
        <tr>
          <th scope="col"><h5>資料庫目前尚無商品！</h5></th>
        </tr>
        <?php } // Show if recordset empty ?>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- /comments -->
  </div>
<!-- InstanceEndEditable -->
  <!-- /primaryContent -->
  <div id="secondaryContent">
    <p>&nbsp;</p>
    <h3>未處理訂單</h3>
    <ul class="links">    
	<?php	
    echo LastOrders();
    ?>    
    </ul>    
    <h3>相關連結</h3>
    <!-- 
            This part was designed to handle images
            -->
    <ul class="links">
      <li><a href="http://www.pcschool.com.tw/">巨匠電腦</a></li>
      <li><a href="http://kid.pcschool.com.tw/">兒童電腦</a></li>      
      <li><a href="http://www.soeasyedu.com.tw/">數位學習</a></li>
      <li><a href="http://www.soeasyedu.com.tw/">巨匠美語</a></li>  
      <li><a href="http://www.off.com.tw/weiblog">給我建議</a>
    </ul>
    <?php if(!isset($_SESSION['MM_Username'])){?>    
    <h3>管理員登入</h3>
    <form action="logincheck.php" method="post">
      <p>
        <input value="user" name="user" />
      </p>
      <p>
        <input name="password" type="password" value="password" />
      </p>
      <p>
        <button type="submit">送出</button>
      </p>
    </form>
	<?php }else{ ?>
    <h3>管理員服務</h3>
    <form action="logout.php" method="post">
    <p>歡迎 <?php echo $_SESSION['MM_Username'];?> 您光臨</p>
    <p><button type="submit">登出</button></p>
    </form>
    <?php }?>        
  </div>
  <!-- /secondaryContent -->
        <br class="clear" />    
</div><!-- container -->
    
    <div id="footer">
        <ul>
            <li id="copyright">&copy; 2009 Free for Gjun student member</li>
            <li id="links">
                <ul>
                    <li><a href="http://validator.w3.org/check/referer">XHTML</a> |</li>
                    <li><a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> |</li>
                    <li><a href="http://www.off.com.tw/weiblog">Wei-Tsai Chung</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /footer -->
<script type="text/javascript">

    </script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($ordersList);
?>
