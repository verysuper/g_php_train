<?php require("mysqlCounter.php"); ?>
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
<table border="0">
          <tr>
            <td><img src="../images/main_1_02.jpg" width="227" height="42" /><p> 台灣是個雨水豐沛、氣候適中的美麗島嶼，農作物栽種種類繁多，很適合發展農業經濟。因此，行政院農業委員會為推行農業精緻化，自92年起辦理發展地方伴手計畫，輔導各地方農會及農民團體生產具地方特色之農特產品。為使消費大眾更了解地方伴手內容，希望利用網際網路迅速查詢及普遍化特性，建立更多元化推廣地方伴手精神及產品通路，希望可以帶動在地消費，促進農村經濟活絡之出發點，特別鼓勵利用在地農產品開發各種美觀、可口且具地方特色的產品，希望結合觀光產業發展成為</p></td>
          </tr>
          <tr>
            <td width="250"><img src="../images/main_1_01.jpg" width="350" height="288" /></td>
          </tr>
        </table>
          <table>
            <tr>
              <td style="padding:0px 0px 0px 8px"><p>各地區旅遊之伴手產品，不僅讓觀光客對台灣各地的好風光留下深刻印象，也能把台灣各地的特色美食、名產帶回家，不但看得到、吃得到，還能與親友分享！</p></td>
            </tr>
            <tr>
              <td><img src="../images/main_1_04.jpg" alt="" width="233" height="175" /></td>
            </tr>
          </table>
          <blockquote>
            <p>自2009/6/1您是第 <img src="picCount.php" alt="" align="absmiddle" /> 位參觀訪客</p>
          
          </blockquote>
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