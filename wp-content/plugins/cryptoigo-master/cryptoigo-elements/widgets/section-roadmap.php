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

class Section_Roadmap extends Widget_Base {

	public function get_name() {
		return 'section-roadmap';
	}

	public function get_title() {
		return 'Roadmap Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-posts-justified';   //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
			'solution_list',
			[
				'label' => __( 'List', 'cryptoigo' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'rm_date',
						'label' => __( 'Date', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Road Map Date' , 'cryptoigo' ),
						'label_block' => true,
					],
					[
						'name' => 'rm_text',
						'label' => __( 'Item Text', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Item Text' , 'cryptoigo' ),
						'label_block' => true,
					],
					[
						'name' => 'open_item',
						'label' => __( 'Active Item', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'your-plugin' ),
						'label_off' => __( 'Hide', 'your-plugin' ),
						'return_value' => 'yes',
						'default' => 'no',
					],
					[
						'name' => 'full_item',
						'label' => __( 'Complete Item', 'cryptoigo' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'your-plugin' ),
						'label_off' => __( 'Hide', 'your-plugin' ),
						'return_value' => 'yes',
						'default' => 'yes',
					]
				],
				'title_field' => '{{{ rm_date }}}',
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
		    $id = 'roadmap';
		}


		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );

		if($page_settings['choose_page_variation'] == 'counter') {
			$section_pro = 'bg-color';
		} else {
			$section_pro = '';
		}
    ?>


<!-- Roadmap -->
<div id="<?php echo esc_attr(strtolower($id)); ?>" class="roadmap <?php echo $section_pro; ?> section-padding">
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
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo ($settings['section_title']); ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo ($settings['section_desc']); ?></p>
            </div>

            <?php } elseif($page_settings['choose_page_variation'] == 'video') { ?>

            <div class="heading text-center">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html($settings['section_sub_title']); ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo ($settings['section_title']); ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo ($settings['section_desc']); ?></p>
            </div>

			<?php }} else { ?>

            <div class="heading text-center">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html($settings['section_sub_title']); ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo ($settings['section_title']); ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo ($settings['section_desc']); ?></p>
            </div>

			<?php } ?>


            <div class="row animated" data-animation="fadeInUpShorter" data-animation-delay="0.6s">
                <div class="col-12">
                    <div class="roadmap-container">
                        <div class="swiper-container">
                            <div class="swiper-wrapper timeline">
								<?php 
					                $roadmap_list = $settings['solution_list'];
					                if (is_array($roadmap_list)) { 
					                	$i = 0;
					                	foreach ($roadmap_list as $key => $value) { $i++;

					                		$active_item = $value['open_item'];

					                		if ($active_item == 'yes') { ?>

					                		<div class="swiper-slide active">
			                                    <div class="roadmap-info">
			                                        <div class="timestamp active">
			                                            <span class="date"><?php echo $value['rm_date']; ?></span>
			                                        </div>
			                                        <div class="status active">
			                                            <span><?php echo $value['rm_text']; ?></span>
			                                            <span class="live"><?php esc_html_e( 'Live Now', 'cryptoigo' ); ?></span>
			                                        </div>
			                                    </div>
			                                </div>

					               <?php } else { 

					               	$complete_item = $value['full_item'];

						               	if ($complete_item == 'yes') {
						               		$item_class = 'completed';
						               	} else {
						               		$item_class = 'remaining';
						               	}

					               	?>
	                                <div class="swiper-slide">
	                                    <div class="roadmap-info">
	                                        <div class="timestamp <?php echo esc_attr($item_class); ?>">
	                                            <span class="date"><?php echo $value['rm_date']; ?></span>
	                                        </div>
	                                        <div class="status <?php echo esc_attr($item_class); ?>">
	                                            <span> <?php echo $value['rm_text']; ?> </span>
	                                        </div>
	                                    </div>
	                                </div>
                                <?php } } } ?>
                            </div>
                        </div>
                        <div class="swiper-control">
                            <span class="prev-slide"></span>
                            <span class="next-slide"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Roadmap -->


	<?php
	
	}	

}
