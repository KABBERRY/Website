<?php
/**
 * Template part for displaying posts.
 *
 * @package cryptoigo
 */
?>

<!-- Blog Post-->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
        $post_data = get_post_meta( get_the_ID(), '_custom_post_options', true );

        if (!empty( $post_data['post_small_img'] )) {
            $post_small_img = $post_data['post_small_img'];
            $attachment = wp_get_attachment_image_src( $post_small_img, 'full' );
            $thumb_image = $attachment['0'];
        } else {
            $thumb_image = '';
        }

        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        if (!empty($featured_img_url)) {
            echo '<a href="'.get_the_permalink().'"><img src="'.esc_url($featured_img_url).'" alt="'. esc_attr__( 'Blog feature image area', 'cryptoigo').'"></a>';
        } else if (!empty($thumb_image)) {
            echo '<a href="'.get_the_permalink().'"><img src="'.esc_url($thumb_image).'" alt="'. esc_attr__( 'Blog feature image area', 'cryptoigo').'"></a>';
        }
    ?>
    <div class="card-body">
        
        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="post-desc">
            <p><?php echo cryptoigo_excerpt( 50 ); ?></p>
            <?php
               wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cryptoigo' ),
                'after'  => '</div>',
                ) );
            ?>
            <a href="<?php the_permalink(); ?>" class="btn read-more float-left btn-gradient-purple btn-round"><?php esc_html_e( 'Read More', 'cryptoigo' ) ?></a>

        </div>
    </div>
</article>
<!--/ Blog Post-->