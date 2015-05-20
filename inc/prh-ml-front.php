<?php

/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)

	prh-ml-front.php
	---------------------
	front end inclusions and hooks
*/


// include scripts + styles for front-end display
add_action('template_redirect', 'prh_ml_enqueue_scripts');
function prh_ml_enqueue_scripts() {

	if(is_singular()) {
		global $post;
		wp_enqueue_style('prh_ml_front', plugins_url('../css/prh-ml-front.css', __FILE__));	
		wp_enqueue_script('prh_ml_front', plugins_url('../js/prh-ml-front.js', __FILE__), false, false, true);
		wp_localize_script('prh_ml_front', 'prh_ml_ajax', array('url' => admin_url('admin-ajax.php'), 'pid'=>$post->ID));
	}
	
}

// insert container below post content for posts that need the block
// actual content is injected via ajax so as not to hold the page up
add_filter('the_content', 'prh_ml_insert');
function prh_ml_insert($content) {

	global $post;

	// inject the container if needed
	if(prh_ml_display_for_post($post->ID)) $content.='<div data-pid="' . $post->ID . '" class="prh_ml_container"></div>';
	return $content;
	
}

?>