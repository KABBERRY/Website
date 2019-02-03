<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package cryptoigo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
add_filter( 'body_class', 'cryptoigo_body_classes' );

function cryptoigo_body_classes( $classes ) {
  // Adds a class of group-blog to blogs with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  if( is_404() ) {
    $classes[] = 'blank-page';
  }

  if( function_exists( 'cryptoigo_framework_init' ) ) {
    $meta_data = get_post_meta( get_the_ID(), '_custom_page_animation_options', true );


    if (!empty($meta_data['cryptoigo_animated_page'])) {
      $page_animated = $meta_data['cryptoigo_animated_page'];
    } else {
      $page_animated = '';
    }

    if (!empty($page_animated)) {
      $animated_page = 'page-animated';
    } else {
      $animated_page = 'page-not-animated';
    }

  } else {
    $animated_page = 'page-not-animated';
  }

  if( function_exists( 'cryptoigo_framework_init' ) ) {

    $page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );

    if(!empty($page_settings)) {

      if($page_settings['choose_page_variation'] == 'counter') {
        $classes[] = "1-column template-counter $animated_page";
      } elseif ($page_settings['choose_page_variation'] == 'video') { 
        $classes[] = "1-column undefined svg-wrapper video-banner-page $animated_page";
      } elseif ($page_settings['choose_page_variation'] == 'animation') { 
        $classes[] = "1-column undefined svg-wrapper animation-banner-page $animated_page";
      } elseif ($page_settings['choose_page_variation'] == 'graphic') { 
        $classes[] = "1-column undefined template-3g-graphics animation-banner-page $animated_page";
      } else { 
        $classes[] = "1-column template-counter $animated_page";
      }
    } else { 
      $classes[] = "1-column template-counter $animated_page";
    }
  } else { 
    $classes[] = "1-column template-counter $animated_page";
  } 

  return $classes;
}

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post.
 * @return array
 */
function cryptoigo_post_classes( $classes, $class, $post_id ) {
  $classes[] = 'card square';
  return $classes;
}
add_filter( 'post_class', 'cryptoigo_post_classes', 10, 3 );


/**
 * wp title
 *
 * @return array 
 */
function cryptoigo_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'cryptoigo' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'cryptoigo_wp_title', 10, 2 );



/*------------------------------------------------------------------------------------------------------------------*/
/*  Header Style Load
/*------------------------------------------------------------------------------------------------------------------*/ 

add_action('cryptoigo_header_style', 'cryptoigo_header_style_load');
function cryptoigo_header_style_load() {
  $cryptoigo_onepage_page_header_option = get_post_meta(get_the_ID(), '_custom_page_options', true );

  if(!empty($cryptoigo_onepage_page_header_option['cryptoigo_onepage_nav'])) {
    if($cryptoigo_onepage_page_header_option['cryptoigo_onepage_nav'] == 1) {
      get_template_part('headers/header', 'onepage' );
    } else {
      get_template_part('headers/header', 'default' );
    }
  } else {
    get_template_part('headers/header', 'default' );
  }

}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Footer Style Load
/*------------------------------------------------------------------------------------------------------------------*/ 

add_action('cryptoigo_footer_style', 'cryptoigo_footer_style_load');
function cryptoigo_footer_style_load() {
  $cryptoigo_footer_option = get_post_meta(get_the_ID(), '_custom_page_variation_options', true );
  if(!empty($cryptoigo_footer_option['choose_page_variation'])) {
    if($cryptoigo_footer_option['choose_page_variation'] == 'animation') {
      get_template_part('footers/footer', 'animation' );
    } elseif($cryptoigo_footer_option['choose_page_variation'] == 'graphic') {
      get_template_part('footers/footer', 'animation' );
    }
  } else {
    get_template_part('footers/footer', 'default' );
  }
}

/*------------------------------------------------------------------------------------------------------------------*/
/*  CryptoIgo Nav Walker
/*------------------------------------------------------------------------------------------------------------------*/ 

