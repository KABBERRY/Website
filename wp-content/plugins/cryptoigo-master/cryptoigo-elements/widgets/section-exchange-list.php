<?php
namespace Cryptoigo\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Style for header
 *
 *
 * @since 1.0.0
 */

class Section_Exchange_Listing extends Widget_Base {

	public function get_name() {
		return 'section-exchange-listing';
	}

	public function get_title() {
		return 'Exchange Listing';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-post-list';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
	}

	public function get_categories() {
		return [ 'cryptoigo-elements' ];    // category of the widget
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	// public function get_script_depends() {		//load the dependent scripts defined in the cryptoigo-elements.php
	// 	return [ 'section-header' ];
	// }

	protected function _register_controls() {
		
		//start of a control box
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'About Content', 'cryptoigo' ),   //section name for controler view
			]
		);

		$this->add_control(
			'onepage_menu_name',
			[
				'label' => esc_html__( 'One Page Menu Name', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => 'Put Menu name',
				'description' => 'Put Menu name same to same, when click menu name then it scroll to that section',
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Section Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_responsive_control(
			'section_image',
			[
				'label' => __( 'Title Icon image', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'exch_list',
			[
				'label' => __( 'Exchange List', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => __( 'Title', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'List Title' , 'cryptoigo' ),
						'label_block' => true,
					],
					[
						'name' => 'exchange_item_image',
						'label' => __( 'Exchange item image', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);


		$this->end_controls_section();

	//End  of a control box

	}
//end of control box 

	protected function render() {				//to show on the fontend 
		$settings = $this->get_settings(); 
	
    	$menu_name = $settings['onepage_menu_name'];

		$mn = str_replace(' ', '_', $menu_name);
		if (!empty($mn)) {
		    $id = $mn;
		} else {
		    $id = 'exchange-listing';
		}
    ?>

	<!-- Exchange Listing Area -->
	<div class="exchange-listing" id="<?php echo esc_attr(strtolower($id)); ?>">
	    <!-- Exchange Listing Area Starts -->
	    <div class="container-fluid bg-color">
	        <div class="container">            
	            <div class="row listing list-unstyled">
	                <div class="col d-none d-lg-block text-center animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s">
	                    <img src="<?php echo $settings['section_image']['url']; ?>" alt="icon-arrow">
	                    <p class="grey-accent2 mt-1"><?php echo $settings['section_title']; ?></p>
	                </div>
	                <?php 
		                $exchange_list = $settings['exch_list'];
		                if (is_array($exchange_list)) { 
		                	$i = 2;
		                	foreach ($exchange_list as $key => $value) {
		                		$i++;
	                ?>
	                <div class="col text-center animated" data-animation="fadeInUpShorter" data-animation-delay="0.<?php echo $i; ?>s">
	                    <h2><?php echo $value['list_title']; ?></h2>
	                    <img src="<?php echo $value['exchange_item_image']['url']; ?>" alt="ico-track">
	                </div>
	                <?php }} ?>
	            </div>
	        </div>
	    </div>
	    <!-- Exchange Listing Area Ends -->
	</div>
	<!--/ Exchange Listing Area -->

	<?php
	
	}	

}
