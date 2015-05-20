<?php

/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)
	
	prh-ml-metabox-ajax.php
	---------------------
	ajax calls returning data to metabox
*/

// metabox: find books
add_action('wp_ajax_prh-ml-metabox-get-books', 'prh_ml_metabox_get_books');
function prh_ml_metabox_get_books() {

	// look up post
	if ($post=get_post($_POST['pid'])) {
	
		// if keywords specified, use those, otherwise analyse the text
		if(isset($_POST['keywords'])) {
		
			// eliminate empty values
			foreach($_POST['keywords'] as $key=>$value) {
				
				// sanitise
				if(!trim($value)) unset($_POST['keywords'][$key]); 
				else $_POST['keywords'][$key]=sanitize_text_field($value);
			}
			
			// check there's still keywords left in the array, otherwise analyse
			if (count($_POST['keywords'])>0) {
				$response['keywords']=$_POST['keywords'];
			} else {
				$response['keywords']=prh_ml_get_post_keywords($_POST['pid']);
			}
			
		} else {
			
			$response['keywords']=prh_ml_get_post_keywords($_POST['pid']);
			
		}
		
		// get books based on specified keywords (NB received data is sanitized immediately before being returned)
		$response['books']=prh_ml_get_books($response['keywords']);
		
		// save
		update_post_meta($_POST['pid'],'_prh_ml_keywords',$response['keywords']);
		update_post_meta($_POST['pid'],'_prh_ml_books',$response['books']);
		update_post_meta($_POST['pid'],'_prh_ml_exclusions',array());
		update_post_meta($_POST['pid'],'_prh_ml_saved_time',time());
		
	} else {
		
		$response = false;
		
	}
	
    header('Content-Type: application/json');
    echo json_encode($response);

	// stop
	exit;
} 

// metabox: save selection
add_action('wp_ajax_prh-ml-metabox-save-selection', 'prh_ml_metabox_save_selection');
function prh_ml_metabox_save_selection() {

	// look up post
	if ($post=get_post($_POST['pid'])) {

		// sanitise ISBNs
		foreach($_POST['exclusions'] as $k=>$v) $_POST['exclusions'][$k]=sanitize_key($v);

		// save exclusions
		update_post_meta($_POST['pid'],'_prh_ml_exclusions',$_POST['exclusions']);
		$response = true;

	} else {
		
		$response = false;
		
	}
	
    header('Content-Type: application/json');
    echo json_encode($response);

	// stop
	exit;	

}

// metabox: save display setting
add_action('wp_ajax_prh-ml-metabox-save-display', 'prh_ml_metabox_save_display');
function prh_ml_metabox_save_display() {

	// look up post
	if ($post=get_post($_POST['pid'])) {
		
		if($_POST['setting']=='manual_override' || $_POST['setting']=='auto_override') {
			
			update_post_meta($_POST['pid'],'_prh_ml_'.$_POST['setting'],$_POST['value']);
			$response = true;
			
		} else {
			
			$response = false;
			
		}

	} else {
		
		$response = false;
		
	}

    header('Content-Type: application/json');
    echo json_encode($response);

	// stop
	exit;

}

?>