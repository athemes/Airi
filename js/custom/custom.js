/* Sticky menu */
(function($) {

	function stickyHeader() {
		if ( matchMedia( 'only screen and (min-width: 1024px)' ).matches ) {

			$('.menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});

			$('.menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});

			$('.menuStyle4.sticky-header .main-navigation').sticky({
				topSpacing: 15,
				responsiveWidth: true
			});			

			$('.menuStyle3.sticky-header.admin-bar .bottom-bar').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});		
			$('.menuStyle3.sticky-header:not(.admin-bar) .bottom-bar').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});	

			var menuHeight = $( '.main-navigation' ).outerHeight();
			$( '.menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation' ).css( 'margin-bottom', -(menuHeight/2 + 30) );

			var headerHeight = $('.site-header').outerHeight();
			$('#masthead-sticky-wrapper').css('min-height', headerHeight);

		} else {
			$('.sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar').unstick();
		}
	}
	stickyHeader();
	$(window).on('resize', stickyHeader );

})( jQuery );



/* Mobile menu */
(function($) {

	// Mobile menu navigation toggle
	// Add .mobile-menu-active class to body when mobile menu is toggled
	// With that class hide/show mobile menu overlay
	$( '.site-header' ).on( 'click', '.mobile-menu-toggle', function( e ) {
		e.preventDefault();
		$( 'body' ).toggleClass( 'mobile-menu-active' );
	} );

	// Add dropdown arrow to <li> elements that contain sub-menus
	var hasChildMenu = $( '.main-navigation' ).find('li:has(ul)');
	hasChildMenu.children('a').after('<span class="subnav-toggle"></span>');

	// Mobile sub-menus toggle action
	$( '.main-navigation' ).on( 'click', '.subnav-toggle', function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'open' ).next( '.sub-menu, .children' ).slideToggle();
	} );

})( jQuery );

/* Mobile menu */
(function($) {
	
	function mobileMenu() {
		if ( $('.site-header').length ) {
			var headerHeight = $( '.site-header' ).outerHeight();
			
			if ( matchMedia( '(max-width: 1199px)' ).matches ) {

				// Check if WordPress Admin bar is present and accomodate the extra spacing by pushing the mobile menu futher bellow
				if ( $('#wpadminbar').length ) {
					var wpadminbarHeight = $( '#wpadminbar' ).outerHeight();
					$( '.main-navigation' ).css( 'top', headerHeight + wpadminbarHeight - 1 );
				} else {
					$( '.main-navigation' ).css( 'top', headerHeight - 1 );
				}

			} else {
				$( '.main-navigation' ).css( 'top', 'auto' );
			}
		}
	}

	$(window).on('load resize', mobileMenu );

})( jQuery );


/* Header search toggle */
(function($) {

	var toggleButton = $( '.header-search-toggle' );

	if ( toggleButton.length ) {

		toggleButton.on("click", function(){
			$( '.header-search-form' ).slideToggle();
		});
	}

})( jQuery );
!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery);
/* Sticky menu */
(function($) {

	function stickyHeader() {
		if ( matchMedia( 'only screen and (min-width: 1024px)' ).matches ) {

			$('.menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});

			$('.menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});

			$('.menuStyle4.sticky-header .main-navigation').sticky({
				topSpacing: 15,
				responsiveWidth: true
			});			

			$('.menuStyle3.sticky-header.admin-bar .bottom-bar').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});		
			$('.menuStyle3.sticky-header:not(.admin-bar) .bottom-bar').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});	

			var menuHeight = $( '.main-navigation' ).outerHeight();
			$( '.menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation' ).css( 'margin-bottom', -(menuHeight/2 + 30) );

			var headerHeight = $('.site-header').outerHeight();
			$('#masthead-sticky-wrapper').css('min-height', headerHeight);

		} else {
			$('.sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar').unstick();
		}
	}
	stickyHeader();
	$(window).on('resize', stickyHeader );

})( jQuery );



