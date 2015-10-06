<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package _gc2
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<div class="main-content">
				<header class="page-header">
					<div class="container">
						<h1><?php printf( __( 'Search Results for: %s', '_tk' ), '<strong>' . get_search_query() . '</strong>' ); ?></h1>
					</div>
				</header>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-8">

		<?php // start the loop. ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'search' ); ?>

		<?php endwhile; ?>

		<?php _tk_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

	<?php endif; // end of loop. ?>

<?php// get_sidebar(); ?>
<?php get_footer(); ?>