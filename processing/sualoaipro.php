<?php
if(isset($_GET["maKH"])&&isset($_GET["txtName"]))
{
	$ten=$_GET["txtName"];
	
	$ma=$_GET["maKH"];

include("../connect/open.php");
	$sql="update tblloaisp set tenLoaiSP='$ten' where maLoaiSP=$ma";
	mysqli_query($con,$sql);
	mysqli_close($con);
	include("../connect/close.php");
	header("Location:../admin/xemloaisp.php");
	
}else
	
{
	header("Location:../admin/xemloaisp.php");	
}
?>