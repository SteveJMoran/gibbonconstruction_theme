<?php
/**
 * The sidebar for the Blog area
 *
 * @package _tk
 */
?>

<div class="sidebar col-xs-12 col-sm-4">

	<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
	<div class="sidebar-padder">
		<?php do_action( 'before_sidebar' ); ?>
		
		<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
			<div id="blog-sidebar" class="widget-right widget-area" role="complementary">
				<?php dynamic_sidebar( 'blog_sidebar' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</div><!-- close .sidebar-padder -->
</div>