<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package _gc2
 */

get_header(); ?>
<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>

	<div class="main-content">
		<header class="page-header">
			<div class="container">
				<h1><?php _e( 'Oops! Something went wrong here.', '_gc2' ); ?></h1>
			</div>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
				<?php _e( 'Nothing could be found at this location. Maybe try a search?', '_gc2' ); ?>
				<p></p>

			<?php get_search_form(); ?>

	
</div>

<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
