(function( $ ) {
	'use strict';

	jQuery(document).ready(function($) {
		jQuery(".wp-block-gutenberg-faq-block .tab-faq-head").click(function(){
			if (jQuery(this).hasClass("active")){
				jQuery(".tab-faq-head").removeClass("active");
				jQuery(".wp-block-gutenberg-faq-block .tab-faq-text").slideUp("slow");
			}else {
				jQuery(".tab-faq-head").removeClass("active");
				jQuery(this).addClass("active");
				jQuery(".wp-block-gutenberg-faq-block .tab-faq-text").slideUp("slow");
				jQuery(this).next().slideDown("slow");
			}
		});
	});

})( jQuery );
