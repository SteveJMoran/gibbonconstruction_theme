<?php
/**
 * The sidebar containing the main widget area
 *
 * @package _tk
 */
?>

<div class="sidebar col-xs-12 col-sm-4">

	<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
	<div class="sidebar-padder">
		<?php do_action( 'before_sidebar' ); ?>
		
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>


		<?php endif; ?>

	</div><!-- close .sidebar-padder -->
</div>