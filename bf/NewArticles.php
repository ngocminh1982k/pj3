<?php
include("header.php");
?>

<script src='js/tinymce/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
  	plugins: "image imagetools autolink autoresize paste",
	contextmenu: "link image imagetools table spellchecker",
	paste_data_images:true,
	images_upload_url: 'postAcceptor.php',
    images_upload_base_path: '../TinTuc/Images',
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
<form method="post" action="NewArticlesProcess.php" id="formsubmit">
<div class="form-horizontal">
  <div class="form-group">
    <label for="itittle" class="col-sm-2  control-label"> Tiêu đề </label>
    <div class="col-sm-10">
      <input type="text" maxlength="150" name="tittle" class="form-control" id="itittle"  placeholder="Nhập Tiêu Đề" value=""/>
    </div>
  </div>
  <div class="form-group">
  <label for="ides" class="col-sm-2  control-label"> Thể Loại : </label>
    <div class="col-sm-10">
      <select name="theloai" class="form-control">
      <?php
	  $quetl = mysqli_query($con,"select * from tbltheloai");
      while($tentheloai = mysqli_fetch_array($quetl)){
		  ?>
          <option value="<?php echo($tentheloai["idTL"]); ?>"><?php echo($tentheloai["nameTL"]); ?></option>
          <?php
	  }
      ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="ides" class="col-sm-2  control-label"> Mô tả : </label>
    <div class="col-sm-10">
      <input type="text" maxlength="255" name="description" id="ides" class="form-control" placeholder="Nhập Mô tả" value=""/>
    </div>
  </div><div class="form-group">
    <label for="itittle" class="col-sm-2  control-label"> Nội dung </label>
    <div class="col-sm-10">
      <textarea id="mytextarea" name="content"></textarea>
    </div>
  </div>
  <div class="col-sm-8">
  </div>
  <div class="col-sm-4"><button class="btn btn-success" type="button" onclick="validate()">Thêm</button>
  </div>
</div>
</form>

<?php
include("footer.php");
?>