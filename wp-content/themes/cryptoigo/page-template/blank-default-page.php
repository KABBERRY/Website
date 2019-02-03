<?php
/**
 * The template for displaying home page content.
 * Template Name: Blank Page - With Breatcrumb
 * @package cryptoigo
 */
get_header(); ?>
<div class="sub-page">
<?php do_action('cryptoigo_breadcrum'); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?> 
	<?php the_content(); ?>
<?php endwhile;endif; ?>
</div>
<?php get_footer(); ?>