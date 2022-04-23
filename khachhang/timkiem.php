<?php
session_start();
if ( !isset( $_SESSION[ "useName" ] ) ) {
	$_SESSION[ "useName" ] = $use;

	
}?>
<html xmlns="http://www.w3.org/1999/xhtml"
	<?php

	
	
	  ?>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
	<link href="cssedit.css" rel="stylesheet" type="text/css" >
	<link href="../css/test1.css" rel="stylesheet" type="text/css">
<script src="jquery-3.2.1.min.js"></script>
		<script src="search.js"></script>
	
<style>
	#produc3 {
  
  font-family: 'Open Sans', sans-serif;
  background: #CCC;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
}
#produc3 * {
  box-sizing: inherit;
}

 #produc3 .wrapper {
  width: 100%;
  margin: 1em auto;
 background: #FFF8F8;
  padding: 0em;
  border-radius: 8px;
  border: 4px solid #f5f5f5;
}
	#produc3{
	position: absolute;
	top: 80px;
	width: 100%;
	height: 800px;
	 background: #FCFCFC;
}
</style>
</head>

<body>
	<?php include("nav.php") ?>
	
<div id="main">
	
	<?php
		include( "../connect/open.php" );
		$resultTongSp=mysqli_query($con,"select count(*) as tongSp from tblsanpham ");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=16;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	
	
		$sql = mysqli_query( $con, "select * from tblsanpham  limit $start,$soSanPham1Trang" );
	?>
<div id="produc3">
		 <div class="wrapper">

	
		<!-- content here -->
		<div class="product-grid product-grid--flexbox">
			<div class="product-grid__wrapper">
				<!-- Product list start here -->
<?php
				while ( $sp = mysqli_fetch_array( $sql ) ) {
					?>
				<!-- Single product -->
				<div class="product-grid__product-wrapper">
					<div class="product-grid__product">
						<div class="product-grid__img-wrapper">
							<img src="<?php echo($sp["anh"]);?>" alt="Img" class="product-grid__img" />
						</div>
						<span class="product-grid__title"><?php echo($sp["tenSP"]);?></span>
						<span class="product-grid__price"><?php echo number_format($sp["gia"]);?> đ</span>
						<div class="product-grid__extend-wrapper">
							<div class="product-grid__extend">
								<?php $content=$sp["moTa"] ?>
								<p class="product-grid__description">.-------------Thông tin cấu hình sản phẩm -----------------.
								<br>
									<?php print nl2br($content)?></p>
								<a href="giohang.php?maSp=<?php echo($sp["maSP"]);?>" onclick="alert('cảm ơn!  sản phẩm đã thểm vào giỏ hàng')"><span class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> Add to cart</span></a>
								<a href="chitietsp.php?ma=<?php echo($sp["maSP"]);?>"><span class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i> View more</span></a>
							</div>
						</div>
					</div>
				</div>
				<!-- end Single product -->
<?php } ?>
			</div>
		</div>
	</div>

	<footer>
			<?php 
	
	for($i=0;$i<$tongSoTrang;$i++)
	{
		
			?>
			<a class="next round" href="?page=<?php echo($i);?>"><?php echo($i+1);?></a>
			<?php
		
	}
  
		?>
	</footer>
</div>
	</div>
</div>

</body>

</html>