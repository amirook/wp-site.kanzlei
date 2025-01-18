/* global catchCorporateOptions */
 /*
 * Custom scripts
 * Description: Custom scripts for Catch Corporate
 */

 ( function( $ ) {
	$( window ).on( 'load.catchCorporate resize.catchCorporate', function() {
		$('#primary-menu-wrapper .menu-inside-wrapper').on('focusout', function () {
			var $elem = $(this);

			// let the browser set focus on the newly clicked elem before check
			setTimeout(function () {
				if ( ! $elem.find(':focus').length ) {
					$( '#site-header-menu .menu-toggle' ).trigger('focus');
				}
			}, 0);
		});

		$('#primary-search-wrapper .menu-inside-wrapper').on('focusout', function () {
			$( '#primary-search-wrapper #social-search-toggle' ).trigger('focus');
		});
	
	});

	// Search Toggle
	$( document ).ready( function() {

		$( '#social-search-toggle' ).on( 'click.catchCorporate', function(){
			$( 'body' ).removeClass( 'menu-open' );
			$( '#site-header-menu .menu-toggle' ).removeClass( 'selected' );
			$( '#site-header-menu .menu-wrapper' ).removeClass( 'is-open' );
			
			$( '#primary-search-wrapper' ).toggleClass('is-open');
			$( this ).toggleClass('selected');
			
			if( $("#primary-search-wrapper").hasClass("is-open") ) {
				setTimeout(function () {
					$("#primary-search-wrapper .menu-inside-wrapper input.search-field")[0].focus();
				}, 500);
			}

			return false;


		});
	});

	// Owl Carousel
	if ( typeof $.fn.owlCarousel === "function" ) {
		// Featured Slider
		var sliderOptions = {
			rtl:catchCorporateOptions.rtl ? true : false,
			autoHeight:true,
			margin: 0,
			items: 1,
			nav: true,
			dots: false,
			autoplay: true,
			autoplayTimeout: 4000,
			loop: true,
			navText: [catchCorporateOptions.iconNavPrev,catchCorporateOptions.iconNavNext]
		};

		$(".main-slider").owlCarousel(sliderOptions);

		// Testimonial Section
		var testimonialOptions = {
			rtl:catchCorporateOptions.rtl ? true : false,
			autoHeight: true,
			margin: 0,
			items: 1,
			nav: true,
			dots: true,
			autoplay: true,
			autoplayTimeout: 4000 ,
			loop: true,
			navText: [catchCorporateOptions.NavPrev,catchCorporateOptions.NavNext],
		};

		$( '.testimonial-slider' ).owlCarousel(testimonialOptions);

		$('#testimonial-content-section .owl-dot').on( 'click',function () {
			$( '.testimonial-slider' ).trigger('to.owl.carousel', [$(this).index(), 300]);
		});
	}

	//Adding padding top for header to match with custom header
	$( window ).on( 'load.catchCorporate resize.catchCorporate', function () {
        if( $( 'body.home' ).hasClass( 'has-header-media' ) || $( 'body.home' ).hasClass( 'absolute-header' )) {
            headerheight = $('#masthead').height();
            $('.absolute-header #masthead + .custom-header, .absolute-header #masthead + #feature-slider-section .post-thumbnail').css('padding-top', headerheight );
        }
    });

	$( function() {

		// Functionality for scroll to top button
		$(window).on( 'scroll', function () {
			if ( $( this ).scrollTop() > 100 ) {
				$( '#scrollup' ).fadeIn('slow');
				$( '#scrollup' ).show();
			} else {
				$('#scrollup').fadeOut('slow');
				$("#scrollup").hide();
			}
		});

		$( '#scrollup' ).on( 'click', function () {
			$( 'body, html' ).animate({
				scrollTop: 0
			}, 500 );
			return false;
		});
	});

	//Light Box for videos section
	if ( typeof $.fn.flashy === "function" ) {
		$('.mixed').flashy({
			gallery: false,
		});
	}

	scrollHeight = $('.scroll-inner').height();
	$('.scroll-inner').css('margin-top', -scrollHeight);

	$('body').on('click.catchCorporate touch.catchCorporate','.scroll-inner', function(e){
		var Sclass = $(this).parents('.feature-slider-section, .custom-header').next();
		var scrollto = Sclass.offset().top;

		$('html, body').animate({
			scrollTop: scrollto
		}, 1000);

	});

	// Add header video class after the video is loaded.
	$( document ).on( 'wp-custom-header-video-loaded', function() {
		$( 'body' ).addClass( 'has-header-video' );
	});

	/*
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}

	$( function() {
		$( document ).ready( function() {
			if ( true === supportsInlineSVG() ) {
				document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
			}
		});
	});

	$( '.search-toggle' ).on( 'click.catchCorporate', function() {
		$( this ).toggleClass( 'open' );
		$( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		$( '.search-wrapper' ).toggle();
	});

	/* Menu */
	var body, masthead, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
		.append( catchCorporateOptions.dropdownIcon )
			.append( $( '<span />', { 'class': 'screen-reader-text', text: catchCorporateOptions.screenReaderText.expand }) );

		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );
		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).append( catchCorporateOptions.dropdownIcon );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children, .page_item_has_children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).on( 'click', function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === catchCorporateOptions.screenReaderText.expand ? catchCorporateOptions.screenReaderText.collapse : catchCorporateOptions.screenReaderText.expand );
		} );
	}

	initMainNavigation( $( '.main-navigation' ) );

	masthead         = $( '#masthead' );
	siteHeaderMenu   = masthead.find( '#site-header-menu' );
	menuToggle       = siteHeaderMenu.find( '.menu-toggle' );
	siteNavigation   = masthead.find( '#site-navigation' );
	socialNavigation = masthead.find( '#social-navigation' );

	// Enable menuToggle.
	( function() {

		// Assume the initial scroll position is 0.
		var scroll = 0;

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		menuToggle.on( 'click.catchCorporate', function() {
			// jscs:disable
			$( this ).add( siteNavigation ).attr( 'aria-expanded', $( this ).add( siteNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
		} );


		// Add an initial values for the attribute.
		menuToggle.add( siteNavigation ).attr( 'aria-expanded', 'false' );
		menuToggle.add( socialNavigation ).attr( 'aria-expanded', 'false' );

		// Wait for a click on one of our menu toggles.
		menuToggle.on( 'click.catchCorporate', function() {

			// Assign this (the button that was clicked) to a variable.
			var button = this;

			// Gets the actual menu (parent of the button that was clicked).
			var menu = $( this ).parents( '.menu-wrapper' );

			// Remove selected classes from other menus.
			$( '.menu-toggle' ).not( button ).removeClass( 'selected' );
			$( '.menu-wrapper' ).not( menu ).removeClass( 'is-open' );

			// Toggle the selected classes for this menu.
			$( button ).toggleClass( 'selected' );
			$( menu ).toggleClass( 'is-open' );

			// Is the menu in an open state?
			var is_open = $( menu ).hasClass( 'is-open' );

			// If the menu is open and there wasn't a menu already open when clicking.
			if ( is_open && ! jQuery( 'body' ).hasClass( 'menu-open' ) ) {

				// Get the scroll position if we don't have one.
				if ( 0 === scroll ) {
					scroll = $( 'body' ).scrollTop();
				}

				// Add a custom body class.
				$( 'body' ).addClass( 'menu-open' );

			// If we're closing the menu.
			} else if ( ! is_open ) {

				$( 'body' ).removeClass( 'menu-open' );
				$( 'body' ).scrollTop( scroll );
				scroll = 0;
			}
		} );

		// Close menus when somewhere else in the document is clicked.
		$( document ).on( 'click.catchCorporate touchstart.catchCorporate', function() {
			$( 'body' ).removeClass( 'menu-open' );
			$( '.menu-toggle' ).removeClass( 'selected' );
			$( '.menu-wrapper' ).removeClass( 'is-open' );
		} );

		$('.close-button').on('click.catchCorporate touchstart.catchCorporate', function () {
			$('body').removeClass('menu-open');
			$('.menu-toggle').removeClass('selected');
			$('.menu-wrapper').removeClass('is-open');
		});

		// Stop propagation if clicking inside of our main menu.
		$( '.site-header-menu,.menu-toggle, .dropdown-toggle, .search-field, #site-navigation, #social-search-wrapper, #social-navigation .search-submit' ).on( 'click.catchCorporate touchstart.catchCorporate', function( e ) {
			e.stopPropagation();
		} );
	} )();

	//For Footer Menu
	menuToggleFooter       = $( '#menu-toggle-footer' ); // button id
	siteFooterMenu         = $( '#footer-menu-wrapper' ); // wrapper id
	siteNavigationFooter   = $( '#site-footer-navigation' ); // nav id
	initMainNavigation( siteNavigationFooter );

	// Enable menuToggleFooter.
	( function() {
		// Return early if menuToggleFooter is missing.
		if ( ! menuToggleFooter.length ) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggleFooter.add( siteNavigationFooter ).attr( 'aria-expanded', 'false' );

		menuToggleFooter.on( 'click', function() {
			$( this ).add( siteFooterMenu ).toggleClass( 'toggled-on selected' );

			// jscs:disable
			$( this ).add( siteNavigationFooter ).attr( 'aria-expanded', $( this ).add( siteNavigationFooter ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
		} );
	} )();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( window.innerWidth >= 910 ) {
				$( document.body ).on( 'touchstart.catchCorporate', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				} );
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.catchCorporate', function( e ) {
					var el = $( this ).parent( 'li' );

					if ( ! el.hasClass( 'focus' ) ) {
						e.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				} );
			} else {
				siteNavigation.find( '.menu-item-has-children > a, .page_item_has_children > a' ).unbind( 'touchstart.catchCorporate' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.catchCorporate', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.catchCorporate blur.catchCorporate', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );
	} )();

	$(document).ready(function() {
		/*Search and Social Container*/
		$('.toggle-top').on('click.catchCorporate', function(e){
			$(this).toggleClass('toggled-on');
		});

	});

	//Masonry blocks
	$blocks = $('.grid, .blog-masonry');

	$blocks.imagesLoaded(function(){
		$blocks.masonry({
			itemSelector: '.grid-item',
			columnWidth: '.grid-item',
			// slow transitions
			transitionDuration: '1s',
			percentPosition: true
		});

		// Fade blocks in after images are ready (prevents jumping and re-rendering)
		$('.grid-item').fadeIn();
		$blocks.find( '.grid-item' ).animate( {
			'opacity' : 1
		} );

	});

	$(document).ready( function() { setTimeout( function() { $blocks.masonry(); }, 2000); });

	$(window).on( "resize", function () {
		$blocks.masonry();
	});

	// When Jetpack Infinite scroll posts have loaded
	$( document.body ).on( 'post-load', function () {
		var $container = $('#infinite-post-wrap');
		$container.masonry( 'reloadItems' );

		$blocks.imagesLoaded(function(){
			$blocks.masonry({
				itemSelector: '.grid-item',
				// slow transitions
				transitionDuration: '1s',
				percentPosition: true
			});

			// Fade blocks in after images are ready (prevents jumping and re-rendering)
			$('.grid-item').fadeIn();
			$blocks.find( '.grid-item' ).animate( {
				'opacity' : 1
			} );

		});
		$(document).ready( function() { setTimeout( function() { $blocks.masonry(); }, 2000); });
	});

	// Load Isotope.
    $( window ).on( 'load.catchCorporate resize.catchCorporate', function () {
        if ( typeof $.fn.isotope === "function" ) {
            // init Isotope
            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
            });
            // filter items on button click
            $('.filter-button-group').on( 'click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });
            $('.filter-button-group .button').on( 'click',function(){
                $('.filter-button-group .button').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
            // bind filter on select change
            $('.filters-select').on( 'change', function() {
                // get filter value from option value
                var filterValue = this.value;
                $grid.isotope({ filter: filterValue });
            });
        }
    });

	/* Sticky Menu */
	$(document).ready(function () {
	
	'use strict';
	
	var c, currentScrollTop = 0,
		navbar = $('.site-header');

	/*$(window).scroll(function ()*/
	$(window).on( 'scroll resize load', function () {
		var a = $(window).scrollTop();
		var b = navbar.height();
		
		currentScrollTop = a;

		navbar.removeClass("scrollDown");
		
		if (c < currentScrollTop && a > b) {
			navbar.addClass("scrollUp");
			navbar.removeClass("scrollDown");
		} else if (c > currentScrollTop && !(a <= b)) {
			navbar.addClass("scrollDown");
			navbar.removeClass("scrollUp");
		}
		c = currentScrollTop;
	});
	
	});

} )( jQuery );

/**
 * Simple Vanilla Javascript MatchHeight of selected elements
 * https://codepen.io/jonescr/pen/QvEZpQ
 */
(function matchTheHeight( elements ) {
	for ( j = 0; j < elements.length; j++ ) {
		var getDivs = document.querySelectorAll( elements[j] );
		
		if ( getDivs.length ) {
			//Find out how my divs there are with the query selector getDivs
			var arrayLength = getDivs.length;
			var heights = [];
		
			//Create a loop that iterates through the getDivs variable and pushes the heights of the divs into an empty array
			for (var i = 0; i < arrayLength; i++) {
				heights.push(getDivs[i].offsetHeight);
			}
		
			//Find the largest of the divs
			function getHighest() {
			return Math.max(...heights);
			}
		
			//Set a variable equal to the tallest div
			var tallest = getHighest();
		
			//Iterate through getDivs and set all their height style equal to the tallest variable
			for (var i = 0; i < getDivs.length; i++) {
				getDivs[i].style.height = tallest + "px";
			}
		}
	}
})([ 
	'#featured-content-section .hentry-inner',
	'.product-content-wrapper .product-container'
]);