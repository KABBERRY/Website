<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cryptoigo
 */
get_header(); 

?>

<!-- Start of blog section
  ============================================= -->
  <div class="sub-page blog-area">
    <?php do_action('cryptoigo_breadcrum'); ?>
    
    <!-- Content area -->
    <div class="inner-page-sidebar section-bg">
      <div class="container">
        <div class="row">
         <?php 
         if( function_exists( 'cryptoigo_framework_init' ) ) {
          $blog_layout = cryptoigo_get_option('blog_layout');
          if ( $blog_layout == 'left-sidebar' ) {
            $col   = '8';
            $class = 'pull-right';
          } elseif ( $blog_layout == 'right-sidebar' ) {
            $col   = '8';
            $class = '';
          } elseif ( $blog_layout == 'full-width' ) {
            $class = '';
            $col   = '12';
          } else {
            $class = 'pull-right';
            $col   = '8';
          }
        } else {
          $col   = '8';
          $class = 'pull-right';
        }
        ?>
        <div class="col-md-12 col-lg-<?php echo esc_attr($col); ?> <?php echo esc_attr($class); ?>">
          <div class="blog-container">
            <div class="blog-posts post-page">
              <main id="primary" class="site-main">
               <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                 <?php
        						/*
        						 * Include the Post-Format-specific template for the content.
        						 * If you want to override this in a child theme, then include a file
        						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        						 */
                    get_template_part( 'template-parts/content', 'page' ); ?>
                  <?php endwhile; ?>
                  <?php echo cryptoigo_paging_nav(); ?>
                  <?php else : ?>
                   <?php get_template_part( 'template-parts/content', 'none' ); ?>
                 <?php endif; ?>
               </main>
             </div>

             <?php 
             if ( comments_open() || get_comments_number() ) : ?>
              <div class="comment-section">
                <?php comments_template(); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <!-- /col-md-8 -->

        <!-- Start Blog Sidebar -->
        <?php 
        if( function_exists( 'cryptoigo_framework_init' ) ) {
          $blog_layout = cryptoigo_get_option('blog_layout');
          if ( $blog_layout == 'left-sidebar' ||  $blog_layout == 'right-sidebar' ) {
            get_sidebar('right');
          } elseif ($blog_layout == 'full-width') {

          } else {
            get_sidebar('right');
          }
        } else {
         get_sidebar('right'); 
       }
       ?>
     </div>
   </div>
 </div>
<!-- End of blog-section 
  ============================================= -->


  <?php get_footer(); ?>
