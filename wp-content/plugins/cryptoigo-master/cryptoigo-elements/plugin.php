<?php
namespace Cryptoigo;  //main namespace

global $void_widgets;
 $void_widgets= array_map('basename', glob(dirname( __FILE__ ) . '/widgets/*.php'));



/* - Path define same as class name of the widget
====================================================================================================*/

use Cryptoigo\Widgets\Section_Countdown_Banner;
use Cryptoigo\Widgets\Section_Exchange_Listing;
use Cryptoigo\Widgets\Section_About;
use Cryptoigo\Widgets\Section_Solution;
use Cryptoigo\Widgets\Section_Whitepaper;
use Cryptoigo\Widgets\Section_Roadmap;
use Cryptoigo\Widgets\Section_Token;
use Cryptoigo\Widgets\Section_Team;
use Cryptoigo\Widgets\Section_Advisor;
use Cryptoigo\Widgets\Section_Faq;
use Cryptoigo\Widgets\Section_Blogs;
use Cryptoigo\Widgets\Section_Contact;
use Cryptoigo\Widgets\Section_Video_Banner;
use Cryptoigo\Widgets\Section_Token_Counter;
use Cryptoigo\Widgets\Section_3d_Animation;
use Cryptoigo\Widgets\Section_Mobile_app;

/* - End Of path define same as class name of the widget
====================================================================================================*/




if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Add a custom category for panel widgets
add_action( 'elementor/init', function() {
   \Elementor\Plugin::$instance->elements_manager->add_category( 
   	'cryptoigo-elements',                 // the name of the category
   	[
   		'title' => __( 'Cryptoigo Elements', 'Cryptoigo' ),
   		'icon' => 'fa fa-header', //default icon
   	],
   	5 // position
   );
} );

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );


	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		global $void_widgets;              //include the widgets here
		//require __DIR__ . '/helper/helper.php';
		foreach($void_widgets as $key => $value){
   			require __DIR__ . '/widgets/'.$value;
		}
	}


	/* - Register all elements widget
	====================================================================================================*/

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {    
	//this is where we create objects for each widget the above  ->use Cryptoigo\Widgets\Hello_World; is needed

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Countdown_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Exchange_Listing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_About() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Solution() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Whitepaper() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Roadmap() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Token() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Advisor() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Blogs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Contact() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Video_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Token_Counter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_3d_Animation() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Mobile_app() );
		
	}
}

new Plugin();
