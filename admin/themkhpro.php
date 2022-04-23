<?php
if(isset($_GET["ten"])&&isset($_GET["date"])&&isset($_GET["email"])&&isset($_GET["sdt"])&&isset($_GET["user"])&&isset($_GET["pass"])&&isset($_GET["diaChi"]))
{
	$ten=$_GET["ten"];
	$date=$_GET["date"];
	$email=$_GET["email"];
	$SDT=$_GET["sdt"];
	$use=$_GET["user"];
	$pass=$_GET["pass"];
	$diachi=$_GET["diaChi"];

include("../connect/open.php");
	$sql="INSERT INTO `khachhang` (`maKH`, `useName`, `passWord`, `tenKH`, `ngaySinh`, `email`, `SDT`,`diaChi`) VALUES (NULL, '$use', '$pass', '$ten', '$date', '$email', '$SDT','$diachi');";
	mysqli_query($con,$sql);
	mysqli_close($con);
header("location:quanlykh.php");
}else
{
	header("location:quanlykh.php");

}
include("../connect/close.php");
?>