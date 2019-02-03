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

class Section_Token_Counter extends Widget_Base {

	public function get_name() {
		return 'section-token-counter';
	}

	public function get_title() {
		return 'Token Counter Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-type-tool';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
				'label' => esc_html__( 'Token Counter Content', 'cryptoigo' ),   //section name for controler view
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
		$this->add_control(
			'section_sub_title',
			[
				'label' => esc_html__( 'Section Sub Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_desc',
			[
				'label' => esc_html__( 'Section Description', 'cryptoigo' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);
		$this->add_control(
			'token_counter_title',
			[
				'label' => esc_html__( 'Token Counter Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_prog_step1_text',
			[
				'label' => esc_html__( 'Prograce bar step 1 text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_prog_step2_text',
			[
				'label' => esc_html__( 'Prograce bar step 2 text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_prog_step3_text',
			[
				'label' => esc_html__( 'Prograce bar step 3 text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_prog_persantage',
			[
				'label' => esc_html__( 'Prograce persantage', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_prog_persantage_text',
			[
				'label' => esc_html__( 'Prograce persantage text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_prog_persantage_cals',
			[
				'label' => esc_html__( 'Prograce persantage Calculator Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_btn_text',
			[
				'label' => esc_html__( 'Counter Button Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_btn_link',
			[
				'label' => esc_html__( 'Counter Button Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'token_list_desc',
			[
				'label' => esc_html__( 'Token List Description', 'cryptoigo' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);
		$this->add_control(
			'token_list',
			[
				'label' => __( 'Token List', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'token_title',
						'label' => __( 'List Text Part 1', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'List Text Part 1' , 'cryptoigo' ),
						'label_block' => true,
					],
					[
						'name' => 'token_text',
						'label' => __( 'List Text Part 2', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
					],
				],
				'title_field' => '{{{ token_title }}}',
			]
		);

		$this->add_control(
			'token_counter_time',
			[
				'label' => esc_html__( 'Set time for counter', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'bg_gradient_switch',
			[
				'label' => esc_html__( 'Black BG', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'cryptoigo' ),
				'label_off' => __( 'No', 'cryptoigo' ),
				'return_value' => 'yes',
				'default' => 'no',
				'description' => 'Background black gradient for 3d graphic version',
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
		    $id = 'pre-tokens';
		}

		$bg_gradient = $settings['bg_gradient_switch'];
		if ($bg_gradient == 'yes') {
			$bg_gradient = 'bg-gradient';
			$dark_bg_heading = 'dark-bg-heading';
		} else {
			$bg_gradient = '';
			$dark_bg_heading = 'heading';
		}

		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );

		if($page_settings['choose_page_variation'] == 'animation') {
			$section_pro = 'token-count-anim-bg';
		} else {
			$section_pro = '';
		}
    ?>

<!-- Tokens Sale -->
<div id="<?php echo esc_attr(strtolower($id)); ?>" class="token-sale <?php echo $section_pro; ?> section-padding <?php echo $bg_gradient; ?>">
    <div class="container-fluid">
        <div class="container">

            <?php
				if(!empty($page_settings['choose_page_variation'])) {
				if($page_settings['choose_page_variation'] == 'animation') {
			?>

        	<div class="<?php echo $dark_bg_heading; ?> text-center">
	            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
	                <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
	                <h2 class="title"><?php echo $settings['section_title']; ?></h2>
	            </div>
	            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
	        </div>

	    	<?php } elseif($page_settings['choose_page_variation'] == 'graphic') { ?>

			<div class="<?php echo $dark_bg_heading; ?> text-center">
	            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
	                <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
	                <h2 class="title"><?php echo $settings['section_title']; ?></h2>
	            </div>
	            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
	        </div>

	    	<?php } elseif($page_settings['choose_page_variation'] == 'counter') { ?>

            <div class="<?php echo $dark_bg_heading; ?> text-center">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo $settings['section_sub_title']; ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>

            <?php } elseif($page_settings['choose_page_variation'] == 'video') { ?>

            <div class="<?php echo $dark_bg_heading; ?> text-center">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo $settings['section_sub_title']; ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>

			<?php }} else { ?>

            <div class="<?php echo $dark_bg_heading; ?> text-center">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo $settings['section_sub_title']; ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>

			<?php } ?>


            <div class="row align-items-center">
                <div class="col-md-12 col-lg-6 col-xl-5 animated" data-animation="fadeInLeftShorter" data-animation-delay="0.6s">
                    <h5><?php echo $settings['token_counter_title']; ?></h5>
                    <div class="token-details text-center">
                        <!-- Counter Starts-->
                        <div class="clock-counter mb-4">
                            <div class="clock ml-0 mt-5 justify-content-center d-flex"></div>
                            <div class="message"></div>
                        </div>
                        <!-- Counter Ends -->
                        <!-- Progressbar Starts -->
                        <div class="loading-bar mb-2 position-relative">
                            <div class="progres-area pb-5">
                                <ul class="progress-top">
                                    <li></li>

                                    <li class="pre-sale"><?php echo $settings['token_prog_step1_text']; ?></li>
                                    <li><?php echo $settings['token_prog_step2_text']; ?></li>
                                    <li class="bonus"><?php echo $settings['token_prog_step3_text']; ?></li>

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
                                    <div class="progress-bar progress-bar-custom" role="progressbar" style="width: <?php echo $settings['token_prog_persantage']; ?>%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress-bottom">
                                    <div class="progress-info"><?php echo $settings['token_prog_persantage_text']; ?></div>
                                    <div class="progress-info"><?php echo $settings['token_prog_persantage_cals']; ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- Progressbar Starts -->
                        <?php if (!empty($settings['token_btn_link'])) { ?>
                        <a href="<?php echo $settings['token_btn_link']; ?>" class="btn btn-lg btn-glow btn-round btn-gradient-blue"><?php echo $settings['token_btn_text']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-7 animated" data-animation="fadeInRightShorter" data-animation-delay="0.6s">
                    <div class="row ml-0 mt-5">
                        <p class="grey-accent2"><?php echo $settings['token_list_desc']; ?></p>
                        <div class="token-sale-info-list">
                            <ul class="token-sale-info">
                            	<?php 
					                $token_list = $settings['token_list'];
					                if (is_array($token_list)) { 
					                	$i = 0;
					                	foreach ( $token_list as $key => $value ) { $i++;
					            ?>
                                <li class="col-md-6"><?php echo esc_html( $value['token_title'] ); ?> <strong><?php echo esc_html( $value['token_text'] ); ?></strong></li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Tokens Sale -->


<script>
	var clock;
	
	jQuery(document).ready(function() {
		// Set dates.
		<?php $timer_set = $settings['token_counter_time']; ?>
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
