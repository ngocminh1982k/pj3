<?php
session_start();
if ( !isset( $_SESSION[ "useName" ] ) ) {
	$_SESSION[ "useName" ] = $use;

	
}?>

<html>
	<?php

	
	
	if(isset($_GET["ma"]))
	{
			
		$ma=$_GET["ma"];
	}
	  ?>
<head>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
	<link href="cssedit1.css" rel="stylesheet" type="text/css" >
	<script src="search.js"></script>
	<script src="jquery-3.2.1.min.js"></script>
	
<style>
	#sanpham{
		height: 770px;
		width: 75.3%;
		float: left;
		background: #F1F1F1;
	}
	
	
#pic{
	position: absolute; top: 200px; left:100px;
	z-index:0;
	width: 32%;
	height: 600px;
	
	}
	
	#details {
		position: absolute; top: 200px; right: 200px;
		z-index:0;
		width: 40%;
		height: 600px;
		
		
 
	}
	#left1{
		position: absolute; top: 120px; right: 0px;
		height: 650px;
		width: 24.7%;
		float: right;
		background: #F1ffff;
	}
a {
	text-decoration: none;
	color: blue;

	}
	#content{
		position: absolute; top: 700px;
		height: 1200px;
		width: 100%;
		
}

	
.colors {
  }

.product-title, .price, .sizes, .colors {
	margin: auto;
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }



.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.red {
  background: #FF0004; }

.black {
  background: #000000; }
	img {
  float: left;
  margin: 0 15px 0 0;
}
	.comment-form-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 20px;
	border-radius: 2px;
}

.input-row {
	margin-bottom: 20px;
}

.input-field {
	width: 100%;
	border-radius: 2px;
	padding: 10px;
	border: #e0dfdf 1px solid;
}

.btn-submit {
	padding: 10px 20px;
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
    cursor:pointer;
}

ul {
	list-style-type: none;
}

.comment-row {
	border-bottom: #e0dfdf 1px solid;
	margin-bottom: 15px;
	padding: 15px;
}

.outer-comment {
	background: #F0F0F0;
	padding: 20px;
	border: #dedddd 1px solid;
}

span.commet-row-label {
	font-style: italic;
}

span.posted-by {
	color: #09F;
}

.comment-info {
	font-size: 1em;
}
.comment-text {
    margin: 10px 0px;
}
.btn-reply {
    font-size: 0.8em;
    text-decoration: underline;
    color: #888787;
    cursor:pointer;
}
#comment-message {
    margin-left: 20px;
    color: #189a18;
    display: none;
}
	
	
	</style>
</head>

<body>
<?php include("nav.php") ?>
<div id="main">
	
	<?php
		include( "../connect/open.php" );
		
	
	
		$sql= mysqli_query( $con, "select * from tblsanpham where maSP=$ma" );
	
	$sp=mysqli_fetch_array($sql);
	
	?>
	
	<div id="sanpham">
<div id="pic"><img src="<?php echo($sp["anh"])?>"  width="430px">

						 
						</div>
   <div id="details">
						<h3 class="product-title"><?php echo($sp["tenSP"]) ?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">52 reviews</span>
						</div>
                        <?php $content=$sp["moTa"] ?>
						<p class="product-description">
							<?php print nl2br($content)?>
	   </p>
						<h4 class="price">current price: <span><?php echo number_format($sp["gia"]);?> đ</span></h4>
	   <h4 class="price">Số Lượng: <span><?php echo ($sp["soLuong"]);?> sản Phẩm</span></h4>
						<p class="vote"><strong>95%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color red"></span>
							<span class="color black"></span>
						</h5>
	    <br>

						<div class="action">
							<a href="giohang.php?maSp=<?php echo($sp["maSP"]);?>" onclick="alert('cảm ơn!  sản phẩm đã thểm vào giỏ hàng')"><button class="add-to-cart btn btn-default" type="button"> add to cart</button></a>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
	</div>
	<div id="left1"> <h2 style="color: #454545"> Sản phẩm tương tự</h2>
		<hr>
		
		<?php
		$maloai= mysqli_query( $con, "select maLoaiSP from tblsanpham where maSP=$ma" );
		$sq1 = mysqli_fetch_array( $maloai );
		$loai=($sq1["maLoaiSP"]);
		
		
		$sql1 = mysqli_query( $con,"select * from tblsanpham limit 0,4");?>
		<?php
				while ( $sq = mysqli_fetch_array( $sql1 ) ) {?>
		<br>

				<table>
			<tr>
				<td><img src="<?php echo($sq["anh"]);?>" height="90px" ></td>
				<td>		<a href="chitietsp.php?ma=<?php echo($sq["maSP"]);?>"><font size="4px" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><?php echo($sq["tenSP"]);?></font></a>
		
					<font size="3px"	><p  style="color: #EC2B2E"><?php echo number_format($sq["gia"]);?> đ</p></font><br>
				</td>

			<?php	}?>
	</table>
		
		
		
		
	</div>
	<div id="content"><br>
<br>
<br>

		<h2> Bình luận </h2>
	 <div class="comment-form-container">
        <form id="frm-comment">
            <div class="input-row">
                <input type="hidden" name="comment_id" id="commentId"
                    placeholder="Name" /> <input class="input-field"
                    type="text" name="name" id="name" placeholder="Name" />
            </div>
            <div class="input-row">
                <textarea class="input-field" type="text" name="comment"
                    id="comment" placeholder="Add a Comment">  </textarea>
            </div>
            <div>
                <input type="button" class="btn-submit" id="submitButton"
                    value="Publish" /><div id="comment-message">Comments Added Successfully!</div>
            </div>

        </form>
    </div>
    <div id="output"></div>
    <script>
            function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#name").focus();
            }

            $("#submitButton").click(function () {
            	   $("#comment-message").css('display', 'none');
                var str = $("#frm-comment").serialize();

                $.ajax({
                    url: "comment-add.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        var result = eval('(' + response + ')');
                        if (response)
                        {
                        	$("#comment-message").css('display', 'inline-block');
                            $("#name").val("");
                            $("#comment").val("");
                            $("#commentId").val("");
                     	   listComment();
                        } else
                        {
                            alert("Failed to add comments !");
                            return false;
                        }
                    }
                });
            });
            
            $(document).ready(function () {
            	   listComment();
            });

            function listComment() {
                $.post("comment-list.php",
                        function (data) {
                               var data = JSON.parse(data);
                            
                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-comment'>");
                            var item = $("<li>").html(comments);

                            for (var i = 0; (i < data.length); i++)
                            {
                                var commentId = data[i]['comment_id'];
                                parent = data[i]['parent_comment_id'];

                                if (parent == "0")
                                {
                                    comments = "<div class='comment-row'>"+
                                    "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                                    "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                                    "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>"+
                                    "</div>";

                                    var item = $("<li>").html(comments);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
            }

            function listReplies(commentId, data, list) {
                for (var i = 0; (i < data.length); i++)
                {
                    if (commentId == data[i].parent_comment_id)
                    {
                        var comments = "<div class='comment-row'>"+
                        " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                        "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</a></div>"+
                        "</div>";
                        var item = $("<li>").html(comments);
                        var reply_list = $('<ul>');
                        list.append(item);
                        item.append(reply_list);
                        listReplies(data[i].comment_id, data, reply_list);
                    }
                }
            }
        </script>
	</div>
</div>

</body>

</html>