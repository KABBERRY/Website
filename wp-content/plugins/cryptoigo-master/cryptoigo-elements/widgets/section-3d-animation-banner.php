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

class Section_3d_Animation extends Widget_Base {

	public function get_name() {
		return 'section-3d_animation';
	}

	public function get_title() {
		return '3d Animation Banner'; // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-slider-3d';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
				'label' => esc_html__( '3d Animation Content', 'cryptoigo' ),   //section name for controler view
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
			'banner_3d_title',
			[
				'label' => esc_html__( 'Banner Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_3d_sub_title',
			[
				'label' => esc_html__( 'Banner Sub Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'banner_3d_btn1_txt',
			[
				'label' => esc_html__( 'Video Banner Button 1 Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_3d_btn1_link',
			[
				'label' => esc_html__( 'Video Banner Button 1 Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_3d_btn2_txt',
			[
				'label' => esc_html__( 'Video Banner Button 2 Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_3d_btn2_link',
			[
				'label' => esc_html__( 'Video Banner Button 2 Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_3d_animation_svg',
			[
				'label' => esc_html__( 'Put 3d svg', 'cryptoigo' ),
				'type' => Controls_Manager::TEXTAREA,
				'description' => 'Put your 3d svg code here if your banner is 3d animation',
			]
		);
		$this->add_responsive_control(
			'banner_3d_graphic_img',
			[
				'label' => __( 'Select 3d graphic', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'description' => 'Select 3d image if your banner is 3d graphic',
			]
		);
		$this->add_control(
			'bg_gradient_switch',
			[
				'label' => esc_html__( 'Black section switch', 'cryptoigo' ),
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
		    $id = 'head-area';
		}

		$bg_gradient = $settings['bg_gradient_switch'];
		if ($bg_gradient == 'yes') {
			$bg_gradient = 'bg-gradient';
			$dark_bg_heading = 'dark-bg-heading';
		} else {
			$bg_gradient = '';
			$dark_bg_heading = '';
		}

    ?>

<div class="head-area" id="<?php echo esc_attr(strtolower($id)); ?>">
	<?php 
		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
		if(!empty($page_settings['choose_page_banner_variation'])) {
		if($page_settings['choose_page_banner_variation'] == 'particle') { 
	?>
	<div id="particles-js"></div>
	<?php } } ?>
    <div class="head-content d-flex <?php echo $bg_gradient; ?> align-items-center">
        <div class="container">
            <div class="banner-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-content pt-5">
                            <h1 class="best-template animated" data-animation="fadeInUpShorter" data-animation-delay="1.5s"><?php echo $settings['banner_3d_title']; ?></h1>
                            <h3 class="d-block white animated" data-animation="fadeInUpShorter" data-animation-delay="1.6s"><?php echo $settings['banner_3d_sub_title']; ?></h3>
                            <?php 
                            	$banner_3d_btn1_txt = $settings['banner_3d_btn1_txt'];
                            	$banner_3d_btn1_link = $settings['banner_3d_btn1_link'];
                            	$banner_3d_btn2_txt = $settings['banner_3d_btn2_txt'];
                            	$banner_3d_btn2_link = $settings['banner_3d_btn2_link'];

                            	if ( !empty($banner_3d_btn1_link) || ($banner_3d_btn2_link) ) {
                            ?>
                            <div class="mt-5">
                            	<?php if ( !empty($banner_3d_btn1_link) ) { ?>
                                <a href="<?php echo $banner_3d_btn1_link; ?>" class="btn btn-lg btn-gradient-purple btn-glow mr-4 mb-2 animated" data-animation="fadeInUpShorter" data-animation-delay="1.7s"><?php echo $banner_3d_btn1_txt; ?></a>
                                <?php } if ( !empty ($banner_3d_btn2_link) ) { ?>
                                <a href="<?php echo $banner_3d_btn2_link; ?>" class="btn btn-lg btn-gradient-purple btn-glow mb-2 animated" data-animation="fadeInUpShorter" data-animation-delay="1.8s"><?php echo $banner_3d_btn2_txt; ?></a>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 move-first">
                    	<?php 
                    		$banner_3d_graphic_img = $settings['banner_3d_graphic_img']['url'];
                        	$banner_3d_animation_svg = $settings['banner_3d_animation_svg'];
                        	if (!empty($banner_3d_graphic_img)) { ?>
                        		<div class="crypto-3d-graphic animated" data-animation="fadeInUpShorter" data-animation-delay="1.7s">
		                            <img src="<?php echo esc_url($banner_3d_graphic_img); ?>" class="graphic-3d-img mx-auto d-block" alt="CICO">
		                        </div>
                        <?php } elseif ( !empty($banner_3d_animation_svg) ) { ?>
                        	<div id="svg-animation">
                        		<?php echo $banner_3d_animation_svg; ?>
                        	</div>
                        <?php } else { ?>
                        <div id="svg-animation">
                        	
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 857 807" width="857" height="807" preserveAspectRatio="xMidYMid meet" style="width: 100%;height: 100%;">
                                <g clip-path="url(#svg_animation_mask)">
                                    <!-- base -->
                                    <g transform="matrix(1,0,0,1,-1.93,468.7)" opacity="1">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="1s" width="558px" height="339px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/base.svg'; ?>"></image>
                                    </g>                                    
                                    
                                    <!-- btc-base-shadow -->
                                    <g transform="matrix(1,0,0,1,60,580)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="2s" width="130px" height="130px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-shadow.svg'; ?>"></image>
                                    </g>

                                    <!-- btc-base -->
                                    <g transform="matrix(1,0,0,1,60.8,560.9)" opacity="1">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="1.9s" width="130px" height="130px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-btc.svg'; ?>"></image>
                                    </g>

                                    <!-- eth-base-shadow -->
                                    <g transform="matrix(1,0,0,1,215,580)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="2s" width="90px" height="90px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-shadow.svg'; ?>"></image>
                                    </g>

                                    <!-- eth-base -->
                                    <g transform="matrix(1,0,0,1,215,545)" opacity="1">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="1.5s" width="90px" height="130px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-eth.svg'; ?>"></image>
                                    </g>

                                    <!-- neo-base-shadow -->
                                    <g transform="matrix(1,0,0,1,238,670)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="2s" width="120px" height="120px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-shadow.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- neo-base -->
                                    <g transform="matrix(1,0,0,1,240.8,660.9)" opacity="1">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="1.7s" width="120px" height="120px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-neo.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- btc -->
                                    <g transform="matrix(1,0,0,1,97,560)" opacity="1">
                                        <image class="animated svg-elements-2" data-animation="fadeInUpShorter" data-animation-delay="2s" width="60px" height="60px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/btc.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- eth -->
                                    <g transform="matrix(1,0,0,1,230,550)" opacity="1">
                                        <image class="animated svg-elements-1" data-animation="fadeInUpShorter" data-animation-delay="1.6s" width="60px" height="60px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/eth.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- neo -->
                                    <g transform="matrix(1,0,0,1,270 ,645)" opacity="1">
                                        <image class="animated svg-elements-1" data-animation="fadeInUpShorter" data-animation-delay="1.8s" width="70px" height="70px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/neo.svg'; ?>"></image>
                                    </g>

                                    <!-- Step-2 -->

                                    <!-- base-shaodw -->
                                    <g transform="matrix(1,0,0,1,152.1,445.61)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="1.4s" width="406px" height="274px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/base-shadow.svg'; ?>"></image>
                                    </g>
                                    <!-- base -->
                                    <g transform="matrix(1,0,0,1,151.07,301.7)" opacity="0.95">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="1.4s" width="558px" height="339px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/base.svg'; ?>"></image>
                                    </g>                                   

                                    <!-- logo-circle-path -->
                                    <g transform="matrix(1,0,0,1,428.5,403.5)" opacity="1">
                                        <g opacity="1" transform="matrix(1.0196,0,0,0.9676,-49.875,71.125)">
                                            <path class="animated" data-animation="path" data-animation-delay="1.4s" stroke-linecap="round" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(99,125,221)" stroke-opacity="1" stroke-width="4" d=" M57.584999084472656,53.77799987792969 C41.18600082397461,60.93600082397461 21.354000091552734,65.125 0,65.125 C-56.362789154052734,65.125 -102.125,35.94248580932617 -102.125,0 C-102.125,-35.94248580932617 -56.362789154052734,-65.125 0,-65.125 C0,-65.125 0,-65.125 0,-65.125 C56.362789154052734,-65.125 102.125,-35.94248580932617 102.125,0 C102.125,22.325000762939453 84.47000122070312,42.04199981689453 57.584999084472656,53.77799987792969"></path>
                                        </g>
                                    </g>

                                    <!-- neo-path -->
                                    <g transform="matrix(1,0,0,1,345,595)" opacity="1">
                                        <g opacity="1" transform="matrix(1,0,0,1,0,0)">
                                            <path class="animated" data-animation="path-reverse" data-animation-delay="1.4s" stroke-linecap="butt" stroke-linejoin="miter" stroke-dashoffset="20" fill="none" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(99,125,221)" stroke-opacity="1" stroke-width="3" d="M0.26,101.431l65-45  c0,0,5.4-1.4,5-25l1-10c0,0-1.2-5.6,6-8l50-30c0,0,7.4-3.6,1-7l-65-38"></path>
                                        </g>
                                    </g>
                                    
                                    <!-- eth-path -->
                                    <g transform="matrix(1,0,0,1,290,545)" opacity="1">
                                        <g opacity="1" transform="matrix(1,0,0,1,0,0)">
                                            <path class="animated" data-animation="path-reverse" data-animation-delay="1.4s" stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(99,125,221)" stroke-opacity="1" stroke-width="3" d="M0.239,42.447l11-6  c0,0,5-1.2,4-25v-9c0,0-2-5.8,6-9l16-8"></path>
                                        </g>
                                    </g>

                                    <!-- btc-path -->
                                    <g transform="matrix(1,0,0,1,175,430)" opacity="1">
                                        <g opacity="1" transform="matrix(1,0,0,1,0,0)">
                                            <path class="animated" data-animation="path" data-animation-delay="2.4s" stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(99,125,221)" stroke-opacity="1" stroke-width="3" d="M101.68,24.545l-25-15  c0,0-6.14-6-14-1l-28,17c0,0-6.4,5.16-5-30v-20c0,0,0.8-5.6-4-5l-35,25c0,0-5.2,1.6-4,18v90c0,0-1.6,9.8,6,11l40,25c0,0,7,2.6,2,7  l-35,20"></path>
                                        </g>
                                    </g>    
                                    <!-- logo-base -->
                                    <g transform="matrix(1,0,0,1,255,345)" opacity="0.5">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="1.4s" width="250px" height="260px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/logo-base.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- logo-shaodw -->
                                    <g transform="matrix(0.1385,0,0,0.1175,275,385)" opacity="0.65">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="2.2s" width="1500px" height="1500px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/logo-shadow.svg'; ?>"></image>
                                    </g>
                                    <!-- logo -->
                                    <g transform="matrix(1,0,0,1,310,410)" opacity="1">
                                        <image class="animated cic-logo" data-animation="fadeInUpShortest" data-animation-delay="2.4s"  width="130px" height="89px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/logo.svg'; ?>"></image>
                                    </g>

                                    <!-- Step 3 -->                                    
                                    <!-- base-shaodw -->
                                    <g transform="matrix(1,0,0,1,305.1,277.61)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="1.8s" width="406px" height="274px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/base-shadow.svg'; ?>"></image>
                                    </g>

                                    <!-- base- -->
                                    <g transform="matrix(1,0,0,1,301.07,133.7)" opacity="0.95">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="1.8s" width="558px" height="339px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/base.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- car-path -->
                                    <g transform="matrix(1,0,0,1,320.5,330.5)" opacity="1">
                                        <g opacity="1" transform="matrix(1,0,0,1,0,0)">
                                            <path class="animated" data-animation="path" data-animation-delay="2.4s" stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(99,125,221)" stroke-opacity="1" stroke-width="3" d="M32.208,82.43l-35-20  c0,0-6.714-2.571,1-7l26-15c0,0,4.857-1.143,8-8v-35c0,0,0.857-5.81,3-6l70-45"></path>
                                        </g>
                                    </g>
                                    
                                    <!-- car-base-shadow -->
                                    <g transform="matrix(1,0,0,1,415,235)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="3s" width="100px" height="100px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-shadow.svg'; ?>"></image>
                                    </g>
                                    <!-- car-base -->
                                    <g transform="matrix(1,0,0,1,408.62,240.74)" opacity="1">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="2.1s" width="109px" height="68px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-car.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- car -->
                                    <g transform="matrix(1,0,0,1,420.8799,200.27)" opacity="1">
                                        <image class="animated svg-elements-1" data-animation="fadeInUpShorter" data-animation-delay="2.2s" width="80px" height="80px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/car.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- mobile-path -->
                                    <g transform="matrix(1,0,0,1,475,410)" opacity="1">
                                        <g opacity="1" transform="matrix(1,0,0,1,0,0)">
                                            <path class="animated" data-animation="path" data-animation-delay="2.4s" stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(99,125,221)" stroke-opacity="1" stroke-width="3" d="M0.261,90.447l50,30  c0,0,4.15,5.17,14,0l12-6c0,0,6-2,5-8v-50c0,0-0.5-9,9-12l80-45c0,0,5.75-3.5,0-7l-32-16"></path>
                                        </g>
                                    </g>
                                    
                                    <!-- mobile-base-shadow -->
                                    <g transform="matrix(1,0,0,1,565,300)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="3s" width="120px" height="120px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-shadow.svg'; ?>"></image>
                                    </g>

                                    <!-- mobile-base -->
                                    <g transform="matrix(1,0,0,1,565,310)" opacity="1">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="2.3s" width="122px" height="78px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-mobile.svg'; ?>"></image>
                                    </g>
                                    
                                    <!-- mobile -->
                                    <g transform="matrix(1,0,0,1,600,280)" opacity="1">
                                        <image class="animated svg-elements-1" data-animation="fadeInUpShorter" data-animation-delay="2.4s" width="51px" height="78px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/mobile.svg'; ?>"></image>
                                    </g>

                                    <!-- home-path -->
                                    <g transform="matrix(1,0,0,1,495,260)" opacity="1">
                                        <g opacity="1" transform="matrix(1,0,0,1,0,0)">
                                            <path class="animated" data-animation="path-reverse" data-animation-delay="1.4s" stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(99,125,221)" stroke-opacity="1" stroke-width="3" d="M102.684,0v20  c0.666,7.167-9,11-9,11l-130,75c-11.25,4.5-9,13-9,13v50"></path>
                                        </g>
                                    </g>                                    

                                    <!-- home-base-shadow -->
                                    <g transform="matrix(1,0,0,1,570,150)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="3s" width="200px" height="200px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-shadow.svg'; ?>"></image>
                                    </g>
                                    <!-- home-base -->
                                    <g transform="matrix(1,0,0,1,570.8,140.9)" opacity="1">
                                        <image class="animated" data-animation="fadeInUpShorter" data-animation-delay="2.4s" width="200px" height="150px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/icon-base-home.svg'; ?>"></image>
                                    </g>
                                    <!-- home -->
                                     <g transform="matrix(1,0,0,1,600,90)" opacity="1">
                                        <image class="animated svg-elements-2" data-animation="fadeInUpShorter" data-animation-delay="2.5s" width="140px" height="140px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/home.svg'; ?>"></image>
                                    </g>

                                    <!-- step-1-text -->
                                    <g transform="matrix(1,0,0,1,734,400)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="2s" width="120px" height="26px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/physical.svg'; ?>"></image>
                                    </g>
                                    <!-- step-2-text -->
                                    <g transform="matrix(1,0,0,1,602,569)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="1.6s" width="180px" height="24px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/cic-blockchain.svg'; ?>"></image>
                                    </g>
                                    <!-- step-3-text -->
                                    <g transform="matrix(1,0,0,1,432,745)" opacity="0.8">
                                        <image class="animated" data-animation="fadeInLeftShorter" data-animation-delay="1.2s" width="80px" height="24px" preserveAspectRatio="xMidYMid slice" xlink:href="<?php echo get_template_directory_uri() . '/theme-assets/images/svg/svg-animation/digital.svg'; ?>"></image>
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="svg_animation_mask">
                                        <rect width="857" height="807" x="0" y="0"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
						<?php } ?>

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
<!--/ Header: 3D Animation -->



	<?php
	
	}	

}
