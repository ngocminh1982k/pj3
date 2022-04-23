<?php
session_start();
$use=$_SESSION["useName"];

if(isset($_GET["pass"])&&isset($_GET["pwd1"])){
	$pass=$_GET["pass"];
	$pwd1=md5($_GET["pwd1"]);
	include("../connect/open.php");
	$sql=mysqli_query($con,"select * from khachhang where useName='$use'");
	$rs=mysqli_fetch_array($sql);
	if ($rs["passWord"] ==$pass) {
		$sql1=mysqli_query($con,"update khachhang set passWord='$pwd1' where useName='$use'");
		
	header("location:login.php?err2=1");
	}else{
	 header("location:changepass.php?err=2");
		
}

	include("../connect/close.php");
	
	
} 

?>