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
<title>shopCN/customer </title>
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
	if($ad["maAD"]==2){
$resultTongSp=mysqli_query($con,"select count(*) as tongSp from admin where ten like '%$tenSp%'");
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
	
	
		$sql = mysqli_query( $con, "select * from admin where ten like '%$tenSp%' limit $start,$soSanPham1Trang" );
if(isset($_GET["ad"]))
	{
		$tenSp=$_GET["ad"];
	$resultTongSp=mysqli_query($con,"select count(*) as tongSp from admin where SDT like '%$tenSp%'");
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
	
	
		$sql = mysqli_query( $con, "select * from admin where SDT like '%$tenSp%' limit $start,$soSanPham1Trang" );
	
	}
	
	
 ?>
	<div id="main">
<div id="content"><br />
	
			<form style="float: left">
				Tìm kiếm
				

				<input type="text" placeholder="Nhập tên admin, SDT, Email" name="ad">
      <button type="submit">Search</button>
    </form><br />
	<br />


 <h4><a href="themad.php">Thêm mới admin</a></h4>
 <br>
<table>
  <tr>
    <th>STT</th>
    <th>UserName</th>
    <th>Tên</th>
    <th>SDT</th>
     <th>Email</th>
	  <th>Trạng thái</th>
	  <th>Quyền</th>
      <th>Chỉnh sửa</th>
	  <th> Khóa</th>
  </tr>
  <?php
  while($kh=mysqli_fetch_array($sql)){
  ?><tr>
    <td><?php echo($kh["maAD"]);?></td>
    <td><?php echo($kh["useName"]);?></td>
   <td><?php echo($kh["ten"]);?></td>
   <td><?php echo($kh["SDT"]);?></td>
    <td><?php echo($kh["email"]);?></td>
	 <td><?php if($kh["tinhTrang"]==0){?> hoạt động<?php } else{?> bị khóa <?php } ?></td>
	 <td><?php if($kh["phanQuyen"]==0){?> Admin<?php } else{?> SuperAdmin <?php } ?></td>
     
      <td><a href="suataikhoan2.php?maKH=<?php echo($kh["maAD"]); ?>">Sửa</a></td>
	<td><?php if($ad["maAD"]==$kh["maAD"]){ ?> khóa <?PHP }else{ ?><a href="khoaad.php?ma=<?php echo($kh["maAD"]); ?>">Khóa</a><?php } ?></td>
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
 } else{ header("location:iosdisplay.php?err=1");}
		?>
		
		</div>
	
</div>
</body>
</html>
