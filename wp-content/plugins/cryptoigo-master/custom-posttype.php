<?php 

/* Our Team
====================================================*/

add_action('init', 'our_team_init');

function our_team_init() {

  $labels = array(
    'name'               => _x( 'Our Team', 'post type general name', 'cryptoigo' ),
    'singular_name'      => _x( 'Team', 'post type singular name', 'cryptoigo' ),
    'menu_name'          => __( 'Our Team', 'cryptoigo' ),
    'name_admin_bar'     => __( 'Team', 'cryptoigo' ),
    'add_new'            => __( 'Add New', 'cryptoigo' ),
    'add_new_item'       => __( 'Add New Team', 'cryptoigo' ),
    'new_item'           => __( 'New Team', 'cryptoigo' ),
    'edit_item'          => __( 'Edit Team', 'cryptoigo' ),
    'view_item'          => __( 'View Team', 'cryptoigo' ),
    'all_items'          => __( 'All Team', 'cryptoigo' ),
    'search_items'       => __( 'Search Our Team', 'cryptoigo' ),
    'parent_item_colon'  => __( 'Parent Our Team:', 'cryptoigo' ),
    'not_found'          => __( 'No Team found.', 'cryptoigo' ),
    'not_found_in_trash' => __( 'No Team found in Trash.', 'cryptoigo' )
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => null,
    'taxonomies'         => array( 'post_tag' ),
    'menu_icon'        => 'dashicons-admin-post',
    'supports'           => array( 'title', 'editor', 'thumbnail' )
  );

  register_post_type('our_team', $args);
}

/* Texonomy
=====================================================*/

function create_our_team_taxonomies() {
  $labels = array(
    'name'          => _x( 'Team Category', 'Taxonomy plural name', 'cryptoigo' ),
    'singular_name'     => _x( 'Team Category', 'Taxonomy singular name', 'cryptoigo' ),
    'search_items'      => __( 'Search Team Category', 'cryptoigo' ),
    'popular_items'     => __( 'Popular Team Category', 'cryptoigo' ),
    'all_items'       => __( 'All Categories', 'cryptoigo' ),
    'parent_item'     => __( 'Parent Team Category', 'cryptoigo' ),
    'parent_item_colon'   => __( 'Parent Team Category', 'cryptoigo' ),
    'edit_item'       => __( 'Edit Team Category', 'cryptoigo' ),
    'update_item'     => __( 'Update Team Category', 'cryptoigo' ),
    'add_new_item'      => __( 'Add New Category', 'cryptoigo' ),
    'new_item_name'     => __( 'New Team Menu Name', 'cryptoigo' ),
    'add_or_remove_items' => __( 'Add or remove Team Category', 'cryptoigo' ),
    'choose_from_most_used' => __( 'Choose from most used text-domain', 'cryptoigo' ),
    'menu_name'       => __( 'Category', 'cryptoigo' ),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => false,
    'hierarchical'      => true,
    'show_tagcloud'     => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => true,
    'query_var'         => true,
    'capabilities'      => array(),
  );

  register_taxonomy( 'our_team_tax', array( 'our_team' ), $args );
}
add_action( 'init', 'create_our_team_taxonomies' );

// Default Category like uncategory
function team_defauls_cat( $post_id ) {
    $current_post = get_post( $post_id );

    // This makes sure the taxonomy is only set when a new post is created
    if ( $current_post->post_date == $current_post->post_modified ) {
        wp_set_object_terms( $post_id, 'Team', 'our_team_tax', true );
    }
}
add_action( 'save_post_our_team', 'team_defauls_cat' );







/* Advisor
====================================================*/

add_action('init', 'advisor_init');

function advisor_init() {

  $labels = array(
    'name'               => _x( 'Our Advisor', 'post type general name', 'cryptoigo' ),
    'singular_name'      => _x( 'Advisor', 'post type singular name', 'cryptoigo' ),
    'menu_name'          => __( 'Our Advisor', 'cryptoigo' ),
    'name_admin_bar'     => __( 'Advisor', 'cryptoigo' ),
    'add_new'            => __( 'Add New', 'cryptoigo' ),
    'add_new_item'       => __( 'Add New Advisor', 'cryptoigo' ),
    'new_item'           => __( 'New Advisor', 'cryptoigo' ),
    'edit_item'          => __( 'Edit Advisor', 'cryptoigo' ),
    'view_item'          => __( 'View Advisor', 'cryptoigo' ),
    'all_items'          => __( 'All Advisor', 'cryptoigo' ),
    'search_items'       => __( 'Search Our Advisor', 'cryptoigo' ),
    'parent_item_colon'  => __( 'Parent Our Advisor:', 'cryptoigo' ),
    'not_found'          => __( 'No Advisor found.', 'cryptoigo' ),
    'not_found_in_trash' => __( 'No Advisor found in Trash.', 'cryptoigo' )
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => null,
    'taxonomies'         => array( 'post_tag' ),
    'menu_icon'        => 'dashicons-admin-post',
    'supports'           => array( 'title', 'editor', 'thumbnail' )
  );

  register_post_type('advisor', $args);
}

/* Texonomy
=====================================================*/

