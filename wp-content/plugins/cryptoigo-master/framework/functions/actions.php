<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Get icons from admin ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_get_icons' ) ) {
  function CRYPTOIGO_get_icons() {

    do_action( 'CRYPTOIGO_add_icons_before' );

    $jsons = apply_filters( 'CRYPTOIGO_add_icons_json', glob( CRYPTOIGO_DIR . '/fields/icon/*.json' ) );

    if( ! empty( $jsons ) ) {

      foreach ( $jsons as $path ) {

        $object = CRYPTOIGO_get_icon_fonts( 'fields/icon/'. basename( $path ) );

        if( is_object( $object ) ) {

          echo ( count( $jsons ) >= 2 ) ? '<h4 class="cryptoigo-icon-title">'. $object->name .'</h4>' : '';

          foreach ( $object->icons as $icon ) {
            echo '<a class="cryptoigo-icon-tooltip" data-cryptoigo-icon="'. $icon .'" data-title="'. $icon .'"><span class="cryptoigo-icon cryptoigo-selector"><i class="'. $icon .'"></i></span></a>';
          }

        } else {
          echo '<h4 class="cryptoigo-icon-title">'. esc_html__( 'Error! Can not load json file.', 'cryptoigo-framework' ) .'</h4>';
        }

      }

    }

    do_action( 'CRYPTOIGO_add_icons' );
    do_action( 'CRYPTOIGO_add_icons_after' );

    die();
  }
  add_action( 'wp_ajax_cryptoigo-get-icons', 'CRYPTOIGO_get_icons' );
}

/**
 *
 * Export options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_export_options' ) ) {
  function CRYPTOIGO_export_options() {

    header('Content-Type: plain/text');
    header('Content-disposition: attachment; filename=backup-options-'. gmdate( 'd-m-Y' ) .'.txt');
    header('Content-Transfer-Encoding: binary');
    header('Pragma: no-cache');
    header('Expires: 0');

    echo CRYPTOIGO_encode_string( get_option( CRYPTOIGO_OPTION ) );

    die();
  }
  add_action( 'wp_ajax_cryptoigo-export-options', 'CRYPTOIGO_export_options' );
}

/**
 *
 * Set icons for wp dialog
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_set_icons' ) ) {
  function CRYPTOIGO_set_icons() {

    echo '<div id="cryptoigo-icon-dialog" class="cryptoigo-dialog" title="'. esc_html__( 'Add Icon', 'cryptoigo-framework' ) .'">';
    echo '<div class="cryptoigo-dialog-header cryptoigo-text-center"><input type="text" placeholder="'. esc_html__( 'Search a Icon...', 'cryptoigo-framework' ) .'" class="cryptoigo-icon-search" /></div>';
    echo '<div class="cryptoigo-dialog-load"><div class="cryptoigo-icon-loading">'. esc_html__( 'Loading...', 'cryptoigo-framework' ) .'</div></div>';
    echo '</div>';

  }
  add_action( 'admin_footer', 'CRYPTOIGO_set_icons' );
  add_action( 'customize_controls_print_footer_scripts', 'CRYPTOIGO_set_icons' );
}
