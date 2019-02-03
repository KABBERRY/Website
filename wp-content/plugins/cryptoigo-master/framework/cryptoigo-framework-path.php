<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework constants
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
defined( 'CRYPTOIGO_VERSION' )    or  define( 'CRYPTOIGO_VERSION',    '1.0.2' );
defined( 'CRYPTOIGO_OPTION' )     or  define( 'CRYPTOIGO_OPTION',     '_CRYPTOIGO_options' );
defined( 'CRYPTOIGO_CUSTOMIZE' )  or  define( 'CRYPTOIGO_CUSTOMIZE',  '_CRYPTOIGO_customize_options' );

/**
 *
 * Framework path finder
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_get_path_locate' ) ) {
  function CRYPTOIGO_get_path_locate() {

    $dirname        = wp_normalize_path( dirname( __FILE__ ) );
    $plugin_dir     = wp_normalize_path( WP_PLUGIN_DIR );
    $located_plugin = ( preg_match( '#'. preg_replace( '/[^A-Za-z]/', '', $plugin_dir ) .'#', preg_replace( '/[^A-Za-z]/', '', $dirname ) ) ) ? true : false;
    $directory      = ( $located_plugin ) ? $plugin_dir : get_template_directory();
    $directory_uri  = ( $located_plugin ) ? WP_PLUGIN_URL : get_template_directory_uri();
    $basename       = str_replace( wp_normalize_path( $directory ), '', $dirname );
    $dir            = $directory . $basename;
    $uri            = $directory_uri . $basename;

    return apply_filters( 'CRYPTOIGO_get_path_locate', array(
      'basename' => wp_normalize_path( $basename ),
      'dir'      => wp_normalize_path( $dir ),
      'uri'      => $uri
    ) );

  }
}

/**
 *
 * Framework set paths
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
$get_path = CRYPTOIGO_get_path_locate();

defined( 'CRYPTOIGO_BASENAME' )  or  define( 'CRYPTOIGO_BASENAME',  $get_path['basename'] );
defined( 'CRYPTOIGO_DIR' )       or  define( 'CRYPTOIGO_DIR',       $get_path['dir'] );
defined( 'CRYPTOIGO_URI' )       or  define( 'CRYPTOIGO_URI',       $get_path['uri'] );

/**
 *
 * Framework locate template and override files
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'CRYPTOIGO_locate_template' ) ) {
  function CRYPTOIGO_locate_template( $template_name ) {

    $located      = '';
    $override     = apply_filters( 'CRYPTOIGO_framework_override', 'cryptoigo-framework-override' );
    $dir_plugin   = wp_normalize_path( WP_PLUGIN_DIR );
    $dir_theme    = get_template_directory();
    $dir_child    = get_stylesheet_directory();
    $dir_override = '/'. $override .'/'. $template_name;
    $dir_template = CRYPTOIGO_BASENAME .'/'. $template_name;

    // child theme override
    $child_force_overide    = $dir_child . $dir_override;
    $child_normal_override  = $dir_child . $dir_template;

    // theme override paths
    $theme_force_override   = $dir_theme . $dir_override;
    $theme_normal_override  = $dir_theme . $dir_template;

    // plugin override
    $plugin_force_override  = $dir_plugin . $dir_override;
    $plugin_normal_override = $dir_plugin . $dir_template;

    if ( file_exists( $child_force_overide ) ) {

      $located = $child_force_overide;

    } else if ( file_exists( $child_normal_override ) ) {

      $located = $child_normal_override;

    } else if ( file_exists( $theme_force_override ) ) {

      $located = $theme_force_override;

    } else if ( file_exists( $theme_normal_override ) ) {

      $located = $theme_normal_override;

    } else if ( file_exists( $plugin_force_override ) ) {

      $located =  $plugin_force_override;

    } else if ( file_exists( $plugin_normal_override ) ) {

      $located =  $plugin_normal_override;
    }

    $located = apply_filters( 'CRYPTOIGO_locate_template', $located, $template_name );

    if ( ! empty( $located ) ) {
      load_template( $located, true );
    }

    return $located;

  }
}

/**
 *
 * Get option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_get_option' ) ) {
  function CRYPTOIGO_get_option( $option_name = '', $default = '' ) {

    $options = apply_filters( 'CRYPTOIGO_get_option', get_option( CRYPTOIGO_OPTION ), $option_name, $default );

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

/**
 *
 * Set option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_set_option' ) ) {
  function CRYPTOIGO_set_option( $option_name = '', $new_value = '' ) {

    $options = apply_filters( 'CRYPTOIGO_set_option', get_option( CRYPTOIGO_OPTION ), $option_name, $new_value );

    if( ! empty( $option_name ) ) {
      $options[$option_name] = $new_value;
      update_option( CRYPTOIGO_OPTION, $options );
    }

  }
}

/**
 *
 * Get all option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_get_all_option' ) ) {
  function CRYPTOIGO_get_all_option() {
    return get_option( CRYPTOIGO_OPTION );
  }
}

/**
 *
 * Multi language option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_get_multilang_option' ) ) {
  function CRYPTOIGO_get_multilang_option( $option_name = '', $default = '' ) {

    $value     = CRYPTOIGO_get_option( $option_name, $default );
    $languages = CRYPTOIGO_language_defaults();
    $default   = $languages['default'];
    $current   = $languages['current'];

    if ( is_array( $value ) && is_array( $languages ) && isset( $value[$current] ) ) {
      return  $value[$current];
    } else if ( $default != $current ) {
      return  '';
    }

    return $value;

  }
}

/**
 *
 * Multi language value
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_get_multilang_value' ) ) {
  function CRYPTOIGO_get_multilang_value( $value = '', $default = '' ) {

    $languages = CRYPTOIGO_language_defaults();
    $default   = $languages['default'];
    $current   = $languages['current'];

    if ( is_array( $value ) && is_array( $languages ) && isset( $value[$current] ) ) {
      return  $value[$current];
    } else if ( $default != $current ) {
      return  '';
    }

    return $value;

  }
}

/**
 *
 * Get customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_get_customize_option' ) ) {
  function CRYPTOIGO_get_customize_option( $option_name = '', $default = '' ) {

    $options = apply_filters( 'CRYPTOIGO_get_customize_option', get_option( CRYPTOIGO_CUSTOMIZE ), $option_name, $default );

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

/**
 *
 * Set customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_set_customize_option' ) ) {
  function CRYPTOIGO_set_customize_option( $option_name = '', $new_value = '' ) {

    $options = apply_filters( 'CRYPTOIGO_set_customize_option', get_option( CRYPTOIGO_CUSTOMIZE ), $option_name, $new_value );

    if( ! empty( $option_name ) ) {
      $options[$option_name] = $new_value;
      update_option( CRYPTOIGO_CUSTOMIZE, $options );
    }

  }
}

/**
 *
 * Get all customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_get_all_customize_option' ) ) {
  function CRYPTOIGO_get_all_customize_option() {
    return get_option( CRYPTOIGO_CUSTOMIZE );
  }
}

/**
 *
 * WPML plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_is_wpml_activated' ) ) {
  function CRYPTOIGO_is_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
  }
}

/**
 *
 * qTranslate plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_is_qtranslate_activated' ) ) {
  function CRYPTOIGO_is_qtranslate_activated() {
    if ( function_exists( 'qtrans_getSortedLanguages' ) ) { return true; } else { return false; }
  }
}

/**
 *
 * Polylang plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_is_polylang_activated' ) ) {
  function CRYPTOIGO_is_polylang_activated() {
    if ( class_exists( 'Polylang' ) ) { return true; } else { return false; }
  }
}

/**
 *
 * Get language defaults
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'CRYPTOIGO_language_defaults' ) ) {
  function CRYPTOIGO_language_defaults() {
    $multilang = array();
    if( CRYPTOIGO_is_wpml_activated() || CRYPTOIGO_is_qtranslate_activated() || CRYPTOIGO_is_polylang_activated() ) {
      if( CRYPTOIGO_is_wpml_activated() ) {
        global $sitepress;
        $multilang['default']   = $sitepress->get_default_language();
        $multilang['current']   = $sitepress->get_current_language();
        $multilang['languages'] = $sitepress->get_active_languages();
      } else if( CRYPTOIGO_is_polylang_activated() ) {
        global $polylang;
        $current    = pll_current_language();
        $default    = pll_default_language();
        $current    = ( empty( $current ) ) ? $default : $current;
        $poly_langs = $polylang->model->get_languages_list();
        $languages  = array();
        foreach ( $poly_langs as $p_lang ) {
          $languages[$p_lang->slug] = $p_lang->slug;
        }
        $multilang['default']   = $default;
        $multilang['current']   = $current;
        $multilang['languages'] = $languages;
      } else if( CRYPTOIGO_is_qtranslate_activated() ) {
        global $q_config;
        $multilang['default']   = $q_config['default_language'];
        $multilang['current']   = $q_config['language'];
        $multilang['languages'] = array_flip( qtrans_getSortedLanguages() );
      }
    }
    $multilang = apply_filters( 'CRYPTOIGO_language_defaults', $multilang );
    return ( ! empty( $multilang ) ) ? $multilang : false;
  }
}

/**
 *
 * Framework load text domain
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
load_textdomain( 'cryptoigo-framework', CRYPTOIGO_DIR .'/languages/'. get_locale() .'.mo' );
