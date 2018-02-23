( function( $ ) {
	var $body = $(document.body),
		$menuToggle = $('#menu-toggle'),
		$siteNav = $('#site-navigation');

	$( document ).ready( function() {

		// Enable top search
		$('#search-show, #search-hide').on('click', function(e) {
			var searchBox = $('#search-box');
			e.preventDefault();
			if ( $body.hasClass('search--opened') ) {
				$body.removeClass('search--opened').addClass('search--closing');
				setTimeout(function() {
					$body.removeClass('search--closing');
				}, 500);
			} else {
				$body.addClass('search--opening');
				setTimeout(function() {
					$body.addClass('search--opened').removeClass('search--opening');
				}, 500);
				searchBox.find('.search-field').focus();
			}
		});

		// Scroll to top
		$('#top-link').on('click', function(e) {
			$('html, body').animate({'scrollTop': 0});
			e.preventDefault();
		});

		// Fixed top navigation
		if ( $body.hasClass('fixed-nav') ) {
			jgtazalea_fixed_nav();
			$(window).scroll(function() {
				jgtazalea_fixed_nav();
			});
		}

		// Add dropdown toggle
		var dropdownArrow = $('<button class="dropdown-toggle" aria-expanded="false"><span class="screen-reader-text">' + jgtazaleaVars.screenReaderText + '</span></button>');
		$siteNav.find('.menu-item-has-children > a, .page_item_has_children > a').after(dropdownArrow);
		$siteNav.find('.dropdown-toggle').click( function(e) {
			var _this = $(this);
			e.preventDefault();
			_this.toggleClass('toggled--on').attr('aria-expanded', _this.attr('aria-expanded') === 'false' ? 'true' : 'false');
			_this.next('.children, .sub-menu').slideToggle();
		});

		// Show submenu on hover
		jgtazalea_menu_dropdown();

		// Enable menu toggle
		$menuToggle.click(function(){
			if ( $menuToggle.hasClass( 'toggled--on' ) ) {
				$menuToggle.removeClass('toggled--on').attr('aria-expanded', 'false');
				$('#menu-container').slideUp(200);
			} else {
				$menuToggle.addClass('toggled--on').attr('aria-expanded', 'true');
				$('#menu-container').slideDown(200);
			}
		});

		$(window).bind('resize orientationchange', function() {
			jgtazalea_menu_dropdown();
			if ( $menuToggle.is(':hidden') ) {
				$menuToggle.removeClass('toggled--on').attr('aria-expanded', 'false');
				$('#menu-container').removeAttr('style');
			}
		});

		// Responsive video embeds
		jgtazalea_fitVids_init();

		// Initialize post gallery
		jgtazalea_gallery_init();

		$(document.body).on('post-load', function() {
			jgtazalea_fitVids_init();
			jgtazalea_gallery_init();
		});

	} );

	function jgtazalea_fixed_nav() {
		if ( $(window).scrollTop() > 0 ) {
			$siteNav.addClass('is--scrolled');
		} else {
			$siteNav.removeClass('is--scrolled');
		}
	}

	function jgtazalea_gallery_init() {
		$('.post-gallery').not('.slick-slider').slick({
			arrows : true,
			dots : false,
			fade : true
		});
	}

	function jgtazalea_fitVids_init() {
		$('.hentry').fitVids();
	}

	function jgtazalea_menu_dropdown() {
		var menuItem = $siteNav.find('li');
		$siteNav.find('.sub-menu, .children').removeAttr('style');
		$siteNav.find('.dropdown-toggle').removeClass( 'toggled--on' ).attr('aria-expanded', 'false');
		if ( $menuToggle.is(':hidden') ) {
			menuItem.hover(function(){
				$(this).find('ul:first').stop(true, true).slideDown(100);
			},function(){
				$(this).find('ul:first').stop(true, true).slideUp(100);
			});
		} else {
			menuItem.unbind('mouseenter mouseleave');
			$siteNav.find( '.current-menu-ancestor > .dropdown-toggle, .current_page_ancestor > .dropdown-toggle' ).addClass( 'toggled--on' ).attr('aria-expanded', 'true');
		}
	}

} )( jQuery );