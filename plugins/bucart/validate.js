jQuery(function($){
	ST_Contact_Form();
});

function ST_Contact_Form(){
    var error_report;
    jQuery('form.BUCART [type="submit"]').live('click', function(e){
		e.preventDefault();
		var f = jQuery(this).parents('form');

		var buValidate;
		if( f.attr('name') ){
			if( f.attr('name').indexOf('BUCART') == 0){
				var buValidate = true;
			}
		}

		jQuery(".BU_ok", f).hide();
        jQuery(".BU_error", f).hide();
 
        // Hide notice message when submit
        error_report = false;

        jQuery("input, select, textarea", f).each(function(i){

			var form_element          = jQuery(this);
			var form_element_value    = jQuery(this).val();
			var form_element_id       = jQuery(this).attr("id");
			var form_element_name     = jQuery(this).attr("name");
			var form_element_class    = jQuery(this).attr("class");
			var form_element_required = jQuery(this).hasClass("required");
			var form_element_type = jQuery(this).attr("type");
			
            // Check email validation
            if(form_element_name == "email"){
                form_element.removeClass("error valid");
				if(!form_element_value.match(/^\w[\w|\.|\-]+@\w[\w|\.|\-]+\.[a-zA-Z]{2,4}$/)){
					form_element.addClass("error");
					error_report = true;
				} else {
					form_element.addClass("valid");
				}
            }

            // Check input required validation
            if(form_element_required && form_element_id != "email"){
                form_element.removeClass("error valid");
                if(form_element_value == ""){
                   form_element.addClass("error");
                    error_report = true;
                } else {
					form_element.addClass("valid");
                }
            }

            // Check captcha
            if(form_element_id == "BU_code"){
                form_element.removeClass("error valid");
                if(form_element_value == "" || form_element_value == "Enter The Code"){
                   form_element.addClass("error");
                    error_report = true;
                } else {
					form_element.addClass("valid");	
                }
            }
			

		});

 		//CHECK REQUIRED RADIO BUTTONS
			//FIND SECTIONS OF RADIO BUTTONS
		var theName = '';
		var radioSec = [];
		var i = 0;
		jQuery('input[type="radio"].required').each(function(e, val){
			if(theName == val.name || theName == ''){
				radioSec[i] = val.name;
			}else{
				i++;
			}
			theName = val.name;
		});
		
			//PARSE THROUGH THE INDIVIDUAL RADIO BUTTONS OF SECTIONS
		var iR = 0;
		jQuery(radioSec).each(function(e, val){
			jQuery('input[name="'+val+'"].required').each(function(e, val){		
				if(this.checked){  
					radioSecReport = false;
				}else{
					jQuery(this).parent().addClass("error");
					radioSecReport = true;
				}
				if(!radioSecReport){
					jQuery(this).parent().removeClass("error");
					jQuery(this).parent().addClass("valid");
					return radioSecReport;
				}
			});
			if(radioSecReport == true){
				iR++;
			}
		});
		
		//TEST IF RADIO BUTTONS HAVE BEEN CHECKED
		if(iR > 0 && error_report == false){
			error_report = true;
		}

		if(error_report == false){
			//alert('hello');
			//If there is a form with an http:// action this submits it after the validation above.
			if( f.attr('action') ){
				console.log('position of http: '+f.attr('action').indexOf('http'));
				console.log(f);
				jQuery(f).submit();
				return;
			}

			if(buValidate == true){
				jQuery(".loading",f).show();
				data = jQuery(f).serialize();
				jQuery.ajax({
					type: 'POST',
					url: '/wp-content/plugins/bucart/validate.php', 
					data: data,
					success: function(data){
						jQuery(".loading",f).hide();
						retData = JSON.parse(data);
						console.log(retData);
						if(retData.val == true){
							jQuery(".loading",f).show();
							jQuery(".BU_ok", f).show();
							console.log('YES COMPLETE');
							if(retData.retUrl != '#'){
								window.location.href = retData.retUrl;
							}
							jQuery(f)[0].reset();
							jQuery('#imgCap', f).attr('src', 'http://www.opencaptcha.com/img/'+retData.img);
							jQuery('#imgCode', f).attr('value', retData.img);
							jQuery('.valid', f).removeClass('valid');
							jQuery(".loading",f).hide();
						}else{
							console.log('NOT COMPLETE');
							jQuery('#BU_code').addClass("error")
							jQuery('#imgCap', f).attr('src', 'http://www.opencaptcha.com/img/'+retData.img);
							jQuery('#imgCode', f).attr('value', retData.img);
							jQuery(".BU_error",f).show();
						}
					},
					async: true
				});
			}else{
				alert('The Form Is Not Set Up Correctly');
			};
        }

    return false;
    });
}