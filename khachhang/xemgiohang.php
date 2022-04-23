<?php
session_start();
if ( !isset($_SESSION[ "useName" ] ) ) {
	

	header( "location:login.php" );
}
?>


<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="../css/cssedit.css" rel="stylesheet" type="text/css" >
	<script src="jquery-3.2.1.min.js"></script>
		<script src="search.js"></script>
	
	<style>
		#main1{
	position: relative;
   background: #ffc107;
	height: 1100px;
	
}
.next {
  background-color: red;
  color: white;
   padding: 8px 16px;
}

.round {
  border-radius: 10%;
}
		.button {
  background-color: #f44336;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
	.button1 {
  background-color: #31bc33;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px ;
  cursor: pointer;
}
		a { text-decoration: none}
		#content{
			position: absolute; top: 120px; left: 70px;
			/* background: #FFFFFF; */
      background-image: linear-gradient(#87ceeb, #bdff3b);

			height: 800px;
			width: 90%;
		}
		#ship{
			position: absolute;
    top: 635px;
    right: 76px;
    background: #F5EBEC;
    height: 700px;
    width: 37%;
		}
    form {
    padding-left: 30px;
    padding-right: 30px;
}
	/*	#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
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
}*/

.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
}
h2 small {
  font-size: 0.5em;
}

