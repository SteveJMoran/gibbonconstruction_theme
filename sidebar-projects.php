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
				<form id="searchform" class="search-form" action="/projects" method="get">
					<label><input class="inlineSearch form-control" type="search" name="s" value="Search Projects" onblur="if (this.value == '') {this.value = 'Search Projects';}" onfocus="if (this.value == 'Search Projects') {this.value = '';}" /></label>
					<input type="hidden" name="post_type" value="projects" />
					<input class="inlineSubmit btn btn-primary" id="searchsubmit" type="submit" alt="Search" value="Search" />
				</form>
				<?php dynamic_sidebar( 'projects_sidebar' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</div><!-- close .sidebar-padder -->
</div>