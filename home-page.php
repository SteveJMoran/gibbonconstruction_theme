<?php
/**
 * The template for displaying all pages.
 *
 *	Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>

<?php if ( is_active_sidebar( 'sub_header' )  && has_post_thumbnail()) : ?>
	<div class="callHeader">
		<div id="subheader" class="widget-sub-header home widget-area" role="complementary">
			<?php 
				the_post_thumbnail();
				dynamic_sidebar( 'sub_header' ); 
			?>
		</div><!-- #primary-sidebar -->
	</div>
<?php endif; ?>

	<div class="main-content" id="main">
		<span class="next-section"><a href="#main"><i class="fa fa-chevron-down"></i></a></span>
		<div class="container">
			<div class="row">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>


	<?php endwhile; // end of the loop. ?>
	<div class="col-sm-12 col-md-6">
		<?php dynamic_sidebar( 'left_widget_home' ); ?>
	</div>
	<div class="col-sm-12 col-md-6">
		<?php dynamic_sidebar( 'right_widget_home' ); ?>
	</div>

<?php get_footer(); ?>
