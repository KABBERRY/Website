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

class Section_About extends Widget_Base {

	public function get_name() {
		return 'section-about';
	}

	public function get_title() {
		return 'About Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-clone';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
			'about_section_content',
			[
				'label' => __( 'Section Content', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type your content here', 'cryptoigo' ),
			]
		);
		$this->add_responsive_control(
			'about_side_image',
			[
				'label' => __( 'About side image', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'section_video_link',
			[
				'label' => esc_html__( 'Embed Video Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_video_txt',
			[
				'label' => esc_html__( 'Video Text', 'cryptoigo' ),
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
		    $id = 'about';
		}

		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
		if($page_settings['choose_page_variation'] == 'animation') {
			$section_pro = 'about-anim-bg';
		} else {
			$section_pro = '';
		}
    ?>

<!-- About -->
<div class="about <?php echo $section_pro; ?> section-padding" id="<?php echo esc_attr(strtolower($id)); ?>">
    <div class="container-fluid">
        <div class="container">
        	
			<?php
				if(!empty($page_settings['choose_page_variation'])) {
				if($page_settings['choose_page_variation'] == 'animation') {
			?>

        	<div class="heading animation-graohic text-center">
	            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
	                <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
	                <h2 class="title"><?php echo $settings['section_title']; ?></h2>
	            </div>
	            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
	        </div>

	    	<?php } elseif($page_settings['choose_page_variation'] == 'graphic') { ?>

			<div class="heading animation-graohic text-center">
	            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
	                <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
	                <h2 class="title"><?php echo $settings['section_title']; ?></h2>
	            </div>
	            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
	        </div>

	    	<?php } elseif($page_settings['choose_page_variation'] == 'counter') { ?>

            <div class="heading counter-video text-center">
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

            <div class="heading counter-video text-center">
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

            <div class="heading counter-video text-center">
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

            <div class="content-area">
                <div class="row">
                    <div class="col-md-12 col-lg-6 animated" data-animation="fadeInLeftShorter" data-animation-delay="0.5s">
                        <?php echo $settings['about_section_content']; ?>
                    </div>
                    <div class="col-md-12 col-lg-6 animated" data-animation="fadeInRightShorter" data-animation-delay="0.5s">
                        <div class="position-relative what-is-crypto-img float-xl-right">
                            <img class="img-fluid" src="<?php echo $settings['about_side_image']['url']; ?>" alt="What is Crypto?">
                            <div class="play-video text-center">
                                <a href="<?php echo $settings['section_video_link']; ?>" class="play rounded-circle btn-gradient-orange btn-glow video-btn" data-toggle="modal" data-src="<?php echo $settings['section_video_link']; ?>" data-target="#ico-modal"><i class="ti-control-play"></i></a>
                                <span class="mt-2 d-none d-md-block"><?php echo $settings['section_video_txt']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ About -->


	<?php
	
	}	

}
