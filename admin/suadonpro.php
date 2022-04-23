<?php if(isset($_GET["maHD"])&&isset($_GET["tinhTrang"]))
{
	
	$ma=$_GET["maHD"];
	$tr=$_GET["tinhTrang"];
	$err= 'Loi roi sua lai di' ;

include("../connect/open.php");
	$sqlCheck="select *from  hoadon where maHD=$ma";

	$result = (mysqli_query($con,$sqlCheck));
	$resultArray = mysqli_fetch_array($result);
	if($resultArray["tinhTrang"] != 2){
		$sql="update hoadon set tinhTrang=$tr where maHD=$ma";
		mysqli_query($con,$sql);
		
		mysqli_close($con);
		include("../connect/close.php");
		header("Location:hoaDon.php");	
	}else {
		$err = "Loi khong the thuc hien yeu cau !!!";
		header("Location:hoaDon.php?err=$err");
	}
	// if($result != null){
		
	// }
	
	
	
		
	
}else
	
{
	header("Location:hoaDon.php?err=$err");	
}
?>