/* Mobile menu */
(function($) {

	// Mobile menu navigation toggle
	// Add .mobile-menu-active class to body when mobile menu is toggled
	// With that class hide/show mobile menu overlay
	$( '.site-header' ).on( 'click', '.mobile-menu-toggle', function( e ) {
		e.preventDefault();
		$( 'body' ).toggleClass( 'mobile-menu-active' );
	} );

	// Add dropdown arrow to <li> elements that contain sub-menus
	var hasChildMenu = $( '.main-navigation' ).find('li:has(ul)');
	hasChildMenu.children('a').after('<span class="subnav-toggle"></span>');

	// Mobile sub-menus toggle action
	$( '.main-navigation' ).on( 'click', '.subnav-toggle', function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'open' ).next( '.sub-menu, .children' ).slideToggle();
	} );

})( jQuery );

/* Mobile menu */
(function($) {
	
	function mobileMenu() {
		if ( $('.site-header').length ) {
			var headerHeight = $( '.site-header' ).outerHeight();
			
			if ( matchMedia( '(max-width: 1199px)' ).matches ) {

				// Check if WordPress Admin bar is present and accomodate the extra spacing by pushing the mobile menu futher bellow
				if ( $('#wpadminbar').length ) {
					var wpadminbarHeight = $( '#wpadminbar' ).outerHeight();
					$( '.main-navigation' ).css( 'top', headerHeight + wpadminbarHeight - 1 );
				} else {
					$( '.main-navigation' ).css( 'top', headerHeight - 1 );
				}

			} else {
				$( '.main-navigation' ).css( 'top', 'auto' );
			}
		}
	}

	$(window).on('load resize', mobileMenu );

})( jQuery );


/* Header search toggle */
(function($) {

	var toggleButton = $( '.header-search-toggle' );

	if ( toggleButton.length ) {

		toggleButton.on("click", function(){
			$( '.header-search-form' ).slideToggle();
		});
	}

})( jQuery );
!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery);
/* Sticky menu */
(function($) {

	function stickyHeader() {
		if ( matchMedia( 'only screen and (min-width: 1024px)' ).matches ) {

			$('.menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});

			$('.menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});

			$('.menuStyle4.sticky-header .main-navigation').sticky({
				topSpacing: 15,
				responsiveWidth: true
			});			

			$('.menuStyle3.sticky-header.admin-bar .bottom-bar').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});		
			$('.menuStyle3.sticky-header:not(.admin-bar) .bottom-bar').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});	

			var menuHeight = $( '.main-navigation' ).outerHeight();
			$( '.menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation' ).css( 'margin-bottom', -(menuHeight/2 + 30) );

			var headerHeight = $('.site-header').outerHeight();
			$('#masthead-sticky-wrapper').css('min-height', headerHeight);

		} else {
			$('.sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar').unstick();
		}
	}
	stickyHeader();
	$(window).on('resize', stickyHeader );

})( jQuery );



/* Mobile menu */
(function($) {

	// Mobile menu navigation toggle
	// Add .mobile-menu-active class to body when mobile menu is toggled
	// With that class hide/show mobile menu overlay
	$( '.site-header' ).on( 'click', '.mobile-menu-toggle', function( e ) {
		e.preventDefault();
		$( 'body' ).toggleClass( 'mobile-menu-active' );
	} );

	// Add dropdown arrow to <li> elements that contain sub-menus
	var hasChildMenu = $( '.main-navigation' ).find('li:has(ul)');
	hasChildMenu.children('a').after('<span class="subnav-toggle"></span>');

	// Mobile sub-menus toggle action
	$( '.main-navigation' ).on( 'click', '.subnav-toggle', function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'open' ).next( '.sub-menu, .children' ).slideToggle();
	} );

})( jQuery );

/* Mobile menu */
(function($) {
	
	function mobileMenu() {
		if ( $('.site-header').length ) {
			var headerHeight = $( '.site-header' ).outerHeight();
			
			if ( matchMedia( '(max-width: 1199px)' ).matches ) {

				// Check if WordPress Admin bar is present and accomodate the extra spacing by pushing the mobile menu futher bellow
				if ( $('#wpadminbar').length ) {
					var wpadminbarHeight = $( '#wpadminbar' ).outerHeight();
					$( '.main-navigation' ).css( 'top', headerHeight + wpadminbarHeight - 1 );
				} else {
					$( '.main-navigation' ).css( 'top', headerHeight - 1 );
				}

			} else {
				$( '.main-navigation' ).css( 'top', 'auto' );
			}
		}
	}

	$(window).on('load resize', mobileMenu );

})( jQuery );


