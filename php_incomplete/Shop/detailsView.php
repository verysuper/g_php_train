<?php require_once('../Connections/shop.php'); ?>
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

$colname_RecordsetTitles = "-1";
if (isset($_GET['titleid'])) {
  $colname_RecordsetTitles = $_GET['titleid'];
}
mysql_select_db($database_shop, $shop);
$query_RecordsetTitles = sprintf("SELECT * FROM titles WHERE titleid = %s", GetSQLValueString($colname_RecordsetTitles, "int"));
$RecordsetTitles = mysql_query($query_RecordsetTitles, $shop) or die(mysql_error());
$row_RecordsetTitles = mysql_fetch_assoc($RecordsetTitles);
$totalRows_RecordsetTitles = mysql_num_rows($RecordsetTitles);

$colname_RecordsetDetails = "-1";
if (isset($_GET['titleid'])) {
  $colname_RecordsetDetails = $_GET['titleid'];
}
mysql_select_db($database_shop, $shop);
$query_RecordsetDetails = sprintf("SELECT * FROM details WHERE titleid = %s ORDER BY newsDate DESC", GetSQLValueString($colname_RecordsetDetails, "int"));
$RecordsetDetails = mysql_query($query_RecordsetDetails, $shop) or die(mysql_error());
$row_RecordsetDetails = mysql_fetch_assoc($RecordsetDetails);
$totalRows_RecordsetDetails = mysql_num_rows($RecordsetDetails);
?>
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
<h2>主題瀏覽及回應</h2>
<h3>您可以在此觀賞其它訪客所參與討論內容！</h3>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table border="1">
    	<tr>
    		<td>討論主題~</td>
    	</tr>
    	<tr>
    		<td>主題作者：<?php echo $row_RecordsetTitles['name']; ?>建立日期：<?php echo $row_RecordsetTitles['createDate']; ?>主題：<?php echo $row_RecordsetTitles['subject']; ?>內容：<?php echo $row_RecordsetTitles['memo']; ?></td>
    	</tr>
    	<tr>
    		<td>回應內容~</td>
    	</tr>
    	<tr>
    		<td>回應作者：<?php echo $row_RecordsetDetails['name']; ?>回應日期：<?php echo $row_RecordsetDetails['newsDate']; ?>回應主題：<?php echo $row_RecordsetDetails['subject']; ?>回應內容：<?php echo $row_RecordsetDetails['memo']; ?></td>
    	</tr>
    	<tr>
    		<td>參與討論~</td>
    	</tr>
    	<tr>
    		<td>
    			<table border="1">
    				<tr>
    					<td>電子郵件:</td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>姓名:</td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>主題:</td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>內容:</td>
    					<td></td>
    				</tr>
    				<tr>
    					<td></td>
    					<td></td>
    				</tr>
    			</table>
    		</td>
    	</tr>
    </table>
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
    <p>&nbsp;</p>
    <h3>最新商品</h3>
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
    <h3>登入</h3>
    <form action="" method="post">
      <p>
        <input value="user" name="user" />
      </p>
      <p>
        <input name="password" type="password" value="password" />
      </p>
        <button type="submit">送出</button><button>註冊會員</button>        
    </form>    
  </div>
  <!-- /secondaryContent -->
        <br class="clear" />    
</div><!-- container -->
    
    <div id="footer">
        <ul>
            <li id="copyright">&copy; 2099 Free for Gjun student member</li>
            <li id="links">
                <ul>
                    <li><a href="#">XHTML</a> |</li>
                    <li><a href="#">CSS</a> |</li>
                    <li><a href="http://gjun.tw">ALAN CHEN</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /footer -->
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RecordsetTitles);

mysql_free_result($RecordsetDetails);
?>