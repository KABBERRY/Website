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

class Section_Contact extends Widget_Base {

	public function get_name() {
		return 'section-contact';
	}

	public function get_title() {
		return 'Contact Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-form-horizontal';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
	}

	public function get_categories() {
		return [ 'cryptoigo-elements' ];    // category of the widget
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/

	protected function _register_controls() {
		
		//start of a control box
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Contact Content', 'cryptoigo' ),   //section name for controler view
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
			'section_desc_2',
			[
				'label' => esc_html__( 'Description For Video Version', 'cryptoigo' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'contact_list',
			[
				'label' => __( 'Contact Info List', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'icon1',
						'label' => esc_html__( 'FontAwesome Icon', 'cryptoigo' ),
						'type' => Controls_Manager::ICON,
						'description' => esc_html__( 'If you want to use flat icon do not select any', 'cryptoigo' ),
					],
					[
						'name' => 'icon2',
						'label' => esc_html__( 'Custom Icon', 'cryptoigo' ),
						'type' => Controls_Manager::SELECT2,
						'options' => cryptoigo_get_flat_icons(),
					],
					[
						'name' => 'info_title',
						'label' => __( 'Title', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Info title' , 'cryptoigo' ),
						'label_block' => true,
					],
				],
				'title_field' => '{{{ info_title }}}',
			]
		);



		$this->add_control(
			'contact_shortcode',
			[
				'label' => esc_html__( 'Contact Form Shortcode', 'cryptoigo' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);
		$this->add_control(
			'contact_version_control',
			[
				'label' => __( 'Contact Section Style', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'counter',
				'options' => [
					'counter'  => __( 'Counter Version', 'cryptoigo' ),
					'video' => __( 'Video Version', 'cryptoigo' ),
				],
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
		    $id = 'contact';
		}

		$contact_version = $settings['contact_version_control'];

		if ($contact_version == 'counter') {
    ?>

		<!-- Contact -->
		<div id="<?php echo esc_attr(strtolower($id)); ?>" class="contact section-padding bg-color">
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

		            <div class="heading text-center">
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

		            <div class="heading text-center">
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

		            <div class="row">
		                <div class="col-md-12 col-xl-8 mx-auto">
		                    <ul class="list-unstyled contact-info pb-5 mb-5">
								<?php 
					                $contact_info = $settings['contact_list'];
					                if (is_array($contact_info)) { 
					                	$i = 4;
					                	foreach ( $contact_info as $key => $value ) { $i++;
					            ?>
		                        <li class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.<?php echo esc_attr( $i ); ?>s">
		                            <?php
										if( $value['icon1'] ){
								        	echo'<i class="'.$value['icon1'].'""></i>';
								        } elseif($value['icon2'] ) {
								        	echo'<i class="'.$value['icon2'].'"></i>';
								        }
							        ?>
		                            <span class="ml-1"><?php echo esc_html( $value['info_title'] ); ?></span>
		                        </li>
								<?php } } ?>
		                    </ul>
		                    <div class="contact-form text-center">
		                    	<?php echo do_shortcode( $settings['contact_shortcode'] ); ?>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--/ Contact -->

<?php } else if ($contact_version == 'video') { ?>
		<!-- Contact -->
		<div id="contact" class="contact section-padding">
		    <div class="container-fluid">
		        <div class="container">
		            <div class="heading text-center">
		                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo $settings['section_sub_title']; ?></h6>
		                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
		                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
		                    <span class="large"></span>
		                    <span class="medium"></span>
		                    <span class="small"></span>
		                </div>
		                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
		                <p class="font-medium mt-5 animated" data-animation="fadeInUpShorter" data-animation-delay="0.5s"><?php echo $settings['section_desc_2']; ?></p>
		            </div>
		            <div class="row">
		                <div class="col-lg-5 col-md-12 mx-auto">
		                    <ul class="list-unstyled list-group contact-info mb-3">
		                    	<?php 
					                $contact_info = $settings['contact_list'];
					                if (is_array($contact_info)) { 
					                	$i = 5;
					                	foreach ( $contact_info as $key => $value ) { $i++;
					            ?>
		                        <li class="pt-1 animated" data-animation="fadeInUpShorter" data-animation-delay="0.<?php echo esc_attr( $i ); ?>s">
		                            <?php
										if( $value['icon1'] ){
								        	echo'<i class="'.$value['icon1'].'""></i>';
								        } elseif($value['icon2'] ) {
								        	echo'<i class="'.$value['icon2'].'"></i>';
								        }
							        ?>
		                            <span><?php echo esc_html( $value['info_title'] ); ?></span>
		                        </li>
		                        <?php } } ?>
		                    </ul>
		                </div>
		                <div class="col-lg-7 col-md-12 mx-auto">
		                    <?php echo do_shortcode( $settings['contact_shortcode'] ); ?>
		                </div>
		            </div>

		        </div>
		    </div>
		</div>
		<!--/ Contact -->
<?php } ?>

<?php
	
	}	

}