/* Header search toggle */
(function($) {

	var toggleButton = $( '.header-search-toggle' );

	if ( toggleButton.length ) {

		toggleButton.on("click", function(){
			$( '.header-search-form' ).slideToggle();
		});
	}

})( jQuery );
!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery);
/* Sticky menu */
(function($) {

	function stickyHeader() {
		if ( matchMedia( 'only screen and (min-width: 1024px)' ).matches ) {

			$('.menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});

			$('.menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});

			$('.menuStyle4.sticky-header .main-navigation').sticky({
				topSpacing: 15,
				responsiveWidth: true
			});			

			$('.menuStyle3.sticky-header.admin-bar .bottom-bar').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});		
			$('.menuStyle3.sticky-header:not(.admin-bar) .bottom-bar').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});	

			var menuHeight = $( '.main-navigation' ).outerHeight();
			$( '.menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation' ).css( 'margin-bottom', -(menuHeight/2 + 30) );

			var headerHeight = $('.site-header').outerHeight();
			$('#masthead-sticky-wrapper').css('min-height', headerHeight);

		} else {
			$('.sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar').unstick();
		}
	}
	stickyHeader();
	$(window).on('resize', stickyHeader );

})( jQuery );



/* Mobile menu */
(function($) {

	// Mobile menu navigation toggle
	// Add .mobile-menu-active class to body when mobile menu is toggled
	// With that class hide/show mobile menu overlay
	$( '.site-header' ).on( 'click', '.mobile-menu-toggle', function( e ) {
		e.preventDefault();
		$( 'body' ).toggleClass( 'mobile-menu-active' );
	} );

	// Add dropdown arrow to <li> elements that contain sub-menus
	var hasChildMenu = $( '.main-navigation' ).find('li:has(ul)');
	hasChildMenu.children('a').after('<span class="subnav-toggle"></span>');

	// Mobile sub-menus toggle action
	$( '.main-navigation' ).on( 'click', '.subnav-toggle', function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'open' ).next( '.sub-menu, .children' ).slideToggle();
	} );

})( jQuery );

/* Mobile menu */
(function($) {
	
	function mobileMenu() {
		if ( $('.site-header').length ) {
			var headerHeight = $( '.site-header' ).outerHeight();
			
			if ( matchMedia( '(max-width: 1199px)' ).matches ) {

				// Check if WordPress Admin bar is present and accomodate the extra spacing by pushing the mobile menu futher bellow
				if ( $('#wpadminbar').length ) {
					var wpadminbarHeight = $( '#wpadminbar' ).outerHeight();
					$( '.main-navigation' ).css( 'top', headerHeight + wpadminbarHeight - 1 );
				} else {
					$( '.main-navigation' ).css( 'top', headerHeight - 1 );
				}

			} else {
				$( '.main-navigation' ).css( 'top', 'auto' );
			}
		}
	}

	$(window).on('load resize', mobileMenu );

})( jQuery );


