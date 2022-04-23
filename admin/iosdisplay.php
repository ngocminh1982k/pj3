<?php
session_start();
if ( !isset( $_SESSION[ "userName" ] ) ) {
	$_SESSION[ "userName" ] = $use;

	header( "location:logindisplay.php" );

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
	<link href="../css/css1.css" rel="stylesheet" type="text/css"/>

	<style>
		#noidung {
			position: absolute;
			top: 180px;
			
			width: 100%;
			font-size: 24px;
			text-decoration: none;
			font-family: "Times New Roman", Times, serif
		}
		
	table { 
	width: 850px; 
	border-collapse: collapse; 
	margin:50px auto;
	left: 70px;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 
	}
	tr {
    background: blanchedalmond;
	}

td, th { 
	padding: 10px; 
	border: 1px solid rgb(0 0 0 / 20%);
	text-align: left; 
	font-size: 18px;
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}
	</style>
</head>

<body>
	<div id="main">

		
		
		<?php
		if(isset($_GET["err"])){
	$message = "bạn không có qyền truy cập";
  echo "<script type='text/javascript'>alert('$message');</script>";
	

}
		include("nav.php");
		?>
		<div id="noidung">
			<table>
  <thead>
    <tr>
      <th>Các Mục</th>
      <th>Số lượng</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-column="First Name">Tổng doanh thu</td>
      <td data-column="Last Name">
      	<?php include("../connect/open.php");
      	$rstongTien=mysqli_query($con,"SELECT sum(tongTien) as tongTien FROM `hoadon` WHERE tinhTrang=1");
      	$rtongTien=mysqli_fetch_array($rstongTien);
      	$tongTien=$rtongTien["tongTien"];
      	echo number_format("$tongTien");
      	 ?> Đ
      </td>
     
    </tr>
    <tr>
      <td data-column="First Name">Doanh Thu tháng </td>
      <td data-column="Last Name">
      	  <?php
$now = getdate();

$currentTime = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"];

$currentDate =  $now["year"]. "-" . $now["mon"] . "-" .  $now["mday"];
$so=$now["mday"]-($now["mday"]-1);
$currentmonth =  $now["year"]. "-" . $now["mon"] . "-" . $so ;

$currentWeek = $now["wday"] . ".";



$sql1=mysqli_query($con,"select sum(tongTien) as TongTien1 from hoadon where ngayDatHang<='$currentDate' and ngayDatHang>='$currentmonth' and tinhTrang=1");
$rs1=mysqli_fetch_array($sql1);
echo number_format($rs1["TongTien1"]);
?> Đ
      </td>
      
    </tr>
     <tr>
      <td data-column="First Name">Tổng số đơn hàng</td>
      <td data-column="Last Name"><?php $sql7=mysqli_query($con,"select count(tinhTrang) as so from hoadon ");
$rs7=mysqli_fetch_array($sql7);
echo ($rs7["so"]); ?> </td>
    </tr>
    <tr>
      <td data-column="First Name">Tổng số đơn hàng đã duyệt</td>
      <td data-column="Last Name"><?php $sql2=mysqli_query($con,"select count(tinhTrang) as so from hoadon where tinhTrang=1");
$rs3=mysqli_fetch_array($sql2);
echo ($rs3["so"]); ?> </td>
    </tr>
	<td data-column="First Name">Tổng số đơn hàng đã hủy</td>
      <td data-column="Last Name"><?php $sql2=mysqli_query($con,"select count(tinhTrang) as so from hoadon where tinhTrang=2");
$rs3=mysqli_fetch_array($sql2);
echo ($rs3["so"]); ?> </td>
    </tr>
	<td data-column="First Name">Tổng số đơn hàng chưa duyệt</td>
      <td data-column="Last Name"><?php $sql2=mysqli_query($con,"select count(tinhTrang) as so from hoadon where tinhTrang=0");
$rs3=mysqli_fetch_array($sql2);
echo ($rs3["so"]); ?> </td>
    </tr>
     <tr>
      <td data-column="First Name">Tổng số đơn hàng trong tháng</td>
      <td data-column="Last Name">
      	<?php $sql3=mysqli_query($con,"select count(tinhTrang) as so from hoadon where ngayDatHang<='$currentDate' and ngayDatHang>='$currentmonth'");
$rs4=mysqli_fetch_array($sql3);
echo ($rs4["so"]); ?>
      </td>
    </tr>
    <tr>
      <td data-column="First Name">Số Đơn trong ngày </td>
      <td data-column="Last Name">
      	
      	<?php $sql4=mysqli_query($con,"select count(tinhTrang) as so from hoadon where ngayDatHang='$currentDate' ");
$rs5=mysqli_fetch_array($sql4);
echo ($rs5["so"]); ?>
      </td>
    </tr>
    
  </tbody>
</table>
		</div>

		

	</div>
</body>

</html>