<form id="form1" name="form1" method="post" action="hw2-4_POST.php">
<p>
<label for="price">單價：</label>
<input type="text" name="price" id="price" />
<p>
<label for="amount">數量：</label>
<select name="amount" id="amount">
<option>請選擇數量...</option>
<option value="1">1盒</option>
<option value="2">2盒</option><!--建議前端直接限定選擇範圍-->
</select>
</p>
<p>
<label for="button"></label>
<input type="submit" name="button" id="button" value="送出" />
<label for="button2"></label>
<input type="reset" name="button2" id="button2" value="重設" />
</p>
<button onClick="history.back()">&larr;</button>
</form>