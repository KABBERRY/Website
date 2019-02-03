<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();



// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]      = array(
  'id'            => '_custom_page_options',
  'title'         => 'Home page onepage menu Options',
  'post_type'     => 'page', // or post or CPT or array( 'page', 'post' )
  'context'       => 'normal',
  'priority'      => 'default',
  'sections'      => array(

    // begin section
    array(
      'name'      => 'onepage_option',
      'title'     => 'OnePage Nav Option',
      'icon'      => 'fa fa-tasks',
      'fields'    => array(

        array(
          'id'      => 'cryptoigo_onepage_nav',
          'type'    => 'switcher',
          'title'   => 'OnePage Nav On?',
          'default' => false
        ),

        // a field
        array(
          'id'              => 'onepage_nav',
          'type'            => 'group',
          'title'           => 'Menu Name',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Menu',
          'fields'          => array(
            array(
              'id'    => 'menu_name',
              'type'  => 'text',
              'title' => 'Menu Name',
            ),
          ),
          'dependency' => array( 'cryptoigo_onepage_nav', '==', 'true' ) // dependency rule
        ),

      ),
    ),

  ),
);


// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]      = array(
  'id'            => '_custom_page_variation_options',
  'title'         => 'Home page variation options',
  'post_type'     => 'page',
  'context'       => 'normal',
  'priority'      => 'default',
  'sections'      => array(

    // begin section
    array(
      'name'      => 'page_variation_option',
      'title'     => 'Page Variation Choose Option',
      'icon'      => 'fa fa-ticket',
      'fields'    => array(
        
        array(
          'id'          => 'choose_page_variation',
          'type'        => 'radio',
          'title'       => 'Choose Page Variation',
          'options'     => array(
            'counter'   => 'Counter Version',
            'video'     => 'Video Version',
            'animation' => '3d Animation',
            'graphic'   => '3d Graphic',
          ),
          'default'     => 'counter'
        ),

        array(
          'id'          => 'choose_page_banner_variation',
          'type'        => 'radio',
          'title'       => 'Choose Page Banner Variation',
          'options'     => array(
            'classic'   => 'Classic Banner',
            'particle'  => 'Particle Banner',
            'ripple'    => 'Ripple Banner',
          ),
          'default'     => 'classic'
        ),

      ),
    ),

  ),
);


// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]      = array(
  'id'            => '_custom_page_animation_options',
  'title'         => 'Animated page options',
  'post_type'     => 'page',
  'context'       => 'normal',
  'priority'      => 'default',
  'sections'      => array(

    // begin section
    array(
      'name'      => 'page_animation_option',
      'title'     => 'Page Animated Switch Option',
      'icon'      => 'fa fa-ticket',
      'fields'    => array(
        array(
          'id'      => 'cryptoigo_animated_page',
          'type'    => 'switcher',
          'title'   => 'Animated Page? Please On it',
          'default' => false
        ),

      ),
    ),

  ),
);


// -----------------------------------------
// Blog Metabox Options                    -
// -----------------------------------------
$options[]      = array(
  'id'            => '_custom_post_options',
  'title'         => 'Default Post Options',
  'post_type'     => 'post', // or post or CPT or array( 'page', 'post' )
  'context'       => 'side',
  'priority'      => 'default',
  'sections'      => array(

    // begin section
    array(
      'name'      => 'onepage_option',
      'title'     => 'Post Custom Option',
      'icon'      => 'fa fa-tasks',
      'fields'    => array(

        array(
          'id'      => 'post_small_img',
          'type'    => 'image',
          'title'   => 'Post small thumbnail image',
        ),

      ),
    ),

  ),
);


