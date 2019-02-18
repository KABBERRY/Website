<?php
if( function_exists( 'cryptoigo_framework_init' ) ) {
    $preloader = cryptoigo_get_option('cryptoigo_preloader_enable');
    if (!empty($preloader)) {
        ?>

        <!-- Preloader | Comment below code if you don't want preloader-->
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
                        <image href="<?php echo esc_url( get_template_directory_uri(). '/theme-assets/images/loader-logo.png' ); ?>" preserveAspectRatio="none" width="1" height="1"></image>
                    </pattern>
                </defs>
            </svg>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!--/ Preloader -->
    <?php } } 

    if(function_exists( 'cryptoigo_framework_init' ) ) {
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
        <!-- /////////////////////////////////// HEADER /////////////////////////////////////-->

        <!-- Header Start-->
        <header class="page-header">
          <!-- Horizontal Menu Start-->
          <nav class="main-menu static-top navbar-dark navbar navbar-expand-lg fixed-top">
            <div class="container">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) {
                    echo '<img src="'. esc_url( $logo[0] ) .'">';
                } else if(function_exists( 'cryptoigo_framework_init' ) ) {

                    $page_settings = get_post_meta( get_the_ID(), '_custom_page_variation_options', true );
                    if(!empty($page_settings)) {
                        if($page_settings['choose_page_variation'] == 'counter') {
                            $site_logo_id = cryptoigo_get_option('cryptoigo_logo_img');
                        } elseif ($page_settings['choose_page_variation'] == 'video') { 
                            $site_logo_id = cryptoigo_get_option('cryptoigo_logo_img');
                        } elseif ($page_settings['choose_page_variation'] == 'animation') { 
                            $site_logo_id = cryptoigo_get_option('cryptoigo_orange_logo_img');
                        } elseif ($page_settings['choose_page_variation'] == 'graphic') { 
                            $site_logo_id = cryptoigo_get_option('cryptoigo_orange_logo_img');
                        }
                    } else {
                        $site_logo_id = cryptoigo_get_option('cryptoigo_logo_img');
                    }



                    $attachment = wp_get_attachment_image_src( $site_logo_id, 'thumbnail' );
                    $site_logo = ($attachment) ? $attachment[0] : $site_logo_id;
                    $logo_txt = cryptoigo_get_option('cryptoigo_logo_txt');
                    echo'<a class="navbar-brand animated" data-animation="fadeInDown" data-animation-delay="1s" href="'.esc_url(home_url('/')).'"><img src="'.esc_url( $site_logo ).'" alt="'.esc_attr( $logo_txt ).'"></a>';
                } else {
                    echo '<h1><a class="navbar-brand animated" data-animation="fadeInDown" data-animation-delay="1s" href="'.esc_url(home_url('/')).'"> <span class="brand-text"><span class="font-weight-bold">'. get_bloginfo( 'name' ) .'</span></span></a></h1>';
                }
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div id="navigation" class="navbar-nav ml-auto">
                        <?php 
                        if(function_exists( 'cryptoigo_framework_init' ) ) {
                            $meta_data = get_post_meta( get_the_ID(), '_custom_page_options', true );
                            $menus_switch = $meta_data['cryptoigo_onepage_nav'];
                            $menus = $meta_data['onepage_nav'];
                            if (!empty($menus_switch)) {

                                $header_sign_btn_switch = cryptoigo_get_option('header_sign_btn_switch');
                                if (!empty($header_sign_btn_switch)) {
                                    $menu_btn_left = 'left-sign-btn-have';
                                } else {
                                    $menu_btn_left = 'left-sign-btn-none';
                                }

                                ?>
                                <ul class="navbar-nav mt-0 <?php echo esc_attr( $menu_btn_left ); ?>">
                                    <?php  $i = 0;
                                    if (is_array($menus)) {
                                        foreach ($menus as $value) { $i++;
                                            $menuname = $value['menu_name'];
                                            $id = str_replace(' ', '_', $menuname);
                                            ?>
                                            <li><a href="#<?php echo esc_attr(strtolower($id)); ?>" class="nav-link <?php if ($i == 1 ) { echo 'active'; } ?>"><?php echo esc_html( $menuname ); ?></a></li>
                                        <?php } } ?>
                                    </ul>
                                <?php } } elseif ( has_nav_menu( 'primary' ) ) {

                                    if(function_exists( 'cryptoigo_framework_init' ) ) {
                                        $header_sign_btn_switch = cryptoigo_get_option('header_sign_btn_switch');
                                        if (!empty($header_sign_btn_switch)) {
                                            $menu_btn_left = 'left-sign-btn-have';
                                        } else {
                                            $menu_btn_left = 'left-sign-btn-none';
                                        } } else {
                                            $menu_btn_left = 'left-sign-btn-none';
                                        }

                                        wp_nav_menu(array(
                                            'theme_location' => 'primary',
                                            'container'       => false,
                                            'menu_class'      => '',
                                            'echo'            => true,
                                            'depth' => 3,
                                            'items_wrap'      => '<ul id="main-nav" class="%2$s nav navbar-nav mt-1"' .$menu_btn_left. '"">%3$s</ul>'
                                        ));

                                    } else {
                                        echo '<a class="fallbackcd" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a menu', 'cryptoigo' ) . '</a>';
                                    } ?>
                                    <span id="slide-line"></span>
                                    <?php if(function_exists( 'cryptoigo_framework_init' ) ) {
                                        $header_sign_btn_switch = cryptoigo_get_option('header_sign_btn_switch');
                                        $header_sign_btn_text = cryptoigo_get_option('header_sign_btn_text');
                                        $header_sign_btn_link = cryptoigo_get_option('header_sign_btn_link');

                                        if (!empty($header_sign_btn_switch)) {
                                            $menu_btn_left = 'left-sign-btn-have';
                                        } else {
                                            $menu_btn_left = 'left-sign-btn-none';
                                        }

                                        if (!empty($header_sign_btn_switch)) {
                                            ?>
                                            <div class="action-btn form-inline mt-2 mt-md-0">
                                                <a class="text-uppercase btn btn-sm btn-round bordered my-2 my-sm-0 animated" data-animation="fadeInDown" data-animation-delay="1.8s" href="<?php echo esc_url($header_sign_btn_link); ?>" target="_blank"><?php echo esc_html( $header_sign_btn_text ); ?></a>
                                            </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <!-- /Horizontal Menu End-->
                    </header>
                    <!-- /Header End-->

                    <!-- //////////////////////////////////// CONTAINER ////////////////////////////////////-->

                    <div class="content-wrapper">
                        <div class="content-body">
            <!-- Header: Counter -->