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

class Section_Whitepaper extends Widget_Base {

	public function get_name() {
		return 'section-whitepaper';
	}

	public function get_title() {
		return 'Whitepaper Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-document-file';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
				'label' => esc_html__( 'Solution Content', 'cryptoigo' ),   //section name for controler view
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
			'section_side_img',
			[
				'label' => esc_html__( 'Section side image', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'section_content_title',
			[
				'label' => esc_html__( 'Section Content Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_content_desc',
			[
				'label' => esc_html__( 'Section Content Description', 'cryptoigo' ),
				'type' => Controls_Manager::WYSIWYG,
			]
		);
		$this->add_control(
			'whitepaper_list',
			[
				'label' => __( 'Whitepaper List', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'language_name',
						'label' => __( 'Language Name', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Language Name' , 'cryptoigo' ),
						'label_block' => true,
					],
					[
						'name' => 'country_flag',
						'label' => __( 'Country Flag image', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'download_link',
						'label' => __( 'Download Link', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
					],
				],
				'title_field' => '{{{ language_name }}}',
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
		    $id = 'whitepaper';
		}

		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );

		if($page_settings['choose_page_variation'] == 'video') {
			$section_pro = 'section-pro bg-color';
		} else {
			$section_pro = '';
		}
    ?>

<!-- Whitepaper -->
<div id="<?php echo esc_attr(strtolower($id)); ?>" class="whitepaper <?php echo $section_pro; ?> section-padding ">
    <div class="container-fluid">
        <div class="container">

            <?php 
				$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
				if(!empty($page_settings['choose_page_variation'])) {
				if($page_settings['choose_page_variation'] == 'animation') {
			?>

        	<div class="heading text-center">
	            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
	                <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
	                <h2 class="title"><?php echo $settings['section_title']; ?></h2>
	            </div>
	            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
	        </div>

	    	<?php } elseif($page_settings['choose_page_variation'] == 'graphic') { ?>

			<div class="heading text-center">
	            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
	                <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
	                <h2 class="title"><?php echo $settings['section_title']; ?></h2>
	            </div>
	            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
	        </div>

	    	<?php } elseif($page_settings['choose_page_variation'] == 'counter') { ?>

            <div class="heading text-center">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html($settings['section_sub_title']); ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo esc_html($settings['section_title']); ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>

            <?php } elseif($page_settings['choose_page_variation'] == 'video') { ?>

            <div class="heading text-center">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html($settings['section_sub_title']); ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo esc_html($settings['section_title']); ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>

			<?php }} else { ?>

            <div class="heading text-center">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html($settings['section_sub_title']); ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo esc_html($settings['section_title']); ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>

			<?php } ?>


            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="whitepaper-img">
                        <img class="img-fluid animated" data-animation="fadeInUpShorter" data-animation-delay="0.6s" src="<?php echo esc_html($settings['section_side_img']['url']); ?>" alt="whitepaper">
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="content-area">

                        <h4 class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.5s"><?php echo esc_html($settings['section_content_title']); ?></h4>
                        <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.6s"><?php echo $settings['section_content_desc']; ?></div>

                        <div class="whitepaper-languages">
                            <div class="row">
								<?php 
					                $whitepaper_list = $settings['whitepaper_list'];
					                if (is_array($whitepaper_list)) { 
					                	$i = 0;
					                	foreach ($whitepaper_list as $key => $value) { $i++;
					            ?>
                                <div class="col-md-3 col-6 text-center mt-4 animated" data-animation="fadeInUpShorter" data-animation-delay="0.6s">
                                    <a href="<?php echo esc_url($value['download_link']); ?>" title="English">
                                        <img src="<?php echo esc_url($value['country_flag']['url']); ?>" alt="English">
                                        <div class="lang-text">
                                            <span class="icon ti-download mr-1"></span>
                                            <span class="language"><?php echo esc_html($value['language_name']); ?></span>
                                        </div>
                                    </a>
                                </div>
								<?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Whitepaper -->


	<?php
	
	}	

}
