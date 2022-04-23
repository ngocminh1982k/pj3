<?php
	

	
	include("connect/open.php");
	//Edit Ariticle
	if(isset($_POST["content1"])&isset($_POST["description"])&&isset($_POST["tittle"])&&isset($_POST["maKH"])){
		$idbv=$_POST["id"];
		$content=$_POST["content"];
		$description=$_POST["description"];
		$tittle=$_POST["tittle"];
		$que="UPDATE tintuc SET tieuDe='$tittle',noiDung='$content',moTa='$description' where idbv=$maKH";
		include("ConnectDb/open.php");
		mysqli_query($con,$que);
		include("connect/close.php");
		
	
?>
