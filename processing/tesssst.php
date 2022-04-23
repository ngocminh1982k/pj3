<?php
	include "config.php" ;


if(isset($_GET["registerEmailProcess"])&&isset($_GET["registerPassword"])&&isset($_GET["registerLastName"])&&isset($_GET["registerFirstName"])&&isset($_GET["registerPhone"])&&isset($_GET["registerCity"])&&isset($_GET["registerDistrict"])&&isset($_GET["registerAddress"])){
	$email=$_GET["registerEmailProcess"];
	$pass= md5($_GET["registerPassword"]);
    $lastName=$_GET["registerLastName"];
    $firstName=$_GET["registerFirstName"];
    $phone=$_GET["registerPhone"];
    $city=$_GET["registerCity"];
	$district=$_GET["registerDistrict"];
    $address=$_GET["registerAddress"];
   
	include("../connect/open.php");

	// Check email co ton tai khong
	$sqlCheckEmail = "SELECT * FROM `freelancer` WHERE `free_email` = '" +  + "' limit 1";
	$resultCheck = mysqli_query($con, $sqlCheckEmail);
	if($resultCheck != null){
		$sql = "insert into freelancer.freelancer (free_id,free_email,free_password,free_fname,free_lname,free_phone,cit_id,ward_id,free_address) values (' ','$email','$pass','$firstName','$lastName','$phone','$city','$district','$address')";
		
		echo $sql;
		mysqli_query($con, $sql);
        return true;
	} else {
		$err = "Email da ton tai";
		echo $err;
	}
	
	
	// include("../connect/close.php");
	
	header("location:login.php");
	return true;
} else{
	header("location:register.php");
}



?>