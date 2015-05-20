/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)

	prh-ml-metabox.js
	---------------------
	JS for the admin metabox - mostly AJAX calls to update settings + display	
*/

jQuery(document).ready(function($){

	// create an object for storing timeouts
	$.prh_ml = new Object();

	// display settings button - allows override of default settings
	$('.prh_ml_display input[type=button]').click(function(){
	
		// deactivate button
		$(this).attr('disabled','disabled');
	
		// clear existing status info
		$(this).siblings('.prh_ml_spinner').remove();
		$(this).siblings('.prh_ml_status').remove();

		// add spinner
		$('<span class="prh_ml_spinner"></span>').insertBefore(this);
		
		// check which setting has been exposed
		if($('input.prh_ml_manual_override').length) {
			
			var setting='manual_override';
			var value;
			$('input.prh_ml_manual_override').is(':checked') ? value=1 : value=0;
			
		} else if($('input.prh_ml_auto_override').length) {
		
			var setting='auto_override';
			var value;
			$('input.prh_ml_auto_override').is(':checked') ? value=1 : value=0;
			
		}
		
		// ajax request
		$.post(prh_ml_ajax.url, { action: 'prh-ml-metabox-save-display', pid: prh_ml_ajax.pid, setting: setting, value: value }, function(data) {

			// activate button
			$('.prh_ml_display input[type=button]').removeAttr('disabled');

			// hide spinner
			$('.prh_ml_display .prh_ml_spinner').remove();
	
			// act if data received
			if(data) {
				
				// status message
				$('<span class="prh_ml_status prh_ml_success">&#10003;</span>').insertBefore($('.prh_ml_display input[type=button]'));
				
				// set a timeout, clearing any existing one first
				clearTimeout($.prh_ml.to_display);
				$.prh_ml.to_display=setTimeout(function(){ $('.prh_ml_display .prh_ml_status').remove() },5000);
				
			} else {
				
				// something went wrong
				$('<span class="prh_ml_status prh_ml_failure">¡error!</span>').insertBefore($('.prh_ml_display input[type=button]'));
				clearTimeout($.prh_ml.to_display);
				$.prh_ml.to_display=setTimeout(function(){ $('.prh_ml_display .prh_ml_status').remove() },5000);
				
			}
	
		});	
	
	});
	
	// change keywords button - requests new books based on new keywords
	$('.prh_ml_keywords input[type=button]').click(function(){
	
		// deactivate button
		$(this).attr('disabled','disabled');

		// clear existing status info
		$(this).siblings('.prh_ml_spinner').remove();
		$(this).siblings('.prh_ml_status').remove();
		
		// add spinner
		$('<span class="prh_ml_spinner"></span>').insertBefore(this);
		
		// build array of keywords
		var keywords=[];
		$('.prh_ml_keywords input[type=text]').each(function(index){
			keywords.push($.trim($(this).val()));
		});
		
		// ajax request
		$.post(prh_ml_ajax.url, { action: 'prh-ml-metabox-get-books', pid: prh_ml_ajax.pid, keywords: keywords }, function(data) {
			
			// activate button
			$('.prh_ml_keywords input[type=button]').removeAttr('disabled');

			// release fixed height of containing box
			$('.prh_ml_keywords').closest('.inside').css('height','auto');

			// remove spinner
			$('.prh_ml_keywords .prh_ml_spinner').remove();
			
			// act if data received
			if(data) {
			
				// remove existing books
				$('.prh_ml_selection .grid').empty();
				
				// repopulate keywords (might have been sanitised so useful)
				$('.prh_ml_keywords input[type=text]').val('');
				var c=0;
				$.each(data.keywords,function(key,value) {
					
					// put in keywords
					$('.prh_ml_keywords input[type=text]:eq('+c+')').val(value);
					c++;
					
				});
								
				// books
				$.each(data.books,function(key,item) {
					
					$('<div class="book"><img src="'+item.portada+'"/><p class="title">'+item.autor+'<br/><em>'+item.titulo+'</em></p><input data-isbn="' + item.isbn + '" type="checkbox" checked class="select" /></div>').appendTo('.prh_ml_selection .grid');
					
				});
								
				// activate interactivity again
				prh_ml_activate_books();
				
				// status message
				$('<span class="prh_ml_status prh_ml_success">&#10003;</span>').insertBefore($('.prh_ml_keywords input[type=button]'));

				// set a timeout, clearing any existing one first
				clearTimeout($.prh_ml.to_keywords);
				$.prh_ml.to_keywords=setTimeout(function(){ $('.prh_ml_keywords .prh_ml_status').remove() },5000);
				
			} else {
				
				// something went wrong
				$('<span class="prh_ml_status prh_ml_failure">¡error!</span>').insertBefore($('.prh_ml_keywords input[type=button]'));
				clearTimeout($.prh_ml.to_keywords);
				$.prh_ml.to_keywords=setTimeout(function(){ $('.prh_ml_keywords .prh_ml_status').remove() },5000);
				
			}
			
		});
	
	});
	
	// detect enter key in any keyword field, trigger reload and prevent submission of main page form
	$('.prh_ml_keywords input[type=text]').keypress(function(e){
	
		if(e.which==13) {
			
			$(this).closest('.prh_ml_keywords').find('input[type=button]').click();
			e.preventDefault();
			return false;
		}
	
	});

	// reset button - requests re-analysis of text and new books
	$('.prh_ml_reset input[type=button]').click(function(){
	
		// deactivate button
		$(this).attr('disabled','disabled');

		// clear existing status info
		$(this).siblings('.prh_ml_spinner').remove();
		$(this).siblings('.prh_ml_status').remove();

		// add spinner
		$('<span class="prh_ml_spinner"></span>').insertBefore(this);
				
		// ajax request
		$.post(prh_ml_ajax.url, { action: 'prh-ml-metabox-get-books', pid: prh_ml_ajax.pid }, function(data) {

			// activate button
			$('.prh_ml_reset input[type=button]').removeAttr('disabled');

			// release fixed height of containing box
			$('.prh_ml_reset').closest('.inside').css('height','auto');

			// remove spinner
			$('.prh_ml_reset .prh_ml_spinner').remove();
			
			// act if data received
			if(data) {

				// clear existing keywords + books			
				$('.prh_ml_keywords input[type=text]').val('');
				$('.prh_ml_selection .grid').empty();
				
				// repopulate keywords
				var c=0;
				$.each(data.keywords,function(key,value) {
					
					// put in keywords
					$('.prh_ml_keywords input[type=text]:eq('+c+')').val(value);
					c++;
					
				});
				
				// books
				$.each(data.books,function(key,item) {
					
					$('<div class="book"><img src="'+item.portada+'"/><p class="title">'+item.autor+'<br/><em>'+item.titulo+'</em></p><input data-isbn="' + item.isbn + '" type="checkbox" checked class="select" /></div>').appendTo('.prh_ml_selection .grid');
					
				});
				
				// activate interactivity again
				prh_ml_activate_books();
				
				// status message
				$('<span class="prh_ml_status prh_ml_success">&#10003;</span>').insertBefore($('.prh_ml_reset input[type=button]'));
				
				// set a timeout, clearing any existing one first
				clearTimeout($.prh_ml.to_reset);
				$.prh_ml.to_reset=setTimeout(function(){ $('.prh_ml_reset .prh_ml_status').remove() },10000);
				
			} else {
				
				// something went wrong
				$('<span class="prh_ml_status prh_ml_failure">¡error!</span>').insertBefore($('.prh_ml_reset input[type=button]'));
				clearTimeout($.prh_ml.to_reset);
				$.prh_ml.to_reset=setTimeout(function(){ $('.prh_ml_reset .prh_ml_status').remove() },10000);
				
			}
			
		});
		
	});
	
	// if there are no books showing, there are either none saved, or the options have been saved more recently, so analyse now
	if($('.prh_ml_selection').length && $('.prh_ml_selection .grid').children().length==0) {
		$('.prh_ml_reset input[type=button]').click();
	}
	
	// save selection - allows users to exclude books
	$('.prh_ml_selection input[type=button]').click(function(){
	
		// deactivate button
		$(this).attr('disabled','disabled');
	
		// clear existing status info
		$(this).siblings('.prh_ml_spinner').remove();
		$(this).siblings('.prh_ml_status').remove();

		// add spinner
		$('<span class="prh_ml_spinner"></span>').insertBefore(this);
		
		// build list of exclusions
		var exclusions=[];
		$('.prh_ml_selection input[type=checkbox]:not(:checked)').each(function(){
			
			exclusions.push($(this).data('isbn'));
			
		});
		
		// ajax request
		$.post(prh_ml_ajax.url, { action: 'prh-ml-metabox-save-selection',  pid: prh_ml_ajax.pid, exclusions: exclusions }, function(data) {

			// activate button
			$('.prh_ml_selection input[type=button]').removeAttr('disabled');

			// remove spinner
			$('.prh_ml_selection .prh_ml_spinner').remove();

			// act if data received
			if(data) {
				
				// status message
				$('<span class="prh_ml_status prh_ml_success">&#10003;</span>').insertBefore($('.prh_ml_selection input[type=button]'));
				
				// set a timeout, clearing any existing one first
				clearTimeout($.prh_ml.to_selection);
				$.prh_ml.to_selection=setTimeout(function(){ $('.prh_ml_selection .prh_ml_status').remove() },5000);
				
			} else {
				
				// something went wrong
				$('<span class="prh_ml_status prh_ml_failure">¡error!</span>').insertBefore($('.prh_ml_selection input[type=button]')).fadeOut(5000);
				clearTimeout($.prh_ml.to_selection);
				$.prh_ml.to_selection=setTimeout(function(){ $('.prh_ml_selection .prh_ml_status').remove() },5000);
				
			}
			
		});
		
	});
	
	// wrap book interaction code in a function because it needs to be called again whenever books are reloaded	
	function prh_ml_activate_books() {
			
		// make click on any book activate its checkbox
		$('.prh_ml_selection .book').click(function(){
			 
			$(this).find('input[type=checkbox]').click();
			
		});
		
		// make sure a click in the box doesn't bubble up + fire twice
		$('.prh_ml_selection .book input[type=checkbox]').click(function(e){
	
			e.stopPropagation();
		
		});
	
	}
	
	// run it once now
	prh_ml_activate_books();
	
});