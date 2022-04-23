<?php
session_start();

if(isset($_GET["txtName"])&& isset($_GET["txtWord"])){
	$user=$_GET["txtName"];
	$pass=$_GET["txtWord"];
	include("../connect/open.php");
	$sql= mysqli_query($con,"select * from Admin where useName='$user' and pass='$pass' and tinhTrang=0");
	$sobanghi=mysqli_num_rows($sql);
	mysqli_close($con);
	if($sobanghi==0){
	header("location:../admin/logindisplay.php?err=1");
	}else{
	$_SESSION["userName"]=$user;
	$_SESSION["passWord"]=$pass;
	if(isset($_GET["cklogin"])){
		setcookie("userName",$user,time()+(8640*30));
		setcookie("passWord",$pass,time()+(8640*30));
	}else{
		setcookie("userName",$user,time()+(-100));
		setcookie("passWord",$pass,time()+(-100));
		}
		header("location:../admin/iosdisplay.php");
	}
}
	else{
		header("location:../admin/logindisplay.php");}
	
?>