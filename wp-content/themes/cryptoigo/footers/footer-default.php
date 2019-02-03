

<!-- ICO Video Modal -->

<div class="modal ico-modal fade" id="ico-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body p-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" id="video"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<!-- //////////////////////////////////// FOOTER ////////////////////////////////////-->

<footer class="footer static-bottom footer-dark footer-custom-class" data-midnight="white">
    <div class="container">
        <div class="footer-wrapper mx-auto text-center">
          <?php if ( is_active_sidebar( 'default' ) ) { ?>
            <div class="row">
                <?php dynamic_sidebar( 'default' ); ?>
            </div>
        <?php } ?>
        
        <?php if ( function_exists( 'cryptoigo_framework_init' )) {
            $footer_title = cryptoigo_get_option('footer_title'); 
            if ($footer_title) {
                ?>
                <div class="footer-title mb-5 animated" data-animation="fadeInUpShorter" data-animation-delay="0.2s"><?php echo esc_html( $footer_title ); ?></div>
            <?php }

            $footer_newsletter = cryptoigo_get_option('footer_newsletter_shortcode'); 
            if ($footer_newsletter) {

                echo do_shortcode( $footer_newsletter );
            }

            $footer_social_btns = cryptoigo_get_option( 'footer_social_btn' );
            if (is_array($footer_social_btns)) {
                ?>
                <ul class="social-buttons list-unstyled mb-5">
                    <?php $i = 4; foreach ( $footer_social_btns as $key => $value ) { $i++; ?>
                        <li class="animated" data-animation="fadeInUpShorter" data-animation-delay="0.<?php echo esc_attr($i); ?>s"><a href="<?php echo esc_url( $value['social_link'] ); ?>" title="<?php echo esc_attr( $value['social_icon'] ); ?>" class="btn btn-outline-facebook rounded-circle"><i class="<?php echo esc_attr( $value['social_icon'] ); ?>"></i></a></li>
                    <?php } ?>
                </ul>

            <?php }} if ( function_exists( 'cryptoigo_framework_init' )) { ?>
                <span class="copyright animated" data-animation="fadeInUpShorter" data-animation-delay="1.0s"><?php echo wp_kses_stripslashes( cryptoigo_get_option( 'copyrights' ) ); ?></span>
            <?php } else { ?>
                <span class="copyright animated" data-animation="fadeInUpShorter" data-animation-delay="1.0s"><?php esc_html_e( 'Copyright 2018, Cryptoigo. Theme Developed by jthemes', 'cryptoigo' ); ?></span>
            <?php } ?>
        </div>
    </div>
</footer> 