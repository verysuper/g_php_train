<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--meta:vp -> ctrl+e 行動裝置模式-->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>無標題文件</title>
<script type="text/javascript">
function MM_setTextOfLayer(objId,x,newText) { //v9.0
  with (document) if (getElementById && ((obj=getElementById(objId))!=null))
    with (obj) innerHTML = unescape(newText);
}
</script>
</head>

<body>
    <form id="form1" name="form1" method="post" action="test104a.php">
    <fieldset>
    <legend>滿意度調查</legend>
    
    <p>請留下您的聯絡資訊：</p>
    <p>
    <label for="user">姓名：</label>
    <input name="user" type="text" required="required" id="user" placeholder="必填" tabindex="1" onFocus="MM_setTextOfLayer('useralert','','請輸入')" onBlur="MM_setTextOfLayer('useralert','','')"> <span id="useralert"></span>
    </p>
    <p>
    性別：
    <label2>
        <input type="radio" name="RadioGroup1" value="M" id="RadioGroup1_0">
        男</label2>
        
        <label2>
        <input type="radio" name="RadioGroup1" value="F" id="RadioGroup1_1">
        女</label2>
        <br>
    </p>
    <p>
    <label for="url">URL：</label>
    <input name="url" type="url" id="url" tabindex="3" onFocus="MM_setTextOfLayer('urlalert','','請輸入')" onBlur="MM_setTextOfLayer('urlalert','','')"><span id="urlalert"></span>
    </p>
    <p>
    <label for="mail">E-mail： </label>
    <input name="mail" type="email" id="mail" tabindex="2" onFocus="MM_setTextOfLayer('maila','','請輸入')" onBlur="MM_setTextOfLayer('maila','','')"><span id="maila"></span>
    </p>
    <p>您最喜歡XXX的哪項設計？</p> 
    <p>
        <label2>
        <input type="checkbox" name="A" value="Y" id="CheckboxGroup1_0">
        版面設計</label2>
        <br>
        <label2>
        <input type="checkbox" name="B" value="Y" id="CheckboxGroup1_1">
        美工圖案</label2>
        <br>
        <label2>
        <input type="checkbox" name="C" value="Y" id="CheckboxGroup1_2">
        文字敘述</label2>
        <br>
    </p>
    <p>
    <input type="submit" name="submit" id="submit" value="送出"> 
    </p>
    </fieldset>	
    </form>
</body>
</html>