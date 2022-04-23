<?php
session_start();
if(!isset($_SESSION["userName"])){
	$_SESSION["userName"]=$use;
	
header("location:../admin/logindisplay.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>clicknow.com </title>
<link href="../css/css1.css" rel="stylesheet" type="text/css" />
<style>

#content{
	
	width:80%;
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


#right input[type=text], input[type=date], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

#right input[type=text]:focus, input[type=date]:focus, input[type=password]:focus {
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

<div id="main">


<?php
	include("nav.php");
  if($ad["maAD"]==2){
if(isset($_GET["maKH"])){
	$maKH=$_GET["maKH"];
include("../connect/open.php");
$sql=mysqli_query($con,"select * from tblloaisp where maLoaiSP=$maKH");
$kh=mysqli_fetch_array($sql);
include("../connect/close.php");
}?>

<div id="content">
<div id="left">
</div>
<div id="right">
<h2> thêm Nhà sản xuất</h2>

<form action="themnsxpro.php">
  <div class="container">
    
    <label for="ten">nhập tên </label>
    <input type="text" placeholder="Please Enter" name="ten" >
	 
    <button type="submit" class="registerbtn">Sửa</button>
  </div>


  		

</div>
</div>

<?php } else{ header("location:iosdisplay.php?err=1");} ?>

</body>
</html>
