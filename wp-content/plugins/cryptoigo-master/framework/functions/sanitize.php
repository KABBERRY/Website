<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Text sanitize
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_sanitize_text' ) ) {
  function CRYPTOIGO_sanitize_text( $value, $field ) {
    return wp_filter_nohtml_kses( $value );
  }
  add_filter( 'CRYPTOIGO_sanitize_text', 'CRYPTOIGO_sanitize_text', 10, 2 );
}

/**
 *
 * Textarea sanitize
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_sanitize_textarea' ) ) {
  function CRYPTOIGO_sanitize_textarea( $value ) {

    global $allowedposttags;
    return wp_kses( $value, $allowedposttags );

  }
  add_filter( 'CRYPTOIGO_sanitize_textarea', 'CRYPTOIGO_sanitize_textarea' );
}

/**
 *
 * Checkbox sanitize
 * Do not touch, or think twice.
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_sanitize_checkbox' ) ) {
  function CRYPTOIGO_sanitize_checkbox( $value ) {

    if( ! empty( $value ) && $value == 1 ) {
      $value = true;
    }

    if( empty( $value ) ) {
      $value = false;
    }

    return $value;

  }
  add_filter( 'CRYPTOIGO_sanitize_checkbox', 'CRYPTOIGO_sanitize_checkbox' );
  add_filter( 'CRYPTOIGO_sanitize_switcher', 'CRYPTOIGO_sanitize_checkbox' );
}

/**
 *
 * Image select sanitize
 * Do not touch, or think twice.
 *
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_sanitize_image_select' ) ) {
  function CRYPTOIGO_sanitize_image_select( $value ) {

    if( isset( $value ) && is_array( $value ) ) {
      if( count( $value ) ) {
        $value = $value;
      } else {
        $value = $value[0];
      }
    } else if ( empty( $value ) ) {
      $value = '';
    }

    return $value;

  }
  add_filter( 'CRYPTOIGO_sanitize_image_select', 'CRYPTOIGO_sanitize_image_select' );
}

/**
 *
 * Group sanitize
 * Do not touch, or think twice.
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_sanitize_group' ) ) {
  function CRYPTOIGO_sanitize_group( $value ) {
    return ( empty( $value ) ) ? '' : $value;
  }
  add_filter( 'CRYPTOIGO_sanitize_group', 'CRYPTOIGO_sanitize_group' );
}

/**
 *
 * Title sanitize
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_sanitize_title' ) ) {
  function CRYPTOIGO_sanitize_title( $value ) {
    return sanitize_title( $value );
  }
  add_filter( 'CRYPTOIGO_sanitize_title', 'CRYPTOIGO_sanitize_title' );
}

/**
 *
 * Text clean
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_sanitize_clean' ) ) {
  function CRYPTOIGO_sanitize_clean( $value ) {
    return $value;
  }
  add_filter( 'CRYPTOIGO_sanitize_clean', 'CRYPTOIGO_sanitize_clean', 10, 2 );
}
