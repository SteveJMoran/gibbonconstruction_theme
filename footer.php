<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _tk
 */
?>			</div>
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->


<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="site-footer-inner col-sm-12">

				<div class="site-info">
					<div class="col-sm-4 col-xs-12">
						<?php if ( is_active_sidebar( 'footer_left_1' ) ) : ?>
							<div id="footer-left-widget" class="widget-left widget-area" role="complementary">
								<?php dynamic_sidebar( 'footer_left_1' ); ?>
							</div><!-- #primary-sidebar -->
						<?php endif; ?>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="col-sm-12 col-md-6">
							<h3>Services</h3>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1', 'container_class' => 'footer-nav' ,'depth' => 2) ); ?>
						</div>
						<div class="col-sm-12 col-md-6">
							<h3>Projects</h3>
							<?php if ( is_active_sidebar( 'footer_projects' ) ) : ?>
								<div id="footer-projects-widget" class="widget widget-area" role="complementary">
									<?php dynamic_sidebar( 'footer_projects' ); ?>
								</div><!-- #primary-sidebar -->
							<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<?php if ( is_active_sidebar( 'footer_right_1' ) ) : ?>
							<div id="footer-right-widget" class="widget-right widget-area" role="complementary">
								<?php dynamic_sidebar( 'footer_right_1' ); ?>
							</div><!-- #primary-sidebar -->
						<?php endif; ?>
					</div>
				</div><!-- close .site-info -->

			</div>
		</div>
	</div><!-- close .container -->
	<div class="copyright">&copy; All rights reserved Gibbon Construction</div>
</footer><!-- close #colophon -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<?php wp_footer(); ?>

</body>
</html>