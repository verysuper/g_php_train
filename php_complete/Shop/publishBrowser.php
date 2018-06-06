<?php require_once('../Connections/Shop.php'); ?>
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
$query_publishList = "SELECT * FROM publish WHERE to_days(expire)-to_days(curdate())>=0 ORDER BY `update` DESC";
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
<?php require_once('../Connections/shop.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Shop.dwt.php" codeOutsideHTMLIsLocked="false" -->
<script language="javascript" src="../Scripts/menu.js"/></script>
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>伴手網</title>
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
function LastProduct(){
	//查詢資料庫語法，利用phpmyadmin產生
	$sql = 'SELECT `id` , `name` FROM `product` ORDER BY `id` DESC LIMIT 0, 5 ';
	$resource = mysql_query($sql);	//執行sql語法
	$result = "";	
	while($record=mysql_fetch_row($resource)){	//搭配迴圈重複讀取記錄	
		$result=$result.'<li><a href="productDetail.php?id='.$record[0].'">'
		.$record[1]."</a></li>\n";
	}
	return $result;
}
?>
<body>
  <div id="header">
      <div class="subContainer">
            <div id="logo">
            <div id="box">H2H</div>
            <p>咱的好伴手</p>
            </div><!-- /logo -->
    </div><!-- /subContainer -->
</div><!-- header -->
    
<div id="navigation">   
	<ul id="sddm">
        <li><a href="index.php">首頁</a></li>
        <li><a href="product.php">商品資料</a></li>
        <li><a href="cart.php">購物車</a></li>
        <li><a href="checkOut.php">結帳</a></li>     
        <li><a href="guestBook.php">留言板</a></li>        
        <li><a href="titleView.php">討論區</a></li>
	    <li><a href="#" 
        onmouseover="mopen('m1')" 
        onmouseout="mclosetime()">會員中心</a>
        <div id="m1" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="reconfirm.php">重發確認信</a>
        <a href="modifydata.php">修改基本資料</a>
        <a href="forgetpassword.php">忘記密碼</a>
        </div>
    	</li>
	    <li><a href="#" 
        onmouseover="mopen('m2')" 
        onmouseout="mclosetime()">公佈欄</a>
        <div id="m2" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="publishBrowser.php">瀏覽公佈欄</a>
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
    <h3>將列出所有尚未超過有效期限的公佈欄訊息。</h3>
    <table width="100%" border="0">
      <tr>
        <th scope="col"><p>標題</p></th>
        <th width="18%" scope="col"><p>發佈人</p></th>
        <th width="25%" scope="col">發佈日期</th>
        <th width="25%" scope="col"><p>有效期限</p></th>
      </tr>
      <?php do { ?>
        <?php if ($totalRows_publishList > 0) { // Show if recordset not empty ?>
          <tr>
            <td scope="row"><a href="publishDetail.php?id=<?php echo $row_publishList['id']; ?>"><?php echo $row_publishList['title']; ?></a></td>
            <td width="18%"><?php echo $row_publishList['name']; ?></td>
            <td width="25%"><h4><?php echo $row_publishList['update']; ?></h4></td>
            <td width="25%"><h5><?php echo $row_publishList['expire']; ?></h5></td>
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
    <?php if ($totalRows_publishList == 0) { // Show if recordset empty ?>
      <table width="90%" border="0">
        <tr>
          <th scope="col"><h5>資料庫目前尚無商品！</h5></th>
        </tr>
      </table>
      <?php } // Show if recordset empty ?>
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!-- /comments -->
  </div>
<!-- InstanceEndEditable -->
  <!-- /primaryContent -->
  <div id="secondaryContent">
    <form id="form2" method="post" action="searchForm.php">
      <p>
        <label>
          <input type="text" name="keyword" id="keyword" />
        </label>
      <img  src="../images/search.gif" alt="" align="absmiddle" width="38" height="40" onclick="javascript:submit()" style="cursor:pointer"/>
      </p>
    </form>
<h3>最新商品</h3>
    <ul class="links">    
	<?php	
    echo LastProduct();
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
    <h3>登入</h3>
    <form action="logincheck.php" method="post">
      <p>
        <input value="user" name="user" />
      </p>
      <p>
        <input name="password" type="password" value="password" />
      </p>
      <p>
        <button type="submit">送出</button>
        <button onclick="javascript:window.location.href='registerUser.php'">註冊</button>
      </p>
    </form>
	<?php }else{ ?>
    <h3>會員服務</h3>
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
