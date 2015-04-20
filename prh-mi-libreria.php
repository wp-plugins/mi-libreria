<?php
/**
 * Plugin Name: Mi librería
 * Plugin URI: http://megustaleer.com
 * Description: Mi librería te permite añadir automáticamente a los artículos de tu blog una selección de los mejores libros sobre el tema de tu artículo y otros similares y aportar así más contenidos y utilidad a tus lectores. 
 * Version: 1.1
 * Author: Penguin Random House Grupo Editorial
 * Author URI: http://www.penguinrandomhousegrupoeditorial.com/
 * License: GPLv3
 */
 
/* 
	Mi librería
	Penguin Random House Grupo Editorial
	Programming by Yes We Work (yeswework.com / andrew@yeswework.com)
	Version 1.1
	Date 16/04/2015

	prh-mi-libreria.php
	---------------------
	main plugin file: bootstrap
*/

include_once('inc/lib/class.colossal-mind-mb-keyword-generator.php');
include_once('inc/prh-ml-globals.php');
include_once('inc/prh-ml-functions.php');
include_once('inc/prh-ml-admin.php');
include_once('inc/prh-ml-options.php');
include_once('inc/prh-ml-metabox.php');
include_once('inc/prh-ml-metabox-ajax.php');
include_once('inc/prh-ml-front.php');
include_once('inc/prh-ml-front-ajax.php');

?>