<?php
$maSP=$_GET["maSP"];
$maHD=$_GET["maHD"];
include("../connect/open.php");
 mysqli_query($con," delete from hoadonct where maSP=$maSP and maHD=$maHD");

$rssoluong=mysqli_query($con,"SELECT *  from hoadonct where maHD=$maHD");

 while($ct=mysqli_fetch_array($rssoluong)){
 	$gia=$ct["gia"];
 	$soLuong=$ct["soLuong"];
 	$rs=$gia*$soLuong;
 	$tongTien=$tongTien+$rs;

 }
 echo("$tongTien");
mysqli_query($con,"update hoadon set tongTien=$tongTien where maHD=$maHD");
include("../connect/close.php");
 header("location:hoadonct.php?maHD=$maHD")


?>