class CryptoIgo_navwalker extends Walker_Nav_Menu {
    /**
     * @see Walker::start_lvl()
     * @since 1.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat( "\t", $depth );
      $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
    }
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
          $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
          $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
          $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_html( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
          $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_html( $item->title ) . '</a>';
        } else {
          $class_names = $value = '';
          $classes = empty( $item->classes ) ? array() : (array) $item->classes;
          $classes[] = 'menu-item-' . $item->ID;
          $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
          if ( $args->has_children )
            $class_names .= ' submenu-area';
          if ( in_array( 'current-menu-item', $classes ) )
            $class_names .= ' active';
          $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
          $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
          $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
          $output .= $indent . '<li' . $id . $value . $class_names .'>';
          $atts = array();
          $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
          $atts['target'] = ! empty( $item->target )  ? $item->target : '';
          $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';
            // If item has_children add atts to a.
          if ( $args->has_children && $depth === 0 ) {
            $atts['href']           = '#';
            $atts['data-toggle']    = 'dropdown';
            $atts['class']          = 'dropdown-toggle';
            $atts['aria-haspopup']  = 'true';
          } else {
            $atts['href'] = ! empty( $item->url ) ? $item->url : '';
          }
          $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
          $attributes = '';
          foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
              $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
              $attributes .= ' ' . $attr . '="' . $value . '"';
            }
          }
          $item_output = $args->before;
            /*
             * Glyphicons
             * ===========
             * Since the the menu item is NOT a Divider or Header we check the see
             * if there is a value in the attr_title property. If the attr_title
             * property is NOT null we apply it as the class name for the glyphicon.
             */
            if ( ! empty( $item->attr_title ) )
              $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
              $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ( $args->has_children && 0 === $depth ) ? '</a>' : '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
          }
        }
    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
      if ( ! $element )
        return;
      $id_field = $this->db_fields['id'];
        // Display this element.
      if ( is_object( $args[0] ) )
       $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
     parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
   }
    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
      if ( current_user_can( 'manage_options' ) ) {
        extract( $args );
        $fb_output = null;
        if ( $container ) {
          $fb_output = '<' . $container;
          if ( $container_id )
            $fb_output .= ' id="' . $container_id . '"';
          if ( $container_class )
            $fb_output .= ' class="' . $container_class . '"';
          $fb_output .= '>';
        }
        $fb_output .= '<ul';
        if ( $menu_id )
          $fb_output .= ' id="' . $menu_id . '"';
        if ( $menu_class )
          $fb_output .= ' class="' . $menu_class . '"';
        $fb_output .= '>';
        $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">' .esc_html__('Add a menu', 'cryptoigo'). '</a></li>';
        $fb_output .= '</ul>';
        if ( $container )
          $fb_output .= '</' . $container . '>';
        echo wp_kses( $fb_output );
      }
    }
  }



/**  comments from call back function.
--------------------------------------------------------------------------------------------------- */

if(!function_exists('cryptoigo_comment')):

	function cryptoigo_comment($comment, $args, $depth) {
		
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
      case 'pingback' :
      case 'trackback' :
            // Display trackbacks differently than normal comments.
      ?>
      <li <?php comment_class(); ?> id="submited-comment">

       <p><?php esc_html_e( 'Pingback:', 'cryptoigo' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'cryptoigo' ), '<span class="edit-link">', '</span>' ); ?></p>
       <?php
       break;
       default :

       global $post;
       ?>

       <li <?php comment_class(); ?>>

        <div id="comment-<?php comment_ID(); ?>" class="comment-reply">
          <div class="media">

            <?php if ( !empty(get_avatar( $comment, $args['avatar_size'] ) )) { ?>
              <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
            <?php } ?>

            <div class="comments-content">
              <div class="media-body">
                <h5 class="user-name"><?php comment_author(); ?></h5>
                <div class="date-time"><?php echo get_comment_date( 'F j, Y \a\t i:s A' ); ?></div>
                <div class="reply">
                  <?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="ti-back-right"></i>' . esc_html__('Reply', 'cryptoigo'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
              </div>
              <div class="comments-text">
                <?php comment_text(); ?>
              </div>
            </div>

          </div>
        </div>
        <?php
        break;
      endswitch; 
    }

  endif;


  /*------------------------------------------------------------------------------------------------------------------*/
/*	search
/*------------------------------------------------------------------------------------------------------------------*/
add_filter('get_search_form', 'cryptoigo_search_form');

function cryptoigo_search_form($form) {

	/**
	 * Search form customization.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/get_search_form
	 * @since 1.0.0
	 */
	$form = '<div class="search"><form role="search" method="get" action="' . esc_url( home_url('/') ). '">
  <input type="search" class="search-control" placeholder="'.esc_attr__( 'Search ...', 'cryptoigo' ).'" name="s">
  <button type="submit" class="search-submit"><i class="ti-search"></i></button>
  </form></div>';
  return $form;
}
/*------------------------------------------------------------------------------------------------------------------*/
/* Category List count wrap by span
/*------------------------------------------------------------------------------------------------------------------*/
add_filter('wp_list_categories', 'cryptoigo_cat_count_span');

function cryptoigo_cat_count_span($links) {        
 $links = str_replace('(', '<span>(', $links);
 $links = str_replace(')', ')</span>', $links);
 return $links;
}


/*------------------------------------------------------------------------------------------------------------------*/
/*	Cryptoigo Social Buttons
/*------------------------------------------------------------------------------------------------------------------*/ 
add_action('cryptoigo_social_media', 'cryptoigo_social_media_btn');

function cryptoigo_social_media_btn() { 
  if( function_exists( 'cryptoigo_framework_init' ) ) {
   $social_btns = cryptoigo_get_option( 'cryptoigo_social_media' );
   if (!empty($social_btns)) {
    ?>
    <ul class="htr-social">
     <?php 
     if (is_array($social_btns)) {
       foreach ($social_btns as $key => $value) { ?>
         <li><a href="<?php echo esc_url($value['button_link']); ?>"><i class="<?php echo esc_attr($value['icon_class']); ?>"></i></a></li>
       <?php } } ?>
     </ul>
   <?php } } }


   /*------------------------------------------------------------------------------------------------------------------*/
