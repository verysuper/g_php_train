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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="registerUser.php?msg1=帳號已存在";
  $loginUsername = $_POST['userid'];
  $LoginRS__query = sprintf("SELECT userid FROM `user` WHERE userid=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_shop, $shop);
  $LoginRS=mysql_query($LoginRS__query, $shop) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
  /*  $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");*/
		/*$error['username'] = "帳號已使用、請重新挑選一個！";
echo $error['username']."<br>";
echo "<a href=registerUser.php>重新註冊會員</a>";*/
$errorGoTo = "registerError.php";
header(sprintf("Location: %s", $errorGoTo));
    //exit;

  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO `user` (userid, password, sex, age, mail, address, register) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['userid'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['age'], "int"),
                       GetSQLValueString($_POST['mail'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['register'], "date"));

  mysql_select_db($database_shop, $shop);
  $Result1 = mysql_query($insertSQL, $shop) or die(mysql_error());

  $insertGoTo = "index.php?msg=註冊成功，記得收信";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
 session_start();?>
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
<h2>會員註冊</h2>
<h3>提供會員進行註冊，註冊後別忘了透過電子郵件回覆啟用會員功能。</h3>
<p>&nbsp;</p>
<form name="form1" action="<?php echo $editFormAction; ?>" method="POST" id="form1">
<table width="100%">
<tr>
<td width="20" align="right">帳號:</td>
<td><input type="text" name="userid" value="" size="32" /><h5><?php echo $_GET['msg1']; ?></h5></td>
</tr>
<tr valign="baseline">
<td align="right">密碼:</td>
<td><input name="password" type="password" id="password" value="" size="32" /></td>
</tr>
<tr valign="baseline2">
    <tr>
    <td align="right">確認密碼:</td>
    <td><input name="password2" type="password" id="password2" value="" size="32" onblur="passwordCheck()" />
    <div id="message"></div> 
    </td>
    </tr>
</tr>
<tr>
<td align="right">性別:</td>
<td>
<select name="sex">
<option value="M">男</option>
<option value="F">女</option>
</select>
</td>
</tr>
<tr>
<td align="right">年齡:</td>
<td><input type="text" name="age" value="" size="32" /></td>
</tr>
<tr>
<td align="right">電子郵件:</td>
<td><input type="text" name="mail" value="" size="32" /></td>
</tr>
<tr>
<td align="right">聯絡地址:</td>
<td><input type="text" name="address" value="" size="32" /></td>
</tr>
<tr> 
<td colspan="2" width="100%" align="center"><input type="submit" value="註冊會員" /></td>
</tr>
</table>
<input type="hidden" name="register" value="<?php echo date("Y-m-d H:i:s"); ?>">
<input type="hidden" name="MM_insert" value="form1" />
</form>
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
    <?php if(!isset($_SESSION['MM_Username'])){?>    
    <h3>登入</h3>
    <h5><? echo $_GET['msg']; ?></h5>
    <form action="loginCheck.php" method="post">
      <p>
        <input value="" name="user" />
      </p>
      <p>
        <input name="password" type="password" value="" />
      </p>
        <button type="submit">送出</button>
        <button type="button" onclick="location.href='registerUser.php'">註冊會員</button>        
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

<script language="javascript" type="text/javascript">
function passwordCheck(){
//先尋找message Div標籤
var msg=document.getElementById('message');
//判斷密碼欄位與確認密碼欄位是否相同
if(form1.password.value!=form1.password2.value){
//在Div欄位上顯示提示文字
msg.innerHTML="<font color=red>密碼與確認密碼不符！</font>";
form1.password.value=""; //文字欄位清空
form1.password2.value=""; //文字欄位清空
form1.password.focus();	//取得焦點，將游標停留在 密碼欄位 中
}else{
msg.innerHTML="密碼欄位與確認密碼欄位相同";
}
}
</script>