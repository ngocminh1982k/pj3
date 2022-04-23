<?php
if (isset($_GET["ten"])) {

	$ten=$_GET["ten"];
	include("../connect/open.php");
	$sql=mysqli_query($con,"INSERT INTO tblloaisp(tenLoaiSP) VALUES ( '$ten')");
	include("../connect/close.php");
	header("location:xemloaisp.php");
}else{
	header("location:xemloaisp.php");
	
}
?>