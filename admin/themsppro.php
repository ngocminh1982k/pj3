<?php
if(isset($_GET["ten"])&&isset($_GET["soluong"])&&isset($_GET["gia"])&&isset($_GET["mota"])&&isset($_GET["maNSX"])&&isset($_GET["maLoai"]))
{
	$ten=$_GET["ten"];
	$soluong=$_GET["soluong"];
	$gia=$_GET["gia"];
	$mota=$_GET["mota"];
	$use=$_GET["maNSX"];
	$pass=$_GET["maLoai"];

include("../connect/open.php");
	$sql="INSERT INTO `tblsanpham` (`maSP`, `tenSP`, `soLuong`, `gia`, `moTa`, `maNSX`, `maLoaiSP`) VALUES (NULL, '$ten', '$soluong', '$gia', '$mota', '$use', '$pass');";
	mysqli_query($con,$sql);
	mysqli_close($con);
header("location:quanlysp.php");
}else
{
	header("location:quanlysp.php");

}
include("../connect/close.php");
?>