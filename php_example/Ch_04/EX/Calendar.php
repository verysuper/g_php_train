<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>萬年曆</title>
<style type="text/css">
<!--
.H1 {
	text-align: center;
	color: #039;
}
-->
</style>
</head>

<body>
<?php
$year		= $_POST['year']; 	//讀取清單選取年度
$month		= $_POST['month'];	//讀取清單選取月份
//依選取年度及月份建立一時間戳記
$newtime	= mktime(0,0,0,$month,1,$year);	
$nowyear	= date("Y");		//取得系統年度
$dayweek 	= date("w",$newtime);	//取得星期幾代號
$month_day	= date("t",$newtime);	//取得月份天數
?>
<h2 class="H1">～PHP版萬年曆～ </h2>
<form id="form1" name="form1" method="post" action="Calendar.php">
  <table width="230" border="1" align="center">
    <tr>
      <td>西元年：
        <select name="year" id="year">
        <?php
		for($y=$nowyear-5; $y<=$nowyear+5; $y++){
			if($y!=$year){
				echo "<option value=\"$y\">$y</optgroup>";				
			}else{
				echo "<option value=\"$y\" selected>$y</optgroup>";
			}
		}
		?>
      </select></td>
      <td>月：
        <select name="month" id="month">
        <?php
		for($m=1; $m<=12; $m++){
			if($m!=$month){
				echo "<option value=\"$m\">$m</option>";				
			}else{
				echo "<option value=\"$m\" selected>$m</option>";
			}
		}		
		?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="button" id="button" value="查詢" /></td>
    </tr>
    <tr>
      <td colspan="2">
	  <table border="1"><!--顯示表格-->
      <tr>
      <!-- 顯示月曆的星期幾 -->
      <td>日</td><td>一</td><td>二</td><td>三</td><td>四</td>
      <td>五</td><td>六</td>
      </tr>
      <?php	  	
	  for($r=1; $r<=5; $r++){ 	//外迴圈用來表示一個月有「5週」
		  echo "<tr>";			//表格「列」
	  	for($c=0; $c<=6; $c++){	//內迴圈用來表示一週有「7天」
		    if($r==1 && $c<$dayweek){	//第1週才會有要處理1號是星期幾
				echo "<td>&nbsp;</td>";	//該「欄」顯示一個空白
			}elseif($r==5 && $day>=$month_day){	//第5週要處理當月共幾天
				echo "<td>&nbsp;</td>";	//該「欄」顯示一個空
			}else{
				echo "<td>".++$day."</td>";	//該「欄」顯示正常的天數代號
			}
			
		}		  
		echo "</tr>";
	  }
	  echo "</table>";
	  ?>
      </td>
    </tr>
  </table>
</form>
</body>
</html>