function create_advisor_taxonomies() {
  $labels = array(
    'name'          => _x( 'Advisor Cat', 'Taxonomy plural name', 'cryptoigo' ),
    'singular_name'     => _x( 'Advisor Cat', 'Taxonomy singular name', 'cryptoigo' ),
    'search_items'      => __( 'Search Advisor Cat', 'cryptoigo' ),
    'popular_items'     => __( 'Popular Advisor Cat', 'cryptoigo' ),
    'all_items'       => __( 'All Categories', 'cryptoigo' ),
    'parent_item'     => __( 'Parent Advisor Cat', 'cryptoigo' ),
    'parent_item_colon'   => __( 'Parent Advisor Cat', 'cryptoigo' ),
    'edit_item'       => __( 'Edit Advisor Cat', 'cryptoigo' ),
    'update_item'     => __( 'Update Advisor Cat', 'cryptoigo' ),
    'add_new_item'      => __( 'Add New Category', 'cryptoigo' ),
    'new_item_name'     => __( 'New Team Menu Name', 'cryptoigo' ),
    'add_or_remove_items' => __( 'Add or remove Advisor Cat', 'cryptoigo' ),
    'choose_from_most_used' => __( 'Choose from most used text-domain', 'cryptoigo' ),
    'menu_name'       => __( 'Category', 'cryptoigo' ),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => false,
    'hierarchical'      => true,
    'show_tagcloud'     => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => true,
    'query_var'         => true,
    'capabilities'      => array(),
  );

  register_taxonomy( 'advisor_tax', array( 'advisor' ), $args );
}

add_action( 'init', 'create_advisor_taxonomies' );

// Default Category like uncategory
function advisor_defauls_cat( $post_id ) {
    $current_post = get_post( $post_id );

    // This makes sure the taxonomy is only set when a new post is created
    if ( $current_post->post_date == $current_post->post_modified ) {
        wp_set_object_terms( $post_id, 'Advisor', 'advisor_tax', true );
    }
}
add_action( 'save_post_advisor', 'advisor_defauls_cat' );



/* Faq
====================================================*/

add_action('init', 'faq_init');

function faq_init() {

  $labels = array(
    'name'               => _x( 'Our Faq', 'post type general name', 'cryptoigo' ),
    'singular_name'      => _x( 'Faq', 'post type singular name', 'cryptoigo' ),
    'menu_name'          => __( 'Our Faq', 'cryptoigo' ),
    'name_admin_bar'     => __( 'Faq', 'cryptoigo' ),
    'add_new'            => __( 'Add New', 'cryptoigo' ),
    'add_new_item'       => __( 'Add New Faq', 'cryptoigo' ),
    'new_item'           => __( 'New Faq', 'cryptoigo' ),
    'edit_item'          => __( 'Edit Faq', 'cryptoigo' ),
    'view_item'          => __( 'View Faq', 'cryptoigo' ),
    'all_items'          => __( 'All Faq', 'cryptoigo' ),
    'search_items'       => __( 'Search Our Faq', 'cryptoigo' ),
    'parent_item_colon'  => __( 'Parent Our Faq:', 'cryptoigo' ),
    'not_found'          => __( 'No Faq found.', 'cryptoigo' ),
    'not_found_in_trash' => __( 'No Faq found in Trash.', 'cryptoigo' )
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => null,
    'taxonomies'         => array( 'post_tag' ),
    'menu_icon'        => 'dashicons-admin-post',
    'supports'           => array( 'title' )
  );

  register_post_type('faq', $args);
}

/* Texonomy
=====================================================*/

function create_faq_taxonomies() {
  $labels = array(
    'name'          => _x( 'Faq Cat', 'Taxonomy plural name', 'cryptoigo' ),
    'singular_name'     => _x( 'Faq Cat', 'Taxonomy singular name', 'cryptoigo' ),
    'search_items'      => __( 'Search Faq Cat', 'cryptoigo' ),
    'popular_items'     => __( 'Popular Faq Cat', 'cryptoigo' ),
    'all_items'       => __( 'All Categories', 'cryptoigo' ),
    'parent_item'     => __( 'Parent Faq Cat', 'cryptoigo' ),
    'parent_item_colon'   => __( 'Parent Faq Cat', 'cryptoigo' ),
    'edit_item'       => __( 'Edit Faq Cat', 'cryptoigo' ),
    'update_item'     => __( 'Update Faq Cat', 'cryptoigo' ),
    'add_new_item'      => __( 'Add New Category', 'cryptoigo' ),
    'new_item_name'     => __( 'New Team Menu Name', 'cryptoigo' ),
    'add_or_remove_items' => __( 'Add or remove Faq Cat', 'cryptoigo' ),
    'choose_from_most_used' => __( 'Choose from most used text-domain', 'cryptoigo' ),
    'menu_name'       => __( 'Category', 'cryptoigo' ),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => false,
    'hierarchical'      => true,
    'show_tagcloud'     => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => true,
    'query_var'         => true,
    'capabilities'      => array(),
  );

  register_taxonomy( 'faq_tax', array( 'faq' ), $args );
}

add_action( 'init', 'create_faq_taxonomies' );