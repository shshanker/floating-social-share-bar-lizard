/**
 * aankha-woo-assitive-menu.js
 *
 * Woocommerce assitive menu
 * 
 */
jQuery(document).ready( function($) {
		$('.awfss-social-link-main-icon').click(function(){			
			 $('.awfss-social-link-lists').toggleClass('active');    	
		});

		//copy link url

	    $('#awfss-icon-linkurl').on('click', function(event) {
	        var copyTextarea = document.querySelector('#awfss-copy-linkurl');
	    	//alert(copyTextarea);
	        copyTextarea.select();

	        try {
	            var successful = document.execCommand('copy');
	            var msg = successful ? 'successful' : 'unsuccessful';
	            
	        } catch (err) {
	            console.log('Oops, unable to copy');
	        }
	    });
});


