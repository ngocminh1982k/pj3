<?php
if(isset($_GET["maKH"])){
	$ma=$_GET["maKH"];
	include("../connect/open.php");
	mysqli_query($con,"update khachhang set tinhTrang=1 where maKH=$ma") ;
	include("../connect/close.php");
	header("location:quanlykh.php");
}
?>