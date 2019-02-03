<?php 
/*
Plugin Name: Cryptoigo Master
Plugin URI: https://www.htmlmate.com/
Description: After install the Cryptoigo Theme, you must need to install "Cryptoigo Master" plugin first to get all features.
Author: jThemes
Author URI: https://www.jthemes.org
Version: 1.0.0
Text Domain: Cryptoigo
Domain Path: /languages
*/

//define
define( 'CRYPTOIGO_PLG_URL', plugin_dir_url( __FILE__ ) );
define( 'CRYPTOIGO_PLG_DIR', dirname( __FILE__ ) ); 

require_once CRYPTOIGO_PLG_DIR . '/custom-widgets.php';
require_once CRYPTOIGO_PLG_DIR . '/custom-posttype.php';

/**  theme option framework.
--------------------------------------------------------------------------------------------------- */
define( 'CRYPTOIGO_ACTIVE_LIGHT_THEME',  true  ); // default false
require_once CRYPTOIGO_PLG_DIR . '/framework/cryptoigo-framework.php';



/**  King Composer Shportcode Modules.
--------------------------------------------------------------------------------------------------- */
require_once CRYPTOIGO_PLG_DIR . '/cryptoigo-elements/cryptoigo-elements.php';


add_action( 'admin_enqueue_scripts', 'cryptoigo_master_scripts' );
function cryptoigo_master_scripts() {
  wp_enqueue_style('cryptoigo-admin-style', CRYPTOIGO_PLG_URL . 'assets/css/cryptoigo-admin-style.css' , array(), '' );
  wp_enqueue_style('cryptoigo-custom-fonts', CRYPTOIGO_PLG_URL . 'assets/css/themify.css' , array(), '' );
}


add_action( 'elementor/editor/before_enqueue_scripts', function() {


   wp_enqueue_style( 'cryptoigo-elements-editor', CRYPTOIGO_PLG_URL . 'assets/css/cryptoigo-admin-style.css',
    [
        'elementor-editor', // dependency
    ],
    '1.0.0',
    false // in_footer
   );

} );

add_action( 'wp_enqueue_scripts', function() {
    if ( ! class_exists( '\Elementor\Post_CSS_File' ) ) {
        return;
    }

    $template_id = 123456;

    $css_file = new \Elementor\Post_CSS_File( $template_id );
    $css_file->enqueue( 'cryptoigo-admin-style', CRYPTOIGO_PLG_URL . 'assets/css/cryptoigo-admin-style.css' , array(), '' );
}, 500 );


/*------------------------------------------------------------------------------------------------------------------*/
/*  Eventa Socials Share Buttons
/*------------------------------------------------------------------------------------------------------------------*/ 
add_action('cryptoigo_social_share_media', 'cryptoigo_social_share_media_btns');
function cryptoigo_social_share_media_btns() { 

?>
<!-- Socials Share Button
============================================= -->

<ul class="single-post-social list-inline pull-right">
    <li class="share-post"><?php esc_html_e( 'Share:', 'cryptoigo' ); ?></li>
    <li>
        <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="fa fa-facebook"></i></a>
    </li>
    <li>
        <a href="http://twitter.com/home?status=Reading: <?php the_permalink(); ?>" title="Share this post on Twitter!" target="_blank"><i class="fa fa-twitter"></i></a>
    </li>
    <li>
        <a href="https://plus.google.com/share?url=http://developers.google.com/%2B/" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=600,width=600');return false;"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </li>
</ul>

<?php }



/*------------------------------------------------------------------------------------------------------------------*/
/*  Notification Message Script
/*------------------------------------------------------------------------------------------------------------------*/ 

function cryptoigo_notify_script() { ?>

<script>
 // This depends on jquery
<?php 
    $sale_notifications = cryptoigo_get_option( 'sale_notifications' );
        if (is_array($sale_notifications)) {
                $i = 5000;
                foreach ($sale_notifications as $key => $value) {

                    $notify_img = $value['client_pic'];
                    $client_name = $value['client_name'];
                    $client_message = $value['client_message'];
                    $purchase_time = $value['purchase_time'];
?>

        setTimeout(function() {
            var time = "<?php echo $purchase_time ?>";
            $.notify({
                icon: '<?php echo esc_url($notify_img) ?>',
                title: '<?php echo $client_name ?>',
                message: '<?php echo $client_message ?>'
            },{
                type: 'minimalist',
                placement: {
                    from: "bottom",
                    align: "left"
                },
                animate: {
                    enter: 'animated fadeInLeftBig',
                    exit: 'animated fadeOutLeftBig'
                },
                icon_type: 'image',
                template: '<div data-notify="container" class="alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<div id="image">' +
                    '<img data-notify="icon" class="rounded-circle float-left">' +
                    '</div><div id="text">' +
                    '<span data-notify="title">{1}</span>' +
                    '<span data-notify="message">{2}</span>' +
                    '<span data-notify="time">'+time+'</span>' +
                    '</div>'+
                '</div>'
            });
        },<?php echo $i ?>);

<?php $i+=10000; } } ?>

</script>

<?php } 

add_action('wp_footer', 'cryptoigo_notify_script', 100);

