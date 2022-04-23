<?php
session_start();
if ( !isset( $_SESSION[ "userName" ] ) ) {
	$_SESSION[ "userName" ] = $use;

	header( "location:logindisplay.php" );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clicknow.com </title>
	<link href="../css/css1.css" rel="stylesheet" type="text/css"/>
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
			background-image: linear-gradient(#00b9d4, #f8ffc0);

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
			/* background: #fff; */
			background-image: linear-gradient(#00b9d4, #f8ffc0);

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
			background: rgba(255, 255, 255, 0.5);
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
	</style>
</head>

<body>


	
	
	<?php
	include("nav.php");
	if ( isset( $_GET[ "ma" ] ) ) {
		$ma= $_GET[ "ma" ];
		include( "../connect/open.php" );
		$sql = mysqli_query( $con, "select * from admin where maAd=$ma" );
		$kh= mysqli_fetch_array( $sql );
	
	?>
	<div id="main">
		<div id="content">
			<div id="left">
				<nav class="menu">
					<header>Quản lý tài khoản</header>
					<ol>
						<li class="menu-item"><a href="#0">Thông tin chi thiết</a>
						</li>
						<li class="menu-item"><a href="suataikhoan1.php?maKH=<?php echo($kh["maAD"]) ?>">Chỉnh sửa thông tin</a>
						</li>
						<li class="menu-item"><a href="#">Đang xử lý</a>
						</li>
						<li class="menu-item"><a href="#">lịch sử giao dịch</a>
						</li>

						<li class="menu-item"><a href="#">Đổi mật khẩu</a>
						</li>
						<li class="menu-item">

							<li class="menu-item"><a href="../processing/logout.php">Đăng xuất</a>
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
						</span>  <a href="suataikhoan1.php?maKH=<?php echo($kh["maAD"]) ?>">Chỉnh sửa</a><br/>
						<h3>Tên admin:</h3>
												<span style="font-size:13px; font-family:Georgia, 'Times New Roman', Times, serif">
													<?php echo ($kh{"ten"}) ?></span>
						<br />

						<h3>Số điện thoại:</h3><?php echo($kh["SDT"]) ?><br />

						<h3>Email:</h3><?php echo($kh["email"]) ?>
					
					</div> 
					
				
				</div>



			</div>
		</div>
	</div>
<?php }?>

</body>

</html>