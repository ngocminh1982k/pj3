<?php
session_start();
if ( !isset( $_SESSION[ "useName" ] ) ) {
	$_SESSION[ "useName" ] = $use;

	header( "location:login.php" );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clicknow.com </title>
	<link href="../khachhang/cssedit1.css" rel="stylesheet" type="text/css"/>
	<script src="jquery-3.2.1.min.js"></script>
		<script src="search.js"></script>
	
	<style>
	
		#hoadon{
			position: absolute; top: 120px; left: 70px;
			height: 400px;
			width: 100%;
	
			
		}
				#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 88%;
}
		#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
#main1{
	position: relative;
   background: #CCCCCC;
	height: 900px;
	
}
input[type=text],input[type=date]  {
  width: 200px;
  box-sizing: border-box;
  border: solid #ccc;
  border-radius: 4px;

  background-color: white;
  
 

}
	
		
	</style>
	<?php	if(isset($_GET["err"])){
			$err = $_GET["err"];
			echo '<script type="text/javascript">alert("Error: đơn đã đc dao ko thể hủy !!! ' . implode("; ", $errors) . '");</script>';
		} ?>
	<script type="text/javascript">
		$(document).on('click', ':not(form)[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
        e.stopImmediatePropagation();
        e.preventDefault();
    }
});

$(document).on('submit', 'form[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
        e.stopImmediatePropagation();
        e.preventDefault();
    }
});

$(document).on('input', 'select', function(e){
    var msg = $(this).children('option:selected').data('confirm');
    if(msg != undefined && !confirm(msg)){
        $(this)[0].selectedIndex = 0;
    }
});
	</script>
</head>

<body>


	<?php include("nav.php") ?>
	<?php
	$ma= $ad["maKH"];
		include( "../connect/open.php" ); 
		$resultTongSp=mysqli_query($con,"select count(*) as tongSp from hoadon where maKH=$ma");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=8;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	
	
		$sql = mysqli_query( $con, "select *  from hoadon where maKH=$ma  ORDER BY maHD desc limit $start,$soSanPham1Trang  " );

	if(isset($_GET["ten"]))
	{
		$tenSp=$_GET["ten"];
	$resultTongSp=mysqli_query($con,"select count(*) as tongSp from hoadon where tenKH like '%$tenSp%'  or SDT like '%$tenSp%' or ngayDatHang like '$tenSp' ");
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
	
	
		$sql = mysqli_query( $con, "select * from hoadon where tenKH like '%$tenSp%'  or SDT like '%$tenSp%' or ngayDatHang like '$tenSp' ORDER BY maHD desc limit $start,$soSanPham1Trang" );
	
	}
 ?>
	
	<div id="main1">
<div id="hoadon">
	tìm kiếm<br>

	<form>
		
      <input type="text" placeholder="Tên, email, SDT" name="ten">
       <input type="date" placeholder="Ngày Đặt hàng" name="ten">
		
      <button type="submit">Search</button>
    </form>

	
 
	<br>

<table id="customers">
  <tr>
    <th>Mã HĐ</th>
    <th>Thông Tin</th>
    <th>Ngày Đặt</th>
	  <th>Tổng Tiền</th>
	  <th> Tình Trạng</th>
      <th>Xem Chi Tiết</th>
	  <th>Hủy</th>
  </tr>
  <?php
  while($kh=mysqli_fetch_array($sql)){
  ?><tr>
    <td><?php echo($kh["maHD"]);?></td>
    <td><?php echo($kh["tenKH"]);?><br>
		<?php echo($kh["diaChi"]);?><br>
		<?php echo($kh["SDT"]);?>
	</td>
   <td> 
   	<?php 
  $date=date_create($kh["ngayDatHang"]); echo date_format($date,"d/m/Y "); ?></td>
  
	<td><?php echo($kh["tongTien"]);?></td>
	<td><?php if($kh["tinhTrang"]==0){?><span style="color:#EB0003">Chưa duyệt</span><?php }else if($kh["tinhTrang"]==1){?> đã duyệt <?php } 
	  
	  else {?> đã hủy <?php }?></td>
  
     
      <td><a href="hoadonct.php?maHD=<?php echo($kh["maHD"]); ?>">Xem</a></td>
	<td>
		
		

		<?php if($kh["tinhTrang"]==0){?>
		<a class="next1 round1" href="suadonhang.php?ma=<?php echo($kh["maHD"]);?>" data-confirm="bạn muốn hủy đơn hàng này?">Hủy</a><?php } else{?>
		Đã Xong<?php }?>
	</td>
  </tr>
  <?php } ?>
  
</table>
		<?php 
	
	for($i=0;$i<$tongSoTrang;$i++)
	{
			?>
			<a class="next round" href="?page=<?php echo($i);?>"><?php echo($i+1);?></a>
			<?php
		
	}
	
		?>
		
		</div>
	
	
		

</body>

</html>