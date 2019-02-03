<?php
/**
 * The template for displaying search results pages.
 *
 * @package cryptoigo
 */

get_header(); ?>

<!-- Start Blog Page -->
<div class="blog-area" id="head-area">
    <div class="blog-head" data-midnight="white">
        <div class="blog-head-content">
            <?php 
            if(function_exists( 'cryptoigo_framework_init' ) ) {
                $breatcrumb_bg_img = cryptoigo_get_option( 'breatcrumb_bg_img' );
                $attachment = wp_get_attachment_image_src( $breatcrumb_bg_img, 'full' );
                $bbg_img    = ($attachment) ? $attachment[0] : $breatcrumb_bg_img;
                if ( $bbg_img ) {
                    ?>
                    <img src="<?php echo esc_url( $bbg_img ); ?>" alt="<?php esc_attr_e('Image', 'cryptoigo'); ?>">
                <?php } } else { ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/theme-assets/images/blockchain.png' ); ?>" alt="<?php esc_attr_e('Image', 'cryptoigo'); ?>">
                <?php } ?>

                <!-- Breadcrumb -->
                <?php do_action('cryptoigo_breadcrum'); ?>
                <!--/ Breadcrumb -->

            </div>
        </div>
        <div class="container blog-container">
            <!-- Blog listing page -->
            <div class="post-listing">
                <div class="row">
                    <!-- Blog Content area -->

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


                        <div class="blog-posts search-area">

                            <!-- ========== blog - start ========== -->
                            <?php if ( have_posts() ) : ?>
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php
                                        /*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
                                        get_template_part( 'template-parts/content', 'search' );
                                        ?>

                                    <?php endwhile; ?>

                                    <?php echo cryptoigo_paging_nav(); ?>

                                    <?php else : ?>

                                        <?php get_template_part( 'template-parts/content', 'none' ); ?>

                                    <?php endif; ?>
                                    <!-- ========== blog - end ========== -->
                                </div>
                            </div>

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
                     <!--/ Blog listing page -->
                 </div>
             </div>
             <!--/ Blog Area -->

             <?php get_footer(); ?>
