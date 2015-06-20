/**
 * navigation.js
 *
 * Handles navigation.
 */
( function($) {

	$(function() {
		// Toggle the "show-header-search class to the body
		// when the search button is clicked.
		$( ".search-button" ).click( function() {
			$( "body" ).toggleClass( "show-header-search" );
			// Focus on the search form
			$( "#header-search" ).focus();
		});
		// Toggle the "show-offcanvas-menu" class to the body
		// when the menu-trigger button is clicked.
		$( ".menu-trigger" ).click( function() {
			$( "body" ).toggleClass( "show-offcanvas-menu" );
		});
		// Toggle the "show-offcanvas-menu" class to body
		// when the close button is clicked inside the left offcanvas menu.
		$( ".left-offcanvas-menu .close" ).click( function() {
			$( "body" ).toggleClass( "show-offcanvas-menu" );
		});
		// Toggle the "show-offcanvas-menu" class to the body
		// when the menu-trigger button is clicked.
		$( ".sidebar-button" ).click( function() {
			$( "body" ).toggleClass( "show-offcanvas-widgets" );
		});
		// Toggle the "show-offcanvas-menu" class to the body
		// when the close button is clicked inside the off-canvas sidebar.
		$( ".offcanvas-sidebar .close" ).click( function() {
			$( "body" ).toggleClass( "show-offcanvas-widgets" );
		});
		// The swiper for the horizontal menus
		var mySwiper = new Swiper ('.swiper-container', {
			freeMode: true
		})
		// make the header sticky.
		$("#masthead").sticky({
			topSpacing:0,
			className:"sticky"
		});
		// Add nicescroll to woocommerce lists
		// Useful for the widgets.
		$(".widget_layered_nav ul").niceScroll();

	});
})(jQuery);
