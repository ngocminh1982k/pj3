<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<style>
</style>

</head>
<body>
	hjfjhfjffkuf
	<?php
		include( "../connect/open.php" );
		
	
	
		$sp= mysqli_query( $con, "select * from tblsanpham where maSP=1" );
	
	?>
<div id="pic"><img src="<?php echo($sp["anh"])?>" />
					<?PHP  print($sp["gia"])?> 
	
	ùyyhfhfh
</body>
</html>
