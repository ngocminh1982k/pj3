<?php

include("../connect/open.php");
	
	//Edit Ariticle
	if(isset($_POST["content"])&isset($_POST["description"])&&isset($_POST["tittle"])&&isset($_POST["id"])){
		$idbv=$_POST["id"];
		$content=$_POST["content"];
		$description=$_POST["description"];
		$tittle=$_POST["tittle"];
		$que="UPDATE tblbaiviet SET tenbv='$tittle',noidung='$content',mota='$description' where idbv=$idbv";
		include("ConnectDb/open.php");
		mysqli_query($con,$que);
		include("ConnectDb/close.php");
		header("Location:ManagerArticle.php");
	}else
	{
		header("Location:ManagerArticle.php");
	}
?>
<?php

?>