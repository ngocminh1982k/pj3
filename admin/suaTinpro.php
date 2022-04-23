<?php
if(isset($_GET["maTin"])&&isset($_GET["tieuDe"])&&isset($_GET["moTa"])&&isset($_GET["noiDung"])&&isset($_GET["anh"]))
{
	$ten=$_GET["tieuDe"];
	$date=$_GET["moTa"];
	$email=$_GET["noiDung"];
	$ma=$_GET["maTin"];
	$diachi=$_GET["anh"];

include("../connect/open.php");
	$sql="update tintuc set tieuDe='$ten',moTa='$date',noiDung='$email',SDT='$SDT',anh='$diachi' where maTin=$ma";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:../admin/tintuc.php");
}else
{
	header("Location:../admin/tintuc.php");	
}
?>