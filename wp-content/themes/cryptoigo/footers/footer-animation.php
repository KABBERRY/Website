

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

<?php if ( is_active_sidebar( 'footer-widgets' ) ) {
    $fp = 'footer-pd';
} else {
    $fp = 'footer-pdn';
} ?>


<footer class="footer static-bottom footer-dark footer-custom-class <?php echo esc_attr( $fp ); ?>">
    <div class="container">
        <div class="footer-wrapper">
            <?php if ( is_active_sidebar( 'footer-widgets' ) ) { ?>
            <div class="row">
                <?php dynamic_sidebar( 'footer-widgets' ); ?>
            </div>
            <?php } ?>
            <div class="copy-right mx-auto text-center">
                <?php if ( function_exists( 'cryptoigo_framework_init' )) { ?>
                    <span class="copyright" data-animation="fadeInUpShorter" data-animation-delay="1.0s"><?php echo wp_kses_stripslashes( cryptoigo_get_option( 'copyrights' ) ); ?></span>
                <?php } else { ?>
                <span class="copyright" data-animation="fadeInUpShorter" data-animation-delay="1.0s"><?php esc_html_e( 'Copyright 2018, Cryptoigo. Theme Developed by jthemes', 'cryptoigo' ); ?></span>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>