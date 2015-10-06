<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-16x16.png">
<link rel="manifest" href="icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
<meta name="theme-color" content="#F58220">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48847654-5', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<header id="masthead" class="site-header banner" role="banner">
  <div class="header-wrapper">
	<div class="header container">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-3 site-header-inner">
	      <a class="brand" href="<?= esc_url(home_url('/')); ?>">
	       	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gibbon-logo-full.png">
	        
	      </a>
	      <a class="visible-xs phone" href="tel:6132827717">613-282-717</a>
		</div>

		<nav class="site-navigation-inner col-xs-12 col-sm-8 col-md-9">
			<div class="social-media">
				<?php dynamic_sidebar( 'social-nav' ); ?>
				<p class="tagline">Exceptional <span>Residential</span> And <span>Commercial</span> Service</p>
			</div>
			<div class="nav nav-tabs">
				<div class="navbar-header">
					<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>

			    </div>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => '',
						'menu_id' => 'main-menu',
						'walker' => new wp_bootstrap_navwalker()
					)
				); ?>

			</div><!-- .navbar -->
		</nav>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
<?php
$id = get_the_ID();

if ( has_post_thumbnail( $id ) && get_post_type() != 'project' ) :
	
 	$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
    $image = $image_array[0];
     echo "<style> .headline { background-image:url(".$image .") }</style>";
    
endif;

   

    echo (!is_front_page()) ? "<div class='headline'></div>" : "<div class='headline home'>" . do_shortcode('[metaslider id=19]') . "</div>";
  ?>
			

