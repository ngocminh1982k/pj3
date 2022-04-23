<?php

if(isset($_POST["txtTen"])&&isset($_POST["txtDiaChi"])&&isset($_POST["txtSdt"])&&isset($_POST["txtMa"]))
{
	$ten=$_POST["txtTen"];
	$diaChi=$_POST["txtDiaChi"];
	$sdt=$_POST["txtSdt"];
	$maKh=$_POST["txtMa"];
	$maHD=$_POST["maHD"];
	include("../connect/open.php");
	
	mysqli_query($con,"update hoadon set tenKH='$ten', diaChi='$diaChi',SDT='$sdt' where maHD=$maHD");
	header("location:hoadonct.php?maHD=$maHD");

}else{


}
?>