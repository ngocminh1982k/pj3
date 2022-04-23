<?php
session_start();
if ( !isset( $_SESSION[ "useName" ] ) ) {
	$_SESSION[ "useName" ] = $use;

	
}?>
<html >
	<?php

	
	
	if(isset($_GET["ma"]))
	{
		$ma=$_GET["ma"];	
		
	}
	  ?>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
	<link href="cssedit1.css" rel="stylesheet" type="text/css" >
		<script src="search.js"></script>
	<script src="jquery-3.2.1.min.js"></script>
	
<style>
	#main1{
	position: relative;
   background: #CCCCCC;
	height: 4600px;
	
}
	#chitiet{
		position: absolute; top: 110px; left: 200px;
		width: 70%;
		height: 3200px;
		
</style>
	<script>// JavaScript Document

		// on click search results...
		$( document ).on( "click", "#display-button", function () {
			var value = $( "#search-data" ).val();
			if ( value.length != 0 ) {
				//alert(99933);
				searchData( value );
			} else {
				$( '#search-result-container' ).hide();
			}
		} );

		// This function helps to send the request to retrieve data from mysql database...
		function searchData( val ) {
			$( '#search-result-container' ).show();
			$( '#search-result-container' ).html( '<div><img src="preloader.gif" width="50px;" height="50px"> <span style="font-size: 20px;">Please Wait...</span></div>' );
			$.post( 'controller.php', {
				'search-data': val
			}, function ( data ) {

				if ( data != "" )
					$( '#search-result-container' ).html( data );
				else
					$( '#search-result-container' ).html( "<div class='search-result'>No Result Found...</div>" );
			} ).fail( function ( xhr, ajaxOptions, thrownError ) { //any errors?

				alert( thrownError ); //alert with HTTP error

			} );
		}
	</script>
</head>

<body>
	<?php include("nav.php") ?>
	
<div id="main1">
	<?php  
		$sql= mysqli_query( $con, "select * from tintuc where maTin=$ma" );	
	$nd=mysqli_fetch_array($sql);
	?>

			<div id="chitiet">			 
				
		<h1 ><?php echo($nd["tieuDe"]); ?></h1>
		<p style="font-size: 16px"><?php echo($nd["moTa"]);?></p>
	
		<img src="<?php echo($nd["anh"]); ?>" width="100%">
	<?php $content=$nd["noiDung"] ?>
		<p style="font-size: 16px"><?php print nl2br($content)?></p>
				
	</div>
	
	</div>
</body>
</html>