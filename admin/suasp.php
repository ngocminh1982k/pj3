<?php
session_start();
if(!isset($_SESSION["userName"])){
	$_SESSION["userName"]=$use;
	
header("location:logindisplay.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>clicknow.com </title>
<link href="../css/css1.css" rel="stylesheet" type="text/css" />
<script src='js/tinymce/tinymce.min.js'></script>

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
<div id="main">


<?php
	include("nav.php");
if(isset($_GET["maSP"])){
	$maSP=$_GET["maSP"];
include("../connect/open.php");
$sql=mysqli_query($con,"select * from tblsanpham where maSP=$maSP");
$kh=mysqli_fetch_array($sql);
include("../connect/close.php");
}?>

<div id="content">
<div id="left">
</div>
<div id="right">
<h2> Chỉnh Sửa Sản Phẩm</h2>


<form action="../processing/suasppro.php" id="formsubmit">
  <div class="container">

    <label for="name">mã Sản Phẩm</label>
    <input type="text" name="maSP" readonly="readonly" required value="<?php echo($kh["maSP"]); ?>">
    <label for="name">Tên Sản Phẩm</label>
    <input type="text" placeholder="Enter username" name="txtName" required value="<?php echo($kh["tenSP"]); ?>">
 <label for="int">số lượng</label>
    <input type="text" placeholder="Enter username" name="soluong" required value="<?php echo($kh["soLuong"]); ?>">

    <label for="gia">giá</label>
    <input type="text" placeholder="Enter email" name="txtgia" required value="<?php echo($kh["gia"]); ?>">
    <div class="form-group">
    <label for="itittle" class="col-sm-2  control-label"> Nội dung </label>
    <div class="col-sm-10">

      <textarea style="width: 100%"  name="content1"> 

		  <?php echo($kh["moTa"]); ?>
	  </textarea>
	  <br />
  <label for="mota">ảnh</label><br />

    <input name="txthinhminhhoa" value="<?php echo ($kh["anh"])?>" type="text" id="xthinhminhhoa">
  <input type="button" name="Button" value="Upload" onClick="window.open('Upload.php','','width=600,height=500, status=false')">
  <br> <label for="username"> Loại SP</label>
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
    

     <label for="username"> Loại SP</label>
    <select name="maLoai">
      <option value="1">Điện thoại</option>
       <option value="2">Laptop</option>
       <option value="3">table</option>
       <option value="4">phụ Kiện</option>
       
    </select>
  

    <button type="submit" onclick="validate()" class="registerbtn">Sửa</button>
  </div>


  		

</div>
</div>



</body>
</html>
