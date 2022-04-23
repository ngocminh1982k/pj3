<?php
if(isset($_GET["maSP"])&&isset($_GET["txtName"])&&isset($_GET["soluong"])&&isset($_GET["txtgia"])&&isset($_GET["mota"])&&isset($_GET["tinhTrang"])&&isset($_GET["SDT"]))
{
	$ten=$_GET["txtName"];
	$so=$_GET["soluong"];
	$gia=$_GET["txtgia"];
	$mota=$_GET["mota"];
	$ma=$_GET["maSP"];
	$tr=$_GET["tinhTrang"];
	$SDT=$_GET["SDT"];

include("../connect/open.php");
	$sql="update hoadon set tenKH='$ten',ngayDatHang='$gia',tongTien=$mota,diaChi='$so',SDT='$SDT' where maHD=$ma";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:../admin/hoaDon.php");
}else
{
	header("Location:../admin/hoaDon.php");	
}
?>