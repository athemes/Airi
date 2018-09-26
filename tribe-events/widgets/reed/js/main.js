/* Sticky menu */
(function($) {

	var headerHeight = $( '#masthead' ).outerHeight();
	var topBar = $( '.top-bar' );

	if ( topBar.length > 0 ) {
		var topBarHeight = topBar.outerHeight();
	} else {
		var topBarHeight = 0;
	}

	$( 'body.is-sticky-nav:not(.page-template-template_page-builder) #content' ).css( 'margin-top', headerHeight + 90 );

	$( 'body.is-sticky-nav .site-header' ).css( 'top',  topBarHeight );
	
	$( 'body.is-sticky-nav.admin-bar .site-header' ).css( 'top',  topBarHeight + 32 );

	//Taken from Underscores.js
	function debounce(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};

	var checkScrolling = debounce(function() {
		var y = $(this).scrollTop();
		if ( y > 0 ) {
			$('body.is-sticky-nav').addClass('siteScrolled');
		} else {
			$('body.is-sticky-nav').removeClass('siteScrolled');
		}
	}, 100);

	window.addEventListener( 'scroll', checkScrolling );
	
	$( document ).ready( checkScrolling );

})( jQuery );