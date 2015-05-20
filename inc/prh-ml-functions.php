<?php
/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)

	prh-ml-functions.php
	---------------------
	custom functions
*/

// check if plugin has been configured
function prh_ml_configured() {
	
	if(!$options = get_option('prh_ml_options')) { update_option('prh_ml_options',array()); $options=array(); }
	
	// require values for all key settings
	if(array_key_exists('prh_ml_country',$options) && $options['prh_ml_country'] 
	&& array_key_exists('prh_ml_topic',$options) && $options['prh_ml_topic'] 
	&& array_key_exists('prh_ml_shop',$options) && $options['prh_ml_shop'] 
	&& array_key_exists('prh_ml_display',$options) && $options['prh_ml_display']) {
		return true; 
	} else {
		return false;
	}
	
}

// find keywords of a given post
function prh_ml_get_post_keywords($pid) {

	// retrieve post
	$post=get_post($pid);

	// parameters
	$params['content'] = $post->post_title . ' ' . $post->post_content;
	$params['encoding'] = 'utf-8';
	$params['lang'] = 'es_ES'; // case insensitive
	// $params['ignore'] = array('zh_CN', 'zh_TW', 'ja_JP'); // must be an array case sensitive !!!
	
	// 1-word keywords
	$params['min_word_length'] = 3;  // min length of single words
	$params['min_word_occur']  = 3;  // min occur of single words
	
	// 2-word keyphrases
	$params['min_2words_length'] = 0;  // min length of words for 2 word phrases; value 0 will DISABLE !!!
	// $params['min_2words_phrase_length'] = 10; // min length of 2 word phrases
	// $params['min_2words_phrase_occur']  = 3;  // min occur of 2 words phrase
	
	// 3-word keyphrases
	$params['min_3words_length'] = 0;  // min length of words for 3 word phrases; value 0 will DISABLE !!!
	// $params['min_3words_phrase_length'] = 12; // min length of 3 word phrases
	// $params['min_3words_phrase_occur']  = 2;  // min occur of 3 words phrase

	// analyse
	$keyword = new colossal_mind_mb_keyword_gen($params);
	
	// return first 5 as array, sanitized
	return array_filter(array_slice(explode(',',$keyword->get_keywords()),0,5),'sanitize_text_field');

}

// get books from webservice using array of keywords
function prh_ml_get_books($keywords) {

	// get sitewide settings
	$options = get_option('prh_ml_options');

	// URL encode keywords
	foreach($keywords as &$keyword) $keyword=urlencode($keyword);

	// build webservice URL
	$url='http://webservices.prhge.com/colbenson.php?';
	$url.='country=' . $options['prh_ml_country'] . '&';
	$url.='tema_web=' . $options['prh_ml_topic'] . '&';
	$url.='limit=12&';
	if($options['prh_ml_formats']=='S' || $options['prh_ml_formats']=='N') $url.='digital=' . $options['prh_ml_formats'] . '&';
	$url.='keywords='.implode('|',$keywords);
	
	// get JSON from URL and return decoded version
	$data = json_decode(file_get_contents($url),true);
	
	// sanitise the data according to our needs
	// titulo, portada, autor, isbn
	foreach((array) $data as $id=>$book) {
		foreach($book as $k=>$v) {
			
			// sanitise if required field, otherwise discard entirely
			if($k=='titulo' || $k=='autor') {
				$data[$id][$k]=sanitize_text_field($v);				
			} else if ($k=='isbn') {
				$data[$id][$k]=sanitize_key($v);
			} else if ($k=='portada') {
				$data[$id][$k]=filter_var($v,FILTER_SANITIZE_URL);
			} else {
				// not needed - discard data
				unset($data[$id][$k]);
			}
		}
	}
	
	// return
	return $data;

}

// find out if books should be shown for this post based on global settings and/or override
function prh_ml_display_for_post($pid) {

	// if global setting is automatic + !auto_override then yes
	// if global setting is manual + manual_override then yes

	$show=false;
	$options = get_option('prh_ml_options');
	if($options['prh_ml_display']=='auto' && !get_post_meta($pid,'_prh_ml_auto_override',true)) $show=true;
	else if($options['prh_ml_display']=='manual' && get_post_meta($pid,'_prh_ml_manual_override',true)) $show=true;
	return $show;

}

?>