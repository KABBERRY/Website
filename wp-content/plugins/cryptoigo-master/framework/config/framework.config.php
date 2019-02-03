<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'CryptoIGO',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cryptoigo',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'CryptoIGO <small> by cryptoigo v:1.0.0 </small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();


// ===================================================================
// Genaral Settings =
// ===================================================================

$options[]      = array(
  'name'        => 'genaral',
  'title'       => 'Genaral Setting',
  'icon'        => 'fa fa-home',
   // begin: fields
  'fields'      => array(
    array(
      'type'    => 'heading',
      'content' => 'Site Icon Setting',
    ),
    array(
      'id'          => 'cryptoigo_site_icon',
      'type'        => 'image',
      'title'       => 'Upload Favicon Icon',
      'default'     => CRYPTOIGO_PLG_URL. 'framework/assets/images/favicon.ico',
    ),

    array(
      'type'    => 'heading',
      'content' => 'Logo Setting',
    ),
    array(
      'id'          => 'cryptoigo_logo_img',
      'type'        => 'image',
      'title'       => 'Upload Logo',
      'default'     => CRYPTOIGO_PLG_URL. 'framework/assets/images/logo.png',
    ),
    array(
      'id'          => 'cryptoigo_orange_logo_img',
      'type'        => 'image',
      'title'       => 'Upload Dark Version Logo',
      'default'     => CRYPTOIGO_PLG_URL. 'framework/assets/images/orange-logo.png',
    ),
    array(
      'id'          => 'cryptoigo_logo_txt',
      'type'        => 'text',
      'title'       => 'Put Logo Text',
      'default'     => 'Crypto IGO',
    ),
    array(
      'id'      => 'left_social_header',
      'type'    => 'switcher',
      'title'   => 'Body left social buttons On?',
    ),
    array(
      'id'              => 'header_social_btn',
      'type'            => 'group',
      'title'           => 'Body Left Social Button',
      'dependency'   => array( 'left_social_header', '==', 'true' ),
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Field',
      'fields'          => array(

        array(
          'id'          => 'social_icon',
          'type'        => 'icon',
          'title'       => 'Social Icon',
        ),
        array(
          'id'          => 'social_link',
          'type'        => 'text',
          'title'       => 'Link',
        ),

      ),
    ),
    array(
      'id'      => 'breatcrumb_bg_img',
      'type'    => 'image',
      'title'   => 'Breatcrumb Background Image',
      'default'     => CRYPTOIGO_PLG_URL. 'framework/assets/images/blockchain.png',
    ),
    array(
      'id'           => 'cryptoigo_preloader_enable',
      'type'         => 'switcher',
      'title'        => 'Preloader On?',
    ),
  
  )
);

// ===================================================================
// Header Settings =
// ===================================================================

$options[]      = array(
  'name'        => 'header_setting',
  'title'       => 'Header Setting',
  'icon'        => 'fa fa-home',
   // begin: fields
  'fields'      => array(

    array(
      'type'    => 'heading',
      'content' => 'Header Setting',
    ),
    array(
      'id'      => 'header_sign_btn_switch',
      'type'    => 'switcher',
      'title'   => 'Header sign buttons On?',
    ),
    array(
      'id'          => 'header_sign_btn_text',
      'type'        => 'text',
      'title'       => 'Sign Button Text',
      'dependency'   => array( 'header_sign_btn_switch', '==', 'true' ),
      'default'     => 'Sign In',
    ),
    array(
      'id'          => 'header_sign_btn_link',
      'type'        => 'text',
      'title'       => 'Sign Button Link',
      'dependency'   => array( 'header_sign_btn_switch', '==', 'true' ),
      'default'     => '#',
    ),
  
  )
);


// ===================================================================
// Notification Settings =
// ===================================================================

$options[]      = array(
  'name'        => 'notification_setting',
  'title'       => 'Sale Nitofication Setting',
  'icon'        => 'fa fa-home',
   // begin: fields
  'fields'      => array(
    array(
      'type'    => 'heading',
      'content' => 'Top Header',
    ),
    array(
      'id'              => 'sale_notifications',
      'type'            => 'group',
      'title'           => 'Sale Notifications Items',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Field',
      'fields'          => array(

        array(
          'id'          => 'client_pic',
          'type'        => 'upload',
          'title'       => 'Client Picture',
        ),
        array(
          'id'          => 'client_name',
          'type'        => 'text',
          'title'       => 'Client Name',
        ),
        array(
          'id'          => 'client_message',
          'type'        => 'text',
          'title'       => 'Client Message',
        ),
        array(
          'id'          => 'purchase_time',
          'type'        => 'text',
          'title'       => 'Purchase Time',
        ),

      ),
    ),
  
  )
);




