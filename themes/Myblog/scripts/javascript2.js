// JavaScript Document
jQuery(document).ready(function(){
	
	jQuery('body').css({'opacity' : '0'});
	jQuery(window).load(function(){
		jQuery('body').animate({'opacity' : '1'}, 750);
	});
	
jQuery('#sm .title').css({opacity : 0});	

jQuery('#sm ul img').animate({'rotate' : '1480deg'}, 1000, 'linear');

jQuery('#sm ul li').mouseenter(function(){
	jQuery('span', this).stop().animate({'opacity' : '1'}, 450);
	jQuery('img', this).stop().animate({'top' : '-45px', 'rotate' : '0'}, 500, 'easeOutBounce');
	});

		
jQuery('#sm ul li').mouseleave(function(){
			jQuery('span', this).stop().animate({'opacity' : '0'}, 450);
			jQuery('img', this).stop().animate({'top' : '0', 'rotate' : '0'}, 500);
			});
	
	
// SHIMMER
jQuery('.btn').mouseenter(function(){
	jQuery('.shimmerPhoto', this).stop().css({'left' : '-600px', 'display' : 'block'});
	jQuery('.shimmerPhoto', this).animate({'left' : '300px'}, 1000, function(){
		jQuery('.shimmerPhoto', this).css({'display' : 'none'});
		});
	});	

// LOGINOUT HIDE
jQuery('#logInLogOut span').hide();
jQuery('#logInLogOut').hover(function(){
	jQuery('span', this).stop().fadeToggle(500, function(){ jQuery(this).css({'opacity' : 1})});
	}
);
	
});