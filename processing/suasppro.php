<?php
if(isset($_GET["maSP"])&&isset($_GET["txtName"])&&isset($_GET["soluong"])&&isset($_GET["txtgia"])&&isset($_GET["content1"]))
{
	$ten=$_GET["txtName"];
	$so=$_GET["soluong"];
	$gia=$_GET["txtgia"];
	$mota=$_GET["content1"];
	$ma=$_GET["maSP"];

include("../connect/open.php");
	$sql="update tblsanpham set tenSP='$ten',gia=$gia,moTa='$mota',soLuong=$so where maSP=$ma";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:../admin/quanlysp.php");
}else
{
	header("Location:../admin/quanlysp.php");	
}
?>