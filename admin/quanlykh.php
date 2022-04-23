<?php
session_start();
if(!isset($_SESSION["userName"])){
	$_SESSION["userName"]=$use;
	
header("location:../admin/logindisplay.php");
}

?><?php
	$tenSp="";
	if(isset($_GET["txtTen"]))
	{
		$tenSp=$_GET["txtTen"];	
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>clicknow.com/customer </title>
<link href="../css/css1.css" rel="stylesheet" type="text/css" />
<style>

	#content {
			width: 70%;
			position: absolute;
			top: 180px;
			right: 180px;
		}
		
		#content table {
			
			border-spacing: 0;
			width: 100%;
			border: 1px solid #ddd;
			z-index: auto;
		}
		
		#content th,
		td {
			text-align: left;
			padding: 16px;
		}
		
		#content tr:nth-child(even) {
			/* background-color: #f2f2f2; */
			background-image: linear-gradient(#f8f8f8, #ffc0c0db);

		}
</style>
</head>

<body>
<div id="main">



<?php
	include("nav.php");
include("../connect/open.php");
$resultTongSp=mysqli_query($con,"select count(*) as tongSp from khachhang where tenKH like '%$tenSp%'");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=40;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	
	
		$sql = mysqli_query( $con, "select * from khachhang where tenKH like '%$tenSp%' ORDER BY maKH desc limit $start,$soSanPham1Trang" );

	
	if(isset($_GET["kh"]))
	{
		$tenSp=$_GET["kh"];
	$resultTongSp=mysqli_query($con,"select count(*) as tongSp from khachhang where tenKH like '%$tenSp%' or email like '%$tenSp%' or SDT like '%$tenSp%' ");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=13;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	
	
		$sql = mysqli_query( $con, "select * from khachhang where tenKH like '%$tenSp%' or email like '%$tenSp%' or SDT like '%$tenSp%' ORDER BY maKH desc limit $start,$soSanPham1Trang" );
	
	}
	
	
 ?>
	<div id="main">
<div id="content"><br />
	
			<form style="float: left">
				Tìm kiếm
				<br />
		<input type="text" placeholder="Nhập tên KH, Email, SDT" name="kh">
      
      
				
      <button type="submit">Search</button>
    </form><br />
	<br />


 <h4><a href="themkh.php">Thêm mới Khách hàng</a></h4>
<table>
  <tr>
    <th>STT</th>
    <th>UserName</th>
    <th>Tên</th>
    <th>SDT</th>
     <th>Email</th>
	  <th> Trạng thái</th>
      <th>Chỉnh sửa</th>
	  <th> Khóa</th>
  </tr>
  <?php
  while($kh=mysqli_fetch_array($sql)){
  ?><tr>
    <td><?php echo($kh["maKH"]);?></td>
    <td><?php echo($kh["useName"]);?></td>
   <td><?php echo($kh["tenKH"]);?></td>
   <td><?php echo($kh["SDT"]);?></td>
    <td><?php echo($kh["email"]);?></td>
		 <td><?php if($kh["tinhTrang"]==0){?> hoạt động<?php } else{?> bị khóa <?php } ?></td>

     
      <td><a href="suaKH.php?maKH=<?php echo($kh["maKH"]); ?>">Sửa</a></td>
	<td><a href="xoalKH.php?maKH=<?php echo($kh["maKH"]); ?>">Khóa</a></td>
  </tr>
  <?php } ?>
  
</table>
		<?php 
	
	for($i=0;$i<$tongSoTrang;$i++)
	{
		if($tenSp!="")
		{
			?>
        <a class="next round" href="?txtTen=<?php echo $tenSp;?>&&page=<?php echo($i);?>"><?php echo($i+1);?></a>
        <?php	
		}else
		{
			?>
			<a class="next round" href="?page=<?php echo($i);?>"><?php echo($i+1);?></a>
			<?php
		}
	}
  
		?>
		
		</div>
	
</div>
</body>
</html>
