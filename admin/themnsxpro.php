<?php
if (isset($_GET["ten"])) {

	$ten=$_GET["ten"];
	include("../connect/open.php");
	$sql=mysqli_query($con,"INSERT INTO `tblnsx` (`maNSX`, `tenNSX`, `thongTin`) VALUES (NULL, '$ten', NULL)");
	include("../connect/close.php");
	header("location:nsx.php");
}else{
	header("location:nsx.php");
	
}
?>
