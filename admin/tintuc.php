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
<!DOCTYPE html >
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
$resultTongSp=mysqli_query($con,"select count(*) as tongSp from tintuc where tieuDe like '%$tenSp%'");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=8 ;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	
	
		$sql = mysqli_query( $con, "select *  from tintuc where tieuDe like '%$tenSp%' limit $start,$soSanPham1Trang" );

 ?>
	<div id="main">
<div id="content">
 <h4><a href="themtin.php">thêm mới bài Dăng</a></h4>
<table>
  <tr>
    <th>STT</th>
    <th>Tiêu đề</th>
    <th>Mô tả</th>
    <th>Mã danh mục</th>
     
      <th>Chỉnh sửa</th>
	  <th> Xóa</th>
  </tr>
  <?php
  while($kh=mysqli_fetch_array($sql)){
  ?><tr>
    <td><?php echo($kh["maTin"]);?></td>
    <td><?php echo($kh["tieuDe"]);?></td>
   <td><?php echo($kh["moTa"]);?></td>
   <td><?php echo($kh["maDanhMuc"]);?></td>
  
     
      <td><a href="suaTin.php?maKH=<?php echo($kh["maTin"]); ?>">Sửa</a></td>
	<td><a href="xoaTin.php?maKH=<?php echo($kh["maTin"]); ?>">Xóa</a></td>
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
