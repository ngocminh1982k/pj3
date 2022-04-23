<?php
if(isset($_GET["maKH"])&&isset($_GET["txtName"])&&isset($_GET["NgaySinh"])&&isset($_GET["txtemail"])&&isset($_GET["SDT"]))
{
	$ten=$_GET["txtName"];
	$date=$_GET["NgaySinh"];
	$email=$_GET["txtemail"];
	$SDT=$_GET["SDT"];
	$ma=$_GET["maKH"];
	$tr=$_GET["key"];
include("../connect/open.php");
	$sql="update admin set ten='$ten',ngaySinh='$date',email='$email',SDT='$SDT',tinhTrang=$tr where maAD=$ma";
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo("update khachhang set ten='$ten',ngaySinh='$date',email='$email',SDT='$SDT',tinhTrang=$tr where maAD=$ma");
	 header("Location:../admin/xemtaikhoankh.php?ma=$ma");
}else
{
	header("Location:../admin/xemtaikhoankh.php?ma=$ma");	
}
?>