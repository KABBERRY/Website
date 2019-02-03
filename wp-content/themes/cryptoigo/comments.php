<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package cryptoigo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php // You can start editing here -- including this comment! ?>

<?php if ( have_comments() ) : ?>

	<div class="single-post-comment">
		<div class="comment-number pb40">
			<h3 class="commets-title count-comments">
				<?php
					$comment_count = get_comments_number();
					if ( 1 === $comment_count ) {
						printf(
							/* translators: 1: title. */
							esc_html_e( 'Comment', 'cryptoigo' ),
							'<span>' . get_the_title() . '</span>'
						);
					} else {
						printf( // WPCS: XSS OK.
							/* translators: 1: comment count number, 2: title. */
							esc_html( _nx( '%1$s Comment', '%1$s Comments', $comment_count, 'comments title', 'cryptoigo' ) ),
							number_format_i18n( $comment_count ),
							'<span>' . get_the_title() . '</span>'
						);
					}
				?>
					
			</h3>
		</div>
		<div class="comment-reply comment-area">
			<ul id="submited-comment" class="comment-box-form">
				<?php
					wp_list_comments( array(
						'style'       => 'li',
						'short_ping'  => true,
						'callback' => 'cryptoigo_comment',
						'avatar_size' => 64
					) );
				?>
			</ul><!-- .comment-list -->
		</div>
	</div>

	<?php 

		// are there comments to navigate through 
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav id="comment-nav-above" class="comment-navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cryptoigo' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'cryptoigo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'cryptoigo' ) ); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cryptoigo' ); ?></p>
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cryptoigo' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'cryptoigo' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'cryptoigo' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
	<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php if ( comments_open() ) { ?>
	<div class="clearfix"></div>

	<div class="leave-reply">
		<div id="leave-comment" class="post-comment-box leave-comment">

			<?php
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$fields =  array(
				'author' => '
					<input id="author" class="form-control mb-4" name="author" type="text" placeholder="'.esc_attr__( 'Your Name', 'cryptoigo' ).'" size="30"' . $aria_req . '/>',
				'email'  => '
					<input id="email" class="form-control" name="email" type="email" placeholder="'.esc_attr__( 'Your Mail', 'cryptoigo' ).'" size="30"' . $aria_req . '/>
				',
				);

			$comments_args = array(
				
				'id_form'          		=> 'add-comment',
				'class_form'			=> 'validate-form formcomment-box',
				'title_reply_before'	=> '<h3 class="commets-title">',
				'title_reply'       	=> esc_html__( 'Leave A Comment', 'cryptoigo' ),
				'title_reply_after'		=> '</h3>',
				'title_reply_to'    	=> '',
				'cancel_reply_link' 	=> esc_html__( 'Cancel Comment', 'cryptoigo' ),
				'label_submit'      	=> esc_html__( 'Post Comment', 'cryptoigo' ),
				'comment_notes_before'  => '',
				'comment_notes_after'   => '',
				'comment_field'        	=> '<textarea id="message" class="form-control required" name="comment" rows="4" cols="30" placeholder="'.esc_attr__( 'Your Comments', 'cryptoigo' ).'" required></textarea>',
				'submit_button'         => '<button value="'.esc_attr__( 'Submit', 'cryptoigo' ).'" class="%3$s btn btn-lg bordered has-very-dark-gray-color btn-round">'.esc_html__( 'Send your comment', 'cryptoigo' ).'</button>',
	    		'submit_field'          => '<div class="contact-info"><input type="hidden" name="form_botcheck" class="form-control" value=""> %1$s %2$s</div>',
	    		'format'                => 'xhtml',
	    		'fields' 				=>  $fields
			);
			ob_start();
			comment_form($comments_args);
			?>

		</div><!-- #comments -->
	</div>  

<?php } ?>