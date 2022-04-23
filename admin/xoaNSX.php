<?php
if(isset($_GET["maNSX"])){
	$ma=$_GET["maNSX"];
	include("../connect/open.php");
	$sql=mysqli_query($con,"delete from tblnsx where maNSX=$ma");
	include("../connect/close.php");
	header("location:nsx.php");
}
?>