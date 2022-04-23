<?php
session_start();
if(isset($_POST["txtTen"])&&isset($_POST["txtDiaChi"])&&isset($_POST["txtSdt"])&&isset($_POST["txtMa"])&&isset($_POST["txtTongTien"]))
{
	$ten=$_POST["txtTen"];
	$diaChi=$_POST["txtDiaChi"];
	$sdt=$_POST["txtSdt"];
	$maKh=$_POST["txtMa"];
	$tongTien=$_POST["txtTongTien"];
	include("../connect/open.php");
	
	mysqli_query($con,"insert into hoadon(maKH,tenKH,diaChi,SDT,ngayDatHang,tongTien,tinhTrang) values($maKh,'$ten','$diaChi','$sdt',now(),$tongTien,0)");
	
	$result=mysqli_query($con,"select max(maHd) as maxMa from hoadon");
	$row=mysqli_fetch_array($result);
	$maHd=$row["maxMa"];
	$gioHang=array();
	$gioHang=$_SESSION["gioHang"];
	foreach($gioHang as $maSp=>$soLuong)
	{
		$resultSp=mysqli_query($con,"select * from tblSanPham where maSp=$maSp");
		$sp=mysqli_fetch_array($resultSp);
		$gia=$sp["gia"];
		mysqli_query($con,"insert into hoadonct values($maHd,$gia,$soLuong,$maSp)");	
	}
	include("../Connect/close.php");
	
	unset($_SESSION["gioHang"]);
	
	header("Location:trangchu.php");
}
?>