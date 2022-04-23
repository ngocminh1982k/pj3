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
		#right {
			position: absolute;
			top: 140px;
			right: 80px;
			width: 800px;
			height: 250px;
		}
		
		#right .f-grid {
			display: flex;
			justify-content: space-between;
			margin-left: -1rem;
			flex-flow: row wrap;
			height: 300px;
		}
		
		#right .f-grid-col {
			width: 200px;
			flex: 1 0;
			/* background-color: #FFF; */
			background-color: rgb(0 0 0 / 20%);

			margin-left: 1rem;
			margin-bottom: 1rem;
			padding: 1rem;
		}
		
		#left {
			position: absolute;
			top: 140px;
			left: 0px;
			width: 300px;
			height: 500px;
			float: left;
		}
		
		@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");
		#left * {
			font-family: 'Open Sans', sans-serif;
			box-sizing: border-box;
			color: #333;
			font-size: 100%;
			line-height: 1.5;
		}
		
		#left nav {
			--duration: .5s;
			--easing: ease-in-out;
			position: relative;
			width: 250px;
			height: 400px;
			margin: 20px;
		}
		
		#left nav ol {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		
		#left nav li {
			font-size: 14px;
			margin: -4px 0 0 0;
		}
		
		#left nav a {
			display: block;
			text-decoration: none;
			/* background: #fff; */    background-color: rgb(0 0 0 / 20%);

			transform-origin: 0 0;
			transition: transform var(--duration) var(--easing), color var(--duration) var(--easing);
			transition-delay: var(--delay-out);
			border-radius: 4px;
			padding: 1em 1.52em;
		}
		
		#left nav li a:hover {
			background: linear-gradient(to right, #dddddd 2px, #efefef 2px);
		}
		
		#left nav header {
			font-weight: 600;
			font-size: 17px;
			height: 50px;
			/* background: rgba(255, 255, 255, 0.5); */
			background: #ccc;
			transform-origin: 0 0;
			transition: transform var(--duration) var(--easing), color var(--duration) var(--easing);
			transition-delay: var(--delay-out);
			border-radius: 7px;
			padding: 1em 1.52em;
		}
		
		#left nav footer button {
			position: absolute;
			top: 0;
			left: 0;
			border: none;
			padding: calc(1em - 2px);
			width: 100%;
			cursor: pointer;
			outline: none;
			background: #cdcdcd;
			opacity: 0;
		}
		#hoadon{
			position: absolute; top: 550px;
			height: 400px;
			width: 100%;
	
			
		}
				#customers {
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
}
#main1{
	position: relative;
   /* background: #CCCCCC; */
   
    background-image: linear-gradient(to right, #e7e5e5, #0073d4);
	height: 800px;
	
}
	
		
	</style>
</head>

<body>


	<?php include("nav.php") ?>
	<?php
	
		$ma= $ad["maKH"];
		include( "../connect/open.php" );
		$sql = mysqli_query( $con, "select * from khachhang where maKH=$ma" );
		$kh= mysqli_fetch_array( $sql );
	
	?>
	<div id="main1">
		<div id="content">
			<div id="left">
				<nav class="menu">
					<header>Quản lý tài khoản</header>
					<ol>
						<li class="menu-item"><a href="#0">Thông tin chi thiết</a>
						</li>
						<li class="menu-item"><a href="suataikhoan.php?maKH=<?php echo($kh["maKH"]) ?>">Chỉnh sửa thông tin</a>
						</li>
						<li class="menu-item"><a href="#0">Đang xử lý</a>
						</li>
						<li class="menu-item"><a href="xemdonhang.php "> Lịch sử giao dịch</a>
						</li>

						<li class="menu-item"><a href="changepass.php">Đổi mật khẩu</a>
						</li>
						<li class="menu-item">

							<li class="menu-item"><a href="logout.php">Đăng xuất</a>
							</li>
					</ol>
					<footer><button aria-label="Toggle Menu">Toggle</button>
					</footer>
				</nav>
			</div>
			<div id="right">
				<h2> Quản Lý tài Khoản</h2>
				<div class="f-grid">
					<div class="f-grid-col">
						<span style="font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif">
							Thông tin tài khoản
						</span>  <a href="suataikhoan.php?maKH=<?php echo($kh["maKH"]) ?>">chỉnh sửa</a><br/>
						<h3>Tên Khách Hàng:</h3>
												<span style="font-size:13px; font-family:Georgia, 'Times New Roman', Times, serif">
													<?php echo ($kh{"tenKH"}) ?></span>
						<br />

						<h3>Số Điện Thoại:</h3><?php echo($kh["SDT"]) ?><br />

						<h3>Email:</h3><?php echo($kh["email"]) ?>
					
					</div> 
					
					<div class="f-grid-col"> <span style="font-size:20px; font-family:Georgia, 'Times New Roman', Times, serif">Địa chỉ nhận hàng</span> <a href="#">Chỉnh sửa</a><br/>
							<h3>Địa chỉ:</h3><?php echo($kh["diaChi"]) ?>
					</div>
					
					<div class="f-grid-col"><span style="font-size:20px; font-family:Georgia, 'Times New Roman', Times, serif">Thông tin khác</span> <a href="#">Chỉnh sửa</a><br/>
					</div>
				</div>



			</div>
		</div>
		
		
		
	</div>

</body>

</html>