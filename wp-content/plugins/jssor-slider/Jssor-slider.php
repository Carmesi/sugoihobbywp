<?php
/*
 * Jssor Slider. Slideshow plugin for WordPress.
 * Plugin Name: Jssor Slider
 * Plugin URI:	http://www.phpcentre.net
 * Description: Easy to use slideshow plugin.
 * Version: 1.3
 * Author: PhP Centre
 * Author URI: phpcentre.net
 * License: GPL-2.0+
 * Copyright: 2014 PhP Centre
 * Text Domain: jssorslider
 *
 */
 
	if ( ! defined( 'ABSPATH' ) ) {
		
		exit; // disable direct access
	}

	if( !defined( 'JSSORSLIDER_VERSION' ) ) define( 'JSSORSLIDER_VERSION', '1.3' );

	if ( !defined( 'JSSOR_MAIN_DIR' ) ) define( 'JSSOR_MAIN_DIR', dirname(dirname(dirname(__FILE__))).'/jssor-slider' );
	if ( !defined( 'JSSOR_MAIN_UPLOAD_DIR' ) ) define( 'JSSOR_MAIN_UPLOAD_DIR', dirname(dirname(dirname(__FILE__))).'/jssor-slider/jssor-uploads/' );
	if ( !defined( 'JSSOR_MAIN_THUMB_DIR' ) ) define( 'JSSOR_MAIN_THUMB_DIR', dirname(dirname(dirname(__FILE__))).'/jssor-slider/thumbs/' );
	if ( !defined( 'JSSOR_SL_PLUGIN_URL' ) ) define( 'JSSOR_SL_PLUGIN_URL', plugins_url( 'jssor-slider' ) );
	if ( !defined( 'JSSOR_SLIDER_PATH' ) )  define( 'JSSOR_SLIDER_PATH', plugin_dir_path( __FILE__ ) );
	
	if ( !defined( 'JSSOR_SL_THUMB_URL' ) ) define( 'JSSOR_SL_THUMB_URL', content_url().'/jssor-slider/jssor-uploads/' );
	if ( !defined( 'JSSOR_SL_THUMB_SMALL_URL') ) define( 'JSSOR_SL_THUMB_SMALL_URL', content_url().'/jssor-slider/thumbs/' );
	if ( !defined( 'jssor_slider' ) ) define( 'jssor_slider', 'jssor_slider' );


	
	
	require_once ( JSSOR_SLIDER_PATH . '/lib/jssor-slider-class.php' );

	add_action( 'plugins_loaded', array( 'JssorSliderPlugin', 'run' ) );
	add_action( 'plugins_loaded', array( 'JssorSliderPlugin', 'plugin_install_script' ) );

	register_activation_hook( __FILE__, array( 'JssorSliderPlugin', 'plugin_install_script' ) );
	
	register_uninstall_hook( __FILE__, array( 'JssorSliderPlugin', 'plugin_uninstall_script' ) );
	
?>
