<?php
add_action('wp_enqueue_scripts', 'cryptoigo_scripts');
/**
 * Enqueue scripts and styles.
 */

/* Enqueue Custom Fonts Script */
function cryptoigo_fonts_url() {
  $fonts_url = '';
  $fonts     = array();
  $subsets   = 'latin,latin-ext';

  /*
   * Translators: If there are characters in your language that are not supported
   * by Comfortaa, translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Comfortaa font: on or off', 'cryptoigo' ) ) {
    $fonts[] = 'Comfortaa:700';
  }

  /*
   * Translators: If there are characters in your language that are not supported
   * by Open Sans, translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'cryptoigo' ) ) {
    $fonts[] = 'Open Sans';
  }


  if ( $fonts ) {
    $fonts_url = add_query_arg( array(
      'family' => urlencode( implode( '|', $fonts ) ),
      'subset' => urlencode( $subsets ),
    ), 'https://fonts.googleapis.com/css' );
  }


  return esc_url_raw( $fonts_url );
}


/* Now enque fonts for fontend */
function cryptoigo_scripts_styles() {
  wp_enqueue_style( 'cryptoigo-fonts', cryptoigo_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'cryptoigo_scripts_styles' );

/* Now enque fonts for backend */
function cryptoigo_editor_styles() {
  add_editor_style( array( 'editor-style.css', cryptoigo_fonts_url() ) );
}
add_action('after_setup_theme', 'cryptoigo_editor_styles');




function cryptoigo_scripts() {
	/**  css include.
	--------------------------------------------------------------------------------------------------- */
  wp_enqueue_style('font-awesome', CRYPTOIGO_THEME_ASSETS . 'css/font-awesome.min.css');
  wp_enqueue_style('bootstrap', CRYPTOIGO_THEME_ASSETS . 'css/bootstrap.min.css');
  wp_enqueue_style('themify-style', CRYPTOIGO_THEME_ASSETS . 'fonts/themify/style.min.css');
  wp_enqueue_style('flag-icon', CRYPTOIGO_THEME_ASSETS . 'fonts/flag-icon-css/css/flag-icon.min.css');
  wp_enqueue_style('animate', CRYPTOIGO_THEME_ASSETS . 'vendors/animate/animate.min.css');
  wp_enqueue_style('flipclock', CRYPTOIGO_THEME_ASSETS . 'vendors/flipclock/flipclock.css');
  wp_enqueue_style('swiper', CRYPTOIGO_THEME_ASSETS . 'vendors/swiper/css/swiper.min.css');

  if( function_exists( 'cryptoigo_framework_init' ) ) {

      $page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );

      if(!empty($page_settings)) {

        if($page_settings['choose_page_variation'] == 'counter') {
              wp_enqueue_style('cryptoigo-counter', CRYPTOIGO_THEME_ASSETS . 'css/theme-counter.css');
          } elseif ($page_settings['choose_page_variation'] == 'video') {
              wp_enqueue_style('cryptoigo-video', CRYPTOIGO_THEME_ASSETS . 'css/template-intro-video.css');
          } elseif ($page_settings['choose_page_variation'] == 'animation') {
              wp_enqueue_style('cryptoigo-animation', CRYPTOIGO_THEME_ASSETS . 'css/template-3d-animation.css');
          } elseif ($page_settings['choose_page_variation'] == 'graphic') {
              wp_enqueue_style('cryptoigo-graphic', CRYPTOIGO_THEME_ASSETS . 'css/template-3d-graphics.css');
          } else {
          wp_enqueue_style('cryptoigo-counter', CRYPTOIGO_THEME_ASSETS . 'css/theme-counter.css');
        }
      } else {
        wp_enqueue_style('cryptoigo-counter', CRYPTOIGO_THEME_ASSETS . 'css/theme-counter.css');
      }
  } else {
    wp_enqueue_style('cryptoigo-counter', CRYPTOIGO_THEME_ASSETS . 'css/theme-counter.css');
  }

  //Cryptoigo Core style
  wp_enqueue_style('cryptoigo-custom-style', CRYPTOIGO_THEME_ASSETS . 'css/cryptoigo-custom-style.css');

  //Declared css
  wp_enqueue_style('cryptoigo-editor-style', get_stylesheet_uri() );


	/**  js include.
	--------------------------------------------------------------------------------------------------- */
  wp_enqueue_script('vendors', CRYPTOIGO_THEME_ASSETS . 'vendors/vendors.min.js', array('jquery'), '', true);
  wp_enqueue_script('flipclock', CRYPTOIGO_THEME_ASSETS . 'vendors/flipclock/flipclock.min.js', array('jquery'), '', true);
  wp_enqueue_script('swiper', CRYPTOIGO_THEME_ASSETS . 'vendors/swiper/js/swiper.min.js', array('jquery'), '', true);
  wp_enqueue_script('jquery-waypoints', CRYPTOIGO_THEME_ASSETS . 'vendors/waypoints/jquery.waypoints.min.js', array('jquery'), '', true);
  wp_enqueue_script('cryptoigo-theme', CRYPTOIGO_THEME_ASSETS . 'js/cryptoigo-theme.js', array('jquery'), '', true);


  if( function_exists( 'cryptoigo_framework_init' ) ) {
    $page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
    if(!empty($page_settings['choose_page_banner_variation'])) {
      if($page_settings['choose_page_banner_variation'] == 'particle') {
        wp_enqueue_script('particles', CRYPTOIGO_THEME_ASSETS . 'vendors/particles.min.js', array('jquery'), '3.4.1', true);
        wp_enqueue_script('particles-type2', CRYPTOIGO_THEME_ASSETS . 'js/particles-type2.js', array('jquery'), '', true);
      } 
    }
  }

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Remove type attributes
/*------------------------------------------------------------------------------------------------------------------*/ 

add_action( 'template_redirect', 'cryptoigo_remove_template_redirect');

function cryptoigo_remove_template_redirect(){

    ob_start( function( $buffer ){
        $buffer = str_replace( array( 
          '<script type="text/javascript">',
          "<script type='text/javascript'>", 
          "<script type='text/javascript' src=",
          '<script type="text/javascript" src=',
          '<style type="text/css">', 
          "' type='text/css' media=", 
          '<style type="text/css" media' 
        ), 
        array(
          '<script>', 
          "<script>", 
          "<script src=",
          '<script src=',
          '<style>', 
          "' media=", 
          '<style media'
        ), $buffer );

        return $buffer;
    });
};
