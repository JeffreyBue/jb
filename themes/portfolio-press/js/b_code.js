jQuery(document).ready(function(){



	jQuery('#fbtwIcon img').css({'top': '-40px'});

	jQuery('#fbtwIcon a').mouseenter(function(){
		jQuery('img', this).stop().animate({'top': '0px'}, 450, 'easeOutBounce');
	});

	jQuery('#fbtwIcon a').mouseleave(function(){
		jQuery('img', this).stop().animate({'top': '-40px'}, 450);
	});	

	
});