.responsive-table li {
  border-radius: 3px;
  padding: 25px 30px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 25px;
}
.responsive-table .table-header {
  /* background-color: #95A5A6; */
  background-image: linear-gradient(#cddc39, #bdff3b);

  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}
.responsive-table .table-row {
  background-color: #ffffff;
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}
.responsive-table .col-1 {
  flex-basis: 40%;
}
.responsive-table .col-2 {
  flex-basis: 25%;
}
.responsive-table .col-3 {
  flex-basis: 25%;
}
.responsive-table .col-4 {
  flex-basis: 10%;
}
@media all and (max-width: 767px) {
  .responsive-table .table-header {
    display: none;
  }
  .responsive-table li {
    display: block;
  }
  .responsive-table .col {
    flex-basis: 100%;
  }
  .responsive-table .col {
    display: flex;
    padding: 10px 0;
  }
  .responsive-table .col:before {
    color: #6C7A89;
    padding-right: 10px;
    content: attr(data-label);
    flex-basis: 50%;
    text-align: right;
  }
}



.quantity {
  position: relative;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button
{
  -webkit-appearance: none;
  margin: 0;
}



.quantity input {
  width: 75px;
  height: 42px;
  line-height: 1.65;
  float: left;
  display: block;
  padding: 0;
  margin: 0;
  padding-left: 20px;
  border: 1px solid #eee;

}

.quantity input:focus {
  outline: 0;
}



.quantity-button.quantity-up {
  position: absolute;
  height: 50%;
  top: 0;
  border-bottom: 1px solid #eee;
}

.quantity-button.quantity-down {
  position: absolute;
  bottom: -1px;
  height: 50%;
}
	</style>
	
</head>

<body>
	<?php include("nav.php") ?>
	<div id="main1">
		<div id="content">
	<?php
	if(isset($_SESSION["gioHang"]))
	{
		$gioHang=array();
		$gioHang=$_SESSION["gioHang"];
		if(count($gioHang)==0)
		{?><br>
			<br>
			 <h2>Bạn chưa thêm sản phẩm nào vào giỏ hàng </h2>
<?php
		}else
		{
			$tongTien=0;
			?>
		
			<h3> </h3>
            <form action="capNhatGioHang.php" method="post">
            		<div class="container">
  <h2>Thông Tin Giỏ Hàng <small></small></h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Sản Phẩm</div>
      <div class="col col-2">Số Lượng</div>
      <div class="col col-3">Thành Tiền</div>
      <div class="col col-4">Xóa</div>
    </li>
    <?php
                        foreach($gioHang as $maSp=>$soLuong)
                        {
                            include("../connect/open.php");
                            $result=mysqli_query($con,"select * from tblSanPham where maSP=$maSp");
                            $sp=mysqli_fetch_array($result);
                            include("../connect/close.php");	
                            ?>
    <li class="table-row">
      <div class="col col-1" data-label="Job Id"><table>
      	<tr>
      		<td><img src="<?php echo($sp["anh"]);?>" height="50px"/ </td>
      		<td><?php echo($sp["tenSP"]);?><br>
      			<font color="red" size="3"><?php echo number_format($sp["gia"]);?> Đ </font>
      		</td>
      	</tr>
      </table>

      </div>
      <div class="col col-2" data-label="Customer Name">
      	<!-- <input type="number" name="arrSl[]" value="<?php echo($soLuong);?>" min="1" max="<?php echo($sp["soLuong"]); ?>" />
 -->
      	<div class="quantity">
  <input type="number" class='allownumericwithoutdecimal' name="arrSl[]" value="<?php echo($soLuong);?>"  min="1" max="<?php echo($sp["soLuong"]); ?>"  step="1" >
  <script>
		 $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
	</script>

</div>
      </div>
      <div class="col col-3" data-label="Amount"><font color="red" size="3"><?php echo number_format($soLuong*$sp["gia"]);?> Đ</font></div>
      <div class="col col-4" data-label="Payment Status"><a class="next round" href="xoaGioHang.php?maSp=<?php echo($maSp);?>"> xóa</a></div>
    </li>
   
                            <?php
                            $tongTien=$tongTien+$soLuong*$sp["gia"];
                        }
                        ?>
  </ul>
</div>
              <!--   <table id="customers">
					<tr>
                        
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
					
                        <?php
                        foreach($gioHang as $maSp=>$soLuong)
                        {
                            include("../connect/open.php");
                            $result=mysqli_query($con,"select * from tblSanPham where maSP=$maSp");
                            $sp=mysqli_fetch_array($result);
                            include("../connect/close.php");	
                            ?>
                            <tr>
                                <td><?php echo($sp["tenSP"]);?></td>
                                <td><img src="<?php echo($sp["anh"]);?>" height="50px"/></td>
                                <td><?php echo number_format($sp["gia"]);?></td>
                                <td><input type="number" name="arrSl[]" value="<?php echo($soLuong);?>" min="1" max="<?php echo($sp["soLuong"]); ?>" /></td>
                                <td><?php echo number_format($soLuong*$sp["gia"]);?></td>
								
								<td><a href="xoaGioHang.php?maSp=<?php echo($maSp);?>"><button  class="">xóa</button></a></td>
                            </tr>
						
                            <?php
                            
                        }
                        ?>
							
                    </tr>
                </table> -->
				<h4>Tổng tiền:<?php echo number_format($tongTien);?> Đ</h4>
               <input type="submit" class="button" value="Cập nhật giỏ hàng" /> 
                <a href="thanhToan.php?tongTien=<?php echo("$tongTien"); ?>" style="float: right" type="submit" class="button1" > Thanh Toán</a>
            </form>
	</div>
<!-- <div id="ship">
			<?php
			if(isset($_SESSION["useName"]))
			{
				$user=$_SESSION["useName"];
				include("../connect/open.php");
				
				$result=mysqli_query($con,"select * from khachhang where useName='$user'");
				$kh=mysqli_fetch_array($result); 
				?>
	<h2>Thanh toán/Vận chuyển</h2><br>


                <form action="datHangProcess.php" method="post"  onsubmit="return confirm('bạn chắc chắn mua ?');">
				
					<br>

<h3> giao hàng tới </h3>
					<br>

                	<input type="hidden" name="txtMa" value="<?php echo($kh["maKH"])?>" />
                    <input  class="w3-input" type="hidden" name="txtTongTien" value="<?php echo($tongTien);?>" required /><br>

					<label for="username">Tên</label>
					<input class="w3-input" type="text" name="txtTen" value="<?php echo($kh["tenKH"]) ?>" /><br>

					<label for="username">Địa chỉ giao Hàng</label>
					<input class="w3-input" type="text" name="txtDiaChi" value="<?php echo($kh["diaChi"]) ?>" required /><br>

					<label for="username">SĐT</label>
                	<input class="w3-input"  type="text" name="txtSdt" value="<?php echo($kh["SDT"]) ?>" required />
					<br>
<label for="username">Email</label>
					<input class="w3-input" type="text" name="SDT" value="<?php echo($kh["email"]) ?>" required  />
                   <br>
<br>
 <input type="submit" class="button" style="width: 100%" value="Đặt Hàng" />

					
                </form> -->
	
                <?php
				include("../connect/close.php");	
			}
		}
	}else
	{
		echo"Ban chua chon san pham nao vao gio hang!";	
	}
	?>
		</div>
	</div>
</body>
</html>