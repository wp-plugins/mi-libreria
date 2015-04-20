<?php

/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)
	Version 1.1
	Date 16/04/2015

	prh-ml-admin-general.php
	---------------------
	general back end functions + inclusions
*/

// check plugin has been configured
add_action('admin_notices', 'prh_ml_admin_notice');
function prh_ml_admin_notice() {

	if(!prh_ml_configured() && current_user_can('install_plugins')) {
		?><div class="error">
		<p><strong><?php echo $GLOBALS['prh_plugin_name']; ?></strong><br/>Para activar el plugin, <a href="<?php echo admin_url('options-general.php?page=prh_ml'); ?>">configúralo primero</a></p>
		</div><?php
	}

}

// include scripts and stylesheets (according to which admin page we're on)
add_action('admin_enqueue_scripts', 'prh_ml_enqueue_admin_scripts');
function prh_ml_enqueue_admin_scripts($hook_suffix) {

	if ($hook_suffix=='post.php' || $hook_suffix=='post-new.php') {
		global $post;
		wp_enqueue_style('prh_ml_metabox', plugins_url('../css/prh-ml-metabox.css', __FILE__));
		wp_enqueue_script('prh_ml_metabox', plugins_url('../js/prh-ml-metabox.js', __FILE__), false, false, true);
		wp_localize_script('prh_ml_metabox', 'prh_ml_ajax', array('url' => admin_url('admin-ajax.php'), 'pid'=>$post->ID));
	} else if ($hook_suffix=='settings_page_prh_ml') {
		wp_enqueue_style('prh_ml_options', plugins_url('../css/prh-ml-options.css', __FILE__));
		wp_enqueue_script('prh_ml_options', plugins_url('../js/prh-ml-options.js', __FILE__), false, false, true);
	}
	
}

// widget
class wp_prh_ml extends WP_Widget {

	// constructor
	function wp_prh_ml() {
		parent::WP_Widget(false, $name = $GLOBALS['prh_plugin_name']);
	}

	// widget display
	function widget($args, $instance) {
		
		if (is_singular()) {
		
			global $post;
			
			// inject the container
			echo '<div data-pid="' . $post->ID . '" class="prh_ml_container"></div>';

		}
	}
}
add_action('widgets_init', create_function('', 'return register_widget("wp_prh_ml");'));

// shortcode
function prh_ml_shortcode($atts, $content = null) {

	global $post;
	
	if ($post->ID) {
		
		// inject the container
		return '<div data-pid="' . $post->ID . '" class="prh_ml_container"></div>';

	}

}
add_shortcode('mi-libreria', 'prh_ml_shortcode');

// template tags - first one echoes, second returns string value
function mi_libreria() {
	
	echo '<div data-pid="' . $post->ID . '" class="prh_ml_container"></div>';
	
}
function get_mi_libreria() {
	
	return '<div data-pid="' . $post->ID . '" class="prh_ml_container"></div>';
	
}

?>