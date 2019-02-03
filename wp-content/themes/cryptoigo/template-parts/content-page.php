<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package cryptoigo
 */

?>

<!-- Blog post details -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="card-body">
        <?php if(has_post_thumbnail()) { ?>
        <div class="single-post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php } ?>
        <div class="content-area">

             <div class="page-content">
                <?php the_content(); ?>
            </div>
            <?php
               wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cryptoigo' ),
                'after'  => '</div>',
                ) );
            ?>

        </div>
    </div>
</article>
<!-- Blog post details -->

