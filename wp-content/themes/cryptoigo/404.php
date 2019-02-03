<?php
/**
 * The header for our theme.
 *
 * @package cryptoigo
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
    <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
        if( function_exists( 'cryptoigo_framework_init' ) ) { 
            $site_icon = cryptoigo_get_option('cryptoigo_site_icon');
            ?>
            <link rel="shortcut icon" type="image/png" href="<?php echo esc_url( $site_icon );?>">
        <?php } else { ?>
            <link rel="shortcut icon" type="image/png" href="<?php echo esc_url( CRYPTOIGO_IMG . 'favicon.png' ); ?>">
        <?php } } wp_head();
        ?>
    </head>

    <body <?php body_class();?> data-menu-open="hover" data-menu="">

        <?php 
        if( function_exists( 'cryptoigo_framework_init' ) ) {
            $preloader = cryptoigo_get_option('cryptoigo_preloader_enable');
            if (!empty($preloader)) {
                ?>

                <div id="loader-wrapper">
                    <svg viewbox=" 0 0 512 512" id="loader">
                        <linearGradient id="loaderLinearColors" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="5%" stop-color="#28bcfd"></stop>
                            <stop offset="100%" stop-color="#1d78ff"></stop>
                        </linearGradient>        
                        <g>
                            <circle cx="256" cy="256" r="150" fill="none" stroke="url(#loaderLinearColors)" />
                        </g>
                        <g>
                            <circle cx="256" cy="256" r="125" fill="none" stroke="url(#loaderLinearColors)" />
                        </g>
                        <g>
                            <circle cx="256" cy="256" r="100" fill="none" stroke="url(#loaderLinearColors)" />
                        </g>
                        <g>
                            <circle cx="256" cy="256" r="75" fill="none" stroke="url(#loaderLinearColors)" />
                        </g>
                        <circle cx="256" cy="256" r="60" fill="url(#loaderImage)" stroke="none" stroke-width="0" />

                        <!-- Change the preloader logo here -->
                        <defs>
                            <pattern id="loaderImage" height="100%" width="100%" patternContentUnits="objectBoundingBox">
                                <image href="<?php echo esc_url( get_template_directory_uri(). '/theme-assets/images/loader-logo.png'); ?>" preserveAspectRatio="none" width="1" height="1"></image>
                            </pattern>
                        </defs>
                    </svg>

                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
                </div>
                <!--/ Preloader -->
            <?php } } if(function_exists( 'cryptoigo_framework_init' ) ) {
                $social_btns = cryptoigo_get_option('header_social_btn');
                if (is_array($social_btns)) {
                    ?>
                    <nav class="vertical-social">
                        <ul>
                            <?php foreach ( $social_btns as $key => $value ) { ?>
                                <li><a href="<?php echo esc_url( $value['social_link'] ); ?>"><i class="<?php echo esc_attr( $value['social_icon'] ); ?>" aria-hidden="true"></i></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                <?php } } ?>


                <div class="content-wrapper">
                    <div class="content-body">
                        <main><!-- Header: Counter -->

                            <?php if( function_exists( 'cryptoigo_framework_init' ) ) { 

                                $img_id = cryptoigo_get_option('404_page_img');
                              
                                if(is_numeric($img_id)) {
                                    $img_src = wp_get_attachment_url( $img_id );
                                } else {
                                    $img_src = $img_id;
                                }
                                ?>

                                <!-- Start Not Found -->
                                <div class="error404" data-midnight="white">
                                    <div id="particles-js"></div>
                                    <div class="error-img text-center">
                                        <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php esc_attr_e('error image', 'cryptoigo'); ?>" class="img-fluid">
                                    </div>
                                    <div class="error-content text-center">
                                        <h4 class="error-info"><?php echo esc_html( cryptoigo_get_option( '404_page_title' ) ); ?></h4>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-glow btn-gradient-blue btn-round"><?php echo esc_html( cryptoigo_get_option( 'cryptoigo_404_btn_txt' ) ); ?></a>
                                    </div>
                                </div>
                                <!-- End Not Found -->
                            <?php } else { ?>
                                <!-- Start Not Found -->
                                <div class="error404" data-midnight="white">
                                    <div id="particles-js"></div>
                                    <div class="error-img text-center">
                                        <img src="<?php echo esc_url( get_template_directory_uri(). '/theme-assets/images/error.png' ); ?>" 
                                        alt="<?php esc_attr_e( 'error image', 'cryptoigo' ); ?>" class="img-fluid">
                                    </div>
                                    <div class="error-content text-center">
                                        <h4 class="error-info"><?php esc_html_e( 'Oops! You’ve got lost in space', 'cryptoigo' ); ?></h4>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-glow btn-gradient-blue btn-round"><?php esc_html_e( 'Back to Home', 'cryptoigo' ); ?></a>
                                    </div>
                                </div>
                                <!-- End Not Found -->
                            <?php } ?>

                        </main>
                    </div>
                </div>

                <?php wp_footer();?>

            </body>
            </html>
