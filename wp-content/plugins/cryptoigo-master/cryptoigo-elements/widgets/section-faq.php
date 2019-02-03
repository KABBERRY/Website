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

class Section_Faq extends Widget_Base {

	public function get_name() {
		return 'section-faq';
	}

	public function get_title() {
		return 'Faq Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-facebook-comments';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
				'label' => esc_html__( 'Faq Content', 'cryptoigo' ),   //section name for controler view
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
			'faq_posts',
			[
				'label' => esc_html__( 'Posts Per Page', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'default' => '4',
				'label_block' => true,
			]
		);
		$this->add_control(
			'bg_gradient_switch',
			[
				'label' => esc_html__( 'Black section', 'cryptoigo' ),
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
		    $id = 'faq';
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

		if($page_settings['choose_page_variation'] == 'counter') {
			$section_pro = 'bg-color';
		} else {
			$section_pro = '';
		}
    ?>

	<!-- FAQ -->
	<div id="<?php echo esc_attr(strtolower($id)); ?>" class="faq <?php echo $section_pro ?> section-padding <?php echo $bg_gradient; ?>">
	    <div class="container-fluid">
	        <div class="container">

	            <?php 
					$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
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

	            <div class="row">
	                <div class="col">
	                	<?php 
							$post_amount = $settings['faq_posts'];
					        $grid_query= null;
					        $args = array(
					             'post_type'  => 'faq',
					             'post_status'  => 'publish',
					             'orderby' => 'date',
					             'order' => 'DESC',
					             'posts_per_page' => $post_amount,
					        );

					        $grid_query =  new \WP_Query( $args );

					        if ( $grid_query->have_posts() ) :

					        	$i = 0;
	                	?>
	                    <nav>
	                        <div class="nav nav-pills nav-underline mb-5 animated" data-animation="fadeInUpShorter" data-animation-delay="0.5s" id="myTab" role="tablist">
							<?php
					        	while ( $grid_query->have_posts() ) : $grid_query->the_post(); global $post; $i++;

		                    		$faq_name = get_the_title();
									$faqn = str_replace(' ', '_', $faq_name);
									if (!empty($faqn)) {
									    $id = $faqn;
									} else {
									    $id = 'faq';
									}

									if ($i == 1) {
										$active_class = 'active';
									} else {
										$active_class = '';
									}
					                    	
				            ?>
	                            <a href="#<?php echo esc_attr(strtolower($id)); ?>" class="nav-item nav-link <?php echo esc_attr($active_class); ?>" id="<?php echo esc_attr(strtolower($id)); ?>-tab" data-toggle="tab" aria-controls="<?php echo esc_attr(strtolower($id)); ?>" aria-selected="true" role="tab"><?php echo esc_html( $faq_name ); ?></a>
	                        <?php endwhile; ?>
	                           
	                        </div>
	                    </nav>
	                    <div class="tab-content" id="myTabContent">
	                    	<?php
	                			$i = 0;
					        	while ( $grid_query->have_posts() ) : $grid_query->the_post(); global $post; $i++;

					        		$faq_options = get_post_meta(get_the_ID(), '_faq_options', true );


				                    if (!empty( $faq_options['faq_item_list'] )) {
				                        $faq_item_lists = $faq_options['faq_item_list'];
				                    } else {
				                        $faq_item_lists = '';
				                    }

		                            $faq_name = get_the_title();

									$faqn = str_replace(' ', '_', $faq_name);
									if (!empty($faqn)) {
									    $id = $faqn;
									} else {
									    $id = 'faq';
									}

									if ($i == 1) {
										$sa = 'show active';
									} else {
										$sa = '';
									}

				            ?>

	                        <div class="tab-pane fade <?php echo $sa; ?>" id="<?php echo esc_attr(strtolower($id)); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr(strtolower($id)); ?>-tab">
	                            <div id="<?php echo esc_attr(strtolower($id)); ?>-accordion" class="collapse-icon accordion-icon-rotate">
	                            	<?php 
	                            		if (is_array($faq_item_lists)) {
	                            			$i = 0;
					                    	foreach ($faq_item_lists as $key => $value) {

												$i++;
												if ($i == 1) {
													$in = 'show';
													$acc = ' ';
													$area_extedded = 'true';
												} else {
													$in = '';
													$acc = 'collapsed';
													$area_extedded = 'false';
												}
									?>
	                                <div class="card animated" data-animation="fadeInUpShorter" data-animation-delay="0.<?php echo esc_attr( $i ); ?>s">
	                                    <div class="card-header" id="<?php echo esc_attr(strtolower($id)); ?>heading<?php echo esc_attr( $i ); ?>">
	                                      <h5 class="mb-0">
	                                        <a class="btn-link <?php echo esc_attr( $acc ); ?>" data-toggle="collapse" data-target="#<?php echo esc_attr(strtolower($id)); ?>collapse<?php echo esc_attr( $i ); ?>" aria-expanded="<?php echo esc_attr( $area_extedded ); ?>">
	                                            <span class="icon"></span>
	                                            <?php echo esc_html($value['faq_title']); ?>
	                                        </a>
	                                      </h5>
	                                    </div>
	                                    <div id="<?php echo esc_attr(strtolower($id)); ?>collapse<?php echo esc_attr( $i ); ?>" class="collapse <?php echo esc_attr( $in ); ?>" aria-labelledby="<?php echo esc_attr(strtolower($id)); ?>heading<?php echo esc_attr( $i ); ?>" data-parent="#<?php echo esc_attr(strtolower($id)); ?>-accordion">
	                                        <div class="card-body"><?php echo $value['faq_desc']; ?></div>
	                                    </div>
	                                </div>
	                                <?php } } ?>

	                            </div>
	                        </div>
							<?php endwhile; ?>
	                    </div>
	                    <?php wp_reset_postdata(); endif; ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!--/ FAQ -->

	<?php
	
	}	

}