// -----------------------------------------
// Team Section Metabox Options            -
// -----------------------------------------
$options[]      = array(
  'id'            => '_team_options',
  'title'         => 'Team Options',
  'post_type'     => 'our_team',
  'context'       => 'normal',
  'priority'      => 'default',
  'sections'      => array(

    // begin section
    array(
      'name'      => 'team_member_option',
      'title'     => 'Team Member Option',
      'icon'      => 'fa fa-ticket',
      'fields'    => array(


        array(
          'id'      => 'team_thumbnail_pic',
          'type'    => 'image',
          'title'   => 'Team thumbnail image',
        ),
        array(
          'id'      => 'team_member_designation',
          'type'    => 'text',
          'title'   => 'Team member designation',
        ),
        array(
          'id'              => 'team_sm_btn',
          'type'            => 'group',
          'title'           => 'Team Member Social Activity',
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
          'id'              => 'team_member_skills',
          'type'            => 'group',
          'title'           => 'Team Member Skills',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Field',
          'fields'          => array(

            array(
              'id'          => 'skill_name',
              'type'        => 'text',
              'title'       => 'Skill Name',
            ),
            array(
              'id'          => 'skill_persantage',
              'type'        => 'text',
              'title'       => 'Skill Persantage',
              'desc'        => 'Put number like this 90 ( not add % it )',
            ),


          ),
        ),


      ),
    ),

  ),
);


// -----------------------------------------
// Advisor Section Metabox Options            -
// -----------------------------------------
$options[]      = array(
  'id'            => '_advisor_options',
  'title'         => 'Advisor Options',
  'post_type'     => 'advisor',
  'context'       => 'normal',
  'priority'      => 'default',
  'sections'      => array(

    // begin section
    array(
      'name'      => 'advisor_member_option',
      'title'     => 'Advisor Member Option',
      'icon'      => 'fa fa-ticket',
      'fields'    => array(


        array(
          'id'      => 'advisor_thumbnail_pic',
          'type'    => 'image',
          'title'   => 'Thumbnail picture',
        ),
        array(
          'id'      => 'advisor_member_designation',
          'type'    => 'text',
          'title'   => 'Designation',
        ),
        array(
          'id'      => 'advisor_sign_pic',
          'type'    => 'image',
          'title'   => 'sign picture',
        ),
        array(
          'id'      => 'advisor_sm_icon',
          'type'    => 'icon',
          'title'   => 'Special Social Icon',
        ),
        array(
          'id'      => 'advisor_sm_link',
          'type'    => 'text',
          'title'   => 'Social Special Link',
        ),

        array(
          'id'              => 'advisor_sm_btn',
          'type'            => 'group',
          'title'           => 'Advisor Social Activity',
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
          'id'              => 'advisor_member_skills',
          'type'            => 'group',
          'title'           => 'Advisor Skills',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Field',
          'fields'          => array(

            array(
              'id'          => 'skill_name',
              'type'        => 'text',
              'title'       => 'Skill Name',
            ),
            array(
              'id'          => 'skill_persantage',
              'type'        => 'text',
              'title'       => 'Skill Persantage',
              'desc'        => 'Put number like this 90 ( not add % it )',
            ),


          ),
        ),


      ),
    ),

  ),
);

// -----------------------------------------
// Faq Section Metabox Options            -
// -----------------------------------------
$options[]      = array(
  'id'            => '_faq_options',
  'title'         => 'Faq Options',
  'post_type'     => 'faq',
  'context'       => 'normal',
  'priority'      => 'default',
  'sections'      => array(

    // begin section
    array(
      'name'      => 'faq_qa_option',
      'title'     => 'Faq Option',
      'icon'      => 'fa fa-ticket',
      'fields'    => array(

        array(
          'id'              => 'faq_item_list',
          'type'            => 'group',
          'title'           => 'Add Faq List',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Field',
          'fields'          => array(

            array(
              'id'          => 'faq_title',
              'type'        => 'text',
              'title'       => 'Faq Title ( Question )',
            ),
            array(
              'id'          => 'faq_desc',
              'type'        => 'textarea',
              'title'       => 'Faq Description ( Answer )',
              'sanitize'    => 'Faq Description ( Answer )',
            ),

          ),
        ),


      ),
    ),

  ),
);


CRYPTOIGOFramework_Metabox::instance( $options );
