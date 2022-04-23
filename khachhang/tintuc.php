<?php
session_start();
if ( !isset( $_SESSION[ "useName" ] ) ) {
	$_SESSION[ "useName" ] = $use;

	
}?><?php

	
	$tenSp="";
	if(isset($_GET["txtTen"]))
	{
		$tenSp=$_GET["txtTen"];	
		
	}
	  ?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
	<link href="../khachhang/cssedit1.css" rel="stylesheet" type="text/css" >
	<script src="jquery-3.2.1.min.js"></script>
		<script src="search.js"></script>
	
	
	
<style>

	#rightcontent{
	position: absolute;
	top: 97px;
	left: 12px;
	height: 500px;
	width: 50%;
	color: #FFFCFC;
	}
	
	h3{
		font-size: 20px;
	}
	#list {
		position: absolute; top: 600px; left: 0px;
  margin:auto;
		width: 70%;
		height: 500px;
}
	a{
		text-decoration: none;
		color: black;
	}
	a h3:hover {
    color: blue;
		text-decoration:none;
}
	a:hover {
  background: #eee;
  cursor: pointer;
		text-decoration:none;
}

 #contenct {
 
  width: 100%;
}



  img {
  float: left;
  margin: 0 15px 0 0;
}



 #contenct {
  padding: 10px;
  overflow: auto;
}
	#contenct:hover {
  background: #eee;
  cursor: pointer;
}
#content1 {
  padding: 10px;
  overflow: auto;
}

 #content1:hover {
  background: #eee;
  cursor: pointer;
}

	
	#sanpham{
		background: #FFF;
		position: absolute; top: 600px; right: 0px;
		width: 25%;
		
		height: 800px;
	}
	footer{
	margin-bottom: auto;
		height: 50px;
		
	}
	
	</style>
</head>

<body>
	<?php include("nav.php") ?>
	
<div id="main">
	<?php
		include( "../connect/open.php" );
		$resultTongSp=mysqli_query($con,"select count(*) as tongSp from tintuc where tieuDe like '%$tenSp%'");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=4;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	
	
		$sql = mysqli_query( $con, "select * from tintuc where tieuDe like '%$tenSp%'  limit $start,$soSanPham1Trang" );
	?>

<div id="leftslide">
	<p><h3 style="color: #8A8282">Thảo Luận Nhiều</h3></p>
	 <?php
	$tin=mysqli_query($con,"select * from tintuc limit 0,2")?>
	
	<table><?php  	while ( $sr = mysqli_fetch_array( $tin ) ) { ?>
		<tr> 
			<td> <img src="<?php echo($sr["anh"]) ?>" height="135" width="180" >
				</td>
			<td><a href="chitiettintuc.php?ma=<?php echo($sr["maTin"]) ?>"> <h4><?php echo($sr["tieuDe"]) ?></h4></a>  <p style ="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><?php echo($sr["moTa"]) ?>
		 .</p></td>
			
		</tr>
		<?php } ?>
		 </table>
	</div>
<div id="rightcontent">
	
     <a href="chitiettintuc.php?ma=8"> <img src="../image/ttiphone.jpg" height="300" width="100%" >
      <h3>iPhone giảm sốc đến 3 triệu, thời gian chỉ 5 ngày</h3>
		 <p style="font-size: 15px" with="80%">Tết đến xuân về, chắc hẳn bạn đang muốn sở hữu 1 chiếc iPhone để sử dụng, hay làm quà cho người thân, vậy thì cơ hội để bạn mua với giá phải chăng nhất đây rồi..</p></a>

   
	</div>
	
	<hr>
<div id="list">
	<hr>
  
   <?php  	while ( $sp = mysqli_fetch_array( $sql ) ) { ?>
	<div id="content1">
     <a href="chitiettintuc.php?ma=<?php echo($sp["maTin"]); ?>"> <img src="<?php echo($sp["anh"]) ?>" height="200" width="300" >
      <h3><?php echo($sp["tieuDe"]) ?></h3>
		 <pstyle="font-size: 16"><?php echo($sp["moTa"]) ?></p></a>
		</div>
<?php } ?> 
	<center>
	<?php 
	
	for($i=0;$i<$tongSoTrang;$i++)
	{
		if($tenSp!="")
		{
			?>
        <a href="?txtTen=<?php echo $tenSp;?>&&page=<?php echo($i);?>"><?php echo($i+1);?></a>
        <?php	
		}else
		{
			
			?>
	
		<a class="next round" style="font-size: 16"  href="?page=<?php echo($i);?>"><?php echo($i+1);?></a>
			<?php
		}
	}
  
		?>
</center>
	<br>

	</div>
	<div id="sanpham">
	
		<p><h3 style="color: #8A8282">Sản Phẩm bán chạy</h3></p>
		<?php $sql1 = mysqli_query( $con,"select * from tblsanpham limit 0,5");?>
		<?php
				while ( $sq = mysqli_fetch_array( $sql1 ) ) {?>
		<br>

		<table>
			<tr>
				<td><img src="<?php echo($sq["anh"]);?>" height="90px" ></td>
				<td>		<a href="chitietsp.php?ma=<?php echo($sp["maSP"]);?>"><font size="4px" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><?php echo($sq["tenSP"]);?></font></a>
		
					<font size="3px"	><p  style="color: #EC2B2E"><?php echo number_format($sq["gia"]);?> đ</p></font><br>
				</td>

			<?php	}?>
	</table>
	</div>
	
	
</div>
	

</body>

</html>