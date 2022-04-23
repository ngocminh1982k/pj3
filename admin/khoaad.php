<?php
if(isset($_GET["ma"])){
	$ma=$_GET["ma"];
	include("../connect/open.php");
	mysqli_query($con,"update admin set tinhTrang=1 where maAD=$ma") ;
	include("../connect/close.php");
	header("location:admin.php");
}
?>