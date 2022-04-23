<?php
session_start();

if(isset($_GET["txtName"])&& isset($_GET["txtWord"])){
	$user=$_GET["txtName"];
	$pass=md5($_GET["txtWord"]);
	include("../connect/open.php");
	$sql= mysqli_query($con,"select * from khachhang where useName='$user' and passWord='$pass' and tinhTrang=0");
	$sobanghi=mysqli_num_rows($sql);
	mysqli_close($con);
	if($sobanghi==0){
	header("location:login.php?err=1");
	}else{
	$_SESSION["useName"]=$user;
	$_SESSION["pass"]=$pass;
	if(isset($_GET["cklogin"])){
		setcookie("userName1",$user,time()+(8640*30));
		setcookie("passWord1",$pass,time()+(8640*30));
	}else{
		setcookie("userName1",$user,time()+(-100));
		setcookie("passWord1",$pass,time()+(-100));
		}
		header("location:../khachhang/trangchu.php");
	}
}
	else{
		header("location:../khachhang/login.php");}
	
?>