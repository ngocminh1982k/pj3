
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
	.f-grid {
			display: flex;
			justify-content: space-between;
			margin-left: -1rem;
			flex-flow: row wrap;
			height: 300px;
		}
		
		 .f-grid-col {
			width: 200px;
			flex: 1 0;
			background-color: #FFF;
			margin-left: 1rem;
			margin-bottom: 1rem;
			padding: 1rem;
		}

		#hoadon{
			position: absolute; top: 80px; left: 130px;
			height: 1200px;
			width: 84%;
			background: white;
	
	}

table.timecard {
	
	width: 100%;
	border-collapse: collapse;
	border: 1px solid #fff; /*for older IE*/
	
}

table.timecard caption {
	background-color: #f79646;
	color: #fff;
	font-size: x-large;
	font-weight: bold;
	letter-spacing: .3em;
}

table.timecard thead th {
	padding: 8px;
	background-color: #fde9d9;
	font-size: large;
}

table.timecard thead th#thDay {
	width: 20%;	
}

table.timecard thead th#thRegular, table.timecard thead th#thOvertime, table.timecard thead th#thTotal {
	width: 40%;
}

table.timecard th, table.timecard td {
	padding: 3px;
	border-width: 1px;
	border-style: solid;
	border-color: #f79646 #ccc;
}

table.timecard td {
	text-align: center;
}



table.timecard tfoot {
	font-weight: bold;
	font-size: large;
	background-color: #687886;
	color: #fff;
}
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #687886;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}


	
		
	</style>
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
<?php
	include("nav.php");
include("../connect/open.php");
	$maHD=$_GET["maHD"];
$resultTongSp=mysqli_query($con,"select count(*) as tongSp from hoadonct where maHD=$tenSp");
	$rowTongSp=mysqli_fetch_array($resultTongSp);
	$tongSp=$rowTongSp["tongSp"];
	$soSanPham1Trang=7;
	//tong so trang
	$tongSoTrang=ceil($tongSp/$soSanPham1Trang);
	$start=0;
	if(isset($_GET["page"]))
	{
		$start=$_GET["page"]*$soSanPham1Trang;	
	}
	//hien thi san pham
	$sp=mysqli_query($con,"SELECT tblsanpham.maSP,maHD,tblsanpham.maSP,hoadonct.soLuong,tblsanpham.tenSP,hoadonct.gia,anh FROM hoadonct INNER join tblsanpham ON tblsanpham.maSP=hoadonct.maSP where maHD=$maHD");

	

 ?>
	<div id="main">
<div id="hoadon">
	<table class="timecard">
	<caption style="height: 50px;"><br>chi tiết đơn hàng</caption>
	<thead>
		<tr>
			<th id="thDay">mã đơn hàng</th>
			<th id="thRegular">ngày mua</th>
			<th id="thOvertime">tổng tiền</th>
			
		</tr>
	</thead>
		<tr>
			<?php $sql = mysqli_query( $con, "select *  from hoadon where maHD=$maHD" ); 
			$tt=mysqli_fetch_array($sql); 
			?>

			<td><?php echo($tt["maHD"]) ?></td>
			<td><?php $date=date_create($tt["ngayDatHang"]); echo date_format($date,"d/m/Y "); ?> </td>
			<td><font size="3" style="color: red"> <?php echo number_format($tt["tongTien"]) ?> Đ</font></td>
		</tr>
	</table>
<br>
<hr>
<br>



				
				<div class="f-grid">
					<div class="f-grid-col">
						<span style="font-size:22px; font-family:Georgia, 'Times New Roman', Times, serif">
							Thông tin giao hàng
						</span>  <a href="#">chỉnh sửa</a>
						 <form action="capNhatHoaDon.php" method="post"  onsubmit="return confirm('bạn chắc chắn chỉnh sửa ?');">
						 	<input type="hidden" name="txtMa" value=" <?php echo($tt["maKH"]); ?>" />
						 	<input type="hidden" name="maHD" value=" <?php echo($tt["maHD"]); ?>" />
    
						<h3>Tên Khách Hàng:</h3>
							<input type="text" value="<?php echo($tt["tenKH"]) ?>" name="txtTen"> 
						

						<h3>Số Điện Thoại:</h3>
						<input type="text" value="<?php echo($tt["SDT"]) ?>" name="txtSdt" required="required">
						
						<h3>Địa chỉ:</h3>
					<input type="text" value="<?php echo($tt["diaChi"]) ?>" name="txtDiaChi" required="required">
				<br>
				<?php if ($tt["tinhTrang"]==0) { ?>
					<input type="submit" value="chỉnh sửa">
				<?php } ?>
					
					</form>
	<br>
	<hr>
	<br>
	<br>

<table class="timecard">
	<caption style="height: 55px" ><br>Các sản phẩm đã mua</caption>
	<thead>
		<tr>
			<th >STT</th>
			<th >Tên Sản phẩm</th>
			<th >Ảnh</th>
				<th>giá</th>
				<th>Số lượng</th>
				<th> Xóa</th>
			
		</tr>
	</thead>
	<?php $i=0;
	$t=0;
	 while($ct=mysqli_fetch_array($sp)){
	 	$i++;
	 	?>

		<tr>
			<td><?php echo ($i); ?></td>
			<td><?php echo ($ct["tenSP"]); ?></td>
			<td><img src="<?php echo ($ct["anh"]); ?>" height="60px"></td>
			<td><?php echo number_format($ct["gia"]); ?></td>
			<td><?php echo ($ct["soLuong"]); ?></td>
			<td><?php if ($tt["tinhTrang"]==0) {  if($tongSp==1){?>
				<a href="suadonhang.php?ma=<?php echo($ct["maHD"]);?>" data-confirm="bạn muốn hủy đơn hàng này?"> Xóa </a><?php } else{?><a href="xoaspHD.php?maSP=<?php echo ($ct["maSP"]); ?>&&maHD=<?php echo ($ct["maHD"]); ?> " data-confirm="bạn muốn xóa sản phẩm này?">  Xóa </a><?php }?>

				<?php } else{?> Xóa <?php } ?></td>
		</tr>
	<?php }	?>
	</table>




<footer>

		<?php 
	
	for($i=0;$i<$tongSoTrang;$i++)
	{
		?>
			
			<a href="?page=<?php echo($i);?>"><?php echo($i+1);?></a>
			<?php
		
	}
  
		?></footer>
		
		</div>
		</div>
	
	
		

</body>

</html>