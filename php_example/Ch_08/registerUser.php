<?php require_once('../Connections/sql4.php'); ?>
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
  $MM_dupKeyRedirect="registerUser.php";
  $loginUsername = $_POST['user_id'];
  $LoginRS__query = sprintf("SELECT user_id FROM users WHERE user_id=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_sql4, $sql4);
  $LoginRS=mysql_query($LoginRS__query, $sql4) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
	$error['username'] = "帳號已使用、請重挑選一個！";
	echo $error['username'];
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO users (name, user_id, password, address, city, postcode, email, phone_number, auth_priv, admin_priv) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['user_id'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['postcode'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['phone_number'], "text"),
                       GetSQLValueString($_POST['auth_priv'], "text"),					                       GetSQLValueString($_POST['admin_priv'], "text"));

  mysql_select_db($database_sql4, $sql4);
  $Result1 = mysql_query($insertSQL, $sql4) or die(mysql_error());
  
  //呼叫 sendmail(...)傳遞使用者帳號與郵件發送確認信
  sendmail($_POST['user_id'],$_POST['email']);
  
  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<h2><center>會員加入</center></h2>
<hr />
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">姓名：</td>
      <td><input type="text" name="name" value="" size="20" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">帳號：</td>
      <td><input type="text" name="user_id" value="" size="15" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">密碼：</td>
      <td><input type="password" name="password" value="" size="15" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">地址：</td>
      <td><input type="text" name="address" value="" size="60" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">縣市：</td>
      <td><input type="text" name="city" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">郵遞區號：</td>
      <td><input type="text" name="postcode" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">電子郵件</td>
      <td><input type="text" name="email" value="" size="30" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">聯絡電話</td>
      <td><input type="text" name="phone_number" value="" size="13" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="插入記錄" /></td>
    </tr>
  </table>
  <input type="hidden" name="admin_priv" value="n" />
  <input type="hidden" name="auth_priv" value="n" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
//按收會員帳號與密碼進行發送郵件
function sendmail($uid,$mail){
	$to      = $mail;
	$subject = "=?UTF-8?B?".base64_encode("會員功能啟用")."?=";
	//透過md5(...)函式將會員帳號進行訊息數位演算，以提高複雜度
	$message = '啟用會員功能方法一：'."\r\n"
			  .'<a href="http://192.168.94.129/NewGjun/ch12/auth_user.php?uid='
			  .md5($uid).'">點繫超連結啟用會員功能!</a>'. "\r\n"
			  .'啟用會員功能方法二：'."\r\n"
			  .'將下列網址複至瀏覽器網列中，按下ENTER按鍵進行啟用會員功能'."\r\n"
			  .'http://192.168.94.129/NewGjun/ch12/auth_user.php?uid='.md5($uid);
	$headers = 'From: services@pcschool.com.tw' . "\r\n" .
 		       'Reply-To: services@pcschool.com.tw' . "\r\n" .
		       'X-Mailer: PHP/' . phpversion();
    @mail($to, $subject, $message, $headers);
}
?>