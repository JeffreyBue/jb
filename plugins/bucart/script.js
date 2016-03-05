jQuery(function($){
	
	//Captcha CODE TEXT
	$('#BU_code').focusin(function(){
		if($(this).val() == 'Enter The Code'){
			$(this).val('');
		}
	}).focusout(function(){
		if($(this).val() == ''){
			$(this).val('Enter The Code');
		}
	}); 
	
	/*$('form[name]').each(function(e, v){
		console.log(v.name);
		var data = 'name='+v.name;
		$.post('/wp-content/plugins/bucart/forms.php', data, function(data){
			theInfo = JSON.parse(data);
			console.log(theInfo);
		});
	});
*/	
	
});
