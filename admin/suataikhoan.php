<?php
session_start();
if ( !isset( $_SESSION[ "useName" ] ) ) {
	$_SESSION[ "useName" ] = $use;

	
}?>
<html >
	<?php

	
	$tenSp="";
	if(isset($_GET["txtTen"]))
	{
		$tenSp=$_GET["txtTen"];	
		
	}
	  ?>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
	<link href="../css/css1.css" rel="stylesheet" type="text/css"/>
	
	
<style>
	#content{
	
	width:85%;
	height:800px;
	position:absolute; top:110px;
}
#left{
	width:20%;
	height:400px;
	float:left;
}
#right{
	width:75%;
	height:300px;
	float:left;

}

#right input[type=text], input[type=date] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

#right input[type=text]:focus, input[type=date]:focus {
  background-color: #ddd;
  outline: none;
}



#right .registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

#right .registerbtn:hover {
  opacity: 1;
}


#right .signin {
  background-color: #f1f1f1;
  text-align: center;
}

	</style>
</head>

<body>
		
		
		<?php
	include("nav.php");
		?>
<div id="main">
	<?php
	if(isset($_GET["maKH"])){
	$maKH=$_GET["maKH"];}
include("../connect/open.php");
$sql=mysqli_query($con,"select * from khachhang where maKH=$maKH");
$kh=mysqli_fetch_array($sql);
include("../connect/close.php");
?>
<div id="content">
<div id="left">
</div>
<div id="right">
<h2> chỉnh sửa thông tin</h2>


<form action="../processing/suakhpro.php">
  <div class="container">
    
    <label for="maKH">Mã KH</label>
    <input type="text"  name="maKH" readonly="readonly" required value="<?php echo($kh["maKH"]); ?>">

    <label for="username">Tên</label>
    <input type="text" placeholder="Enter username" name="txtName" required value="<?php echo($kh["tenKH"]); ?>">
 <label for="username">ngay sinh</label>
    <input type="date"  name="NgaySinh" required value="<?php echo($kh["ngaySinh"]); ?>">
	  <label for="username">Địa Chỉ</label>
 <input type="text" placeholder="Enter adress" name="diaChi" required value="<?php echo($kh["diaChi"]); ?>">
    <label for="psw">email</label>
    <input type="text" placeholder="Enter email" name="txtemail" required value="<?php echo($kh["email"]); ?>">
         <label for="username">số điện thoại</label>
    <input type="text" placeholder="Enter number" name="SDT" required value="<?php echo($kh["SDT"]); ?>">
    
  
  

    <button type="submit" class="registerbtn">Sửa</button>
  
  </div>

</div>

</body>

</html>