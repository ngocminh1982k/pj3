<?php
session_start();
if(!isset($_SESSION["userName"])){
	$_SESSION["userName"]=$use;
	
header("location:../admin/logindisplay.php");
}

?>
<?php

$maSP=$_GET["maSP"];
	
	$tenSp="";
	if(isset($_GET["txtTen"])&&isset($_GET["maSP"]))
	{
		$tenSp=$_GET["txtTen"];	
		$maSP=$_GET["maSP"];
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lý sản phẩm </title>
	<link href="../css/css1.css" rel="stylesheet" type="text/css"/>
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
		include( "../connect/open.php" );
		
			$resultTongSp=mysqli_query($con,"SELECT count(*) as tongSp FROM tblsanpham where maLoaiSP=$maSP");
		
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
	
	
			$sql=mysqli_query($con,"SELECT * FROM tblsanpham where maLoaiSP=$maSP limit $start,$soSanPham1Trang ");
		

		?>
		<div id="content">
			<a href="themsp.php"> Thêm sản Phẩm</a>
			<table>
				<tr>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Ảnh</th>
					<th>Số lượng</th>
					<th>Giá</th>
					<th>Chỉnh sửa</th>
					<th>Xóa</th>
				</tr>
				<?php
				while ( $sp = mysqli_fetch_array($sql) ) {
					?>
				<tr>
					<td>
						<?php echo($sp["maSP"]);?>
					</td>
					<td>
						<?php echo($sp["tenSP"]);?>
					</td>
					<td>
						<img src="<?php echo($sp["anh"]);?>" height="20px" with="20px">
					</td>
					<td>
						<?php echo($sp["soLuong"]);?>
					</td>
					<td>
						<?php 
					
					echo($sp["gia"]);  ?>
						
					</td>
					<td><a href="suasp.php?maSP=<?php echo($sp["maSP"]); ?>">Sửa</a>
						<td><a href="xoaSP.php?maSP=<?php echo($sp["maSP"]); ?>">Xóa</a>
					</td>
					</td>
				</tr>
				</tr>
				<?php } ?>

			</table>
			<?php 
	
	for($i=0;$i<$tongSoTrang;$i++)
	{
		if($tenSp!="")
		{
			?>
        <a class="next round" href="../Quanlysp/?txtTen=<?php echo $tenSp;?>&amp;&amp;page=<?php echo($i);?>"><?php echo($i+1);?></a>
        <?php	
		}else
		{
			?>
			<a class="next round" href="../Quanlysp/?page=<?php echo($i);?>"><?php echo($i+1);?></a>
			<?php
		}
	}

		?>
		</div>
	</div>
</body>

</html>