<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework admin enqueue style and scripts
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_admin_enqueue_scripts' ) ) {
  function CRYPTOIGO_admin_enqueue_scripts() {

    // admin utilities
    wp_enqueue_media();

    // wp core styles
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'wp-jquery-ui-dialog' );

    // framework core styles
    wp_enqueue_style( 'cryptoigo-framework', CRYPTOIGO_URI .'/assets/css/cryptoigo-framework.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome', CRYPTOIGO_URI .'/assets/css/font-awesome.css', array(), '4.7.0', 'all' );

    if ( CRYPTOIGO_ACTIVE_LIGHT_THEME ) {
      wp_enqueue_style( 'cryptoigo-framework-theme', CRYPTOIGO_URI .'/assets/css/cryptoigo-framework-light.css', array(), "1.0.0", 'all' );
    }

    if ( is_rtl() ) {
      wp_enqueue_style( 'cryptoigo-framework-rtl', CRYPTOIGO_URI .'/assets/css/cryptoigo-framework-rtl.css', array(), '1.0.0', 'all' );
    }

    // wp core scripts
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-ui-accordion' );

    // framework core scripts
    wp_enqueue_script( 'cryptoigo-plugins',    CRYPTOIGO_URI .'/assets/js/cryptoigo-plugins.js',    array(), '1.0.0', true );
    wp_enqueue_script( 'cryptoigo-framework',  CRYPTOIGO_URI .'/assets/js/cryptoigo-framework.js',  array( 'cryptoigo-plugins' ), '1.0.0', true );

  }
  add_action( 'admin_enqueue_scripts', 'CRYPTOIGO_admin_enqueue_scripts' );
}
