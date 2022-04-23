// JavaScript Document

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
	