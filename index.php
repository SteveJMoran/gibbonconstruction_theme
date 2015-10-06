<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tk
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<div class="main-content">
			<header class="page-header">
				<div class="container">
					<h1>Blog</h1>
				</div>
			</header>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8">
		<?php while ( have_posts() ) : the_post(); ?>
			<h3 class="blog-title"><?php the_title() ?></h3>
			<?php the_excerpt() ?>
			<a class="more-link" href="<?php the_permalink(); ?>">Read More</a>

		<?php endwhile; ?>

		<?php _tk_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'index' ); ?>

	<?php endif; ?>
</div>
<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>