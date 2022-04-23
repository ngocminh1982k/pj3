<?php
	
	include("../connect/open.php");
	//Edit Ariticle
	if(isset($_POST["content1"])&isset($_POST["description"])&&isset($_POST["tittle"])&&isset($_POST["id"])){
		$idbv=$_POST["id"];
		$content=$_POST["content1"];
		$description=$_POST["description"];
		$tittle=$_POST["tittle"];
		$que="UPDATE tintuc SET tieuDe='$tittle',noiDung='$content',moTa='$description' where maTin=$idbv";
		mysqli_query($con,$que);
		
		
	 header("Location:../admin/tintuc.php");
}
?>