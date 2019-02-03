<?php

/*============================================================================================================================*/
/* - Recent Post Widget Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'CRYPTOIGO_recent_post_Widget' ) ) {
  class CRYPTOIGO_recent_post_Widget extends WP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'cryptoigo_rp_widget',
        'description' => 'Recent Post Widget.'
      );

      parent::__construct( 'recent_post_widget', 'CryptoIGO :: Recent Post', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );
      echo $before_widget;

      $title = $instance['title'];
      $title_excerpt = $instance['title_excerpt'];
      $post_no = $instance['post_per_page'];

      ?>      
      
      <div class="latest-posts">
        <h3 class="sidebar-title"><?php echo esc_html( $title ); ?></h3>
        <ul>
          <?php $query = ""; 
          $pc = new WP_Query('post_type=post&posts_per_page=' . $post_no, $query);
          while ($pc->have_posts()) : $pc->the_post(); 
            ?>
            <li>
              <a href="<?php the_permalink(); ?>">
                <div class="media">
                  <?php
                  $post_data = get_post_meta( get_the_ID(), '_custom_post_options', true );
                  if (!empty( $post_data['post_small_img'] )) {
                    $post_small_img = $post_data['post_small_img'];
                    $attachment = wp_get_attachment_image_src( $post_small_img, 'full' );
                    $thumb_image = $attachment['0'];
                  } else {
                    $thumb_image = '';
                  }

                  if (!empty($thumb_image)) { ?>
                    <img class="mr-3" src="<?php echo esc_url( $thumb_image ); ?>" alt="user2">
                  <?php } else if (!empty(get_the_post_thumbnail_url())) { ?>
                    <img class="mr-3" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="user2">
                  <?php } ?>

                  <div class="media-body">
                    <h4 class="post-name"><?php the_title(); ?></h4>
                    <div class="post-date"><?php echo get_the_date(); ?></div>
                  </div>
                </div>
              </a>
            </li>
          <?php endwhile; wp_reset_query(); ?>
        </ul>
      </div>

      <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['title_excerpt']   = $new_instance['title_excerpt'];
      $instance['post_per_page']    = $new_instance['post_per_page'];
      return $instance;

    }

    function form( $instance ) {

      //
      // Title Field Defaults
      // -------------------------------------------------
      $instance       = wp_parse_args( $instance, array(
        'title'       => 'Recent Post',
        'post_per_page' => '3',
        'title_excerpt' => '3',
      ));

      //
      // Title Field
      // -------------------------------------------------
      $text_value = esc_attr( $instance['title'] );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );
      echo cryptoigo_add_element( $text_field, $text_value );

      //
      // Title Field
      // -------------------------------------------------
      $title_excerpt_value = esc_attr( $instance['title_excerpt'] );
      $title_excerpt_field = array(
        'id'    => $this->get_field_name('title_excerpt'),
        'name'  => $this->get_field_name('title_excerpt'),
        'type'  => 'text',
        'title' => 'Title Excerpt',
      );
      echo cryptoigo_add_element( $title_excerpt_field, $title_excerpt_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $post_per_page_value = esc_attr( $instance['post_per_page'] );
      $post_per_page_field = array(
        'id'    => $this->get_field_name('post_per_page'),
        'name'  => $this->get_field_name('post_per_page'),
        'type'  => 'text',
        'title' => 'Post Per Page',
        'info'  => 'How post display here',
      );
      echo cryptoigo_add_element( $post_per_page_field, $post_per_page_value );

    }
  }
}

if ( ! function_exists( 'cryptoigo_recent_post_widget_init' ) ) {
  function cryptoigo_recent_post_widget_init() {
    register_widget( 'CRYPTOIGO_recent_post_Widget' );
  }
  add_action( 'widgets_init', 'cryptoigo_recent_post_widget_init', 1 );
}


/*============================================================================================================================*/
/* - Contact Widget Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'CRYPTOIGO_contact_post_Widget' ) ) {
  class CRYPTOIGO_contact_post_Widget extends WP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'cryptoigo_rp_widget',
        'description' => 'Contact Widget.'
      );

      parent::__construct( 'contact_post_widget', 'CryptoIGO :: Contact', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );
      echo $before_widget;
      if (!empty($instance['title'])) {
        $title = $instance['title'];
      } if (!empty($instance['description'])) {
        $description = $instance['description'];
      } if (!empty($instance['button_text'])) {
        $button_text = $instance['button_text'];
      } if (!empty($instance['button_link'])) {
        $button_link = $instance['button_link'];
      }

      ?>      

      <div class="contact-us">
        <div>
          <h5 class="contact-title"><?php if (!empty($title)) { echo esc_html( $title ); } ?></h5>
          <div class="contact-text"><?php if (!empty($description)) { echo $description; } ?></div>
          <a href="<?php if (!empty($button_link)) { echo esc_url( $button_link ); } ?>" class="btn btn-gradient-orange btn-round"><?php if (!empty($button_text)) { echo esc_html( $button_text );} ?></a>
        </div>
      </div>

      <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['description']   = $new_instance['description'];
      $instance['button_text']    = $new_instance['button_text'];
      $instance['button_link']    = $new_instance['button_link'];
      return $instance;

    }

    function form( $instance ) {

      //
      // Field Default Value Set
      // -------------------------------------------------
      $instance       = wp_parse_args( $instance, array(
        'title'       => 'How can we help you?',
        'description' => 'Have questions?',
        'button_text' => 'Contact Us',
        'button_link' => '#',
      ));

      //
      // Title Field
      // -------------------------------------------------
      $text_value = esc_attr( $instance['title'] );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );
      echo cryptoigo_add_element( $text_field, $text_value );

      //
      // Contact Description Field
      // -------------------------------------------------
      $description_value = esc_attr( $instance['description'] );
      $description_field = array(
        'id'    => $this->get_field_name('description'),
        'name'  => $this->get_field_name('description'),
        'type'  => 'textarea',
        'title' => 'Description',
      );
      echo cryptoigo_add_element( $description_field, $description_value );

      //
      // Button Text
      // -------------------------------------------------
      $button_text_value = esc_attr( $instance['button_text'] );
      $button_text_field = array(
        'id'    => $this->get_field_name('button_text'),
        'name'  => $this->get_field_name('button_text'),
        'type'  => 'text',
        'title' => 'Button Text',
      );
      echo cryptoigo_add_element( $button_text_field, $button_text_value );

      //
      // Button Link
      // -------------------------------------------------
      $button_link_value = esc_attr( $instance['button_link'] );
      $button_link_field = array(
        'id'    => $this->get_field_name('button_link'),
        'name'  => $this->get_field_name('button_link'),
        'type'  => 'text',
        'title' => 'Button Text',
      );
      echo cryptoigo_add_element( $button_link_field, $button_link_value );

    }
  }
}

if ( ! function_exists( 'cryptoigo_contact_post_widget_init' ) ) {
  function cryptoigo_contact_post_widget_init() {
    register_widget( 'CRYPTOIGO_contact_post_Widget' );
  }
  add_action( 'widgets_init', 'cryptoigo_contact_post_widget_init', 2 );
}



/*============================================================================================================================*/
/* - About Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'CRYPTOIGO_about_Widget' ) ) {
  class CRYPTOIGO_about_Widget extends WP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'cryptoigo_about_widget',
        'description' => 'About Widget.'
      );

      parent::__construct( 'about_widget', 'CryptoIGO :: About Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );
      echo $before_widget;
      if (!empty($instance['title'])) {
        $title = $instance['title'];
      } if (!empty($instance['logo_img'])) {
        $logo_img_id = $instance['logo_img'];
        $attachment  = wp_get_attachment_image_src( $logo_img_id, 'full' );
        $footer_logo = ($attachment) ? $attachment[0] : $logo_img_id;
      } if (!empty($instance['description'])) {
        $description = $instance['description'];
      } if (!empty($instance['social_btns'])) {
        $social_btns = $instance['social_btns'];
      }

      ?>      

      <div class="about">
        <div class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s">
          <?php if (!empty($footer_logo)) { ?>
            <img src="<?php echo esc_url( $footer_logo ); ?>" alt="Footer Logo">
          <?php } ?>
          <span class="logo-text"><?php if (!empty($title)) { echo esc_html( $title ); } ?></span>
        </div>
        <div class="about-text animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
          <p class="grey-accent2"><?php if (!empty($description)) { echo $description; } ?></p>
        </div>
        <ul class="social-buttons list-unstyled mb-5">
          
          <?php if (!empty($social_btns)) { echo $social_btns; } ?>

        </ul>
      </div>

      <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['logo_img']   = $new_instance['logo_img'];
      $instance['description']   = $new_instance['description'];
      $instance['social_btns']    = $new_instance['social_btns'];
      return $instance;

    }

    function form( $instance ) {

      //
      // Field Default Value Set
      // -------------------------------------------------
      $instance       = wp_parse_args( $instance, array(
        'title'       => 'Crypto ICO',
        'description' => 'Crypto Ico is a blockchain platform that allows users to make payments, create and request loans and crowdfund projects.',
        'social_btns' => '<li class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><a href="#" title="Facebook" class="btn font-medium"><i class="ti-facebook"></i></a></li>',
        'logo_img' => CRYPTOIGO_PLG_URL. 'framework/assets/images/logo.png',
      ));

      // -------------------------------------------------
      // Title Field
      // -------------------------------------------------
      $text_value = esc_attr( $instance['title'] );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );
      echo cryptoigo_add_element( $text_field, $text_value );


      // -------------------------------------------------
      // Title Field
      // -------------------------------------------------
      $logo_img_value = esc_attr( $instance['logo_img'] );
      $logo_img_field = array(
        'id'    => $this->get_field_name('logo_img'),
        'name'  => $this->get_field_name('logo_img'),
        'type'  => 'image',
        'title' => 'Logo Image',
      );
      echo cryptoigo_add_element( $logo_img_field, $logo_img_value );


      // -------------------------------------------------
      // Contact Description Field
      // -------------------------------------------------
      $description_value = esc_attr( $instance['description'] );
      $description_field = array(
        'id'    => $this->get_field_name('description'),
        'name'  => $this->get_field_name('description'),
        'type'  => 'textarea',
        'title' => 'Description',
      );
      echo cryptoigo_add_element( $description_field, $description_value );


      // -------------------------------------------------
      // Button Text
      // -------------------------------------------------
      $social_btns_value = esc_attr( $instance['social_btns'] );
      $social_btns_field = array(
        'id'    => $this->get_field_name('social_btns'),
        'name'  => $this->get_field_name('social_btns'),
        'type'  => 'textarea',
        'title' => 'Social List',
        'desc' => 'Social List in li tag ( Please see the documentation raw code )',
      );
      echo cryptoigo_add_element( $social_btns_field, $social_btns_value );


    }
  }
}

if ( ! function_exists( 'cryptoigo_about_widget_init' ) ) {
  function cryptoigo_about_widget_init() {
    register_widget( 'CRYPTOIGO_about_Widget' );
  }
  add_action( 'widgets_init', 'cryptoigo_about_widget_init', 3 );
}


