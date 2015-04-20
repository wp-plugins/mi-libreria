<?php

/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)
	Version 1.1
	Date 16/04/2015

	prh-ml-front-ajax.php
	---------------------
	handles AJAX injection call from the front end and returns the relevant HTML
*/

// metabox: reset keywords and books

add_action('wp_ajax_nopriv_prh-ml-get-books-markup', 'prh_ml_get_books_markup');
add_action('wp_ajax_prh-ml-get-books-markup', 'prh_ml_get_books_markup');
function prh_ml_get_books_markup() {

	// look up post
	if ($post=get_post($_POST['pid'])) {
	
		// retrieve timestamps - to see if options have been saved more recently than books, because if so, the results are out of date and need to be reanalysed
		$options_saved=get_option('prh_ml_options_saved_time');
		$books_saved=get_post_meta($_POST['pid'],'_prh_ml_saved_time',true);
	
		// retrieve saved books
		$books=get_post_meta($post->ID,'_prh_ml_books',true);
	
		// if results are out of date, or no books are saved for this post, analyse and search using current content now
		if ($books_saved<$options_saved || !$books) {
			
			$keywords=prh_ml_get_post_keywords($_POST['pid']);
			$books=prh_ml_get_books($keywords);
			
			// save the data to the post
			update_post_meta($_POST['pid'],'_prh_ml_keywords',$keywords);
			update_post_meta($_POST['pid'],'_prh_ml_books',$books);
			update_post_meta($_POST['pid'],'_prh_ml_exclusions',array());
			update_post_meta($_POST['pid'],'_prh_ml_saved_time',time());
			
		}
		
		// get designated shop URL
		$options=get_option('prh_ml_options');
		if(array_key_exists('prh_ml_shop',$options) && $options['prh_ml_shop']) $shop=$GLOBALS['prh_shops'][$options['prh_ml_shop']]; else $shop='';
		if(array_key_exists('prh_ml_code',$options) && $options['prh_ml_code']) $code=$options['prh_ml_code']; else $code='';
		
		// return required HTML
		$exclusions=get_post_meta($post->ID,'_prh_ml_exclusions',true);
		$response=array('markup'=>'');
		foreach($books as $book) {

			// check book hasn't been manually deselected
			if(!in_array($book['isbn'],(array) $exclusions)) { 
				
				// if shop specified work out link
				$link='';
				if($shop['url']) $link=str_replace('[ISBN]',$book['isbn'],$shop['url']);

				// replace affiliate code with user-specified one
				if($code) $link=str_replace('[CODE]',$code,$link);
				
				// add this book
				$response['markup'].='<div class="prh_ml_book">';
				if($link) $response['markup'].='<a target="_blank" href="' . $link . '">';
				$response['markup'].='<div class="prh_ml_book_container"><img class="prh_ml_cover" src="' . $book['portada'] . '"/></div>';
				$response['markup'].='<div class="prh_ml_title">' . $book['autor'] . '<br/> <em>' . $book['titulo'] . '</em></div>';
				if($link) $response['markup'].='</a>';
				$response['markup'].='</div> ';
			
			}
			
		}
		
		// check if plugin link needs to be added at the end
		if(array_key_exists('prh_ml_show_link',$options) && $options['prh_ml_show_link']) $response['showlink']='1'; else $response['showlink']='0';
		
	} else {
		
		$response = false;
		
	}
	
	header('Content-Type: application/json');
	echo json_encode($response);

	exit;
} 

?>