<?php
/**
 * Plugin Name: Cryptoigo WordPress Theme Elements Support
 * Description: Plugin created by xstheme to support Cryptoigo theme with custom features! 
 * Version:     1.0.0
 * Author:      xstheme
 * Author URI:  https://www.htmlmate.com/
 * Plugin URI:  https://www.htmlmate.com/
 * Text Domain: cryptoigo
 */
/* This loads the plugin.php file which is the main one */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
require( __DIR__ . '/helper/helper.php' ); 

/**
 * Load Hello World
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function cryptoigo_load_elements() {
	// Load localization file
	load_plugin_textdomain( 'cryptoigo' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}

	// Check version required
	$elementor_version_required = '1.0.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );   //loading the main plugin
//	require( __DIR__ . '/anywhere-elementor/anywhere-elementor.php' );   //loading the main plugin
}
add_action( 'plugins_loaded', 'cryptoigo_load_elements' );   //notiung but checking and notice
