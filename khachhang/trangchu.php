<?php
session_start();
if ( !isset( $_SESSION[ "useName" ] ) ) {
	$_SESSION[ "useName" ] = $use;

	
}?>
<html>

<?php
	$tenSp="";
	if(isset($_GET["txtTen"]))
	{
		$tenSp=$_GET["txtTen"];	
	}
	?>
<head><script src="jquery-3.2.1.min.js"></script>
	<script src="search.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
	<link href="../css/cssedit.css" rel="stylesheet" type="text/css" >
	<link href="../css/css3.css" rel="stylesheet" type="text/css">
	
	
	
<style>
	#slideshow{position: absolute; top: 110px; left: 0px;
		height: 330px;
		width: 840px;
		background: #E32024;}
	#main1{
	position: relative;
   background: #CCCCCC;
	height: 2500px;
	
}

	a{
		text-decoration: none; 
		color: black;
		
	}
	a:hover{
		text-decoration: none;
		color:#242CBC;
	}



 p {
  font: 200 12px/1.5 Georgia, Times New Roman, serif;
}
.mySlides {display:none;}
	.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
	#product3 {
  
  font-family: 'Open Sans', sans-serif;
  background: #CCC;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
}
#product3 * {
  box-sizing: inherit;
}

 #product3 .wrapper {
  width: 100%;
  margin: 1em auto;
 background: #FFF8F8;
  padding: 0em;
  border-radius: 8px;
  border: 5px solid #f5f5f5;
}
	</style>

</head>

<body>
	<?php include("nav.php") ?>
	
<div id="main1">
	

<div id="slideshow">
  
<div class="w3-container">
  
</div>

<div class="w3-content w3-display-container" style="max-width:800px">
  <img class="mySlides" src="../05_01_2019_22_22_46_Big-huawei-800-300.png" style="width:100%">
  <img class="mySlides" src="../07_01_2019_14_05_12_Big-nokia-800-300.png" style="width:100%">
  <img class="mySlides" src="../30_12_2018_18_01_33_BigSS-800-300.png" style="width:100%">
	
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width: 100%" >
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>


</div>


<div id="leftslide">
	<h3 style="color: #8A8282">   Tin tức nổi bật</h3>
	
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
	<br>
	</div>
-->


	<?php
		include( "../connect/open.php" );
		
	
	
	
		$sql = mysqli_query( $con,"select * from tblsanpham where maLoaiSP=1 limit 0,8");
	?>
<div id="product">
		 <div class="wrapper">
			 <div class="wrapper">
	
		
		
	


	
		<!-- content here -->
		<div class="product-grid product-grid--flexbox">
			<h2 style="color: #B50003" >
Điện thoại nổi bật nhất</h2>
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
								<p class="product-grid__description">--------------Thông tin cấu hình sản phẩm -------------------
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

	
</div>
	</div>
	<div id="product2">
		 <div class="wrapper">
			 <div class="wrapper">
	
	


	<?php $sql1 = mysqli_query( $con,"select * from tblsanpham where maLoaiSP=2 limit 0,8"); ?>
		<!-- content here -->
		<div class="product-grid product-grid--flexbox">
			
		<h2 style="color: #B50003" >
Laptop nổi bật nhất</h2>
		
			<div class="product-grid__wrapper">
				<!-- Product list start here -->
<?php
				while ( $sp1 = mysqli_fetch_array( $sql1 ) ) {
					?>
				<!-- Single product -->
				<div class="product-grid__product-wrapper">
					<div class="product-grid__product">
						<div class="product-grid__img-wrapper">
							<img src="<?php echo($sp1["anh"]);?>" alt="Img" class="product-grid__img" />
						</div>
						<span class="product-grid__title"><?php echo($sp1["tenSP"]);?></span>
						<span class="product-grid__price"><?php echo number_format($sp1["gia"]);?> đ</span>
						<div class="product-grid__extend-wrapper">
							<div class="product-grid__extend">
								<?php $content=$sp1["moTa"] ?>
								<p class="product-grid__description">------------Thông tin cấu hình sản phẩm ----------------
								<br>
									<?php print nl2br($content)?></p>
								<a href="giohang.php?maSp=<?php echo($sp1["maSP"]);?>" onclick="alert('cảm ơn ! sản phẩm đã thêm vào giỏ hàng')"><span class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> Add to cart</span></a>
								<a href="chitietsp.php?ma=<?php echo($sp1["maSP"]);?>"><span class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i> View more</span></a>
							
							</div>
						</div>
					</div>
				</div>
				<!-- end Single product -->
<?php } ?>
			</div>
		</div>
	</div>

	
</div>
	</div>
	<div id="product3">
		 <div class="wrapper">
			 <div class="wrapper">
	
		
		
	


	<?php $sql1 = mysqli_query( $con,"select * from tblsanpham where maLoaiSP=3 or maLoaiSP=4  limit 0,8"); ?>
		<!-- content here -->
		<div class="product-grid product-grid--flexbox">
			<h2 style="color: #B50003" >
Table và Phụ kiện</h2>
			<div class="product-grid__wrapper">
				<!-- Product list start here -->
<?php
				$sql5 = mysqli_query( $con,"select * from tblsanpham where maLoaiSP=3 limit 0,8");
				while ( $sp2 = mysqli_fetch_array( $sql5 ) ) {
					?>

				<!-- Single product -->
				<div class="product-grid__product-wrapper">
					<div class="product-grid__product">
						<div class="product-grid__img-wrapper">
							<img src="<?php echo($sp2["anh"]);?>" alt="Img" class="product-grid__img" />
						</div>
						<span class="product-grid__title"><?php echo($sp2["tenSP"]);?></span>
						<span class="product-grid__price"><?php echo number_format($sp2["gia"]);?> đ</span>
						<div class="product-grid__extend-wrapper">
							<div class="product-grid__extend">
								<?php $content=$sp2["moTa"] ?>
								<p class="product-grid__description">--------------Thông tin cấu hình sản phẩm -------------------
								<br>
									<?php print nl2br($content)?></p>
								<a href="giohang.php?maSp=<?php echo($sp2["maSP"]);?>" onclick="alert('cảm ơn!  sản phẩm đã thểm vào giỏ hàng')"><span class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> Add to cart</span></a>
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

	
</div>
	</div>
	<footer>
		
			
	</footer>
</div>

</body>

</html>