<?php
/**  add action with call back function .
--------------------------------------------------------------------------------------------------- */
add_action('after_setup_theme', 'cryptoigo_content_width', 0);
add_action('after_setup_theme', 'cryptoigo_setup');

/*------------------------------------------------------------------------------------------------------------------*/
/*	cryptoigo setup
/*------------------------------------------------------------------------------------------------------------------*/

if (!function_exists('cryptoigo_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
	function cryptoigo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cryptoigo, use a find and replace
		 * to change 'cryptoigo' to the name of your theme in all the template files
		 */
		load_theme_textdomain('cryptoigo', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		add_editor_style();

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support('post-thumbnails');


		/** // Add Custom Image Size.
		--------------------------------------------------------------------------------------------------- */
		add_image_size( 'cryptoigo-single-thumb', 850, 490, true );
		add_image_size( 'cryptoigo-grid-thumb', 400, 260, true );
		add_image_size( 'cryptoigo-list-thumb', 470, 360, true );
		add_image_size( 'cryptoigo-70', 70, 70, true );

		/** // This theme uses wp_nav_menu() in one location..
		--------------------------------------------------------------------------------------------------- */

		/* Main Menu */
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'cryptoigo'),
		));

		/* Footer Menu */
		register_nav_menus(array(
			'footer_menu' => esc_html__('Footer Menu', 'cryptoigo'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script', 
			'style'
		));

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('cryptoigo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));


		//enable custom logo support
		// set up the wordpress custome Logo support
		add_theme_support( 'custom-logo', array(
			'height'      => 65,
			'width'       => 245,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );


		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Strong Blue', 'cryptoigo' ),
				'slug'  => 'strong-blue',
				'color' => '#0073aa',
			),
			array(
				'name'  => __( 'Lighter Blue', 'cryptoigo' ),
				'slug'  => 'lighter-blue',
				'color' => '#229fd8',
			),
			array(
				'name'  => __( 'Very Light Gray', 'cryptoigo' ),
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => __( 'Very Dark Gray', 'cryptoigo' ),
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			),
		) );

		/**
		 * Add support for Gutenberg.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		 */
		add_theme_support( 'gutenberg', array(
			// Theme supports wide images, galleries and videos.
			'wide-images' => true,
			// Make specific theme colours available in the editor.
			'colors' => array(
				'#dceab2',
				'#cedca5',
				'#eb7039',
				'#fc814a',
				'#9ee3ec',
				'#89D2DC',
				'#6f945b',
				'#88AB75',
				'#fff',
				'#444',
			),
		) );

	}



	/*------------------------------------------------------------------------------------------------------------------*/
	/*	sidebar register
	/*------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Register widget area.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
	 *
	 *
	**/
	function cryptoigo_widgets_init() {
		/* Sidebar Widget */
		register_sidebar(array(
			'name' => esc_html__('Right Sidebar', 'cryptoigo'),
			'id' => 'right-sidebar',
			'description' => 'Right sidebar for blog page',
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget' => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		));

		/* Footer Widget */
		register_sidebar(array(
			'name' => esc_html__('Footer Sidebar', 'cryptoigo'),
			'id' => 'footer-widgets',
			'description' => 'Footer sidebar for animation and graphic homepage setup',
			'before_widget' => '<div class="col-md-4"><div id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</div></div>',
			'before_title'  => '<h4 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.8s">',
			'after_title'   => '</h4>',
		));

		/* Footer default Widget */
		register_sidebar(array(
			'name' => esc_html__('Footer Default', 'cryptoigo'),
			'id' => 'footer-default',
			'description' => 'This is default blank sidebar',
			'before_widget' => '<div class="col-md-4"><div id="%1$s" class="footer-widget %2$s">',
			'after_widget' => '</div></div>',
			'before_title'  => '<h4 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.8s">',
			'after_title'   => '</h4>',
		));


	}
	add_action('widgets_init', 'cryptoigo_widgets_init');


endif; // cryptoigo_setup



/*------------------------------------------------------------------------------------------------------------------*/
/*	  $content_width
/*------------------------------------------------------------------------------------------------------------------*/ 
  
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cryptoigo_content_width() {
	$GLOBALS['content_width'] = apply_filters('cryptoigo_content_width', 640);
}
