<?php
header("Expires: Tue, 01 Jan 2022 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
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


#right input[type=text], input[type=date], input[type=password],input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

#right input[type=text]:focus, input[type=date]:focus, input[type=password]:focus,, input[type=number]:focus {
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
<h2> Thêm mới sản phẩm</h2>

<form name="frmCapnhat" action="themsppro.php"  method="post" enctype="multipart/form-data">
  <div class="container">
    
    <label for="ten">nhập tên sản phẩm</label>
    <input type="text" placeholder="Please Enter" name="ten" >
	   <label for="age">số lượng</label>
    <input type="number" placeholder="Please Enter" name="soluong" >
	   <label for="email">giá</label>
    <input type="number" placeholder="Please Enter" name="gia" >
	   <label for="sdt">mô tả</label>
    <textarea name="mota" style="width: 100%"></textarea>  
	
    <label for="productImg">ảnh</label>
	<input type="file" name="productImg" id="productImg">
  <!-- <input type="button" name="Button" value="Upload" onClick="window.open('Upload.php','','width=600,height=500, status=false')"> -->
	  <br />
<br />
<br />

	   <label for="username">NSX</label>
	  <select name="maNSX">
		  <option value="1">apple</option>
		   <option value="2">xiaomi</option>
		   <option value="6">samsung</option>
		   <option value="5">oppo</option>
		   <option value="8">huawai</option>
		  <option value="7">nokia</option>
		  <option value="10">asus</option>
		  <option value="9">lenovo</option>
		  <option value="3">dell</option>
		  <option value="4">hp</option>
	  </select>
	  

	   <label for="username">mã Loại SP</label>
    <select name="maLoai">
		  <option value="1">Điện thoại</option>
		   <option value="2">Laptop</option>
		   <option value="3">table</option>
		   <option value="4">phụ Kiện</option>
		   
	  </select>
	

    <button type="submit" class="registerbtn">Thêm mới</button>
  </div>


  		

</div>
</div>



</body>
</html>