/*	Cryptoigo Breadcrum
/*------------------------------------------------------------------------------------------------------------------*/

add_action('cryptoigo_breadcrum', 'cryptoigo_breadcrum_set');

function cryptoigo_breadcrum_set() { 

	if( function_exists( 'cryptoigo_framework_init' ) ) {
		$bg_img_id = cryptoigo_get_option('breatcrumb_bg_img');
    $attachment = wp_get_attachment_image_src( $bg_img_id, 'full' );
    $bg_img    = ($attachment) ? $attachment[0] : $bg_img_id;
  } else {
    $bg_img = CRYPTOIGO_IMG . 'blockchain.png';
  }

  if ( is_home() ) { ?>
    <!-- Start Page Header -->

    <!-- Breadcrumb -->
    <div class="container breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'cryptoigo') ?></a>
      <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php esc_html_e( '/ Blog Posts', 'cryptoigo') ?></a>

    </div>
    <!--/ Breadcrumb -->
  <?php } elseif ( is_single() ) { ?>

    <!-- Breadcrumb -->
    <div class="container breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'cryptoigo') ?></a>
      <a> <?php if (!empty(get_the_title())) { esc_html_e( '/ ', 'cryptoigo'); } ?> </a>
      <?php 
           $delimiter = ' / '; // separator between crumbs

           $cat = get_the_category(); 
           if (!empty($cat)) {
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ' );
            echo " "; 
            echo '<span class="current">';
            the_title();
            echo '</span>'; 
          } else {
            echo '<span class="current">';
            the_title();
            echo '</span>'; 
          }
          ?>

        </div>
        <!--/ Breadcrumb -->

      <?php } elseif ( is_page() ) { ?>

        <!-- Head Area -->
        <div class="page-header" data-midnight="white">
          <div class="img" style="background-image: url(<?php echo esc_url($bg_img); ?>);"></div>
          <div class="head-content container-fluid">
            <div class="container">
              <h1 class="page-title"><?php echo get_the_title(); ?></h1>
            </div>
          </div>
        </div>
        <!--/ Head Area -->

      <?php } elseif ( is_archive() ) { ?>

        <div class="blog-head" data-midnight="white">
          <!-- Head Area -->
          <div class="page-header blog-head-content">
            <?php 
            if ( $bg_img ) {
              ?>
              <img src="<?php echo esc_url( $bg_img ); ?>" alt="<?php echo get_the_archive_title(); ?>">
            <?php } else { ?>
              <img src="<?php echo esc_url( get_template_directory_uri() . '/theme-assets/images/blockchain.png'); ?>" alt="<?php echo get_the_archive_title(); ?>">
            <?php } ?>

            <div class="head-content container-fluid">
              <div class="container">
                <h1 class="page-title"><?php echo get_the_archive_title(); ?></h1>
              </div>
            </div>

            
          </div>
        </div>
        <!--/ Head Area -->
      <?php } elseif ( is_404() ) { ?>

        <!-- Start Page Header -->
        <div class="page-header text-white" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="page-title text-left">
                  <h2><?php esc_html_e( '404 Error Page', 'cryptoigo') ?></h2>
                </div>
              </div>
              <div class="col-md-6 col-xs-12 text-right">
                <ul class="page-breadcrumb list-inline">
                  <li><a class="active-page" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'cryptoigo') ?></a></li>
                  <li><?php esc_html_e( '404 Error', 'cryptoigo') ?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End Page Header -->

      <?php } elseif ( is_search() ) { ?>

        <!-- Breadcrumb -->
        <div class="container breadcrumb">
          <h3 class="page-title"><?php printf( esc_html__( 'Search Results %s', 'cryptoigo' ), '<span>'.'"' .get_search_query().'"'.'</span>' ); ?></h3>
        </div>
        <!--/ Breadcrumb -->

      <?php } }

/* -----------------------------------------------------------------------------------------
* 	The excerpt
* -----------------------------------------------------------------------------------------*/
function cryptoigo_excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
   array_pop($excerpt);
   $excerpt = implode(" ",$excerpt).'...';
 } else {
   $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}




/*------------------------------------------------------------------------------------------------------------------*/
/* Cryptoigo Demo Import
/*------------------------------------------------------------------------------------------------------------------*/ 
function cryptoigo_import_files() {
  return array(
    array(
      'import_file_name'             => esc_html__('Cryptoigo Demo Import', 'cryptoigo'),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/theme_content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widget_data.wie',
      'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the theme options separately. See the doc for theme options setup', 'cryptoigo' ),
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'cryptoigo_import_files' );

function cryptoigo_after_import_setup() {
    // Assign menus to their locations.
  $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
  set_theme_mod( 'nav_menu_locations', array(
    'primary' => $main_menu->term_id,
  )
);

    // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Home' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'cryptoigo_after_import_setup' );
