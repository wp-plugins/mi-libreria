/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)

	prh-ml-options.js
	---------------------
	options screen interactions	
*/

jQuery(document).ready(function($){

	// on changing country, change list of topics and shops
	$('#prh_ml_country').change(function(){
		
		// get options available
		var $options=$('#prh_ml_topic').data('options')[$(this).val()];
		
		// only act if the country has data among the options
		if($options.length) {
			
			// empty initial select
			$('#prh_ml_topic').empty();
			
			// cycle through and create relevant markup
			$.each($options,function(id,data){
				
				$('#prh_ml_topic').append('<option value="'+data.id+'">' + data.tematica_web + '</option>');
				
			});
			
		}
		
	});

	// on changing shop, check if it has an affiliate scheme
	$('#prh_ml_shop').change(function(){
		
		// if it has affiliate scheme enable otherwise disable
		if($(this).find('option:selected').data('has-affiliates')==1) {	
			$('#prh_ml_code').removeAttr('disabled'); 
		} else { 
			// empty affiliate code
			$('#prh_ml_code').val('');
			$('#prh_ml_code').attr('disabled','disabled');
		}
		
	});
	
	// on changing format, hide any invalid shops
	$('#prh_ml_formats').change(function(){

		var format=$(this).find('option:selected').val();
		if(format=='S') { 
			$('#prh_ml_shop option').show().removeAttr('selected');
			$('#prh_ml_shop option.paper').hide();
			$('#prh_ml_shop option:visible:first').attr('selected','selected');
		} else if(format=='N') { 
			$('#prh_ml_shop option').show().removeAttr('selected');
			$('#prh_ml_shop option.digital').hide();
			$('#prh_ml_shop option:visible:first').attr('selected','selected');
		} else {
			$('#prh_ml_shop option').show();
			$('#prh_ml_shop option:first').attr('selected','selected');
		}
	
		// fire shop change event (enables / disables affiliate code)		
		$('#prh_ml_shop').change();
		
	});
	
	// on load, make sure shop options match chosen format
	var format=$('#prh_ml_formats').find('option:selected').val();
	if(format=='S') { /* digital only */
		$('#prh_ml_shop option').show();
		$('#prh_ml_shop option.paper').hide();
	} else if(format=='N') {  /* ebooks only */
		$('#prh_ml_shop option').show();
		$('#prh_ml_shop option.paper').hide();
	} else { /* all */
		$('#prh_ml_shop option').show();
	}

	// fire shop change event once now to enable / disable affiliate code box according to current shop
	$('#prh_ml_shop').change();
	
});