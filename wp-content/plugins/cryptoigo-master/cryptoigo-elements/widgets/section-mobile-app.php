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

class Section_Mobile_app extends Widget_Base {

	public function get_name() {
		return 'section-mobile-app';
	}

	public function get_title() {
		return 'Mobile App Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-apps';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
				'label' => esc_html__( 'Mobile App Content', 'cryptoigo' ),   //section name for controler view
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon1', [
				'label' => __( 'FontAwesome Icon', 'cryptoigo' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'description' => esc_html__( 'If you want to use flat icon do not select any', 'cryptoigo' ),
			]
		);

		$repeater->add_control(
			'icon2', [
				'label' => __( 'Custom Icon', 'cryptoigo' ),
				'type' => Controls_Manager::SELECT2,
				'options' => cryptoigo_get_flat_icons(),
				'label_block' => true,
				'description' => esc_html__( 'If you want to use Themefy icon do not select any', 'cryptoigo' ),
			]
		);

		$repeater->add_control(
			'app_name',
			[
				'label' => __( 'App Name', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater Item', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ app_name }}}',
			]
		);


		$this->add_control(
			'app_btn1_txt',
			[
				'label' => esc_html__( 'App Button 1 Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'app_btn1_link',
			[
				'label' => esc_html__( 'App Button 1 Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_responsive_control(
			'app_btn1_img',
			[
				'label' => __( 'App Button 1 image', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'app_btn2_txt',
			[
				'label' => esc_html__( 'App Button 2 Text', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'app_btn2_link',
			[
				'label' => esc_html__( 'App Button 2 Link', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_responsive_control(
			'app_btn2_img',
			[
				'label' => __( 'App Button 2 image', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'style' => 'thick',
				'label' => __( 'Side App Image', 'cryptoigo' ),
			]
		);
		/* Side Mobile App Image */
		$this->add_control(
			'app_ima1',
			[
				'label' => esc_html__( 'App image 1', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'app_ima2',
			[
				'label' => esc_html__( 'App image 2', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'app_ima3',
			[
				'label' => esc_html__( 'App image 3', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'app_ima4',
			[
				'label' => esc_html__( 'App image 4', 'cryptoigo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
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
		    $id = 'mobile-app';
		}

		$bg_gradient = $settings['bg_gradient_switch'];
		if ($bg_gradient == 'yes') {
			$bg_gradient = 'bg-gradient';
			$dark_bg_heading = 'dark-bg-heading';
		} else {
			$bg_gradient = '';
			$dark_bg_heading = 'heading';
		}
		
    ?>

<!-- Token Distribution/Stats -->
<div id="<?php echo esc_attr(strtolower($id)); ?>" class="mobile-app <?php echo $bg_gradient; ?> section-padding">
     <!-- Crypto ico App -->
    <div class="container">
        <div class="<?php echo $dark_bg_heading; ?> text-center">
            <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
            <h2 class="title"><?php echo $settings['section_title']; ?></h2>
            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 animated" data-animation="fadeInUpShorter" data-animation-delay="0.6s">
                <div class="<?php echo $dark_bg_heading; ?> mb-4">
                    <h4 class="title"><?php echo esc_html( $settings['section_content_title'] ); ?></h4>
                </div>
                <?php echo $settings['section_content_desc']; ?>
                <ul class="app-features">
                	<?php 
			                $app_list = $settings['list'];
			                if (is_array($app_list)) { 
			                	$i = 0;
			                	foreach ( $app_list as $key => $value ) { $i++;
			            ?>
                    <li class="dark-bg-text-color">
                    	<?php
							if( $value['icon1'] ){
					        	echo'<i class="'.$value['icon1'].' white mr-3"></i>';
					        } elseif($value['icon2'] ) {
					        	echo'<i class="'.$value['icon2'].' white mr-3"></i>';
					        }
				        ?>
                    	<?php echo esc_html( $value['app_name'] ); ?>
                    </li>
                    <?php } } ?>
                </ul>

                <?php 
                	$app_btn1_txt = $settings['app_btn1_txt'];
                	$app_btn1_link = $settings['app_btn1_link'];
                	$app_btn1_img = $settings['app_btn1_img']['url'];

                	$app_btn2_txt = $settings['app_btn2_txt'];
                	$app_btn2_link = $settings['app_btn2_link'];
                	$app_btn2_img = $settings['app_btn2_img']['url'];
                ?>
					<?php if ( !empty($app_btn1_txt) ) { ?>
	                <a href="<?php echo $app_btn1_link; ?>" class="android mobile-button btn btn-gradient-purple btn-glow mr-4"><span><?php echo $app_btn1_txt; ?></span> <img src="<?php echo $app_btn1_img; ?>" alt=""></a>
	                <?php } if ( !empty ($app_btn2_txt) ) { ?>
	                <a href="<?php echo $app_btn2_link; ?>" class="apple mobile-button btn btn-gradient-purple btn-glow"><span><?php echo $app_btn2_txt; ?></span> <img src="<?php echo $app_btn2_img; ?>" alt=""></a>
					<?php } ?>

            </div>
            <div class="col-lg-6 col-md-12 move-first">
                <div class="mobile-app-imgs">
					<?php 
						$app_ima1 = $settings['app_ima1']['url']; 
						$app_ima2 = $settings['app_ima2']['url']; 
						$app_ima3 = $settings['app_ima3']['url']; 
						$app_ima4 = $settings['app_ima4']['url']; 
					?>
					<?php if(!empty($app_ima1)){ ?>
                    <img src="<?php echo $app_ima1; ?>" alt="mobile-app" class="mobile-app-img-1 animated" data-animation="fadeInUpShorter" data-animation-delay="0.9s">
                    <?php } if(!empty($app_ima2)){ ?>
                    <img src="<?php echo $app_ima2; ?>" alt="mobile-app" class="mobile-app-img-2 animated" data-animation="zoomIn" data-animation-delay="1.4s">
                    <?php } if(!empty($app_ima3)){ ?>
                    <img src="<?php echo $app_ima3; ?>" alt="mobile-app" class="mobile-app-img-3 animated" data-animation="zoomIn" data-animation-delay="1.9s">
                    <?php } if(!empty($app_ima4)){ ?>
                    <img src="<?php echo $app_ima4; ?>" alt="mobile-app" class="mobile-app-img-4 animated" data-animation="zoomIn" data-animation-delay="2.4s">
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!--/ Crypto ico App -->
</div>
<!--/ Token Distribution/Stats -->


<?php
	
	}	

}
