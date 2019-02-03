<?php
/**
 * Template part for displaying single posts.
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
            <?php
            if ( 'post' === get_post_type() ) : ?>
                <div class="entry-header">
                    <?php cryptoigo_entry_header() ?>
                </div>
            <?php endif; ?>
            
            <h2 class="card-title"><?php the_title(); ?></h2>

            <div class="blog-content">
                <?php the_content(); ?>
            </div>
            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cryptoigo' ),
                'after'  => '</div>',
            ) );
            ?>

            <?php $posttags = get_the_tags();
            if ($posttags) { ?>
                <div class="post-meta-area">
                    <div class="tags">
                        <?php foreach($posttags as $tag) {
                            echo '<a href="'.get_tag_link($tag->term_id).'" class="tag-element">' . $tag->name .'</a>';
                        }
                        ?>
                    </div>
                    <!--/ Blog post tags -->
                </div>
            <?php } ?>

    </div>
</div>
</article>
<!-- Blog post details -->

