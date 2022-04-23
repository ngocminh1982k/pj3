<?php
if(isset($_GET["ma"]))
{
	
	$ma=$_GET["ma"];

include("../connect/open.php");
	$sql="update hoadon set tinhTrang=2 where maHD=$ma";
	mysqli_query($con,$sql);
	mysqli_close($con);
	include("../connect/close.php");
	header("Location:hoaDon.php");
	
}else
	
{
	header("Location:hoaDon.php");	
}
?>