// ===================================================================
// Cryptoigo Blog Settings =
// ===================================================================

$options[]      = array(
  'name'        => 'blog_setting',
  'title'       => 'Blog Page Setting',
  'icon'        => 'fa fa-pencil-square-o',
   // begin: fields
  'fields'      => array(

    array(
      'type'         => 'heading',
      'content'      => 'Blog Setting',
    ),
  
    array(
      'id'           => 'blog_layout',
      'type'         => 'image_select',
      'title'        => 'Page Layout Style',
      'options'      => array(
        'left-sidebar'  => CRYPTOIGO_PLG_URL. '/framework/assets/images/sidebar_l.jpg',
        'right-sidebar' => CRYPTOIGO_PLG_URL. '/framework/assets/images/sidebar_r.jpg',
        'full-width'    => CRYPTOIGO_PLG_URL. '/framework/assets/images/fullwidth.jpg',
        ),
    ),

    array(
      'id'              => 'sidebar_social_btn',
      'type'            => 'group',
      'title'           => 'Sidebar Social Button',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Field',
      'fields'          => array(

        array(
          'id'          => 'social_icon',
          'type'        => 'icon',
          'title'       => 'Social Icon',
        ),
        array(
          'id'          => 'social_link',
          'type'        => 'text',
          'title'       => 'Link',
        ),

      ),
    ),
  
  )
);



// ===================================================================
// 404 Page Settings =
// ===================================================================

$options[]      = array(
  'name'        => '404_page',
  'title'       => '404 Page Setting',
  'icon'        => 'fa fa-frown-o',
  // begin: fields
  'fields'      => array(

    array(
      'id'    => '404_page_img',
      'type'  => 'image',
      'title' => '404 Page Image',
      'default' => get_template_directory_uri() . '/theme-assets/images/error.png',
    ),
    array(
      'id'    => '404_page_title',
      'type'  => 'textarea',
      'title' => '404 Page Description',
      'default' => 'Oops! You’ve got lost in space'
    ),
    array(
      'id'    => 'cryptoigo_404_btn_txt',
      'type'  => 'text',
      'title' => 'Button Text',
      'default' => 'Back to Home'
    ), 
  
  )
);


// ===================================================================
// Footer Options =
// ===================================================================

$options[]      = array(
  'name'        => 'footer_setting',
  'title'       => 'Footer Setting',
  'icon'        => 'fa fa-rub',
  // begin: fields
  'fields'      => array(
    array(
      'id'      => 'footer_title',
      'type'    => 'text',
      'title'   => 'Footer Title',
      'default' => 'Stay updated with us',
    ),
    array(
      'id'      => 'footer_newsletter_shortcode',
      'type'    => 'textarea',
      'title'   => 'Footer Newsletter Shortcode',
    ),
    array(
      'id'              => 'footer_social_btn',
      'type'            => 'group',
      'title'           => 'Footer Social Button',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Field',
      'fields'          => array(

        array(
          'id'          => 'social_icon',
          'type'        => 'icon',
          'title'       => 'Social Icon',
        ),
        array(
          'id'          => 'social_link',
          'type'        => 'text',
          'title'       => 'Link',
        ),

      ),
    ),
    array(
      'id'        => 'copyrights',
      'type'      => 'textarea',
      'title'     => 'Copyright Footer',
      'default'   => 'Copyright &copy; 2018, Cryptoigo. Theme Developed by <a href="http://jthemes.com/" title="jthemes"> Jthemes</a>',
      'sanitize'  => false,
    ),

  ),
  // end: fields
);



// ------------------------------
// a seperator                  -
// ------------------------------
$options[] = array(
  'name'   => 'seperator_1',
  'title'  => 'A Seperator',
  'icon'   => 'fa fa-bookmark'
);

// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => 'Backup',
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => 'You can save your current options. Download a Backup and Import.',
    ),

    array(
      'type'    => 'backup',
    ),

  )
);


CRYPTOIGOFramework::instance( $settings, $options );
