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

class Section_Advisor extends Widget_Base {

	public function get_name() {
		return 'section-advisor';
	}

	public function get_title() {
		return 'Advisor Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-nerd-wink';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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
				'label' => esc_html__( 'Advisor Content', 'cryptoigo' ),   //section name for controler view
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
			]
		);
		$this->add_control(
			'section_sub_title',
			[
				'label' => esc_html__( 'Section Sub Title', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
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
			'advisor_posts',
			[
				'label' => esc_html__( 'Posts Per Page', 'cryptoigo' ),
				'type' => Controls_Manager::TEXT,
				'default' => '3',
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
		    $id = 'advisor';
		}

		$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
		if($page_settings['choose_page_variation'] == 'video') {
			$section_pro = 'section-pro bg-color';
		} else {
			$section_pro = '';
		}
    ?>

<!-- Advisors -->
<div id="<?php echo esc_attr(strtolower($id)); ?>" class="advisor team <?php echo $section_pro ?> section-padding">
    <div class="container-fluid">
        <div class="container">

            <?php 
				if(!empty($page_settings['choose_page_variation'])) {
				if($page_settings['choose_page_variation'] == 'animation') {
			?>

        	<div class="heading text-center mb-0">
	            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
	                <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
	                <h2 class="title"><?php echo $settings['section_title']; ?></h2>
	            </div>
	            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
	        </div>

	    	<?php } elseif($page_settings['choose_page_variation'] == 'graphic') { ?>

			<div class="heading text-center mb-0">
	            <div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
	                <h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
	                <h2 class="title"><?php echo $settings['section_title']; ?></h2>
	            </div>
	            <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
	        </div>

	    	<?php } elseif($page_settings['choose_page_variation'] == 'counter') { ?>

            <div class="heading text-center mb-0">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html($settings['section_sub_title']); ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>

            <?php } elseif($page_settings['choose_page_variation'] == 'video') { ?>

            <div class="heading text-center mb-0">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html($settings['section_sub_title']); ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>
            
			<?php }} else { ?>

            <div class="heading text-center mb-0">
                <h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html($settings['section_sub_title']); ?></h6>
                <h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
                <div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
                    <span class="large"></span>
                    <span class="medium"></span>
                    <span class="small"></span>
                </div>
                <p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
            </div>

			<?php } ?>

            <div class="team-profile">
                <div class="row">
					<?php
						$post_amount = $settings['advisor_posts'];
				        $grid_query= null;
				        $args = array(
				             'post_type'  => 'advisor',
				             'post_status'  => 'publish',
				             'orderby' => 'date',
				             'order' => 'DESC',
				             'posts_per_page' => $post_amount,
				        );

				        $grid_query =  new \WP_Query( $args );

				        if ( $grid_query->have_posts() ) :

				        	$i = 0;

				        	while ( $grid_query->have_posts() ) : $grid_query->the_post(); global $post; $i++;

				        		$cryptoigo_advisor = get_post_meta(get_the_ID(), '_advisor_options', true );


				        		if (!empty( $cryptoigo_advisor['advisor_thumbnail_pic'] )) {
			                        $advisor_thumbnail_pic = $cryptoigo_advisor['advisor_thumbnail_pic'];
			                        $attachment = wp_get_attachment_image_src( $advisor_thumbnail_pic, 'full' );
									$thumb_image = $attachment['0'];
			                    } else {
			                        $thumb_image = '';
			                    }

			                    if (!empty( $cryptoigo_advisor['advisor_sign_pic'] )) {
			                        $advisor_sign_pic = $cryptoigo_advisor['advisor_sign_pic'];
			                        $sign_attachment = wp_get_attachment_image_src( $advisor_sign_pic, 'full' );
									$sign_image = $sign_attachment['0'];
			                    } else {
			                        $sign_image = '';
			                    }

					            if (!empty( $cryptoigo_advisor['advisor_member_designation'] )) {
			                        $advisor_designation = $cryptoigo_advisor['advisor_member_designation'];
			                    } else {
			                        $advisor_designation = '';
			                    }

			                    if (!empty( $cryptoigo_advisor['advisor_sm_icon'] )) {
			                        $advisor_sm_icon = $cryptoigo_advisor['advisor_sm_icon'];
			                    } else {
			                        $advisor_sm_icon = '';
			                    }
		            ?>

                    <div class="col-sm-12 col-md-6 col-lg-4 mt-5 animated" data-animation="flipInX" data-animation-delay="0.5s">
                        <div class="d-flex">
                            <div class="team-img float-left mr-3" data-toggle="modal" data-target="#advisorUser<?php echo esc_attr( $i ); ?>">
                                <img src="<?php echo esc_url( $thumb_image ); ?>" alt="team-profile-<?php echo esc_attr( $i ); ?>" class="rounded-circle" width="128">
                            </div>
                            <?php if ( $advisor_sm_icon ) { ?>
                            <div class="team-icon">
                                <i class="<?php echo esc_html( $advisor_sm_icon ); ?>"></i>
                            </div>
                            <?php } ?>
                            <div class="profile align-self-center">
                                <div class="name"><?php the_title(); ?></div>
                                <div class="role"><?php echo esc_html( $advisor_designation ); ?></div>
                                <div class="crypto-profile">
                                    <img src="<?php echo esc_url( $sign_image ); ?>" alt="Team User">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Advisors -->


<?php

    if ( $grid_query->have_posts() ) :

    	$i = 0;

    	while ( $grid_query->have_posts() ) : $grid_query->the_post(); global $post; $i++;

    		$cryptoigo_advisor = get_post_meta(get_the_ID(), '_advisor_options', true );


    		if (!empty( $cryptoigo_advisor['advisor_thumbnail_pic'] )) {
                $advisor_thumbnail_pic = $cryptoigo_advisor['advisor_thumbnail_pic'];
                $attachment = wp_get_attachment_image_src( $advisor_thumbnail_pic, 'full' );
				$thumb_image = $attachment['0'];
            } else {
                $thumb_image = '';
            }

            if (!empty( $cryptoigo_advisor['advisor_sign_pic'] )) {
                $advisor_sign_pic = $cryptoigo_advisor['advisor_sign_pic'];
                $sign_attachment = wp_get_attachment_image_src( $advisor_sign_pic, 'full' );
				$sign_image = $sign_attachment['0'];
            } else {
                $sign_image = '';
            }

            if (!empty( $cryptoigo_advisor['advisor_member_designation'] )) {
                $advisor_designation = $cryptoigo_advisor['advisor_member_designation'];
            } else {
                $advisor_designation = '';
            }

            if (!empty( $cryptoigo_advisor['advisor_sm_icon'] )) {
                $advisor_sm_icon = $cryptoigo_advisor['advisor_sm_icon'];
            } else {
                $advisor_sm_icon = '';
            }

            if (!empty( $cryptoigo_advisor['advisor_sm_btn'] )) {
                $advisor_sm_btns = $cryptoigo_advisor['advisor_sm_btn'];
            } else {
                $advisor_sm_btns = '';
            }

            if (!empty( $cryptoigo_advisor['advisor_member_skills'] )) {
                $advisor_skills = $cryptoigo_advisor['advisor_member_skills'];
            } else {
                $advisor_skills = '';
            }
?>

<div class="modal team-modal fade" id="advisorUser<?php echo esc_attr( $i ); ?>" tabindex="-1" role="dialog" aria-labelledby="advisorUser<?php echo esc_attr( $i ); ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="row p-4">
                    <div class="col-12 col-md-5">
                        <img class="img-fluid rounded" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="Nadia Sidko">
                    </div>
                    <div class="col-12 col-md-7 mt-sm-3">
                        <h5 id="advisorUser<?php echo $i; ?>Title"><?php the_title(); ?></h5>
                        <small class="text-muted mb-0 "><?php echo esc_html( $advisor_designation ); ?></small>
                        <div class="social-profile">
							<?php 
                        		if (is_array($advisor_sm_btns)) {
                        			foreach ($advisor_sm_btns as $key => $value) {
                        	?>
                            <a href="<?php echo esc_url( $value['social_link'] ); ?>" title="Linkedin" class="font-medium grey-accent2 mr-2"><i class="<?php echo esc_attr( $value['social_icon'] ); ?>"></i></a>
                            <?php }} ?>
                        </div>

                        <div class="my-4">
                            <?php the_content(); ?>
                        </div>
                        <?php 
                    		if (is_array($advisor_skills)) {
                    			foreach ($advisor_skills as $key => $value) {
                    	?>
                        <h6 class="mb-0"><small class="text-uppercase"><?php echo esc_html( $value['skill_name'] ); ?></small> <small class="float-right"><?php echo esc_html( $value['skill_persantage'] ); ?>%</small></h6>
                        <div class="progress box-shadow-1 mb-4">
                          <div class="progress-bar progress-orange" role="progressbar" style="width: <?php echo esc_attr( $value['skill_persantage'] ); ?>%;" aria-valuenow="<?php echo esc_attr( $value['skill_persantage'] ); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endwhile; wp_reset_postdata(); endif; ?>

	<?php
	
	}	

}
