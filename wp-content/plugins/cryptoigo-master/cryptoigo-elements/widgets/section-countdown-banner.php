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

class Section_Countdown_Banner extends Widget_Base {

	public function get_name() {
		return 'section-countdown-banner';
	}

	public function get_title() {
		return 'Countdown Banner';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-countdown';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
				'label' => esc_html__( 'Counter Banner Content', 'cryptoigo' ),   //section name for controler view
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
				'label' => esc_html__( 'Banner Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_sub_title',
			[
				'label' => esc_html__( 'Banner Sub Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_prog_step1_text',
			[
				'label' => esc_html__( 'Prograce bar step 1 text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_prog_step2_text',
			[
				'label' => esc_html__( 'Prograce bar step 2 text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_prog_step3_text',
			[
				'label' => esc_html__( 'Prograce bar step 3 text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_prog_persantage',
			[
				'label' => esc_html__( 'Prograce persantage', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_prog_persantage_text',
			[
				'label' => esc_html__( 'Prograce persantage text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_prog_persantage_cals',
			[
				'label' => esc_html__( 'Prograce persantage Calculator Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_btn_text',
			[
				'label' => esc_html__( 'Banner Button Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_btn_link',
			[
				'label' => esc_html__( 'Banner Button Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		

		$this->add_responsive_control(
			'banner_side_logo_image',
			[
				'label' => __( 'Banner side logo image', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_responsive_control(
			'banner_side_bg_image',
			[
				'label' => __( 'Banner side bg image', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'curr_list',
			[
				'label' => esc_html__( 'Currency Item', 'cryptoigo' ),
				'type' => Controls_Manager::REPEATER,
				
				'fields' => [
					[
						'name' => 'curr_image',
						'label' => __( 'Choose Currency Image', 'cryptoigo' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'curr_link',
						'label' => esc_html__( 'Currency Link', 'cryptoigo' ),
						'type' => Controls_Manager::TEXT,
						'default' => '#',
						'label_block' => true,
					],

				],
				'title_field' => '<span>{{ curr_link }}</span>',
			]
		);

		$this->add_control(
			'banner_counter_time',
			[
				'label' => esc_html__( 'Set time for counter', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
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
		    $id = 'head-area';
		}
    ?>

 <div class="head-area" id="<?php echo esc_attr(strtolower($id)); ?>" data-midnight="white">
 	<?php 
		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
		if(!empty($page_settings['choose_page_banner_variation'])) {
		if($page_settings['choose_page_banner_variation'] == 'particle') {
	?>
	<div id="particles-js"></div>
	<?php } } ?>
    <div class="bg-banner"></div>
    <div class="head-content container-fluid d-flex align-items-center">
        <div class="container">
            <div class="banner-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="banner-content">
                            <h1 class="animated" data-animation="fadeInUpShorter" data-animation-delay="1.5s"><?php echo $settings['section_title']; ?></h1>
                            <h3 class="pt-5 animated" data-animation="fadeInUpShorter" data-animation-delay="1.7s"><?php echo $settings['section_sub_title']; ?></h3>
                            <div class="row animated" data-animation="fadeInUpShorter" data-animation-delay="1.9s">
                                <div class="col-lg-9 col-md-12 mr-auto">
                                    <div class="loading-bar my-3 position-relative">
                                        <div class="progres-area py-5">
                                            <ul class="progress-top">
                                                <li></li>
                                                <li class="pre-sale"><?php echo $settings['banner_prog_step1_text']; ?></li>
                                                <li><?php echo $settings['banner_prog_step2_text']; ?></li>
                                                <li class="bonus"><?php echo $settings['banner_prog_step3_text']; ?></li>
                                                <li></li>
                                            </ul>
                                            <ul class="progress-bars">
                                                <li></li>
                                                <li>|</li>
                                                <li>|</li>
                                                <li>|</li>
                                                <li></li>
                                            </ul>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-custom" role="progressbar" style="width: <?php echo $settings['banner_prog_persantage']; ?>%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="progress-bottom">
                                                <div class="progress-info"><?php echo $settings['banner_prog_persantage_text']; ?></div>
                                                <div class="progress-info"><?php echo $settings['banner_prog_persantage_cals']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clock-counter animated" data-animation="fadeInUpShorter" data-animation-delay="2.1s">
                                <!-- <div class="clock ml-0 mt-4"></div> -->

                                <div class="clock"></div>

                                <div class="message"></div>
                            </div>
                            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="2.3s">
                            	<?php if (!empty($settings['banner_btn_link'])) { ?>
                                <div class="purchase-token-btn">
                                    <a href="<?php echo $settings['banner_btn_link']; ?>" class="btn btn-lg btn-gradient-orange btn-round btn-glow"><?php echo $settings['banner_btn_text']; ?></a>
                                </div>
                                <?php } ?>
                                <ul class="crypto-links list-unstyled pl-3">
									<?php foreach ( $settings['curr_list'] as $item ) : ?>
                                    <li><a href="<?php echo $item['curr_link']; ?>" title="cryptoigo"><img src="<?php echo $item['curr_image']['url']; ?>" alt=""></a></li>
                                	<?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 move-first animated" data-animation="zoomIn" data-animation-delay="2s">
                        <div class="logo-wrapper ml-5 pl-5 align-items-center">
                            <div class="crypto-logo">
                                <div id="ripple"></div>
                                <div id="ripple2"></div>
                                <div id="ripple3"></div>
                                <img src="<?php echo $settings['banner_side_logo_image']['url']; ?>" class="crypto-logo-img rounded mx-auto d-block pulse2" alt="CICO">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <?php 
		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
		if(!empty($page_settings['choose_page_banner_variation'])) {

		if($page_settings['choose_page_banner_variation'] == 'ripple') {
	?>
    <div class="bg-ripple-animation d-none d-md-block">
        <div class="left-bottom-ripples">
            <div class="ripples"></div>
        </div>
        <div class="top-right-ripples">
            <div class="ripples"></div>
        </div>
    </div>
    <?php } } ?>

</div>
<!--/ Header: Counter -->

<script>
	var clock;
	
	jQuery(document).ready(function() {
		// Set dates.
		<?php $timer_set = $settings['banner_counter_time']; ?>
		var futureDate  = new Date(" <?php echo $timer_set; ?> EDT");
		var currentDate = new Date();

		// Calculate the difference in seconds between the future and current date
		var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

		// Calculate day difference and apply class to .clock for extra digit styling.
		function dayDiff(first, second) {
			return (second-first)/(1000*60*60*24);
		}

		if (dayDiff(currentDate, futureDate) < 100) {
			jQuery('.clock').addClass('twoDayDigits');
		} else {
			jQuery('.clock').addClass('threeDayDigits');
		}

		if(diff < 0) {
			diff = 0;
		}

		// Instantiate a coutdown FlipClock
		clock = jQuery('.clock').FlipClock(diff, {
			clockFace: 'DailyCounter',
			countdown: true
		});
	});
</script>



	<?php
	
	}	

}
