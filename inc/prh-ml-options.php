<?php
/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)
	Version 1.1
	Date 16/04/2015

	prh-ml-options.php
	---------------------
	options screen
*/

add_action('admin_init', 'prh_ml_admin_init');
function prh_ml_admin_init() {
		
	// register settings
	register_setting('prh_ml_options', 'prh_ml_options', 'prh_ml_options_validate');
	add_settings_section('prh_ml_main', '', 'prh_ml_plugin_main_info', 'prh_ml');
	add_settings_field('prh_ml_country', 'Quiero mostrar preferentemente libros del siguiente país:', 'prh_ml_country_control', 'prh_ml', 'prh_ml_main');
	add_settings_field('prh_ml_topic', 'Quiero mostrar preferentemente libros sobre el tema siguiente:', 'prh_ml_topic_control', 'prh_ml', 'prh_ml_main');
	add_settings_field('prh_ml_formats', 'Quiero mostrar libros en el siguiente formato:', 'prh_ml_formats_control', 'prh_ml', 'prh_ml_main');
	add_settings_field('prh_ml_shop', 'Tienda: <br/><small>Las tiendas marcadas con asterisco (*) tienen programa de afiliados.</small>', 'prh_ml_shop_control', 'prh_ml', 'prh_ml_main');
	add_settings_field('prh_ml_code', 'Código de afiliado: <br/><small>Introduce tu código de afiliado en la tienda elegida, para ganar una comisión por cada venta que generes desde tu blog.</small>', 'prh_ml_code_control', 'prh_ml', 'prh_ml_main');
	add_settings_field('prh_ml_display', 'Modo de visualización:', 'prh_ml_display_control', 'prh_ml', 'prh_ml_main');
	add_settings_field('prh_ml_show_link', '¿Te gusta este plugin y quieres compartirlo con otros bloggers?', 'prh_ml_show_link_control', 'prh_ml', 'prh_ml_main');

}

add_action('admin_menu', 'prh_ml_admin_add_page');
function prh_ml_admin_add_page() {

	add_options_page($GLOBALS['prh_plugin_name'], $GLOBALS['prh_plugin_name'], 'manage_options', 'prh_ml', 'prh_ml_options_page');

}

function prh_ml_options_page() {

	// if settings have been saved, record timestamp (for renewing any pre-saved results)
	// hooks like update_option_{option} don't appear to work for custom option pages
	if(isset($_GET['settings-updated']) && $_GET['settings-updated']=='true') {
		update_option('prh_ml_options_saved_time',time());
	}
	
	// display form
	?><div class="wrap">
		<h2><?php echo $GLOBALS['prh_plugin_name']; ?></h2>
		<form action="options.php" method="post">
			<?php settings_fields('prh_ml_options'); ?>
			<?php do_settings_sections('prh_ml'); ?>
			<input class="button-primary button-large" name="Submit" type="submit" value="<?php esc_attr_e('Guardar ajustes'); ?>" />
		</form>
	</div><?php
	
}

function prh_ml_plugin_main_info() {

	echo '<p>Aquí puedes escoger qué tipo de libros vas a mostrar en tus carruseles de libros recomendados, y en qué tienda online podrán comprarlo los usuarios de tu blog. Recuerda que si escoges una tienda con programa de afiliación e introduces tu código de afiliado, ganarás una comisión por cada venta que generes desde tu blog.</p>';
	echo '<p>También puedes ajustar las opciones de visualización del carrusel de libros a nivel individual para cada una de tus entradas: para acceder a los ajustes de visualización, accede a la pantalla de edición del artículo que quieras modificar.</p>';
	echo '<p>Gracias por utilizar ‘Mi librería’ para compartir tu pasión por la lectura.</p>'; 

}

function prh_ml_country_control() {

	$options=get_option('prh_ml_options');
	if(!array_key_exists('prh_ml_country',$options)) $options['prh_ml_country']='';
	?><select id="prh_ml_country" name="prh_ml_options[prh_ml_country]">
	<?php if(!$options['prh_ml_country']) { ?><option value="">elige uno...</option><?php }
	foreach($GLOBALS['prh_countries'] as $key=>$value) { 
		if($GLOBALS['prh_topics'][$key]) { // only include if there is a corresponding list of topics
			?><option <?php 
			if ($key==$options['prh_ml_country']) echo 'selected'; ?>
			value="<?php echo $key; ?>"><?php echo $value; ?></option><?php
		}
	}
	?></select><?php
	
}

function prh_ml_topic_control() {
	
	$options=get_option('prh_ml_options');
	if(!array_key_exists('prh_ml_country',$options)) $options['prh_ml_country']='';
	if(!array_key_exists('prh_ml_topic',$options)) $options['prh_ml_topic']='';
	?><select data-options='<?php echo json_encode($GLOBALS['prh_topics']); ?>' id="prh_ml_topic" name="prh_ml_options[prh_ml_topic]"><?php
	if(!$options['prh_ml_country']) { 
		?><option value="">elige el páis primero</option><?php
	} else {
		if(!$options['prh_ml_topic']) { ?><option value="">elige uno...</option><?php }
		foreach($GLOBALS['prh_topics'][$options['prh_ml_country']] as $topic) {
			?><option <?php 
			if ($topic['id']==$options['prh_ml_topic']) echo 'selected'; ?>
			value="<?php echo $topic['id']; ?>"><?php echo $topic['tematica_web']; ?></option><?php
		}
	}
	?></select><?php
	
}

