;// Themify Theme Scripts - http://themify.me/

/////////////////////////////////////////////
// jQuery functions					
/////////////////////////////////////////////
jQuery(document).ready(function($){


	/////////////////////////////////////////////
	// Scroll to top 							
	/////////////////////////////////////////////
	$('.back-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	
	/////////////////////////////////////////////
	// Toggle main nav on mobile
	/////////////////////////////////////////////
	$("#menu-icon").click(function(){
		$("#main-nav").fadeToggle();
		$("#headerwrap #top-nav").hide();
		$(this).toggleClass("active");
	});

	if( typeof jQuery.fn.themifyDropdown == 'function' ) {
		$( '#main-nav' ).themifyDropdown();
	}

	// Lightbox / Fullscreen initialization ///////////
	if(typeof ThemifyGallery !== 'undefined'){ ThemifyGallery.init({'context': jQuery(themifyScript.lightboxContext)}); }

});