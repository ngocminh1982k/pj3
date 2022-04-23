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

<?php include("nav.php"); ?>

<div id="content">
<div id="left">
</div>
<div id="right">
<h2> thêm Tin tức</h2>


<script src='tinymce/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
    plugins: "image imagetools autolink autoresize paste",
  contextmenu: "link image imagetools table spellchecker",
  paste_data_images:true,
  images_upload_url: 'postAcceptor.php',
    images_upload_base_path: '../image',
  max_height: 500 ,
  images_upload_handler: function (blobInfo, success, failure) {
    var xhr, formData;

    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', 'postAcceptor.php');

    xhr.onload = function() {
      var json;

      if (xhr.status != 200) {
        failure('HTTP Error: ' + xhr.status);
        return;
      }

      json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
      }

      success(json.location);
    };

    formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
  }
  });
  </script>
  <script>
    function validate(){
    document.getElementById("formsubmit").submit();
    }
  </script>
<form  action="themtinPro.php" id="formsubmit">
<div class="form-horizontal">
  <div class="form-group">
    <label for="itittle" class="col-sm-2  control-label"> Tiêu đề </label>
    <div class="col-sm-10">
      <input type="text" maxlength="150" name="tittle" class="form-control" id="itittle"  placeholder="Nhập Tiêu Đề" />
    </div>
  </div>
  <div class="form-group">
    <label for="ides" class="col-sm-2  control-label"> Mô tả : </label>
    <div class="col-sm-10">
      <input type="text" maxlength="255" name="description" id="ides" class="form-control" placeholder="Nhập Mô tả" />
    </div>
  </div><div class="form-group">
    <label for="itittle" class="col-sm-2  control-label"> Nội dung </label>
    <div class="col-sm-10">

      <textarea id="mytextarea" name="content1"> 
       
         
      </textarea>
    </div>
  </div>
  <div class="col-sm-8">
  </div>
  <div class="col-sm-4"><button class="btn btn-success" type="button" onclick="validate()">Thêm mới</button>
  </div>
</div>

</form>
  
  </div>


  		

</div>
</div>



</body>
</html>
