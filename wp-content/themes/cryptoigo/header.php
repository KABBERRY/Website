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
    <link rel="shortcut icon" type="image/png" href="<?php echo esc_url( CRYPTOIGO_IMG . 'favicon.ico' ); ?>">
    <?php } } wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
    
<!-- Start of Header 
============================================= -->
<?php do_action( 'cryptoigo_header_style' ); ?> 
<!-- End of  Header 
============================================= -->
