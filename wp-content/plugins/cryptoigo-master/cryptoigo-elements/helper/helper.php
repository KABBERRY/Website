<?php 


/* - For Custom Icon Loading
==========================================================*/
function cryptoigo_get_flat_icons() {
	return [
    /* - Flat Icons - */
    'ti-headphone'=>'Headphone',
    'ti-email'=>'Email',
    'ti-comment-alt'=>'Comment Alt',
    'ti-location-pin'=>'Location Pin',
    'ti-pulse'=>'Pulse',
    'ti-stats-up'=>'Stats Up',
    'ti-split-h'=>'Split',
	];
}



/* - For category
==========================================================*/
function cryptoigo_get_category_post(){

  $categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 0
  ) );
  
  $catlist=[];

  foreach ( $categories as $category ) {
    (int)$catlist[$category->term_id] = $category->name;
  }

return $catlist;

}


/* - For Contact Form 7
==========================================================*/
if ( ! function_exists( 'get_contact_form_7_posts' ) ) :

  function get_contact_form_7_posts(){

  $args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);

    $catlist=[];
    
    if( $categories = get_posts($args)){
    	foreach ( $categories as $category ) {
    		(int)$catlist[$category->ID] = $category->post_title;
    	}
    }
    else{
        (int)$catlist['0'] = esc_html__('None Found, Install & Make Contact forms', 'cryptoigo');
    }
  return $catlist;
  }

endif;


/* - For custom category slug & category name
==========================================================*/

if ( ! function_exists( 'cryptoigo_gallery_categories_slug_no_comma' ) ) :
  /**
   * Getting Custome taxanomy for gallery - category- single gallery for filtering
   */
  function cryptoigo_gallery_categories_slug_no_comma() {
    $categories = get_the_terms( get_the_ID(), 'gallery_tax' );
      if(!empty($categories)){
        foreach( $categories as $category ) {
            echo $category->slug.' ';
        }
      }
  }
endif;


if ( ! function_exists( 'cryptoigo_gallery_categories' ) ) :
  /**
   * Getting Custome taxanomy for gallery - category- single gallery
   */
  function cryptoigo_gallery_categories() {

      $terms = get_the_terms( get_the_ID(), 'gallery_tax' );
      if(!empty($terms)){
      $gallery_category_links = array();

      foreach ( $terms as $term ) {
          $gallery_category_links[] = $term->name;
      }
      $on_gallery_category = join( ", ", $gallery_category_links );
      return sprintf( esc_html__( '%s', 'cryptoigo' ), esc_html( $on_gallery_category ) );
    }
  }
endif;



