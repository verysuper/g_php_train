
<?php
$m=$_POST['total'];
$a=$m*(9/10);
$b=$m*(85/100);
$c=$m*(8/10);
$d=$m*(75/100);

if($m<2000){
echo "打折後金額為 $a 元";}
elseif($m>=2000){
echo "打折後金額為 $b 元";}
elseif($m>=3000){
echo"打折後金額為 $c 元";}
elseif($m>=5000){
echo "打折後金額為 $d 元";}
?>

<form id="form1" name="form1" method="post" action="">
<p>百貨公司週年慶~消費滿額即打折</p>
<p>購物金額小於2000元打九折<br />
</p>
<p>購物金額滿2000元打八五折</p>
<p>滿3000元打八折</p>
<p>滿5000元打七五折</p>
<p>
<label for="total">購物總金額</label>
<input type="text" name="total" id="total" />
<input type="submit" name="button" id="button" value="送出" />
</p>
</form>

<button onClick="history.back()">&larr;</button>