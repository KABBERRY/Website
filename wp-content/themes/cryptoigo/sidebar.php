<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package cryptoigo
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
?>

<!-- Sidebar area -->
<div class="col-md-12 col-lg-4">
	<div class="sidebar">
		<?php 
		if(function_exists( 'cryptoigo_framework_init' ) ) {
			if(is_search()) {
				$sidebar_social = '';
			} else {
				$sidebar_social = cryptoigo_get_option( 'sidebar_social_btn' );
			}
			if (is_array($sidebar_social)) {
				?>
				<!-- Social Buttons-->
				<div class="card social-card">
					<div class="card-body">
						<ul class="social-buttons list-unstyled">
							<li class="social-text"><?php esc_html_e( 'Share Post :', 'cryptoigo' ); ?></li>
							<?php foreach ( $sidebar_social as $key => $value ) { ?>
								<li><a href="<?php echo esc_url($value[ 'social_link' ]); ?>"  title="Facebook" class="btn btn-outline-facebook rounded-circle"><i class="<?php echo esc_attr($value[ 'social_icon' ]); ?>"></i></a></li>
							<?php } ?>

						</ul>
					</div>
				</div>
				<!--/ Social Buttons-->
			<?php } } ?>
			<div class="card square">
				<div class="card-body">
					<?php dynamic_sidebar( 'right-sidebar' ); ?>
				</div>
			</div>
		</div>
	</div>
<!--/ Sidebar area -->