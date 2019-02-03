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

class Section_Video_Banner extends Widget_Base {

	public function get_name() {
		return 'section-video-banner';
	}

	public function get_title() {
		return 'Video Banner';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-slider-video';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
				'label' => esc_html__( 'Video Banner Content', 'cryptoigo' ),   //section name for controler view
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
			'video_banner_title',
			[
				'label' => esc_html__( 'Banner Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'video_banner_sub_title',
			[
				'label' => esc_html__( 'Banner Sub Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'video_banner_btn1_txt',
			[
				'label' => esc_html__( 'Video Banner Button 1 Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'video_banner_btn1_link',
			[
				'label' => esc_html__( 'Video Banner Button 1 Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'video_banner_btn2_txt',
			[
				'label' => esc_html__( 'Video Banner Button 2 Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'video_banner_btn2_link',
			[
				'label' => esc_html__( 'Video Banner Button 2 Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_responsive_control(
			'banner_video_image',
			[
				'label' => __( 'Banner video image', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'banner_video_link',
			[
				'label' => esc_html__( 'Banner Video Embed Link', 'cryptoigo' ),
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

		$mn = str_replace( ' ', '_', $menu_name );
		if (!empty($mn)) {
		    $id = $mn;
		} else {
		    $id = 'head-area';
		}
    ?>

 <div class="head-area" id="<?php echo esc_attr( strtolower($id) ); ?>" data-midnight="white">

 	<?php 
		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
		if(!empty($page_settings['choose_page_banner_variation'])) {
		if($page_settings['choose_page_banner_variation'] == 'particle') { 
	?>
    <div id="particles-js"></div>
    <?php } } ?>
    <div class="bg-shape">
    	<?php 
			$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
			if(!empty($page_settings['choose_page_banner_variation'])) {
			if($page_settings['choose_page_banner_variation'] == 'ripple') { 
		?>
        <div class="bg-ripple-animation d-none d-md-block">
            <div class="intro-video-bg-ripples">
                <div class="ripples"></div>
            </div>
        </div>
        <?php } } ?>
    </div>

    <div class="head-content container-fluid d-flex align-items-center">
        <div class="container">
            <div class="banner-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-content">
                            <h1 class="best-template animated" data-animation="fadeInUpShorter" data-animation-delay="1.5s"><?php echo $settings['video_banner_title']; ?></h1>
                            <h3 class="d-block animated" data-animation="fadeInUpShorter" data-animation-delay="1.6s"><?php echo $settings['video_banner_sub_title']; ?></h3>

							<?php 

                            	$video_banner_btn1_txt = $settings['video_banner_btn1_txt'];
                            	$video_banner_btn1_link = $settings['video_banner_btn1_link'];
                            	$video_banner_btn2_txt = $settings['video_banner_btn2_txt'];
                            	$video_banner_btn2_link = $settings['video_banner_btn2_link'];

                            	if ( !empty($video_banner_btn1_link) || ($video_banner_btn2_link) ) {
                            ?>

                            <div class="mt-4">
                            	<?php if ( !empty($video_banner_btn1_link) ) { ?>
                                <a href="<?php echo $video_banner_btn1_link; ?>" class="btn btn-lg btn-round btn-light btn-glow animated" data-animation="fadeInUpShorter" data-animation-delay="1.7s"><?php echo $video_banner_btn1_txt; ?></a>
								<?php } if ( !empty ($video_banner_btn2_link) ) { ?>
                                <a href="<?php echo $video_banner_btn2_link; ?>" class="btn btn-lg btn-round btn-light btn-glow ml-4 animated" data-animation="fadeInUpShorter" data-animation-delay="1.8s"><?php echo $video_banner_btn2_txt; ?></a>
                                <?php } ?>
                            </div>
							<?php } ?>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 move-first">
                        <!-- Crypto video icon click -->
                        <div class="crypto-video animated" data-animation="fadeInUpShorter" data-animation-delay="1.7s">
                            <img src="<?php echo $settings['banner_video_image']['url']; ?>" class="video-img img-fluid" alt="CICO">
                            <div class="play-video text-center">
                                <a href="<?php echo $settings['banner_video_link']; ?>" class="play rounded-circle btn-gradient-blue video-btn" data-toggle="modal" data-src="<?php echo $settings['banner_video_link']; ?>" data-target="#ico-modal"><i class="ti-control-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Header: Intro Video -->

	<?php
	
	}	

}
