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

class Section_Blogs extends Widget_Base {

	public function get_name() {
		return 'section-blog';
	}

	public function get_title() {
		return 'Blog Section';   // title to show on cryptoigo
	}

	public function get_icon() {
		return 'eicon-post';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
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

		//Default Catergory loop
		$taxonomy = 'category';
		  $terms = get_terms($taxonomy); // Get all terms of a taxonomy
		  
		  if ( $terms ) {
		  	foreach ( $terms as $term ) { 
		  		$cats[ $term->slug ] = $term->name;
		  	} 
		  } else {
		  	$cats[ __( 'No category found', 'cryptoigo' ) ] = 0;
		  }

		//start of a control box
		  $this->start_controls_section(
		  	'section_content',
		  	[
				'label' => esc_html__( 'Blog Content', 'cryptoigo' ),   //section name for controler view
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
		  	'display_posts',
		  	[
		  		'label' => __( 'Display Posts Amount', 'cryptoigo' ),
		  		'type' => Controls_Manager::NUMBER,
		  		'default' => '4',
		  		'label_block' => true,
		  	]
		  );
		  $this->add_control(
		  	'display_posts_cat',
		  	[
		  		'label' => __( 'Display Posts Category Name', 'cryptoigo' ),
		  		'type' => Controls_Manager::SELECT,
		  		'options' => $cats,
		  	]
		  );
		  $this->add_control(
		  	'blog_version_control',
		  	[
		  		'label' => __( 'Blog Style', 'cryptoigo' ),
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
			$id = 'blog';
		}
		
		$blog_version = $settings['blog_version_control'];

		if ($blog_version == 'counter') {
			?>

			<!-- News -->
			<div id="<?php echo esc_attr(strtolower($id)); ?>" class="blog section-padding">
				<div class="container-fluid">
					<div class="container">

						<?php 
						$page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
						if(!empty($page_settings['choose_page_variation'])) {
							if($page_settings['choose_page_variation'] == 'animation') {
								?>

								<div class="heading text-center no-margin">
									<div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
										<h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
										<h2 class="title"><?php echo $settings['section_title']; ?></h2>
									</div>
									<p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
								</div>

							<?php } elseif($page_settings['choose_page_variation'] == 'graphic') { ?>

								<div class="heading text-center no-margin">
									<div class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
										<h6 class="sub-title"><?php echo $settings['section_sub_title']; ?></h6>
										<h2 class="title"><?php echo $settings['section_title']; ?></h2>
									</div>
									<p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
								</div>

							<?php } elseif($page_settings['choose_page_variation'] == 'counter') { ?>

								<div class="heading text-center no-margin">
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

								<div class="heading text-center no-margin">
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

								<div class="heading text-center no-margin">
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
								<?php
								global $post;
								$post_category = $settings['display_posts_cat'];
								$post_per_page = $settings['display_posts'];

								if (!empty($post_category)) {
									$args = array( 'category_name' => $post_category, 'posts_per_page' => $post_per_page );
								} else {
									$args = array( 'posts_per_page' => $post_per_page );
								}

								$myposts = get_posts( $args ); 
								$i = 4;
								$count = 1;
								$left = true;
								foreach( $myposts as $post ) :  setup_postdata($post); $i++;

									$post_data = get_post_meta( get_the_ID(), '_custom_post_options', true );

									if (!empty( $post_data['post_small_img'] )) {
										$post_small_img = $post_data['post_small_img'];
										$attachment = wp_get_attachment_image_src( $post_small_img, 'full' );
										$thumb_image = $attachment['0'];
									} else {
										$thumb_image = '';
									}

									if($left){
										$content_position = 'float-md-left';
										$image_position = 'float-md-right';
									}else{
										$content_position = 'float-md-right';
										$image_position = 'float-md-left';
									}

									if($count == 2){
										$left = ($left == true) ? false : true;
										$count = 0;
									}
									$count++;

									?>

									<div class="col-md-12 col-lg-6">
										<div class="card border-dash animated" data-animation="fadeInUpShorter" data-animation-delay="0.<?php echo esc_attr($i); ?>s">
											<div class="card-body">
												<div class="blog-content <?php echo $content_position; ?> float-sm-none mr-1 mr-xs-0">
													<h5 class="card-title"><a href="<?php the_permalink( ) ?>"><?php the_title(); ?></a></h5>
													<p class="card-text"><?php echo substr( get_the_excerpt(), 0,200 ); ?></p>
												</div>
												<?php if (!empty($thumb_image)) { ?>
													<div class="blog-img overlap <?php echo $image_position ?> float-sm-none ml-2 ml-xs-0 mr-xs-3 mt-xs-3">
														<img class="right-img" src="<?php echo esc_url( $thumb_image ); ?>" alt="blog-image1" width="185" height="250">
													</div>
												<?php } else if (!empty(get_the_post_thumbnail_url())) { ?>
													<div class="blog-img overlap <?php echo $image_position ?> float-sm-none ml-2 ml-xs-0 mr-xs-3 mt-xs-3">
														<img class="right-img" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="blog-image1" width="185" height="250">
													</div>
												<?php } ?>
											</div>
											<div class="card-footer">
												<div class="card-meta">
													<a href="<?php the_permalink(); ?>" class="blog-footer" title=""> <?php echo get_the_date(); ?> </a> 
													<?php
													$categories = get_the_category();
													if ( ! empty( $categories ) ) { 
														echo '| <a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"  class="blog-footer">' . esc_html( $categories[0]->name ) . '</a>';
													}
													?>
												</div>
												<a href="<?php the_permalink(); ?>" class="btn btn-sm bordered has-very-light-gray-color read-more"><?php esc_html_e( 'Read More', 'cryptoigo' ); ?></a>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<!--/ News -->
			<?php } else if ($blog_version == 'video') { ?>
				<!-- News -->
				<div id="<?php echo esc_attr(strtolower($id)); ?>" class="news section-padding bg-color">
					<div class="container-fluid">
						<div class="container">
							<div class="heading text-center no-margin">
								<h6 class="sub-title animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo $settings['section_sub_title']; ?></h6>
								<h2 class="title animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s"><?php echo $settings['section_title']; ?></h2>
								<div class="separator animated" data-animation="fadeInUpShorter" data-animation-delay="0.3s">
									<span class="large"></span>
									<span class="medium"></span>
									<span class="small"></span>
								</div>
								<p class="content-desc animated" data-animation="fadeInUpShorter" data-animation-delay="0.4s"><?php echo $settings['section_desc']; ?></p>
							</div>
							<div class="row mt-2">
								<?php
								global $post;
								$post_category = $settings['display_posts_cat'];
								$post_per_page = $settings['display_posts'];

								if (!empty($post_category)) {
									$args = array( 'category_name' => $post_category, 'posts_per_page' => $post_per_page );
								} else {
									$args = array( 'posts_per_page' => $post_per_page );
								}
								$i = 4;
								$myposts = get_posts( $args ); 
								foreach( $myposts as $post ) :  setup_postdata($post); $i++;

									$post_data = get_post_meta( get_the_ID(), '_custom_post_options', true );

									if (!empty( $post_data['post_small_img'] )) {
										$post_small_img = $post_data['post_small_img'];
										$attachment = wp_get_attachment_image_src( $post_small_img, 'full' );
										$thumb_image = $attachment['0'];
									} else {
										$thumb_image = get_template_directory_uri() . '/theme-assets/images/news-3.png';
									}

									?>

									<div class="col-md-12 col-lg-4 mb-sm-5  mb-xs-5">
										<div class="card animated" data-animation="fadeInUpShorter" data-animation-delay="0.<?php echo esc_attr($i); ?>s">
											<?php if (!empty($thumb_image)) { ?>
												<img class="card-img-top" src="<?php echo esc_url( $thumb_image ); ?>" alt="blog-image1">
											<?php } else if (!empty(get_the_post_thumbnail_url())) { ?>
												<img class="card-img-top" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="blog-image1">
											<?php } ?>
											<div class="card-img-overlay">
												<div class="blog-content">
													<h4 class="card-title mt-3"><?php the_author(); ?></h4>
													<h2 class="mt-4"> <?php the_title(); ?> </h2>
												</div>
											</div>
											<div class="card-footer">
												<a href="<?php the_permalink(); ?>" class="read-more btn btn-round btn-glow btn-gradient-blue"><?php esc_html_e( 'Read More', 'cryptoigo' ); ?></a>
											</div>
										</div>
									</div>
								<?php endforeach; ?>

							</div>
						</div>
					</div>
				</div>
				<!--/ News -->
			<?php } ?>
			<?php

		}	

	}
