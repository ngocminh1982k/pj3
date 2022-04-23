<?php
// if(isset($_GET["ma"]))
// {
	
// 	$ma=$_GET["ma"];

// include("../connect/open.php");
// 	$sql="update hoadon set tinhTrang=2 where maHD=$ma";
// 	mysqli_query($con,$sql);
// 	mysqli_close($con);
// 	include("../connect/close.php");
// 	header("Location:xemdonhang.php");
	
// }else
	
// {
// 	header("Location:xemdonhang.php");	
// }
?> 


<?php if(isset($_GET["maHD"])&&isset($_GET["tinhTrang"]))
{
	
	$ma=$_GET["maHD"];
	$tr=$_GET["tinhTrang"];
	$err= 'Loi roi sua lai di' ;

include("../connect/open.php");
	$sqlCheck="select *from  xemdonhang where maHD=$ma";

	$result = (mysqli_query($con,$sqlCheck));
	$resultArray = mysqli_fetch_array($result);
	if($resultArray["tinhTrang"] != 1&&0){
		$sql="update xemdonhang set tinhTrang=$tr where maHD=$ma";
		mysqli_query($con,$sql);
		
		mysqli_close($con);
		include("../connect/close.php");
		header("Location:xemdonhang.php");	
	}else {
		$err = "Loi khong the thuc hien yeu cau !!!";
		header("Location:xemdonhang.php?err=$err");
	}
	// if($result != null){
		
	// }
	
	
	
		
	
}else
	
{
	header("Location:xemdonhang.php?err=$err");	
}
?>

