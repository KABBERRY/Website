<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cryptoigo
 */

?>
<!-- Blog Post-->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        if ($featured_img_url) {
            echo '<a href="'.get_the_permalink().'"><img class="card-img-top" src="'.esc_url($featured_img_url).'" alt="'.esc_attr__('Blog image area', 'cryptoigo') .'"></a>';
        }
    ?>
    <div class="card-body">
        
        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="post-desc">
            <p><?php echo cryptoigo_excerpt( 50 ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn read-more float-left btn-gradient-purple btn-round"><?php esc_html_e( 'Read More', 'cryptoigo' ) ?></a>
        </div>
    </div>
</article>
<!--/ Blog Post-->