/* Header search toggle */
(function($) {

	var toggleButton = $( '.header-search-toggle' );

	if ( toggleButton.length ) {

		toggleButton.on("click", function(){
			$( '.header-search-form' ).slideToggle();
		});
	}

})( jQuery );
!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),!function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery),function(e){function i(){if(matchMedia("only screen and (min-width: 1024px)").matches){e(".menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header").sticky({topSpacing:0,responsiveWidth:!0}),e(".menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle4.sticky-header .main-navigation").sticky({topSpacing:15,responsiveWidth:!0}),e(".menuStyle3.sticky-header.admin-bar .bottom-bar").sticky({topSpacing:32,responsiveWidth:!0}),e(".menuStyle3.sticky-header:not(.admin-bar) .bottom-bar").sticky({topSpacing:0,responsiveWidth:!0});var i=e(".main-navigation").outerHeight();e(".menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation").css("margin-bottom",-(i/2+30));var t=e(".site-header").outerHeight();e("#masthead-sticky-wrapper").css("min-height",t)}else e(".sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar").unstick()}i(),e(window).on("resize",i)}(jQuery),function(e){e(".site-header").on("click",".mobile-menu-toggle",function(i){i.preventDefault(),e("body").toggleClass("mobile-menu-active")});var i=e(".main-navigation").find("li:has(ul)");i.children("a").after('<span class="subnav-toggle"></span>'),e(".main-navigation").on("click",".subnav-toggle",function(i){i.preventDefault(),e(this).toggleClass("open").next(".sub-menu, .children").slideToggle()})}(jQuery),function(e){function i(){if(e(".site-header").length){var i=e(".site-header").outerHeight();if(matchMedia("(max-width: 1199px)").matches)if(e("#wpadminbar").length){var t=e("#wpadminbar").outerHeight();e(".main-navigation").css("top",i+t-1)}else e(".main-navigation").css("top",i-1);else e(".main-navigation").css("top","auto")}}e(window).on("load resize",i)}(jQuery),function(e){var i=e(".header-search-toggle");i.length&&i.on("click",function(){e(".header-search-form").slideToggle()})}(jQuery);
/* Sticky menu */
(function($) {

	function stickyHeader() {
		if ( matchMedia( 'only screen and (min-width: 1024px)' ).matches ) {

			$('.menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});

			$('.menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});

			$('.menuStyle4.sticky-header .main-navigation').sticky({
				topSpacing: 15,
				responsiveWidth: true
			});			

			$('.menuStyle3.sticky-header.admin-bar .bottom-bar').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});		
			$('.menuStyle3.sticky-header:not(.admin-bar) .bottom-bar').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});	

			var menuHeight = $( '.main-navigation' ).outerHeight();
			$( '.menuStyle4 #site-navigation-sticky-wrapper, .menuStyle4 .main-navigation' ).css( 'margin-bottom', -(menuHeight/2 + 30) );

			var headerHeight = $('.site-header').outerHeight();
			$('#masthead-sticky-wrapper').css('min-height', headerHeight);

		} else {
			$('.sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar').unstick();
		}
	}
	stickyHeader();
	$(window).on('resize', stickyHeader );

})( jQuery );



/* Mobile menu */
(function($) {

	// Mobile menu navigation toggle
	// Add .mobile-menu-active class to body when mobile menu is toggled
	// With that class hide/show mobile menu overlay
	$( '.site-header' ).on( 'click', '.mobile-menu-toggle', function( e ) {
		e.preventDefault();
		$( 'body' ).toggleClass( 'mobile-menu-active' );
	} );

	// Add dropdown arrow to <li> elements that contain sub-menus
	var hasChildMenu = $( '.main-navigation' ).find('li:has(ul)');
	hasChildMenu.children('a').after('<span class="subnav-toggle"></span>');

	// Mobile sub-menus toggle action
	$( '.main-navigation' ).on( 'click', '.subnav-toggle', function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'open' ).next( '.sub-menu, .children' ).slideToggle();
	} );

})( jQuery );

/* Mobile menu */
(function($) {
	
	function mobileMenu() {
		if ( $('.site-header').length ) {
			var headerHeight = $( '.site-header' ).outerHeight();
			
			if ( matchMedia( '(max-width: 1199px)' ).matches ) {

				// Check if WordPress Admin bar is present and accomodate the extra spacing by pushing the mobile menu futher bellow
				if ( $('#wpadminbar').length ) {
					var wpadminbarHeight = $( '#wpadminbar' ).outerHeight();
					$( '.main-navigation' ).css( 'top', headerHeight + wpadminbarHeight - 1 );
				} else {
					$( '.main-navigation' ).css( 'top', headerHeight - 1 );
				}

			} else {
				$( '.main-navigation' ).css( 'top', 'auto' );
			}
		}
	}

	$(window).on('load resize', mobileMenu );

})( jQuery );


/* Header search toggle */
(function($) {

	var toggleButton = $( '.header-search-toggle' );

	if ( toggleButton.length ) {

		toggleButton.on("click", function(){
			$( '.header-search-form' ).slideToggle();
		});
	}

})( jQuery );