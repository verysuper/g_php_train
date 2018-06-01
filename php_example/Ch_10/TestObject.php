<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP物件導向測試</title>
</head>

<body>
<?php
$baba1 = new Car();
$baba1->Name="baba1";
$baba1->Forward();
$baba1->Turn();
$baba1->Stop();
?>
</body>
</html>
<?php
class Car{
	var $Name;  //狀態
	var $Color;
	var $Brands;
	var $Type;
	function Car(){
		$this->Color="白色";
		$this->Brands="Gjun";
		$this->Type="二門掀背";
	}
	function Forward(){  //行為
		echo $this->Name." 前進中<br/>";
	}
	function Back(){
		echo $this->Name." 後退中<br/>";
	}
	function Turn(){
		echo $this->Name." 轉彎中<br/>";
	}
	function Stop(){
		echo $this->Name." 停車中<br/>";
	}
}
?>