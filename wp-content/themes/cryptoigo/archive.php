<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<!-- Start Blog Page -->
<div class="sub-page blog-area" id="head-area">


    <!-- Breadcrumb -->
    <?php do_action('cryptoigo_breadcrum'); ?>
    <!--/ Breadcrumb -->

    
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

                    <div class="blog-posts">

                        <!-- ========== blog - start ========== -->
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', get_post_format() );
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
     </div>
     <!--/ Blog Area -->

     <?php get_footer(); ?>