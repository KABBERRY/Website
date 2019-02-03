<?php
/**
 * cryptoigo functions and definitions
 * Developed by xstheme team
 * @package cryptoigo
 */
/*------------------------------------------------------------------------------------------------------------------*/
/*	Define
/*------------------------------------------------------------------------------------------------------------------*/

define("CRYPTOIGO_LANG", get_template_directory_uri() . '/languages/');
define("CRYPTOIGO_FONT", get_template_directory_uri() . '/assets/fonts/');
define("CRYPTOIGO_CSS", get_template_directory_uri() . '/assets/css/');
define("CRYPTOIGO_THEME_ASSETS", get_template_directory_uri() . '/theme-assets/');
define("CRYPTOIGO_IMG", get_template_directory_uri() . '/theme-assets/images/');
define("CRYPTOIGO_JS", get_template_directory_uri() . '/assets/js/');
define("CRYPTOIGO_INC", get_template_directory() . '/inc/');
define("CRYPTOIGO_CORE", get_template_directory() . '/inc/core/');
define( 'CRYPTOIGO_ACTIVE_SHORTCODE',  false );


/*------------------------------------------------------------------------------------------------------------------*/
/*	Require file list
/*------------------------------------------------------------------------------------------------------------------*/

require_once CRYPTOIGO_CORE .'xtl-bs-scripts.php';
require_once CRYPTOIGO_CORE .'xtl-bs-themesetup.php';



/*------------------------------------------------------------------------------------------------------------------*/
/*	Custom functions that act independently of the theme templates.
/*------------------------------------------------------------------------------------------------------------------*/
require_once CRYPTOIGO_INC .'extras.php';
require_once CRYPTOIGO_INC .'template-tags.php';
require_once CRYPTOIGO_INC .'jetpack.php';
require_once CRYPTOIGO_INC .'custom-header.php';
require_once CRYPTOIGO_INC .'tgmpa.php';


/*------------------------------------------------------------------------------------------------------------------*/
/*	jquery migrate error resolve
/*------------------------------------------------------------------------------------------------------------------*/
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
} );