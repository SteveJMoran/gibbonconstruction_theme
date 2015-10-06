<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _tk
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
	
			<div class="main-content">
				<header class="page-header">
					<div class="container">
						<h1><?php the_title(); ?></h1>
					</div>
				</header>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<?php get_template_part( 'content', 'single' ); ?>


		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>

	<?php endwhile; // end of the loop. ?>
</div>
<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>