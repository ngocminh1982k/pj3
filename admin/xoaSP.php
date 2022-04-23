<?php
if(isset($_GET["maSP"])){
	$ma=$_GET["maSP"];
	include("../connect/open.php");
	mysqli_query($con,"delete from tblsanpham where maSP=$ma") ;
	include("../connect/close.php");
	header("location:quanlysp.php");
}
?>