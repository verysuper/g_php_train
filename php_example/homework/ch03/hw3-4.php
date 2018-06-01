<?php
$t=$_POST['name'];

switch($t){
case a:
echo "蘋果";
break;
case b:
echo "香蕉";
break;
case o:
echo "橘子";
break;
case g:
echo "葡萄";
break;
case p:
echo "鳳梨";
break;
default:
echo "無此水果...";
}
?>


<form id="form1" name="form1" method="post" action="">
<label for="name">請選擇單字：</label>
<select name="name" id="name">
<option value="a">Apple</option>
<option value="b">Banana</option>
<option value="g">Grape</option>
<option value="o">Orange</option>
<option value="p">Pineapple</option>
</select>
<input type="submit" name="button" id="button" value="翻譯" />
<button onClick="history.back()">&larr;</button>
</form>