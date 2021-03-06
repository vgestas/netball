jQuery(document).ready(function ($) {

	"use strict";

	// Mobile search
	$('#top-search i.search-toggle').on('click', function (e) {
		e.preventDefault();
		$('.show-search').slideToggle('fast');
		$('#top-search i.search-toggle').toggleClass('identifier');
	});

	$('nav.paging-navigation a.prev').append('<i class="fa fa-angle-double-left" aria-hidden="true"></i>');
	$('nav.paging-navigation a.next').append('<i class="fa fa-angle-double-right" aria-hidden="true"></i>');
	$('nav.post-navigation > div.nav-links').addClass('pager');

	// Menu
	jQuery('#site-navigation .menu').slicknav({
		prependTo: '.menu-mobile',
		label: '',
		allowParentLinks: true
	});

	$('header#masthead div#background-img-container').on('click', function (e) {
		e.preventDefault();
		window.location.href = $("header#masthead a#home-ref").attr('href');
	})

	$(window).scroll(function (e) {
		const $menu = $("div.menu-wrapper")
		if ($(this).scrollTop() > 214) {
			$menu.addClass("fixed-position");
		} else {
			$menu.removeClass("fixed-position");
		}

	});
});