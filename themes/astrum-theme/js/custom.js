﻿/* ----------------- Start Document ----------------- */
/*jshint -W065 */

(function($){
	"use strict";
	$(document).ready(function(){

		/* global astrum */

/*----------------------------------------------------*/
/*	Sticky Header
/*----------------------------------------------------*/

	var stickyheader = astrum.sticky; // set false to disable or true to enable sticky header

	if ( $.browser.msie && $.browser.version == 8.0 ){
		stickyheader = 'disable';
	}
	var searchform = $('#search-form'),
	logo = $('#logo'),
	header = $('#header'),
	menu = $('#header .menu ul > li > a');

	var smallHeightSet = 70,   // set compact header height
	durationAnim = 200, // animation speed
	defaultHeight, defSearchformMarginTop,defLogoMarginTop, defMenuPaddingTop, defMenuPaddingBottom = 0, small_height;


	defaultHeight = parseInt(header.css('height'));
	defSearchformMarginTop = parseInt(searchform.css('margin-top'));
	defLogoMarginTop = parseInt(logo.css('margin-top'));
	defMenuPaddingTop = defaultHeight/2-10;  //parseInt(menu.css('padding-top')),
	defMenuPaddingBottom = defaultHeight/2-10;//parseInt(menu.css('padding-bottom')),
	small_height = defaultHeight - smallHeightSet;
	function stickyPosition(val, body, header) {
		$(header).animate({ marginTop: val });
		$(body).animate({ paddingTop: val });
	}

	function stickymenu(){

		var offset = $(window).scrollTop(), // Get how much of the window is scrolled
		header = $('#header'),
		menuPaddingTop,
		menuPaddingBottom,
		logoMarginTop,
		half_height = small_height/2;

		menuPaddingTop = defMenuPaddingTop - half_height;
		menuPaddingBottom = defMenuPaddingBottom - half_height;
		logoMarginTop = defLogoMarginTop - half_height - 1 ;

		if ($(window).width() > astrum.breakpoint) {
		if (offset > 60) { // if it is over 60px (the initial width)
			$('#blogdesc').fadeOut();
			if (!header.hasClass('compact')) {
				header.animate({
					height: defaultHeight-small_height
				}, {
					queue: false,
					duration: durationAnim,
					complete: function () {
						header.addClass('compact').css("overflow", "visible");
					}
				});
				searchform.animate({
					marginTop: menuPaddingTop-10,
				}, {
					queue: false,
					duration: durationAnim
				});

				logo.animate({
					marginTop: logoMarginTop
				}, {
					queue: false,
					duration: durationAnim
				});
				$('.cart_products').animate({
					top: defaultHeight-small_height
				}, {
					queue: false,
					duration: durationAnim
				});
				$('#astrum_header_cart').animate({
					paddingTop: menuPaddingTop-10,
				}, {
					queue: false,
					duration: durationAnim
				});
				menu.animate({
					paddingTop: menuPaddingTop,
					paddingBottom: menuPaddingBottom,
					margin:0
				}, {
					queue: false,
					duration: durationAnim
				});
			}
		} else if (offset > -1 && offset < 60) {
			$('#blogdesc').fadeIn();
			header.animate({
				height: defaultHeight,
			}, {
				queue: false,
				duration: durationAnim,
				complete: function () {
					header.removeClass('compact').css("overflow", "visible");
				}
			});
			searchform.animate({
				marginTop: defMenuPaddingTop-10,
			}, {
				queue: false,
				duration: durationAnim
			});
			logo.stop().animate({
				marginTop: defLogoMarginTop
			}, {
				queue: false,
				duration: durationAnim
			});
			$('.cart_products').animate({
				top: defaultHeight
			}, {
				queue: false,
				duration: durationAnim
			});
			$('#astrum_header_cart').animate({
				paddingTop: defMenuPaddingTop-10,
			}, {
				queue: false,
				duration: durationAnim
			});
			menu.animate({
				paddingTop: defMenuPaddingTop,
				paddingBottom: defMenuPaddingBottom,
			}, {
				queue: false,
				duration: durationAnim
			});
		}
	}
}

		if(stickyheader === "enable") {

			if ($(window).width() > astrum.breakpoint) {
				$("#header").css({ position: "fixed"});
			} else {
				$("#header").css({ position: "relative"});
			}

			var stickyValue = defaultHeight;

			stickyPosition(-stickyValue, null, "#header");
			stickyPosition(stickyValue, "body", null);
			stickymenu();
			$(window).scroll(function () { stickymenu(); });

		// sticky header reset for mobile
		$(window).resize(function (){
			var winWidth = $(window).width();
			if(winWidth < astrum.breakpoint) {
				$('#logo').css('marginTop','21px');
				$('#header').css('height','79px').removeClass('compact');
				$("#header").css({ position: "static"});
				$('#header .menu ul > li > a').css({
					'paddingTop' : ' ',
					'paddingBottom' : ' ',
				});
				$('#search-form').css('marginTop','');
				stickyPosition(null, null, "#header");
				stickyPosition(null, "body", null);
			} else {
				stickymenu();
				stickyPosition(-stickyValue, null, "#header");
				stickyPosition(stickyValue, "body", null);
				$("#header").css({ position: "fixed" });
			}
		});
	}


	/*----------------------------------------------------*/
/*	Navigation
/*----------------------------------------------------*/

$('nav ul').superfish({
		delay:       300,                              // one second delay on mouseout
		animation:   {opacity:'show',height:'show'},   // fade-in and slide-down animation
		speed:       200,                              // animation speed
		speedOut:    50                                // out animation speed
	});


/*----------------------------------------------------*/
/*	Ajax Portfolio
/*----------------------------------------------------*/

function load_pf($id) {
	var pfwrapp = $('#portfolio_ajax'),
	loader = $('#astrum-ajax-loader');

	loader.fadeIn();

	$.ajax({
		url: astrum.ajaxurl,
		type:'POST',
		data: {
			action : 'astrum_ajax_portfolio',
			nonce : astrum.nonce,
			post: $id
		},
		success: function(data){
			if(data) {
				pfwrapp.slideUp(500,function(){
					$('.added_item').hide();
					pfwrapp.append(data).slideDown(500, function(){
						loader.fadeOut();
						$('.ajaxarrows').fadeIn();
						setTimeout(function() {
							astrumfn.flexinit();
						}, 500);
					});
				});
			} else {
				loader.fadeOut();
			}
		}
	});
}


$(".portfolio-item-ajax").click(function(e) {
	e.preventDefault();
	var pfwrapp = $('#portfolio_ajax'),
	postid = $(this).attr('id').substring(5);

		//if item was already added, just show it
		if($('#portfolio_ajax #post-'+postid).length>0) {
			pfwrapp.slideUp(500,function(){
				$('.added_item').hide();
				//pfwrapp.css({ display: 'none' })
				$('#portfolio_ajax #post-'+postid).show();
				pfwrapp.slideDown().data("current-id", postid);
				pfwrapp.parent().parent().fadeIn();
			});
		} else {
		//nah, we need to load it.
		load_pf(postid);
		pfwrapp.data("current-id", postid);

	}
	$('.ajaxarrows').removeClass('disabled');
});

$('#portfolio_ajax_wrapper .close').click(function(e){
	e.preventDefault();
	var pfwrapp = $('#portfolio_ajax');
	pfwrapp.slideUp(500,function(){
		$('.added_item').hide();
	});
});

$("#portfolio_ajax_wrapper .ajaxarrows").click(function(e){
	e.preventDefault();
	var postid = $('#portfolio_ajax').data("current-id"),
	side, ajax_action,
	pfwrapp = $('#portfolio_ajax');

	$('.ajaxarrows').removeClass('active'); $(this).addClass('active');
	if($(this).hasClass("rightarrow")) {
		side = '.rightarrow';
	} else {
		side = '.lefttarrow';
	}

	if(postid === 0) {
		if(side === '.rightarrow') {
			$('.rightarrow').fadeIn();
		} else {
			$('.leftarrow').fadeIn();
		}
	} else {
		$('.ajaxarrows').removeClass('disabled');
		if(side === '.rightarrow') {
			ajax_action = 'astrum_get_prev_post_id';
		} else {
			ajax_action = 'astrum_get_next_post_id';
		}

		$.ajax({
			url: astrum.ajaxurl,
			type:'POST',
			data: {
				action : ajax_action,
				nonce : astrum.nonce,
				post: postid
			},
			success: function(data){
				if(data === 0){
					if(side === '.rightarrow') {
						$('.rightarrow').addClass('disabled');
					} else {
						$('.leftarrow').addClass('disabled');
					}
				} else {
					if($('#portfolio_ajax #post-'+data).length>0) {
						pfwrapp.slideUp(500,function(){
							$('.added_item').hide();
							pfwrapp.css({ display: 'none' });
							$('#portfolio_ajax #post-'+data).show();
							pfwrapp.slideDown().data("current-id", data);
						});
					} else {
						load_pf(data);
						pfwrapp.data("current-id", data);
					}
				}
			}
		});
	}
});


/*----------------------------------------------------*/
/*	Mobile Navigation
/*----------------------------------------------------*/

var jPanelMenu = $.jPanelMenu({
			menu: '#responsive',
			animated: false,
			keyboardShortcuts: true
		});
		jPanelMenu.on();

$(document).on('click',jPanelMenu.menu + ' li a',function(e){
	if ( jPanelMenu.isOpen() && $(e.target).attr('href').substring(0,1) === '#' ) { jPanelMenu.close(); }
});

$(document).on('touchend','.menu-trigger',function(e){
	jPanelMenu.triggerMenu();
	e.preventDefault();
	return false;
});

// Removes SuperFish Styles
$('#jPanelMenu-menu').removeClass('sf-menu');
$('#jPanelMenu-menu li ul').removeAttr('style');




/*----------------------------------------------------*/
/*	Mobile Search
/*----------------------------------------------------*/

$('.search-trigger').click(function(){
	if($('#menu-search').is(":visible")){
		$('.menu-trigger,#logo').show();
		$('#menu-search').hide();
		$('.search-trigger .icon-remove').removeClass('icon-remove').addClass('icon-search');
	} else {
		$('.menu-trigger, #logo').hide();
		$('#menu-search').show();
		$('.search-trigger .icon-search').removeClass('icon-search').addClass('icon-remove');
	}
});

$(window).resize(function (){
	var winWidth = $(window).width();
	if(winWidth>astrum.breakpoint) {
		jPanelMenu.close();
		$('.menu-trigger, #logo').show();
		$('#menu-search').hide();
		$('.search-trigger .icon-remove').removeClass('icon-remove').addClass('icon-search');
	}
});

$('#astrum_header_cart .cart_contents').click(function(){
	var prod = $('.cart_products');
	if(prod.hasClass("visible")){
		prod.fadeOut().removeClass('visible');
	} else {
		prod.fadeIn().addClass('visible');
	}
});

$('body').on('added_to_cart',function() {
	$('.cart_products').fadeIn().addClass('visible');
});

/*----------------------------------------------------*/
/*	ShowBiz Carousel
/*----------------------------------------------------*/

function is_mobile() {
	var agents = ['android', 'webos', 'iphone', 'ipad', 'blackberry','Android', 'webos', ,'iPod', 'iPhone', 'iPad', 'Blackberry', 'BlackBerry'];
	var ismobile=false;
	for(var i in agents) {
		if (navigator.userAgent.split(agents[i]).length>1) {
			ismobile = true;
		}
	}
	return ismobile;
}

$('.recent-work').showbizpro({
	dragAndScroll: (is_mobile() ? "on" : "off"),
	visibleElementsArray:[4,4,3,1],
	carousel:"off",
	entrySizeOffset:0,
	allEntryAtOnce:"off"
});

$('.our-clients-cont').showbizpro({
	dragAndScroll:"off",
	visibleElementsArray:[5,4,3,1],
	carousel:"off",
	entrySizeOffset:0,
	allEntryAtOnce:"off"
});

$('.testimonials_wrap').showbizpro({
	dragAndScroll:"off",
	visibleElementsArray:[1,1,1,1],
	carousel:"off",
	entrySizeOffset:0,
	allEntryAtOnce:"off"
});

$('.happy-clients').showbizpro({
	dragAndScroll:"off",
	visibleElementsArray:[1,1,1,1],
	carousel:"off",
	entrySizeOffset:0,
	allEntryAtOnce:"off"
});

$('.team').showbizpro({
	dragAndScroll:"off",
	visibleElementsArray:[3,3,3,3],
	carousel:"off",
	entrySizeOffset:0,
	allEntryAtOnce:"off"
});

$('.products-thumbs').showbizpro({
	dragAndScroll:"on",
	visibleElementsArray:[3,3,3,3],
	carousel:"on",
	entrySizeOffset:0,
	allEntryAtOnce:"off"
});



/*----------------------------------------------------*/
/*	Hover Overlay
/*----------------------------------------------------*/

$(".media, li.product").hover(function () {
	$(this).find(".hovercover").stop().fadeTo(200, 1);
	$(this).find(".on-hover").stop().fadeTo(200, 1, 'easeOutQuad');
	$(this).find(".hovericon").stop().animate({'top' : '50%', 'opacity' : 1}, 250, 'easeOutBack');
},function () {
	$(this).find(".hovercover").stop().fadeTo(200, 0);
	$(this).find(".on-hover").stop().fadeTo(200, 0, 'easeOutQuad');
	$(this).find(".hovericon").stop().animate({'top' : '65%', 'opacity' : 0}, 150, 'easeOutSine');
});

/*----------------------------------------------------*/
/*	Pricing table
/*----------------------------------------------------*/

$('.plan-currency').each(function() {
	var width = $(this).width();
	$(this).css({
		marginLeft: -width-5
	});
});


/*----------------------------------------------------*/
/*	Tooltips
/*----------------------------------------------------*/

$(".tooltip.top").tipTip({
	defaultPosition: "top"
});

$(".tooltip.bottom").tipTip({
	defaultPosition: "bottom"
});

$(".tooltip.left").tipTip({
	defaultPosition: "left"
});

$(".tooltip.right").tipTip({
	defaultPosition: "right"
});


/*----------------------------------------------------*/
/*	Isotope Portfolio Filter
/*----------------------------------------------------*/

$(window).load(function(){
	$('#portfolio-wrapper').isotope({
		itemSelector : '.portfolio-item',
		layoutMode : 'fitRows'
	});
	$('#filters a.selected').trigger("click");
});
$('#filters a').click(function(e){
	e.preventDefault();

	var selector = $(this).attr('data-option-value');
	$('#portfolio-wrapper').isotope({ filter: selector });

	$(this).parents('ul').find('a').removeClass('selected');
	$(this).addClass('selected');
});



var $Filter = $('#filters');
var FilterTimeOut;
$Filter.find('ul li:first').addClass('active');
$Filter.find('ul li:not(.active)').hide();
$Filter.hover(function(){
	clearTimeout(FilterTimeOut);
	if( $(window).width() < 959 )
	{
		return;
	}
	FilterTimeOut=setTimeout(function(){ $Filter.find('ul li:not(.active)').stop(true, true).animate({width: 'show' }, 250, 'swing'); }, 100);
},function(){
	if( $(window).width() < 959 )
	{
		return;
	}
	clearTimeout(FilterTimeOut);
	FilterTimeOut=setTimeout(function(){ $Filter.find('ul li:not(.active)').stop(true, true).animate({width: 'hide' }, 250, 'swing'); }, 100);
});
if( $(window).width() < 959 )
{
	$Filter.find('ul li:not(.active)').show();
}
else
{
	$Filter.find('ul li:not(.active)').hide();
}
$(window).resize(function() {
	if( $(window).width() < 959 )
	{
		$Filter.find('ul li:not(.active)').show();
	}
	else
	{
		$Filter.find('ul li:not(.active)').hide();
	}
});

$Filter.find('a').click(function(){
	$Filter.find('ul li').not($(this)).removeClass('active');
	$(this).parent('li').addClass('active');
});

$(window).load(function(){
	$('ul.products').isotope({
		itemSelector : '.product',
		layoutMode : 'fitRows'
	});
	$('#filters a.selected').trigger("click");
});


/*----------------------------------------------------*/
/*	FlexSlider
/*----------------------------------------------------*/
var astrumfn = {
	flexinit: function() {
		$('.flexslider').flexslider({
			animation: astrum.flexanimationtype,
			controlNav: false,
			slideshowSpeed: astrum.flexslidespeed,
			animationSpeed: astrum.flexanimspeed,
			smoothHeight: true
		});
	}
};
$(window).load(function() {
	astrumfn.flexinit();
});



/*----------------------------------------------------*/
/*	Magnific Popup
/*----------------------------------------------------*/

$('.mfp-gallery').magnificPopup({
	type: 'image',
	fixedContentPos: true,
	fixedBgPos: true,
	overflowY: 'auto',
	closeBtnInside: true,
	preloader: true,
	removalDelay: 0,
	mainClass: 'mfp-fade',
	gallery:{enabled:true},
	callbacks: {
		buildControls: function() {
			this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
		}
	}
});

$('.mfp-gallery2').magnificPopup({
	type: 'image',
	fixedContentPos: true,
	fixedBgPos: true,
	overflowY: 'auto',
	closeBtnInside: true,
	preloader: true,
	removalDelay: 0,
	mainClass: 'mfp-fade',
	gallery:{enabled:true},
	callbacks: {
		buildControls: function() {
			this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
		}
	}
});

$('.mfp-image').magnificPopup({
	type: 'image',
	closeOnContentClick: true,
	mainClass: 'mfp-fade',
	image: {
		verticalFit: true
	}
});

$('.mfp-youtube, .mfp-vimeo, .mfp-gmaps').magnificPopup({
	disableOn: 700,
	type: 'iframe',
	mainClass: 'mfp-fade',
	removalDelay: 0,
	preloader: false,
	fixedContentPos: false
});


function adjustrevoarrows() {
	var leftarrow = $('.tp-bullets .tp-leftarrow'),
	rightarrow = $('.tp-bullets .tp-rightarrow'),
	rev_height = $('.slider').outerHeight(true),
	page_width = $('.container').width(),
	rev_height_parse = parseInt(rev_height);
	var toph = Math.floor((rev_height_parse-95)/2);
	rightarrow.css({
		bottom: toph,
		left: page_width/2-59
	});
	leftarrow.css({
		bottom: toph,
		right: page_width/2-59
	});
}
function hiderevoarrows() {
	var winWidth = $(window).width(),
	leftarrow = $('.tp-bullets .tp-leftarrow'),
	rightarrow = $('.tp-bullets .tp-rightarrow');
	if(winWidth < 768) {
		rightarrow.fadeOut();
		leftarrow.fadeOut();
	} else {
		rightarrow.fadeIn();
		leftarrow.fadeIn();
	}
}
setTimeout(function(){ adjustrevoarrows(); hiderevoarrows(); },2000);
$(window).resize(function() { adjustrevoarrows(); hiderevoarrows(); });


/*----------------------------------------------------*/
/*	Skill Bars Animation
/*----------------------------------------------------*/

if($('#skillzz').length !== 0){
	var skillbar_active = false;
	$('.skill-bar-value').hide();

	if($(window).scrollTop() === 0 && isScrolledIntoView($('#skillzz')) === true){
		skillbarActive();
		skillbar_active = true;
	}
	else if(isScrolledIntoView($('#skillzz')) === true){
		skillbarActive();
		skillbar_active = true;
	}
	$(window).bind('scroll', function(){
		if(skillbar_active === false && isScrolledIntoView($('#skillzz')) === true ){
			skillbarActive();
			skillbar_active = true;
		}
	});
}

function isScrolledIntoView(elem) {
	var docViewTop = $(window).scrollTop();
	var docViewBottom = docViewTop + $(window).height();

	var elemTop = $(elem).offset().top;
	var elemBottom = elemTop + $(elem).height();

	return ((elemBottom <= (docViewBottom + $(elem).height())) && (elemTop >= (docViewTop - $(elem).height())));
}

function skillbarActive(){
	setTimeout(function(){

		$('.skill-bar-value').each(function() {
			$(this)
			.data("origWidth", $(this)[0].style.width)
			.css('width','1%').show();
			$(this)
			.animate({
				width: $(this).data("origWidth")
			}, 1200);
		});

		$('.skill-bar-value .dot').each(function() {
			var me = $(this);
			var perc = me.attr("data-percentage");

			var current_perc = 0;

			var progress = setInterval(function() {
				if (current_perc>=perc) {
					clearInterval(progress);
				} else {
					current_perc +=1;
					me.text((current_perc)+'%');
				}
			}, 10);
		});
	}, 10);}

  /* ------------------ End Document ------------------ */
});

})(this.jQuery);
