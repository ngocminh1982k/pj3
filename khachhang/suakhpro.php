<?php
if(isset($_GET["maKH"])&&isset($_GET["txtName"])&&isset($_GET["NgaySinh"])&&isset($_GET["txtemail"])&&isset($_GET["SDT"])&&isset($_GET["diaChi"]))
{
	$ten=$_GET["txtName"];
	$date=$_GET["NgaySinh"];
	$email=$_GET["txtemail"];
	$SDT=$_GET["SDT"];
	$ma=$_GET["maKH"];
	$diachi=$_GET["diaChi"];
	

include("../connect/open.php");
	$sql="update khachhang set tenKH='$ten',ngaySinh='$date',email='$email',SDT='$SDT',diaChi='$diachi' where maKH=$ma";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:xemtaikhoankh.php");
	
}else
{
	
	 header("Location:xemtaikhoankh.php");
}