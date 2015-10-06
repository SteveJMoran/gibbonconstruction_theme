<?php
/**
 * _gc2 specific functions and definitions
 */

function twentytwelvechild_custom_header_setup() {
	$header_args = array( 
		'height' => 60 ,
		'width'  => 320

		);
	add_theme_support( 'custom-header', $header_args );
}
add_action( 'after_setup_theme', 'twentytwelvechild_custom_header_setup' );

function gc2_scripts() {
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
	wp_enqueue_script( 'script-js', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'gc2_scripts' );



function register_my_menu() {
  register_nav_menu('footer-menu-1',__( 'Footer Links 1' ));
  register_nav_menu('footer-menu-2',__( 'Footer Links 2' ));
}
add_action( 'init', 'register_my_menu' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function gibbon_widgets_init() {
	
	register_sidebar( array(
		'name' => 'Social Icons',
		'id' => 'social-nav',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => 'Footer Projects',
		'id' => 'footer_projects',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => 'Footer Left',
		'id' => 'footer_left_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => 'Footer Right',
		'id' => 'footer_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="blog-sidebar-title">',
		'after_title' => '</h3>',
	) );
		register_sidebar( array(
		'name' => 'Projects Sidebar',
		'id' => 'projects_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="blog-sidebar-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'gibbon_widgets_init' );


/**
 * Removes inline dimensions from post thumbnail
 *
 */
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 ); 
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) { 
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html ); return $html;
}

/**
  *
  *Recent posts Wdiget with first post blown up
  *
***/
class latest_post_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'latest_post_widget', 

		// Widget name will appear in UI
		__('Latest Post(s)', 'lp_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Display the latest posts highlighting the most recent post', 'lp_widget_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
	// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if ( ! empty( $title ) )echo $args['before_title'] . $title . $args['after_title']; ?>

		<ul class="recent-posts"> 

		<?php
			$postCat = $instance['type'];
			$postNum = $instance['numPosts'];

			$args = array( 
				'posts_per_page' => $postNum, 
				'category' => $postCat
				);

			$recent_posts = get_posts( $args );
			
			foreach( $recent_posts as $recent ) : 
				//echo print_r($recent);
				$permalink = $recent->guid;
				$postTitle = esc_attr($recent->post_title);
				$post = $recent->post_title;
				$excerpt = $recent->post_excerpt;
				$date = date("F d, Y", strtotime($recent->post_date));
				$id = $recent->ID; 
				$cat = get_the_category( $id ); 
				$videoMeta = get_post_meta($id, Video);
				$videoTag = $videoMeta[0];
				$catId = $cat[0]->cat_ID;

				?>

			<li>
				<?php if ($recent == $recent_posts[0]):	?>
					<div class="img-thumb-cont"> 
						<?php if ($catId =='7'): ?>
								<iframe width="540" height="260" src="//www.youtube.com/embed/<?php echo $videoTag ?>" frameborder="0" allowfullscreen></iframe>
							<?php elseif($catId =='6'):
								echo get_the_post_thumbnail( $id, small );
							else:?>

						<?php endif; ?>
					</div>
					<div class="body-thumb-cont">
						<h4>
							<a href='<?php echo $permalink; ?>' title='Look <?php echo $postTitle; ?>' >
								<?php echo $post  ?>
							</a>
						</h4>
						<span><?php echo $date; ?></span>
						<p class="post-excerpt"><?php echo $excerpt ?>...<a href='<?php echo $permalink; ?>' title='<?php echo $postTitle; ?>' >Read More</a></p>
					</div>
				
				<?php else: ?>

					<div class="body-thumb-cont">
						<h4>
							<a href='<?php echo $permalink; ?>' title='Look <?php echo $postTitle; ?>' >
								<?php echo $post  ?>
							</a>
						</h4>
						<span><?php echo $date; ?></span>
					</div>
			

				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>

		<?php echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
		isset( $instance[ 'title' ]) ? $title = $instance[ 'title' ] : $title = __( 'New title', 'wpb_widget_domain' );

		isset( $instance[ 'type' ]) ? $type = $instance['type'] : $type = __( '5', 'wpb_widget_domain' );

		isset( $instance[ 'numPosts' ]) ? $numPosts = $instance[ 'numPosts' ] : $numPosts = __( '5', 'wpb_widget_domain' );

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Type:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" type="text" value="<?php echo esc_attr( $type ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'numPosts' ); ?>"><?php _e( 'Number of posts:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'numPosts' ); ?>" name="<?php echo $this->get_field_name( 'numPosts' ); ?>" type="text" value="<?php echo esc_attr( $numPosts )?>" />
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : '';
		$instance['numPosts'] = ( ! empty( $new_instance['numPosts'] ) ) ? strip_tags( $new_instance['numPosts'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here


// Register and load the widget
function wpb_load_widget() {
	register_widget( 'latest_post_widget' );
}

add_action( 'widgets_init', 'wpb_load_widget' );

