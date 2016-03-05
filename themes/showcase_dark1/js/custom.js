<!--drop down-->
function mainmenu(){
$(" .lavaLamp ul ").css({display: "none"}); // Opera Fix
$(" .lavaLamp li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}

 
 
 $(document).ready(function(){					
	mainmenu();

	<!--pretty photo-->					   
	$("a[rel^='prettyPhoto']").prettyPhoto({theme:'dark_rounded'});


<!--lightbox hover-->	
$(".lightBox img").hover(function(){
		$(this).stop().animate({opacity:0.3},200);
		},function(){
		$(this).stop().animate({opacity:1},200);
		});




	
	<!--news ticker-->
$(function() {
    $('.tickerLink').cycle({
		fx: 'fade',
		cleartype: 1,
		cleartypeNoBg:  1,
		timeout:       4000,
		before: function() { if (window.console) console.log(this.src); }
	});
});
	
	
	
	<!--lava lamp-->
$('.current_page_item').addClass('current');
$('.current-menu-ancestor').addClass('current');
jQuery(function() { jQuery(".lavaLamp").lavaLamp({fx:'swing',speed:400})});
$('.sub-menu').parent().addClass('arrowDown');
$('.sub-menu li ul').parent().removeClass('arrowDown').children('a').addClass('arrowRight');




<!--slider-->

var ie = jQuery.browser.msie;


$(function() {
	if (ie) { 
		    $('#sliderBgWrap').cycle({
        fx:     'fade',
		speed:  'fast',
    	timeout:  8000,
		next:   '#nextSlide', 
    	prev:   '#previousSlide',
        pager:   '#sliderPager',
        pagerAnchorBuilder: function(i) {
	        return '<a href="#">'+(i+1)+'</a>';
	    }
    });

		    $('#slidesWrap').cycle({
        fx:     'none',
		cleartype: 1,
		cleartypeNoBg:  1,
		speed:  'fast',
    	timeout:  8000,
		next:   '#nextSlide', 
    	prev:   '#previousSlide',
        pager:   '#sliderPager',
        pagerAnchorBuilder: function(i) {
	        return $('#sliderPager a:eq('+i+')');
	    }
    });
	}
	else {
		    $('#sliderBgWrap').cycle({
        fx:     'fade',
		speed:  'fast',
    	timeout:  8000,
		sync:          1,
		next:   '#nextSlide', 
    	prev:   '#previousSlide',
        pager:   '#sliderPager',
        pagerAnchorBuilder: function(i) {
	        return '<a href="#">'+(i+1)+'</a>';
	    }
    });

		    $('#slidesWrap').cycle({
        fx:     'fade',
		speed:  'fast',
    	timeout:  8000,
		sync:          1,
		next:   '#nextSlide', 
    	prev:   '#previousSlide',
        pager:   '#sliderPager',
        pagerAnchorBuilder: function(i) {
	        return $('#sliderPager a:eq('+i+')');
	    }
    });
		
			
	}

	
});

	<!--Page slider-->

$(function() {

	    $('.pageSlider').after('<div class="pageSliderNav">').cycle({
		fx:      'fade',
		cleartype: 1,
		cleartypeNoBg:  1,
        speed:  500,
        timeout:  8000,
        pager:  '.pageSliderNav',
        before: function() { if (window.console) console.log(this.src); }
    });
	
});
	
});


	
	



<!--Cufon-->
Cufon.replace('h1')('h2')('h3')('h4')('h5')('h6');

			Cufon('#header h1', {
				color: '-linear-gradient( #eff4f6, #d1d2d2 )'
				
			});
			Cufon('#footer h4', {
				color: '-linear-gradient( #eff4f6, #d1d2d2 )'
				
			});
			Cufon('#right h3', {
				color: '-linear-gradient( #eff4f6, #d1d2d2 )'
				
			});
			Cufon('.slideCopy h1', {
				textShadow: '1px 1px #666'
			});
			Cufon('.promo h3', {
				color: '-linear-gradient( #666666, #000000 )',
				textShadow: '1px 1px #cccccc'
				
			});




<!--form-->

$(function() {
		   
		   

    var paraTag = $('input#submit').parent('p');
    $(paraTag).children('input').remove();
    $(paraTag).append('<button type="submit" name="submit" id="submit" onclick="return false;"><span><em>Submit</em></span></button>');
	

		
		
		$('input#name').blur(validateName);
		$('input#name').keyup(validateName);
		$('input#email').blur(validateEmail);
		$('input#email').keyup(validateEmail);
		$('textarea#comments').blur(validateMessage);
		$('textarea#comments').keyup(validateMessage);
	
	
	function validateName(){  
    //if it's NOT valid  
     if($('input#name').val().length < 3){  
		$('#nameError').text("3 or more characters required");
		return false;
     }  
     //if it's valid  
     else{  
 		$('#nameError').text("");
		return true;
     } 
	}
	
	function validateEmail(){
		//testing regular expression
		var a = $("input#email").val();
		var filter = /^([A-Za-z0-9]{1,}([-_\.&'][A-Za-z0-9]{1,}){0,}){1,}@(([A-Za-z0-9]{1,}[-]{0,1})\.){1,}[A-Za-z]{2,6}$/;
		//if it's valid email
		if(filter.test(a)){
			$('#emailError').text("");
			return true;
		}
		//if it's NOT valid
		else{
			$('#emailError').text("not a valid email address");
			return false;
		}
	}
	
	 function validateMessage(){  
    //it's NOT valid  
     if($('textarea#comments').val().length < 10){  
		$('#commentsError').text("10 or more characters required");
		return false;
     }  
     //it's valid  
     else{  
         $('#commentsError').text("");  
         return true;  
     }  
 } 
	
	


    $('button#submit').click(function() {
									  

		
			
 
    if(validateName() & validateEmail() & validateMessage())  {
		
		 var name = $('input#name').val();
        var email = $('input#email').val();
		var url = $('input#url').val();
        var comments = $('textarea#comments').val();
		
		$('#formAjax').css({visibility: "visible"});
		
		$('button#submit').attr('disabled', 'disabled');
		$('input#name').attr('readonly', 'readonly');
		$('input#email').attr('readonly', 'readonly');
		$('input#url').attr('readonly', 'readonly');
		$('textarea#comments').attr('readonly', 'readonly');
		
		        $.ajax({
            type: 'post',
            url: 'sendEmail.php',
            data: 'name=' + name + '&email=' + email + '&url=' + url + '&comments=' + comments,

            success: function(results) {

				$('button#submit').removeAttr("disabled");
				$('input#name').removeAttr("readonly");
				$('input#email').removeAttr("readonly");
				$('input#url').removeAttr("readonly");
				$('textarea#comments').removeAttr("readonly");
				
                $('#formAjax').css({visibility: "hidden"});
				
				
				if(results == 'OK') // Message Sent? Show the 'Thank You' message and hide the form
				{
					$('#formSuccess').css({display: "block"});
					$('#commentform').slideUp(1000);
				}
				else
				{
					$('#response').html(results);
				}
                
            }
        }); // end ajax
		
		}
          
     else { 
	 return false;
        
		}  
  
		

    });
});


