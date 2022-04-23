
<html>
?>
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
	
<script src='js/tinymce/tinymce.min.js'></script>
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
</head>

<body>
	
		
	
<?php
	if(isset($_POST["id"])){
	include("../connect/open.php");
	$idbv = $_POST["id"];
	$que="SELECT * FROM `tintuc` WHERE maTin = 1";
	$result = mysqli_fetch_array(mysqli_query($con,$que));
?>
<form method="post" action="EditArticleProcess.php" id="formsubmit">
<div class="form-horizontal">
  <div class="form-group">
    <label for="itittle" class="col-sm-2  control-label"> Tiêu đề </label>
    <div class="col-sm-10">
      <input type="text" maxlength="150" name="tittle" class="form-control" id="itittle"  placeholder="Nhập Tiêu Đề" value="<?php echo($result["tenbv"]); ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label for="ides" class="col-sm-2  control-label"> Mô tả : </label>
    <div class="col-sm-10">
      <input type="text" maxlength="255" name="description" id="ides" class="form-control" placeholder="Nhập Mô tả" value="<?php echo($result["mota"]); ?>"/>
    </div>
  </div><div class="form-group">
    <label for="itittle" class="col-sm-2  control-label"> Nội dung </label>
    <div class="col-sm-10">
      <textarea id="mytextarea" name="content"><?php echo($result["noidung"]); ?></textarea>
    </div>
  </div>
  <div class="col-sm-8">
  </div>
  <div class="col-sm-4"><button class="btn btn-success" type="button" onclick="validate()">Sửa</button>
  </div>
</div>
<input type="hidden" name="id" value="<?php echo ($idbv); ?>"/>
</form>
<?php 

}else{
header("Location:index.php");
}
?>


</body>

</html>