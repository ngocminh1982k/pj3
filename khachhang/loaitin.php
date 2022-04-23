<?php
session_start();
if ( !isset( $_SESSION[ "useName" ] ) ) {
	$_SESSION[ "useName" ] = $use;

	
}?>
<?php

	$ma=$_GET["maTin"];
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
	<link href="cssedit.css" rel="stylesheet" type="text/css" >
		<script src="search.js">
</script>
	<script src="jquery-3.2.1.min.js"></script>
	
<style>

	#rightcontent{
		position: absolute; top: 110px; left: 0px;
		height: 500px;
		width: 52%;
	
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

h3 {
  font: bold 20px/1.5 Helvetica, Verdana, sans-serif;
}

  img {
  float: left;
  margin: 0 15px 0 0;
}

 p {
  font: 200 12px/1.5 Georgia, Times New Roman, serif;
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
		position: absolute; top: 600px; right: 0px;
		width: 25%;
		
		height: 700px;
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
		$resultTongSp=mysqli_query($con,"select count(*) as tongSp from tintuc where maDanhMuc=$ma and tieuDe like '%$tenSp%'");
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
	
	
		$sql = mysqli_query( $con, "select * from tintuc where  maDanhMuc=$ma and  tieuDe like '%$tenSp%'  limit $start,$soSanPham1Trang" );
	?>

<div id="leftslide">
	<p><h3 style="color: #8A8282">Thảo Luận Nhiều</h3></p>
	<div id="contenct">
		
	
     <a href="#">  <img src="../image/fa_1200x680-800-resize.jpg" height="120" width="200" >
	
     <h3>Số lượng đặt trước Redmi Note 7</h3>
		 <pstyle="font-size: 13">Trong lần mở bán đầu tiên vào ngày 15/1, Redmi Note 7 đã bán được hơn 100.000 chiếc trong hơn 8 phút. Còn trong lần mở bán thứ 2 vào ngày hôm nay (18/10)...</p></a> 
		<a href="#"> <img src="../image/dell-xps-13-2019-review-model-9380-30157-1200x9999_800x534.jpg" height="120" width="200" >
	
      <h3>Đánh giá laptop Dell XPS  </h3>
			<p style="font-size: 14">tại sự kiện CES 2019 bắt đầu từ hôm 8/1, Dell đã giới thiệu chiếc máy tính xách tay mới của mình</p></a>
    
	
	</div>
	</div>
<div id="rightcontent">
	
	
     <a href="#"> <img src="../image/ttiphone.jpg" height="300" width="600" >
      <h3>Iphone đồng loạt giảm Giá Sốc lên đến 5tr</h3>
		 <p style="font-size: 16px">Tết đến xuân về, chắc hẳn bạn đang muốn sở hữu 1 chiếc iPhone để sử dụng, hay làm quà cho người thân, vậy thì cơ hội để bạn mua với giá phải chăng nhất đây rồi..</p></a>
   
	</div>
	
	<hr>
<div id="list">
	<hr>
  
   <?php  	while ( $sp = mysqli_fetch_array( $sql ) ) { ?>
	<div id="content1">
      <a href="chitiettintuc.php?ma=<?php echo($sp["maTin"]); ?>"> <img src="<?php echo($sp["anh"]) ?>" height="200" width="300" >
      <h3><?php echo($sp["tieuDe"]) ?></h3>
		 <p style="font-size: 14"><?php echo($sp["moTa"]) ?></p></a>
		</div>
<?php } ?> 
	
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
			<a href="?page=<?php echo($i);?>"><?php echo($i+1);?></a>
			<?php
		}
	}
  
		?>

	</div>
	<div id="sanpham">
		<p><h3 style="color: #8A8282">Sản Phẩm bán chạy</h3></p>
	</div>
	
	<footer>
			
	</footer>
</div>
	

</body>

</html>