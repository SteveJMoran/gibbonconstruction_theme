<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>
	<div class="main-content">
		<header class="page-header">
			<div class="container">
				<h1>Projects</h1>
			</div>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
				<article class="project">
					<?php projects_content(); ?>
					</article>
</div>
<?php get_sidebar('projects'); ?>
<?php get_footer(); ?>