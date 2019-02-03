<?php
/**
 * The template for displaying home page content.
 * Template Name: Blank Page - Full Width
 * @package cryptoigo
 */
get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?> 
	<?php the_content(); ?>
<?php endwhile;endif; ?>
<?php get_footer(); ?>