function prh_ml_formats_control() {

	$options=get_option('prh_ml_options');
	if(!array_key_exists('prh_ml_formats',$options)) $options['prh_ml_formats']='';
	?><select id="prh_ml_formats" name="prh_ml_options[prh_ml_formats]">
	<option value="">Todos (físicos y electrónicos)</option>
	<option <?php if($options['prh_ml_formats']=='N') echo 'selected'; ?> value="N">Sólo libros físicos</option>
	<option <?php if($options['prh_ml_formats']=='S') echo 'selected'; ?> value="S">Sólo libros electrónicos</option>
	</select><?php
	
}

function prh_ml_shop_control() {

	$options=get_option('prh_ml_options');
	if(!array_key_exists('prh_ml_shop',$options)) $options['prh_ml_shop']='';
	?><select id="prh_ml_shop" name="prh_ml_options[prh_ml_shop]">
	<?php if(!$options['prh_ml_shop']) { ?><option value="">elige una...</option><?php }
	foreach($GLOBALS['prh_shops'] as $key=>$value) {
		if(array_key_exists('has_affiliates',$value) && $value['has_affiliates']) $has_affiliates=true; else $has_affiliates=false;
		if(array_key_exists('format',$value)) $format=$value['format']; else $format='';
		if(array_key_exists('title',$value)) $title=$value['title']; else $title='';
		if(array_key_exists('country',$value)) $country=$value['country']; else $country='';
		?><option <?php 
		if($key==$options['prh_ml_shop']) echo 'selected '; 
		if($has_affiliates) echo 'data-has-affiliates="1" ';
		if($country) echo 'data-country="' . $country . '"';
		echo 'class="' . $format . '" ';
		?>
		value="<?php echo $key; ?>"><?php 
			echo $title; 
			if($country) echo ' ('.$GLOBALS['prh_countries'][$country].')';
			if($has_affiliates) echo ' *';
		?></option><?php
	}
	?></select><?php
	
}

function prh_ml_code_control() {

	$options=get_option('prh_ml_options');
	if(!array_key_exists('prh_ml_code',$options)) $options['prh_ml_code']='';
	if(!array_key_exists('prh_ml_shop',$options)) $options['prh_ml_shop']='';
	
	// only active and showing a value if current shop has affiliates
	if($options['prh_ml_shop'] && array_key_exists('has_affiliates',$GLOBALS['prh_shops'][$options['prh_ml_shop']]) && $GLOBALS['prh_shops'][$options['prh_ml_shop']]['has_affiliates']) {
		echo '<input id="prh_ml_code" name="prh_ml_options[prh_ml_code]" size="20" type="text" value="' . $options['prh_ml_code'] . '" />';
	} else {
		echo '<input id="prh_ml_code" name="prh_ml_options[prh_ml_code]" size="20" type="text" value="" disabled="disabled" />';		
	}

}

function prh_ml_display_control() {

	$options = get_option('prh_ml_options');
	?><p><input type="radio" checked id="prh_ml_display_auto" name="prh_ml_options[prh_ml_display]" value="auto" /> <label for="prh_ml_display_auto">Automático: el carrusel de libros se mostrará en todas las entradas y páginas, debajo del contenido (<strong>recomendado</strong>)</label></p>
	<p><input type="radio" <?php if($options['prh_ml_display']=='manual') echo 'checked' ?> id="prh_ml_display_manual" name="prh_ml_options[prh_ml_display]" value="manual" /> <label for="prh_ml_display_manual">Manual:  yo decidiré en qué entradas y páginas específicas quiero insertar el widget o el shortcode para mostrar el carrusel de libros</label></p><?php
	
}

function prh_ml_show_link_control() {

	$options = get_option('prh_ml_options');
	?><p><input type="checkbox" <?php if($options['prh_ml_show_link']=='1') echo 'checked'; ?> id="prh_ml_show_link" name="prh_ml_options[prh_ml_show_link]" value="1" /> <label for="prh_ml_show_link">Mostrar un discreto enlace de texto a la página del plugin debajo del carrusel de libros</label></p><?php
	
}

function prh_ml_options_validate($input) {
	
	// sanitise choices
	if(array_key_exists('prh_ml_country',$input)) $input['prh_ml_country'] = sanitize_text_field($input['prh_ml_country']); // sanitize_text_field allows uppercase
	if(array_key_exists('prh_ml_topic',$input)) $input['prh_ml_topic'] = sanitize_key($input['prh_ml_topic']);
	if(array_key_exists('prh_ml_formats',$input)) $input['prh_ml_formats'] = sanitize_key($input['prh_ml_formats']);
	if(array_key_exists('prh_ml_shop',$input)) $input['prh_ml_shop'] = sanitize_key($input['prh_ml_shop']);
	if(array_key_exists('prh_ml_display',$input)) $input['prh_ml_display'] = sanitize_key($input['prh_ml_display']);
	if(array_key_exists('prh_ml_show_link',$input)) $input['prh_ml_show_link'] = sanitize_key($input['prh_ml_show_link']);
	return $input;
	
}

?>