<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cryptoigo
 */

if ( ! function_exists( 'cryptoigo_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function cryptoigo_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation next-prev">

		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous old-entries"><i class="fa fa-angle-left"></i><?php next_posts_link( esc_html__( 'Older posts', 'cryptoigo' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next new-entries"><?php previous_posts_link( esc_html__( 'Newer posts', 'cryptoigo' ) ); ?> <i class="fa fa-angle-right"></i></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'cryptoigo_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function cryptoigo_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'cryptoigo' ); ?></h2>
		<div class="nav-links">
			<?php
			previous_post_link( '<div class="nav-previous">%link</div>', '-- %title' );
			next_post_link( '<div class="nav-next">%link</div>', '%title --' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'cryptoigo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function cryptoigo_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$posted_on = sprintf(
			esc_html_x( 'Updated on %s', 'post date', 'cryptoigo' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	} else {
		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', 'cryptoigo' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'cryptoigo' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

/**  cryptoigo meta.
--------------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'cryptoigo_entry_header' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function cryptoigo_entry_header() {
	// Hide category and tag text for pages.
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$posted_on = sprintf(
			esc_html_x( 'Updated on %s', 'post date', 'cryptoigo' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	} else {
		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', 'cryptoigo' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}

	echo '<span class="posted-on">' . $posted_on . '</span>';


	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'cryptoigo' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( ' | Posted in %1$s', 'cryptoigo' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}



		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'cryptoigo' ), esc_html__( '1 Comment', 'cryptoigo' ), esc_html__( '% Comments', 'cryptoigo' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( ' Edit', 'cryptoigo' ), '<span class="edit-link">', '</span>' );
	}
endif;



if ( ! function_exists( 'cryptoigo_archive_title' ) ) :
/**
 * Shim for `cryptoigo_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function cryptoigo_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'cryptoigo' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'cryptoigo' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'cryptoigo' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'cryptoigo' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'cryptoigo' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'cryptoigo' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'cryptoigo' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'cryptoigo' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'cryptoigo' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'cryptoigo' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'cryptoigo' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'cryptoigo' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'cryptoigo' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'cryptoigo' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'cryptoigo' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'cryptoigo' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'cryptoigo' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'cryptoigo' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'cryptoigo' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'cryptoigo' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'cryptoigo' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_cryptoigo_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo wp_kses_stripslashes( $before . $title . $after );  // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo wp_kses_stripslashes( $before . $description . $after );  // WPCS: XSS OK.
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function cryptoigo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'cryptoigo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'cryptoigo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so cryptoigo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so cryptoigo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in cryptoigo_categorized_blog.
 */
function cryptoigo_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cryptoigo_categories' );
}
add_action( 'edit_category', 'cryptoigo_category_transient_flusher' );
add_action( 'save_post',     'cryptoigo_category_transient_flusher' );


/*-----------------------------------------------------------------------------------*/
/*	Display navigation to next/previous set of posts when applicable.  
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'cryptoigo_paging_nav' ) ) :

	function cryptoigo_paging_nav($pages = '', $range = 2) {

		$showitems = ($range * 1)+1;  

		global $paged;

		if(empty($paged)) $paged = 1;

		if($pages == '')
		{
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if(!$pages)
			{
				$pages = 1;
			}
		}   

		if(1 != $pages)
		{
			
			echo '
			<div class="text-center"><ul class="pagination">';

			if($paged > 2 && $paged > $range+1 && $showitems < $pages){
				echo '<li class="page-item"><a class="page-link prev-post" href="'.get_pagenum_link(1).'"><span aria-hidden="true"><i class="ti-angle-left"></i> Previous</span></a></li>';
			}


			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					$pagesed = ($paged == $i)? "<li class=\"page-item\"><a href='#' class=\"page-link active\">".$i."</a></li>":"<li class=\"page-item\"><a href='".get_pagenum_link($i)."' class='page-no pre page-link'>".$i."</a></li>";

					echo wpautop( $pagesed );
				}
			}


			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
				echo '<li class="page-item"><a class="page-link next-post" href="'.get_pagenum_link($pages).'"><span aria-hidden="true">Next <i class="ti-angle-right"></i></span></a></li>';
			}


			echo '</ul></div>';

		}
	}

endif;

/*------------------------------------------------------------------------------------------------------------------*/
/*	Post Meta
/*------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'cryptoigo_post_meta' ) ) :

	function cryptoigo_post_meta() { ?>

		<ul class="single-post-meta list-inline">
			<li class="post-date">
				<a href="<?php the_permalink(); ?> "><?php the_date(); ?></a> 
			</li>
			<li class="post-comment">
				<span class="icon icon-Message"></span>
				<a href="<?php the_permalink(); ?>"><?php comments_number( esc_html__('0 Comment', 'cryptoigo'), esc_html__( '1 Comment', 'cryptoigo' ), esc_html__( '% Comments', 'cryptoigo' ) ); ?></a> 
			</li>
			<li class="post-author">
				<span class="icon icon-Pen"></span>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author(); ?></a> 
			</li>
		</ul>

	<?php	}
endif;
