<?php
session_start();
if(isset($_POST["arrSl"]))
{
	$arrSl=array();
	$arrSl=$_POST["arrSl"];
	$gioHang=$_SESSION["gioHang"];
	$dem=0;
	foreach($gioHang as $maSp=>$soLuong)
	{
		$_SESSION["gioHang"][$maSp]=$arrSl[$dem];
		$dem++;	
	}
	header("Location:xemGioHang.php");	
}
header("Location:xemGioHang.php");
?>