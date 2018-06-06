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

$maxRows_publishList = 6;
$pageNum_publishList = 0;
if (isset($_GET['pageNum_publishList'])) {
  $pageNum_publishList = $_GET['pageNum_publishList'];
}
$startRow_publishList = $pageNum_publishList * $maxRows_publishList;

mysql_select_db($database_Shop, $Shop);
$query_publishList = "SELECT * FROM publish ORDER BY `update` DESC";
$query_limit_publishList = sprintf("%s LIMIT %d, %d", $query_publishList, $startRow_publishList, $maxRows_publishList);
$publishList = mysql_query($query_limit_publishList, $Shop) or die(mysql_error());
$row_publishList = mysql_fetch_assoc($publishList);

if (isset($_GET['totalRows_publishList'])) {
  $totalRows_publishList = $_GET['totalRows_publishList'];
} else {
  $all_publishList = mysql_query($query_publishList);
  $totalRows_publishList = mysql_num_rows($all_publishList);
}
$totalPages_publishList = ceil($totalRows_publishList/$maxRows_publishList)-1;

$queryString_publishList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_publishList") == false && 
        stristr($param, "totalRows_publishList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_publishList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_publishList = sprintf("&totalRows_publishList=%d%s", $totalRows_publishList, $queryString_publishList);
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
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
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
    <h2>公佈欄訊息瀏覽</h2>
    <h3>將列出所有公伂欄訊息，包含已超過有效期或未超過有效期。</h3>
    <table width="100%" border="0">
      <tr>
        <th scope="col"><p>標題</p></th>
        <th width="15%" scope="col"><p>發佈人</p></th>
        <th width="20%" scope="col"><p>發伂日期</p></th>
        <th width="20%" scope="col"><p>功能</p></th>
      </tr>
      <?php do { ?>
        <?php if ($totalRows_publishList > 0) { // Show if recordset not empty ?>
          <tr>
            <td scope="row"><p><a href="publishDetail.php?id=<?php echo $row_publishList['id']; ?>"><?php echo $row_publishList['title']; ?></a></p></td>
            <td width="15%"><p><?php echo $row_publishList['name']; ?></p></td>
            <td width="20%"><p><?php echo $row_publishList['update']; ?></p></td>
            <td width="20%"><button value="修改" type="button" onclick="MM_goToURL('parent','publishUpdate.php?id=<?php echo $row_publishList['id']; ?>');return document.MM_returnValue">修改</button><button value="刪除" type="button" onclick="javascript:if(confirm('確定刪除?'))MM_goToURL('parent','publishDelete.php?id=<?php echo $row_publishList['id']; ?>');return document.MM_returnValue">刪除</button></td>
          </tr>
          <?php } // Show if recordset not empty ?>
        <?php } while ($row_publishList = mysql_fetch_assoc($publishList)); ?>
    </table>
&nbsp;
    <table border="0">
      <tr>
        <td><?php if ($pageNum_publishList > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_publishList=%d%s", $currentPage, 0, $queryString_publishList); ?>">第一頁</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_publishList > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_publishList=%d%s", $currentPage, max(0, $pageNum_publishList - 1), $queryString_publishList); ?>">上一頁</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_publishList < $totalPages_publishList) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_publishList=%d%s", $currentPage, min($totalPages_publishList, $pageNum_publishList + 1), $queryString_publishList); ?>">下一頁</a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_publishList < $totalPages_publishList) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_publishList=%d%s", $currentPage, $totalPages_publishList, $queryString_publishList); ?>">最後一頁</a>
            <?php } // Show if not last page ?></td>
      </tr>
    </table>
記錄 <?php echo ($startRow_publishList + 1) ?> 到 <?php echo min($startRow_publishList + $maxRows_publishList, $totalRows_publishList) ?> 共 <?php echo $totalRows_publishList ?>
</p>
<table width="90%" border="0">
  <?php if ($totalRows_publishList == 0) { // Show if recordset empty ?>
    <tr>
      <th scope="col"><h5>資料庫目前尚無商品！</h5></th>
    </tr>
    <?php } // Show if recordset empty ?>
    </table>
    <p>&nbsp;</p>
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
mysql_free_result($publishList);
?>
