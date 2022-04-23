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
   background: #CCCCCC;
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
		
		a { text-decoration: none}
		#content{
			position: absolute; top: 120px; left: 70px;
			background: #FFFFFF;
			height: 800px;
			width: 90%;
		}
  

*,
:before,
:after {
  box-sizing: border-box;
}



form {
  width: 320px;
  margin: 45px auto;
}
form h1 {
  font-size: 3em;
  font-weight: 300;
  text-align: center;
  color: #2196F3;
}
form h5 {
  text-align: center;
  text-transform: uppercase;
  color: #c6c6c6;
}
form hr.sep {
  background: #2196F3;
  box-shadow: none;
  border: none;
  height: 2px;
  width: 25%;
  margin: 0px auto 45px auto;
}
form .emoji {
  font-size: 1.2em;
}

.group {
  position: relative;
  margin: 45px 0;
}

textarea {
  resize: none;
}

  #content input,
textarea {
  background: none;
  color: black;
  font-size: 18px;
  padding: 10px 10px 10px 5px;
  display: block;
  width: 320px;
  border: none;
  border-radius: 0;
  border-bottom: 1px solid #c6c6c6;
}
input:focus,
textarea:focus {
  outline: none;
}
input:focus ~ label, input:valid ~ label,
textarea:focus ~ label,
textarea:valid ~ label {
  top: -14px;
  font-size: 12px;
  color: #2196F3;
}
input:focus ~ .bar:before,
textarea:focus ~ .bar:before {
  width: 320px;
}

input[type="password"] {
  letter-spacing: 0.3em;
}

label {
  color: black;
  font-size: 16px;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 5px;
  top: 10px;
  transition: 300ms ease all;
}

.bar {
  position: relative;
  display: block;
  width: 320px;
}
.bar:before {
  content: '';
  height: 2px;
  width: 0;
  bottom: 0px;
  position: absolute;
  background: #2196F3;
  transition: 300ms ease all;
  left: 0%;
}

.btn {
  background: #fff;
  color: #959595;
  border: none;
  padding: 10px 20px;
  border-radius: 3px;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  text-decoration: none;
  outline: none;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.btn:hover {
  color: #8b8b8b;
  box-shadow: 0 7px 14px rgba(0, 0, 0, 0.18), 0 5px 5px rgba(0, 0, 0, 0.12);
}
.btn.btn-link {
  background: #2196F3;
  color: #d3eafd;
}
.btn.btn-link:hover {
  background: #0d8aee;
  color: #deeffd;
}
.btn.btn-submit {
  background: #2196F3;
  color: #bce0fb;
}
.btn.btn-submit:hover {
  background: #0d8aee;
  color: #deeffd;
}
.btn.btn-cancel {
  background: #eee;
}
.btn.btn-cancel:hover {
  background: #e1e1e1;
  color: #8b8b8b;
}

.btn-box {
  text-align: center;
  margin: 50px 0;
}


  </style>
</head>
<body>
  <?php
   include("nav.php");

      if(isset($_SESSION["useName"]))
      {
        $tongTien=$_GET["tongTien"];
        $user=$_SESSION["useName"];
        include("../connect/open.php");
        
        $result=mysqli_query($con,"select * from khachhang where useName='$user'");
        $kh=mysqli_fetch_array($result); 
        ?>
  <div id="main1">
    <div id="content">
  <div class="wrapper">
  <form action="datHangProcess.php" method="post"  onsubmit="return confirm('bạn chắc chắn mua ?');">
    <h1>Thanh Toán</h1>
    <input type="hidden" name="txtMa" value="<?php echo($kh["maKH"])?>" />
     <input   type="hidden" name="txtTongTien" value="<?php echo($tongTien);?>" required />

    <div class="group">
      <input type="text" required="required" name="txtTen" value="<?php echo($kh["tenKH"]) ?>"/><span class="highlight"></span><span class="bar"></span>
      <label>Name</label>
    </div>
    <div class="group">
      <input type="text" required="required" name="txtDiaChi" value="<?php echo($kh["diaChi"]) ?>" /><span class="highlight"></span><span class="bar"></span>
      <label>Địa Chỉ</label>
    </div>
    <div class="group">
      <input type="text" required="required"  name="txtSdt" value="<?php echo($kh["SDT"]) ?>"/><span class="highlight"></span><span class="bar"></span>
      <label>SDT</label>
    </div>
    <div class="group">
      <input type="Email" required="required" name="SDT" value="<?php echo($kh["email"]) ?>"/><span class="highlight"></span><span class="bar"></span>
      <label>Email</label>
    </div>

    <div class="btn-box">
      <button class="btn btn-submit" type="submit">Thanh Toán</button>
      <button class="btn btn-cancel" type="button">cancel</button>
      <h5>*these buttons do nothing <span class="emoji">&#x1F609;</span></h5>
    </div>
  </form>
</div>
  </body>
</div>
<?php } ?>
</div>
</html>