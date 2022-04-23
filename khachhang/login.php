 <?php
session_start();
if(isset($_SESSION["useName"])&&isset($_SESSION["pass"])){
	header("location:../khachhang/trangchu.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">

  function checkForm(form)
  {
    if(form.txtName.value == "") {
      $(".recruiter-email-error").text("Email không đúng định dạng!");
      form.txtName.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.txtName.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.txtName.focus();
      return false;
    }

    if(form.txtWord.value != "") {
      if(form.txtWord.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.txtWord.focus();
        return false;
      }
      if(form.txtWord.value == form.txtName.value) {
        alert("Error: Password must be different from Username!");
        form.txtWord.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.txtWord.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.txtWord.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.txtWord.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.txtWord.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.txtWord.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.txtWord.focus();
        return false;
      }
    } else {
      alert("Error: Vui lòng kiểm tra xem bạn đã nhập và xác nhận mật khẩu của bạn!");
      form.txtWord.focus();
      return false;
    }

  
     document.getElementById("myForm").submit();
    return true;
   
  }

</script>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}


.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}


.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<?php
	if(isset($_GET["err"])){
	$message = "Username or Password incorrect.Try again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
	

}
		if(isset($_GET["err2"])){
	$message = "đăng kí thành công mời đăng nhập.";
  echo "<script type='text/javascript'>alert('$message');</script>";
	

}

 
$user="";
$pass="";
if(isset($_COOKIE["userName1"])&&isset($_COOKIE["passWord1"])){
$user=$_COOKIE["userName1"];
$pass=md5($_COOKIE["passWord1"]);
}
?>

<form id="myForm" action="loginpro.php" onsubmit="return checkForm(this);">
  <div class="container">
    <h1>login</h1>
    <hr>

    <label for="username"><b>UserName</b></label>
    <input type="text" placeholder="Enter username" name="txtName"  value="<?php echo($user); ?>">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="txtWord"  value="<?php echo($pass); ?>">

  
    <hr>
    <p><input type="checkbox" name="cklogin" value="1"<?php if($user!=""){?> checked="ckecked"<?php }?>>Save password?</p>

    <button type="submit" class="registerbtn">login</button>
  </div>
  <div class="container signin">
    <p>Don't have an account? <a href="dangki.php">Register</a></p>
  </div>
</form>

</body>
</html>
