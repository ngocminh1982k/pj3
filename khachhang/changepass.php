<html>
	<head>
		<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
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

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
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

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
	</head>
<script type="text/javascript">


  function checkForm(form)
  {
   

    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(form.pwd1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pwd1.focus();
        return false;
      }
     
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pwd1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Vui lòng kiểm tra xem bạn đã nhập và xác nhận mật khẩu của bạn!");
      form.pwd1.focus();
      return false;
    }

    alert("You entered a valid password: " + form.pwd1.value);
    return true;
  }

</script>
<?php
  if(isset($_GET["err"])){
  $message = "Username or Password incorrect.Try again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  

}
    if(isset($_GET["err2"])){
  $message = "đăng kí thành công mời đăng nhập.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  

}?>
<body>

<form  action= "doimk.php" onsubmit="return checkForm(this);">
	 <div class="container">
    <h1>change pasword</h1>
    <p>Please fill in this form to change an password.</p>
    <hr> <label for="email"><b> password</b></label>
<p> <input type="password" name="pass" required="required"></p>
	 <label for="email"><b>New password</b></label>
<p> <input type="password" name="pwd1"></p>
	 <label for="email"><b>Confirm Password:</b></label>
	<p> <input type="password" name="pwd2"></p>
<p><input class="registerbtn" type="submit"></p>
</form>
	</div>
	</body>
</html>