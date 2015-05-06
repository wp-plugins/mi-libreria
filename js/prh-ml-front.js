/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)
	Version 1.1
	Date 16/04/2015

	prh-ml-front.js
	---------------------
	injects recommended book list via AJAX wherever required
*/

jQuery(document).ready(function($){

	if($('.prh_ml_container').length) {
		
		// add some more basic furniture into the shell
		$('.prh_ml_container').append('<div class="prh_ml_heading"><strong>Libros recomendados/strong></div><div class="prh_ml_shelf"/>');

		// get the post id from the container		
		var pid=$('.prh_ml_container').data('pid');
		
		// AJAX call to get markup for this post
		$.post(prh_ml_ajax.url, { action: 'prh-ml-get-books-markup', pid: pid }, function(data) {
				
			if(data) {
				
				$('.prh_ml_shelf').append(data.markup);
				
				// add link to Codex if activated in plugin settings
				if(data.showlink=='1') {
					
					$('.prh_ml_container').append('<p class="prh_ml_plugin_link">¿Quieres ofrecer recomendaciones de libros en tu blog o web de WordPress? <a target="_blank" href="https://wordpress.org/plugins/mi-libreria/">Descarga el plugin aquí.</a></p>');
					
				}
								
			}
		
		});
		
	}

});