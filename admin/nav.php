<ul id="banner">
<li><img src="../02-Letter-K.png" width="100" height="90"></li>
<li>  <div class="search-container">
    <form>
      <input type="text" placeholder="Search.." name="txtTen">
      <button type="submit">Search</button>
    </form>
  </div>
</li>

</ul>
<ul id="nav">
			<li class="current"><a href="iosdisplay.php">Home</a>
			</li>
			<li><a href="nsx.php">Nhà sản xuất</a>
			</li>
			<li><a href="xemloaisp.php">loại sản phẩm</a>
				<ul>
					<li><a href="danhmuc.php?maSP=1">Điện thoại</a>
					</li>
					<li><a href="danhmuc.php?maSP=2">Laptop</a>
					</li>
					<li><a href="danhmuc.php?maSP=3">Table</a>
					</li>
					<li><a href="danhmuc.php?maSP=4">Phụ kiện</a>
					</li>
				</ul>
			</li>
			<li><a href="quanlysp.php">Sản phẩm</a>
				<ul>
					<li><a href="danhmuc.php?maSP=1">Điện thoại</a>
						<ul>
							<li><a href="hang.php?maSP=2">Xiaomi</a>
							</li>
							<li><a href="hang.php?maSP=1">Apple</a>
							</li>
							<li><a href="hang.php?maSP=6">Samsung</a>
							</li>
							<li><a href="hang.php?maSP=5">Oppo</a>
							</li>
							<li><a href="hang.php?maSP=8">Huawai</a>
							</li>
							<li><a href="hang.php?maSP=7">Nokia</a>
							</li>


						</ul>
					</li>
					<li><a href="danhmuc.php?maSP=2">laptop</a>
						<ul>
							<li><a href="hang.php?maSP=3">Dell</a>
							</li>
							<li><a href="hang.php?maSP=4">Hp</a>
							</li>
							<li><a href="hang.php?maSP=9">Lenovo</a>
							</li>
							<li><a href="hang.php?maSP=10">Asus </a>
							</li>
						</ul>
					</li>
					<li><a href="danhmuc.php?maSP=3">Table</a>
					</li>
					<li><a href="danhmuc.php?maSP=4">Phụ kiện</a>
					</li>
				</ul>
			</li>
			<li><a href="tintuc.php">Tin tức</a>
				<ul>
                
					<li><a href="danhmuctt.php">Danh mục bài viết</a></li>
					<li ><a href="tintuc.php">Bài đăng</a></li>	 
			
				</ul>
			</li>

			<li><a href="quanlykh.php">Khách hàng</a>
			</li>
			<li><a href="hoaDon.php">Hóa đơn</a>
				<ul>
                
					<li><a href="hoaDon.php?tinhtrang=0">chưa duyệt </a></li>
					<li ><a href="hoaDon.php?tinhtrang=1">Đã duyệt</a></li>	
					<li ><a href="hoaDon.php?tinhtrang=2">Đã Hủy</a></li>	
				</ul>
			</li>
	<li><a href="admin.php">Admin</a>
			</li>

			<li style="float:right">
				
			<?php $use1=$_SESSION["userName"];
				include("../connect/open.php");
				$sql=mysqli_query($con,"select * from admin where useName='$use1'");
				$ad=mysqli_fetch_array($sql);
			 ?>
				<?php if(isset($_SESSION["userName"])){?><a href="xemtaikhoankh.php?ma=<?php echo($ad["maAD"])?>"><?php echo($ad["ten"]); ?></a>
				<?php }else{?> <a href="logindisplay.php">login</a>
				<?php } ?> </li>
		</ul>