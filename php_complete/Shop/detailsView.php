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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  if((!isset($_POST['authcode'])) || ($_POST['authcode'] == $_SESSION['imgcode'])){
	header("Content-Type: text/html; charset=utf-8"); //改變編碼字元
	echo "驗證碼不正確<br/>";
	return;
  }	
  $insertSQL = sprintf("INSERT INTO details (titleid, email, name, subject, memo, newsDate) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['titleid'], "int"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['subject'], "text"),
                       GetSQLValueString($_POST['memo'], "text"),
                       GetSQLValueString($_POST['newsDate'], "date"));

  mysql_select_db($database_Shop, $Shop);
  $Result1 = mysql_query($insertSQL, $Shop) or die(mysql_error());
mysql_query("UPDATE titles SET count=count+1,lastNewsDate='".date("Y-m-d H:i:s")."' WHERE titleid=".$_POST['titleid']);
}

$colname_RecordsetTitles = "-1";
if (isset($_GET['titleid'])) {
  $colname_RecordsetTitles = $_GET['titleid'];
}
mysql_select_db($database_Shop, $Shop);
$query_RecordsetTitles = sprintf("SELECT * FROM titles WHERE titleid = %s", GetSQLValueString($colname_RecordsetTitles, "int"));
$RecordsetTitles = mysql_query($query_RecordsetTitles, $Shop) or die(mysql_error());
$row_RecordsetTitles = mysql_fetch_assoc($RecordsetTitles);
$totalRows_RecordsetTitles = mysql_num_rows($RecordsetTitles);

$colname_RecordsetDetails = "-1";
if (isset($_GET['titleid'])) {
  $colname_RecordsetDetails = $_GET['titleid'];
}
mysql_select_db($database_Shop, $Shop);
$query_RecordsetDetails = sprintf("SELECT * FROM details WHERE titleid = %s ORDER BY newsDate DESC", GetSQLValueString($colname_RecordsetDetails, "int"));
$RecordsetDetails = mysql_query($query_RecordsetDetails, $Shop) or die(mysql_error());
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
    <h2>主題瀏覽及回應</h2>
    <h3>您可以在此觀賞其它訪客所參與討論內容！</h3>
    <p><a href="titleView.php">返回主題</a></p>
    <table width="95%" border="0">
      <tr>
        <th align="left" scope="col"><p>討論主題</p></th>
      </tr>
      <tr>
        <th align="left" scope="row">作者：<a href="mailto:<?php echo $row_RecordsetTitles['email']; ?>"><?php echo $row_RecordsetTitles['name']; ?></a>建立日期：<?php echo $row_RecordsetTitles['createDate']; ?><br />        
        主題：<?php echo $row_RecordsetTitles['subject']; ?><br />        
        內容：<?php echo $row_RecordsetTitles['memo']; ?></th>
      </tr>
      <tr>
        <th align="left" scope="row"><h6>討論內容</h6></th>
      </tr>
      <?php do { ?>
        <tr>
          <th align="left" scope="row"><h3>作者：<a href="mailto:<?php echo $row_RecordsetDetails['email']; ?>"><?php echo $row_RecordsetDetails['name']; ?></a>建立日期：<?php echo $row_RecordsetDetails['newsDate']; ?><br />
            主題：<?php echo $row_RecordsetDetails['subject']; ?><br />
            內容：<?php echo $row_RecordsetDetails['memo']; ?></h3></th>
        </tr>
        <?php } while ($row_RecordsetDetails = mysql_fetch_assoc($RecordsetDetails)); ?>
<tr>
        <th align="left" scope="row"><p>參與討論</p></th>
      </tr>
      <tr>
        <th align="left" scope="row">&nbsp;
          <form action="<?php echo $editFormAction; ?>" method="post" id="form1">
            <table width="95%">
              <tr valign="baseline">
                <td align="right">電子郵件:</td>
                <td colspan="2"><input type="text" name="email" value="" size="32" /></td>
              </tr>
              <tr valign="baseline">
                <td align="right">姓名:</td>
                <td colspan="2"><input type="text" name="name" value="" size="32" /></td>
              </tr>
              <tr valign="baseline">
                <td align="right">主題:</td>
                <td colspan="2"><input type="text" name="subject" value="FW:<?php echo $row_RecordsetTitles['subject']; ?>" size="32" /></td>
              </tr>
              <tr valign="baseline">
                <td align="right" valign="top">內容:</td>
                <td colspan="2"><textarea name="memo" cols="40" rows="6"></textarea></td>
              </tr>
              <tr valign="baseline">
                <td align="right">&nbsp;</td>
                <td colspan="2"><input type="submit" value="插入記錄" /></td>
              </tr>
              <tr valign="baseline">
                <td align="right">&nbsp;</td>
                <td><img src="../PicAuth/picauth.php" alt="" /></td>
                <td valign="middle"><input type="text" name="authcode" id="authcode" /></td>
              </tr>
            </table>
            <input type="hidden" name="titleid" value="<?php echo $row_RecordsetTitles['titleid']; ?>" />
            <input type="hidden" name="newsDate" value="<? echo date("Y-m-d H:i:s");?>" />
            <input type="hidden" name="MM_insert" value="form1" />
          </form>
        <p>&nbsp;</p></th>
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
mysql_free_result($RecordsetTitles);

mysql_free_result($RecordsetDetails);
?>