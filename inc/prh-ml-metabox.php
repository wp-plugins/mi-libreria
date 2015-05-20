<?php

/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)

	prh-ml-metabox.php
	---------------------
	metabox for configuring keywords + books
*/

// only add meta box if general plugin options correctly configured
add_action('admin_init', 'prh_ml_meta_box_check'); 
function prh_ml_meta_box_check() {

	if(prh_ml_configured()) {

		add_action('add_meta_boxes', 'prh_ml_add_meta_box');
		
	}
	
} 

// define metabox
function prh_ml_add_meta_box() {

	foreach (get_post_types() as $screen) {
		add_meta_box(
			'prh_ml_sectionid',
			$GLOBALS['prh_plugin_name'],
			'prh_ml_inner_meta_box',
			$screen
		);
	}
	
}

// prints the box content
function prh_ml_inner_meta_box($post) {
	
	// only continue if post has a title and content
	if(trim($post->post_title) && trim($post->post_content)) {
	
		// make blank keywords array
		$keywords=array();
	
		// as long as books have been saved more recently than the global options, retrieve saved data... otherwise it'll need rescanning
		$options_saved=get_option('prh_ml_options_saved_time');
		$books_saved=get_post_meta($post->ID,'_prh_ml_saved_time',true);
		if($books_saved>$options_saved) {
			
			// retrieve saved keywords and books
			$keywords=get_post_meta($post->ID,'_prh_ml_keywords',true);
			$books=get_post_meta($post->ID,'_prh_ml_books',true);
			
		} else {
			
			$keywords=array();
			$books=array();
			
		}
		
		// make sure there are 5 entries in keywords, so we have enough input controls
		foreach($keywords as $key=>$value) if(!trim($value)) unset($keywords[$key]);
		if(count($keywords)<5) { 
			$missing=5-count($keywords);
			for($c=0;$c<$missing;$c++) array_push($keywords,'');
		}
		
		// lay out form showing keywords and books
		?>
		<div class="prh_ml_settings">
			<h4>Opciones de visualización</h3>
			<div class="prh_ml_display">
				<?php		
					$options = get_option('prh_ml_options');
					if($options['prh_ml_display']=='manual') {
						?><div class="prh_ml_form_main">
							<input type="checkbox" class="prh_ml_manual_override" <?php if(get_post_meta($post->ID,'_prh_ml_manual_override',true)) echo 'checked'; ?> id="prh_ml_manual_override" />
							<label for="prh_ml_manual_override">Mostrar libros debajo del contenido de esta entrada</label>
						</div>
						<div class="prh_ml_form_button"><input type="button" class="button" value="Guardar" /></div><?php
					} else {
						?><p>El carrusel de los libros recomendados aparece publicado al final de tu artículo (<a href="<?php echo admin_url('options-general.php?page=prh_ml'); ?>">cambiar modo de visualización</a>)</p>
						<div class="prh_ml_form_main">
							<input type="checkbox" class="prh_ml_auto_override" <?php if(get_post_meta($post->ID,'_prh_ml_auto_override',true)) echo 'checked'; ?> id="prh_ml_auto_override" /> 
							<label for="prh_ml_auto_override">Ocultarlos para esta entrada</label>
						</div>
						<div class="prh_ml_form_button"><input type="button" class="button" value="Guardar ajuste" /></div><?php
					}
				?>
			</div>
			<hr />
			<h4>Selección de las palabras clave y los libros</h3>
			<div class="prh_ml_keywords">
				<p>‘Mi librería’ deduce automáticamente, a partir de las palabras más relevantes de tu artículo, los libros más recomendables. Si quieres ajustar manualmente la búsqueda, introduce en los campos siguientes las palabras clave de tu elección y clica en <strong>Guardar palabras clave</strong>. Puede ir probando cuantas veces quieras hasta que obtengas la selección perfecta.</p>
				<div class="prh_ml_form_main">
					<?php foreach($keywords as $keyword) { ?><input type="text" name="prh_lh_keywords[]" value="<?php echo esc_attr($keyword); ?>" /><?php } ?>
				</div>
				<div class="prh_ml_form_button">
					<input type="button" class="button" value="Guardar palabras clave" />
				</div>
			</div>
			<div class="prh_ml_reset">
				<div class="prh_ml_form_main">Si después de probar prefieres volver a la selección automática, puedes hacerlo clicando en <strong>Resetear palabras clave</strong>:</div>
				<div class="prh_ml_form_button"><input type="button" class="button" value="Resetear palabras clave" /></div>
			</div>
			<div class="prh_ml_selection">
				<div class="grid">
					<?php $exclusions=get_post_meta($post->ID,'_prh_ml_exclusions',true);
					foreach($books as $book) {
						?><div class="book">
						<img src="<?php echo $book['portada']; ?>"/>
						<p class="title"><?php echo $book['autor']; ?><br/><em><?php echo $book['titulo']; ?></em></p>
						<input data-isbn="<?php echo $book['isbn']; ?>" type="checkbox" class="select"
							<?php if(!in_array($book['isbn'],(array) $exclusions)) echo ' checked'; ?> 
							/>
						</div><?php 
					} ?>
				</div>
				<div class="prh_ml_exclude_advice">
					<div class="prh_ml_form_main">Si hay algún libro que no quieres que aparezca, desmarca la casilla correspondiente y clica en <strong>Guardar selección</strong>.</div>
					<div class="prh_ml_form_button"><input type="button" class="button" value="Guardar selección" /></div>
				</div>
			</div>
		</div><?php
		
	} else {
		
		?><div class="prh_ml_nothing_yet">
			<p>Para crear una lista de libros recomendados, rellena el título y el contenido y publica la entrada o guárdala como borrador.</p>
		</div><?php
		
	}
	
}

?>