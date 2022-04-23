<?php
if(isset($_GET["ma"])){
	$ma=$_GET["ma"];
	include("../connect/open.php");
	$sql=mysqli_query($con,"delete from tblloaisp where maLoaiSP=$ma");
	include("../connect/close.php");
	header("location:xemloaisp.php");
}
?>