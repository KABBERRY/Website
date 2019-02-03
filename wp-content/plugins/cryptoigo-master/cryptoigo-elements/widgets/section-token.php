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

class Section_Token extends Widget_Base {

	public function get_name() {
		return 'section-token';
	}

	public function get_title() {
		return 'Token Section';   // title to show on cryptoigo
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
				'label' => esc_html__( 'Token Content', 'cryptoigo' ),   //section name for controler view
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
				'label' => esc_html__( 'Section Content', 'cryptoigo' ),
				'type' => Controls_Manager::WYSIWYG,
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
						'label' => __( 'Token list Title', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Token Title' , 'cryptoigo' ),
						'label_block' => true,
					],
					[
						'name' => 'token_text',
						'label' => __( 'Token list text', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
					],
				],
				'title_field' => '{{{ token_title }}}',
			]
		);
		$this->add_control(
			'side_img_switch',
			[
				'label' => esc_html__( 'Image Align Right', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'cryptoigo' ),
				'label_off' => __( 'No', 'cryptoigo' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'coin_section_switch',
			[
				'label' => esc_html__( 'Coin Section ??', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'cryptoigo' ),
				'label_off' => __( 'No', 'cryptoigo' ),
				'return_value' => 'yes',
				'default' => 'no',
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
		    $id = 'token-distribution';
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

		if($page_settings['choose_page_variation'] == 'video') {
			$section_pro = 'section-pro bg-color';
		} elseif($page_settings['choose_page_variation'] == 'graphic') {
			$section_pro = 'our-coin section-pro';
		} else {
			$section_pro = '';
		}

    ?>

<!-- Token Distribution/Stats -->
<div id="<?php echo esc_attr(strtolower($id)); ?>" class="token-distribution <?php echo $section_pro; ?> section-padding <?php echo $bg_gradient; ?>">
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


            <div class="row justify-content-xl-center">
				
				<?php
					$side_img_align = $settings['side_img_switch']; 
					if ($side_img_align == 'yes') {
						$align_class = 'order-12 ';
						$offset = ' ';
					} else {
						$align_class = ' ';
						$offset = '';
					}

					$coin_section_switch = $settings['coin_section_switch'];
					if ($coin_section_switch == 'yes') {
						$img_cols = 'col-lg-4 col-xl-4';
						$txt_cols = 'col-lg-6 col-xl-6';
					} else {
						$img_cols = 'col-lg-6 col-xl-5';
						$txt_cols = 'col-lg-6 col-xl-5';
					}
				?>

                <div class="col-md-12 <?php echo $img_cols; ?> <?php echo $align_class; ?> animated" data-animation="fadeInLeftShorter" data-animation-delay="0.6s">
                    <div class="token-img">
                        <img class="img-fluid" src="<?php echo ( $settings['section_side_img']['url'] ); ?>" alt="token-distribution">
                    </div>
                </div>
                <div class="col-md-12 <?php echo $txt_cols; ?> <?php echo $offset; ?> animated" data-animation="fadeInRightShorter" data-animation-delay="0.6s">
                    <div class="content-area">
						<div class="<?php echo $dark_bg_heading; ?> mb-4">
                        	<h3 class="title"><?php echo esc_html( $settings['section_content_title'] ); ?></h3>
                        </div>
                        <div class="mt-1"><?php echo $settings['section_content_desc']; ?></div>

						<?php 
			                $token_list = $settings['token_list'];
			                if (is_array($token_list)) { 
			                	$i = 0;
			                	foreach ( $token_list as $key => $value ) { $i++;
			            ?>
                        	<p><span><?php echo esc_html( $value['token_title'] ); ?></span> <strong class="grey-accent2"><?php echo esc_html( $value['token_text'] ); ?></strong></p>
                        <?php } } ?>

                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<!--/ Token Distribution/Stats -->


<?php
	
	}	

}
