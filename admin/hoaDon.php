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
// hien thi loi 
		if(isset($_GET["err"])){
			$err = $_GET["err"];
			echo '<script type="text/javascript">alert("Error:khách đã hủy ko thể duyệt !!! ' . implode("; ", $errors) . '");</script>';
		}
// end hien thi loi
$resultTongSp=mysqli_query($con,"select count(*) as tongSp from hoadon where maHD like '%$tenSp%'");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=11;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	
	
		$sql = mysqli_query( $con, "select *  from hoadon where tinhTrang like '%$tenSp%' ORDER BY maHD desc limit $start,$soSanPham1Trang" );
if(isset($_GET["tinhtrang"]))
	{
		
	

$tr=$_GET["tinhtrang"];



$resultTongSp=mysqli_query($con,"select count(*) as tongSp from hoadon where tinhTrang=$tr");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=11;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	
	
		$sql = mysqli_query( $con, "select *  from hoadon where tinhTrang=$tr ORDER BY maHD desc limit $start,$soSanPham1Trang" );
	}
	if(isset($_GET["kh"]))
	{
		$tenSp=$_GET["kh"];
	$resultTongSp=mysqli_query($con,"select count(*) as tongSp from hoadon where tenKH like '%$tenSp%'  or SDT like '%$tenSp%' or ngayDatHang like '$tenSp' ");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=11;
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
	
	<div id="main">
<div id="content">
	tìm kiếm<br>

	<form>
      <input type="text" placeholder="tên KH, SDT," name="kh">
      <input type="date" placeholder="ngày đặt hàng" name="kh">
       
      <button type="submit">Search</button>
    </form> <br>



<table>
  <tr>
    <th>maHD</th>
    <th>Thông tin</th>
    <th>Ngày Đặt</th>
	  <th>Tổng Tiền</th>
	  <th> Duyệt/Hủy</th>
      <th>Xem Chi tiết</th>
	  
  </tr>
  <?php
  while($kh=mysqli_fetch_array($sql)){
  ?><tr>
    <td><?php echo($kh["maHD"]);?></td>
    <td><?php echo($kh["tenKH"]);?><br>
		<?php echo($kh["diaChi"]);?><br>
		<?php echo($kh["SDT"]);?>
	</td>
   <td><?php $date=date_create($kh["ngayDatHang"]); echo date_format($date,"d/m/Y "); ?></td></td>
  
	<td><?php echo($kh["tongTien"]);?></td>
	<td><?php if($kh["tinhTrang"]==0){?>
	<form action="suadonpro.php" >
		<input type="text" name="maHD" value="<?php echo($kh["maHD"]);?>" hidden="hidden">
		<select name="tinhTrang"> 
		<option value="0"  <?php if($kh["tinhTrang"]=="0"){ ?> disabled selected="selected"<?php }?>  ><font color="#FF0004">Chưa duyệt</font></option>
		<option value="1" <?php if($kh["tinhTrang"]=="1"){ ?>selected="selected"<?php }?>> Duyệt Đơn </option></a>
		<option value="2"  <?php if($kh["tinhTrang"]=="2"){ ?>selected="selected"<?php }?>> Hủy Đơn</option>
		<input class="previous" type="submit" value="xác nhận">
		</select>
		</form>
	<?php }else{ ?>
	
		 <?php if($kh["tinhTrang"]=="1"){ ?><font color=" #527601"> Đã duyệt</font> 
		<?php } else {?><font color=" #527601"> Đã Hủy </font><?php } }?></td>
  
     
      <td><a href="hoadonct.php?maHD=<?php echo($kh["maHD"]); ?>">xem</a></td>
	
  </tr>
  <?php }
  ?>
  
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
