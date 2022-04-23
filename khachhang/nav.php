<div id="banner">
		
		<div id="logo">	<img src="../Untitled-1.png" height="100px" with="250px" ></div>
			
		
				<div id="search" style="width: 700px;margin:40px auto;">


			<div id="search-box-container">
				<input type="text" id="search-data" name="searchData" placeholder="Search By Post Title (word length should be greater than 3) ..." autocomplete="off"/>
				<div id="display-button" style=""> <img style="padding:7px;" src="search.png"/> </div>
			</div>
			<div id="search-result-container" style="border:solid 1px #BDC7D8;display:none; ">
			</div>

		</div>
	<div id="cast"> <a href="xemgiohang.php"><?php if(isset($_SESSION["gioHang"])){?><img src="../icon-cart-031.png" height="40px" with="40px"><?php } else { ?><img src="../icon-cart-03.png" height="40px" with="40px"><?php } ?></a> 
		</div>
	</div>
		<ul id="nav">
			<li class="current"><a href="trangchu.php">Home</a>
			</li>
			
			<li><a href="timkiem.php">sản phẩm</a>
				<ul>
					<li><a href="danhmuc.php?maSP=1">điện thoại</a>
					</li>
					<li><a href="danhmuc.php?maSP=2">laptop</a>
					</li>
					<li><a href="danhmuc.php?maSP=3">table</a>
					</li>
					<li><a href="danhmuc.php?maSP=4">phụ kiện</a>
					</li>
				</ul>
			</li>
			<li><a href="timkiem.php">Nhà Sản Xuất </a>
				<ul>
					
						<li><a href="sanpham.php?maSP=2">xiaomi</a>
							</li>
							<li><a href="sanpham.php?maSP=1">apple</a>
							</li>
							<li><a href="sanpham.php?maSP=6">samsung</a>
							</li>
							<li><a href="sanpham.php?maSP=5">oppo</a>
							</li>
							<li><a href="sanpham.php?maSP=8">huawai</a>
							</li>
							<li><a href="sanpham.php?maSP=7">nokia</a>
							</li>


						</ul>
					
					
			</li>
			<li><a href="tintuc.php">Tin tức</a>
				<ul>
                
					<li><a href="loaitin.php?maTin=1">công nghệ mới</a></li>
					<li> <a href="loaitin.php?maTin=2">sản phẩm mới</a></li>
					<li><a href="loaitin.php?maTin=3">mẹo hay</a></li>
					<li><a href="loaitin.php?maTin=4">thị trường</a>
						
					</li>
				</ul>
			</li>

			

			<li style="float:right">
				<?php $use1=$_SESSION["useName"];
				include("../connect/open.php");
				$sq1=mysqli_query($con,"select * from khachhang where useName='$use1'");
				$ad=mysqli_fetch_array($sq1);
			 ?>
				<?php if(isset($_SESSION["useName"])){?><a href="xemtaikhoankh.php?ma=<?php echo($ad["maKH"])?>"><?php echo($ad["tenKH"]); ?></a>
				<?php }else{?> <a href="login.php">login</a>
				<?php } ?> </li>
		</ul>