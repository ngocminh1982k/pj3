<?php
if(isset($_GET["username"])&&isset($_GET["pwd1"])){
	$use=$_GET["username"];
	$pass= md5($_GET["pwd1"]);
	include("../connect/open.php");
	$sql=mysqli_query($con,"insert into khachhang (useName,passWord) values ('$use','$pass')");
	
	include("../connect/close.php");
	header("location:login.php?err2=2");
	
} else{
	header("location:dangki.php?err2=2");
}



?>