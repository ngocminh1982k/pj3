<?php
if(isset($_GET["maNSX"])&&isset($_GET["txtName"]))
{
	$ten=$_GET["txtName"];
	
	$ma=$_GET["maNSX"];

include("../connect/open.php");
	$sql="update tblnsx set tenNSX='$ten' where maNSX=$ma";
	mysqli_query($con,$sql);
	mysqli_close($con);
	include("../connect/close.php");
	header("Location:../admin/nsx.php");
	
}else
	
{
	header("Location:../admin/nsx.php");	
}
?>