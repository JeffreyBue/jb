// JavaScript Document
jQuery(document).ready(function(){
	
jQuery('#sm .title').css({opacity : 0});	
jQuery('#sm ul li').css({'top' : '0', 'left' : '-550px', 'webkitTransform' : 'rotate(0deg)'})
jQuery('body').css({'opacity' : '0'});
jQuery(window).load(function(){
	jQuery('body').animate({'opacity' : '1'}, 750);
	jQuery('#sm ul img').animate({'rotate' : '3600deg'}, 3250, 'linear');
	
	
	
	
	jQuery('#sm ul li').animate({'top' : '0', 'left' : '0px'}, 1250, 'linear', function(){
		jQuery('#facebook img').stop().animate({'rotate' : '-1'});
		jQuery('#buepics, #linkedin, #google, #myspace, #twitter, #youtube').stop().animate({'left' : '110px'}, 250, 'linear', function(){
			jQuery('#twitter img').stop().animate({'rotate' : '-0'});
			jQuery('#buepics, #linkedin, #google, #myspace, #youtube').stop().animate({'left' : '220px'}, 250, 'linear', function(){
				jQuery('#google img').stop().animate({'rotate' : '-1'});
				jQuery('#buepics, #linkedin, #myspace, #youtube').stop().animate({'left' : '330px'}, 250, 'linear', function(){
					jQuery('#youtube img').stop().animate({'rotate' : '-1'});
					jQuery('#buepics, #linkedin, #myspace').stop().animate({'left' : '440px'}, 250, 'linear', function(){
						jQuery('#myspace img').stop().animate({'rotate' : '-1'});
						jQuery('#buepics, #linkedin').stop().animate({'left' : '550px'}, 250, 'linear', function(){
							jQuery('#linkedin img').stop().animate({'rotate' : '-1'});
							jQuery('#buepics').stop().animate({'left' : '660px'}, 250, 'linear', function(){
								jQuery('#buepics img').stop().animate({'rotate' : '-1'});
								})
							})
						})
					})
				})
			})
		});
});
// SOCIAL MEDIA ICON MOVEMENT
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
	jQuery('span', this).stop().fadeToggle(500, function(){ jQuery(this).css({'opacity' : 1})});	}
);
	
	
});